<?php
require_once 'db_config.php';

class Conversation extends DB
{



    public function insert($data)
    {
        $sql = "INSERT INTO `messages`(`conversationid`, `content`, `sender`,`type`, `status`, `date_created`) VALUES (?,?,?,?,?,?)";
        $pdo = $this->getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    }
    public function getMessageListOfConvo($data)
    {
        $sql = "SELECT  * FROM `messages` where `conversationid` = ?";
        $pdo = $this->getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$data]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLastMsg($data)
    {
        $sql = "SELECT  * FROM `messages` where `conversationid` = ? ORDER BY ID DESC limit 1";
        $pdo = $this->getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$data]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
