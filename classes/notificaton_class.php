<?php
require_once 'db_config.php';


class Notification extends DB
{


    private $from;
    private $to;
    private $content;
    private $rlink;



    public function setFrom($data)
    {
        $this->from = $data;
    }
    public function setTo($data)
    {
        $this->to = $data;
    }
    public function setContent($data)
    {
        $this->content = $data;
    }
    public function setRLink($data)
    {
        $this->rlink = $data;
    }


    public function insert()
    {
        $sql = "INSERT INTO `notification` (`id`,`from_id`, `to_id`, `content`, `redirect_link`, `status`, `date_created`) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([
            uniqid().time(),
            $this->from,
            $this->to,
            $this->content,
            $this->rlink,
            'unread',
            date("Y-m-d H:i:s")
        ]);
    }

    public function getUserNotification($id){
        $sql = "SELECT
        notification.id,
        notification.from_id,
        notification.to_id,
        notification.content,
        notification.redirect_link,
        notification.status,
        notification.date_created,
        concat(userinfo.firstname, ' ', userinfo.lastname) as fullname
        FROM notification,userinfo
        WHERE userinfo.id = notification.from_id and notification.to_id = ? order by notification.date_created desc";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function unreadNotification($id){
        $sql = "UPDATE `notification` SET `status`=? WHERE id = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute(['read',$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
