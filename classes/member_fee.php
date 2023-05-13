<?php 

    require_once 'db_config.php';
    class MembershipFee extends DB{
        private $id;
        private $ownerid;
        private $ref_no;
        private $remarks;
        private $status;

        public function setOwnerId($data){
            $this->ownerid = $data;
        }
        public function setRefNo($data){
            $this->ref_no = $data;
        }
        public function setRemarks($data){
            $this->remarks = $data;
        }
        public function setStatus($data){
            $this->status = $data;
        }
        public function setId($data){
            $this->id = $data;
        }
        public function insert(){

            $sql= "INSERT INTO `plan_transaction`(`id`, `owner_id`, `reference_no`, `remarks`, `status`, `date_created`) VALUES (?,?,?,?,?,?)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([
                uniqid().time(),
                $this->ownerid,
                $this->ref_no,
                '',
                'pending',
                date("Y-m-d H:i:s")
            ]);
        }
        public function display(){
            $sql = "SELECT plan_transaction.id, plan_transaction.owner_id, concat(userinfo.firstname, ' ', userinfo.lastname) as fullname, plan_transaction.reference_no, plan_transaction.remarks, plan_transaction.status, plan_transaction.date_created FROM userinfo, plan_transaction where userinfo.id = plan_transaction.owner_id and plan_transaction.status = 'pending';";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function cancelPayment(){
            $sql="UPDATE `plan_transaction` SET `remarks`=?,`status`='Cancelled' WHERE id = ?";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([
                $this->remarks,
                $this->id,
            ]);
        }
        public function acceptPayment(){
            $sql="UPDATE `plan_transaction` SET `status`='accepted' WHERE id = ?";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([
                $this->id,
            ]);
        }

        public function checkIfhavePayment(){
            $sql="SELECT * FROM plan_transaction where owner_id = ? and `status`= 'pending'";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([
                $_SESSION['ownerid']
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>
