<?php 

    require_once 'db_config.php';


    class Dashboard extends DB{
        
        public function user($data){

            $sql = "SELECT count(*) as count FROM `accountinfo` WHERE `type` = ".$data;
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result[0]['count'];
        }
        public function roi(){

            $sql = "SELECT sum(amount) as amount FROM `roi`";
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return empty($result) ? 0 : $result[0]['amount'];
        }

        public function memberfee(){

            $sql = "SELECT sum(amount) as amount FROM `income_from_memberfee`";
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return empty($result) ? 0 : $result[0]['amount'];
        }

        public function userList(){

            $sql = "SELECT * FROM `accountinfo`";
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return  $stmt->fetchAll(PDO::FETCH_ASSOC);
 
        }

        public function memberedUsers(){
            $sql = "SELECT * FROM `plan`";
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return  $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        
        public function roiData(){
            $sql = "SELECT * FROM  `roi`";
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return  $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
