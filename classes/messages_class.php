<?php 

require_once 'db_config.php';
 class Messages extends DB{

    private $id;
    private $users;


    public function setUsers($data){
       $this->users= $data;
    }

    public function insert(){
        $sql = "INSERT INTO `conversationlist`(`id`, `users`, `status`) VALUES (?,?,?)";
        $pdo = $this->getConnection();

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            uniqid().time(),
            $this->users,
            date("Y-m-d H:i:s")
        ]);
    }
    public function conversationExits($data){
        $sql = "SELECT * FROM `conversationlist` WHERE users = ? or users = ?";
        $pdo = $this->getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function conversationInfo($data){
        $sql = "SELECT * FROM `conversationlist` WHERE `id` = ?";
        $pdo = $this->getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$data]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public function getUserConvo($data){
        $sql = "SELECT  * FROM `conversationlist` where SUBSTRING_INDEX(`users`,'-',1) = ? or SUBSTRING_INDEX(`users`,'-',-1) = ? ORDER BY status DESC;";
        $pdo = $this->getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $data,
            $data
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
 }

?>