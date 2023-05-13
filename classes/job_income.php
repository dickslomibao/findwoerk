<?php

require_once 'db_config.php';

class JobIncome extends DB
{


    public function insertRoi($data)
    {
        $amount = $data * $this->commision;
        $sql = "INSERT INTO `roi`(`amount`, `date_created`) VALUES (?,?)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([
            $amount,
            date("Y-m-d H:i:s")
        ]);
    }
    public function insertFreelancerMoney($data, $id)
    {
        $minus = $data * $this->commision;
        $amount = $data - $minus;
        $sql = "INSERT INTO `freelancer_money`(`owner_id`,`price`, `type`, `date_created`) VALUES (?,?,?,?)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([
            $id,
            $amount,
            'add',
            date("Y-m-d H:i:s")
        ]);
    }
    public function FreelancerEarnings($id)
    {

        $sql = "SELECT sum(price) as price from `freelancer_money` where owner_id = ? and `type` ='add'";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([
            $id,
        ]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return empty($result) ? 0 : $result[0]['price'];
    }

    public function FreelancerAvailableBalance($id)
    {
        $earnings = $this->FreelancerEarnings($id);
        if ($earnings == 0) {
            return 0;
        } else {
            $sql = "SELECT sum(price) as price from `freelancer_money` where owner_id = ? and `type` ='minus'";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([
                $id,
            ]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($result)) {
                return $earnings;
            } else {
                return $earnings - $result[0]['price'];
            }
        }
    }
    public function insert($data)
    {

        $sql = "INSERT INTO `job_income`(`id`, `jobid`, `client_id`, `freelancer_id`, `amount`, `date_created`) VALUES (?,?,?,?,?,?)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($data);
    }

    public function checkIfDone($data)
    {

        $sql = "SELECT * FROM`job_income` where jobid = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([$data]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function freelancerjobdone($data)
    {

        $sql = "SELECT * FROM`job_income` where freelancer_id = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([$data]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
