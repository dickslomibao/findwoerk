<?php
require_once 'db_config.php';

class Plan extends DB
{
    private $owner_id;



    public function setOwnerId($data)
    {
        $this->owner_id = $data;
    }

    public function insert()
    {

        $date = new DateTime();
        $expireddata = date_add(date_create($date->format('Y-m-d')), date_interval_create_from_date_string("30 days"));
        $sql = "INSERT INTO `plan`(`owner_id`, `date_purchased`, `expiration_date`, `plan_type`) VALUES (?,?,?,?)";
        $pdo = $this->getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                $this->owner_id,
                $date->format('Y-m-d H:i:s'),
                $expireddata->format('Y-m-d H:i:s'),
                2
            ]
        );
    }
    public function isExpired(){
        $data =  $this->checkMember();
        if(count($data) === 0 ){
            echo "hhhndpa<br>";
            return 0;
        }
        if(date("Y-m-d H:i:s") >= $data[0]['expiration_date']){
            echo "asasd<br>";
            $this->deletePlan();
            return true;
        }else{
            echo "asaasdasdasdsd<br>";
            return false;
        }
    }
    public function checkMember()
    {
        $sql = "SELECT * FROM `plan` where `owner_id` = ?";
        $pdo = $this->getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                $this->owner_id
            ]
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deletePlan()
    {
        $sql = "DELETE FROM `plan` where `owner_id` = ?";
        $pdo = $this->getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            [
                $this->owner_id
            ]
        );
    }

}

?>