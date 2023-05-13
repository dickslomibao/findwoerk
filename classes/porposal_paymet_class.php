<?php 
    require_once 'db_config.php';


    class ProposalPayment extends DB{
        public function insert($data){
            $sql ="INSERT INTO `proposal_payment`(`id`, `job_id`, `proposal_id`, `price`, `reference_no`, `remarks`, `status`, `date_created`) VALUES (?,?,?,?,?,?,?,?)";
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
        
        }

        public function getSinglePayment($id){
            $sql = "select * from `proposal_payment` where proposal_id = ?";
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
           return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllProposalPaymentPending(){
            $sql = "SELECT 
            proposal_payment.id,
            jobs.owner_id,
            proposal.owner,
            proposal_payment.job_id, 
            proposal_payment.proposal_id,
            proposal_payment.price,
            proposal_payment.reference_no,
            proposal_payment.remarks,
            proposal_payment.status,
            proposal_payment.date_created
            from proposal_payment,jobs,proposal
            WHERE jobs.id = proposal_payment.job_id and proposal.id = proposal_payment.proposal_id and proposal_payment.`status` = 'pending'";
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
           return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function declinedProposal($data){
            $sql = "UPDATE `proposal_payment` SET `status`='canceled', `remarks` = ? WHERE id = ?";
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                $data
            );
        }
        public function acceptPorposalPayment($id){
            $sql = "UPDATE `proposal_payment` SET `status`='accepted' WHERE id = ?";
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                $id
            );
        }
        public function updatePayment($data){
            $sql = "UPDATE `proposal_payment` SET `status`='pending', `reference_no`= ?  WHERE id = ?";
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                $data
            );
        }
    }


?>