<?php 

require_once 'db_config.php';

    class FeeIncome extends DB{

        private $fromid;


        public function setFromId($data){
            $this->fromid = $data;
        }

        public function insert(){
            $sql = "INSERT INTO `income_from_memberfee`(`from_id`, `amount`, `date_created`) VALUES (?,?,?)";
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    $this->fromid,
                    150.00,
                    date("Y-m-d H:i:s")
                ]
            );
        }
    } 
?>