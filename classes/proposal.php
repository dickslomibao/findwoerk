<?php
require_once "db_config.php";

class Proposal extends DB
{

    private $id;
    private $ownerid;
    private $jobid;
    private $title;
    private $desc;
    private $price;
    private $duration;
    private $otherinfo;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setOwnerId($ownerid)
    {
        $this->ownerid = $ownerid;
    }
    public function setJobId($jobid)
    {
        $this->jobid = $jobid;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }
    public function setOtherInfo($otherinfo = "")
    {
        $this->otherinfo = $otherinfo;
    }

    public function insert()
    {
        $sql = "INSERT INTO `proposal`(`id`, `owner`, `job_id`, `proposal_title`, `proposal_desc`, `proposal_price`, `proposal_duration`, `proposal_otherinfo`,`proposal_status`, `date_created`) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([
            $this->id,
            $this->ownerid,
            $this->jobid,
            $this->title,
            $this->desc,
            $this->price,
            $this->duration,
            $this->otherinfo,
            1,
            date("Y-m-d H:i:s")
        ]);
    }

    public function getProposal()
    {
        $sql = 'SELECT * FROM `proposal` WHERE job_id = ? and owner = ?';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([
            $this->jobid,
            $this->ownerid,
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function jobProposalCount($id)
    {
        $sql = "SELECT count(*) as total FROM `proposal`  WHERE job_id = ? and proposal_status = 1";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([
            $id,
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllJobProposal($id)
    {
        $sql = "SELECT
        proposal.id,
        proposal.job_id,
        proposal.owner,
        proposal.proposal_title,
        proposal.proposal_desc,
        proposal.proposal_price,
        proposal.proposal_duration,
        proposal.proposal_otherinfo,
        proposal.proposal_status,
        proposal.date_created,
        proposal.delivered,
        proposal.delivered_item,
        concat(userinfo.firstname, ' ', userinfo.lastname) as fullname,
        accountinfo.profile_pic FROM proposal,userinfo,accountinfo,jobs
        WHERE userinfo.id = proposal.owner AND accountinfo.owner_id = userinfo.id and proposal.job_id = jobs.id and jobs.owner_id = ? and proposal.job_id = ? and proposal.proposal_status = 1 ORDER BY proposal.date_created DESC;";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([
            $_SESSION['ownerid'],
            $id,
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProposalforView($id)
    {
        $sql = "SELECT
        proposal.id,
        proposal.job_id,
        proposal.owner,
        proposal.proposal_title,
        proposal.proposal_desc,
        proposal.proposal_price,
        proposal.proposal_duration,
        proposal.proposal_otherinfo,
        proposal.proposal_status,
        proposal.date_created,
        proposal.delivered,
        proposal.delivered_item,
        concat(userinfo.firstname, ' ', userinfo.lastname) as fullname,
        accountinfo.profile_pic FROM proposal,userinfo,accountinfo,jobs
        WHERE userinfo.id = proposal.owner AND accountinfo.owner_id = userinfo.id and proposal.job_id = jobs.id and proposal.owner = ? and proposal.job_id = ? and proposal.proposal_status = 1 ORDER BY proposal.date_created DESC;";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([
            $_SESSION['ownerid'],
            $id,
            
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getSingleProposal($id)
    {
        $sql = "SELECT
        proposal.id,
        proposal.job_id,
        jobs.owner_id as jobowner,
        proposal.owner,
        proposal.proposal_title,
        proposal.proposal_desc,
        proposal.proposal_price,
        proposal.proposal_duration,
        proposal.proposal_otherinfo,
        proposal.proposal_status,
        proposal.date_created,
        concat(userinfo.firstname, ' ', userinfo.lastname) as fullname,
        accountinfo.profile_pic FROM proposal,userinfo,accountinfo,jobs
        WHERE userinfo.id = proposal.owner AND accountinfo.owner_id = userinfo.id and proposal.job_id = jobs.id and jobs.owner_id = ? and proposal.id = ? and proposal.proposal_status = 1 ORDER BY proposal.date_created DESC;";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([
            $_SESSION['ownerid'],
            $id,
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function declinedProposal($remarks, $id)
    {
        $sql = "UPDATE `proposal` SET `proposal_status`=2,`remarks`=? WHERE id = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([
            $remarks,
            $id
        ]);
    }
    public function deleteProposal($id)
    {
        $sql = "DELETE FROM `proposal` WHERE  proposal.owner = ? and  id = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([
            $_SESSION['ownerid'],
            $id
        ]);
    }

    public function deleteAllJobProposal($data)
    {
        $sql = "DELETE FROM `proposal` WHERE `job_id` = ? and `owner` != ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($data);
    }

    public function jobForPayment($id)
    {
        $sql = 'SELECT * FROM `proposal_payment` where `job_id` = ?';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([
            $id
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getWorkListOfFreelancer()
    {
        $sql = 'SELECT * FROM `proposal` WHERE owner = ? and `proposal_status` = 1';
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([
            $_SESSION['ownerid']
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deliverTheProposal($data)
    {
        $sql = "UPDATE `proposal` SET `delivered`=1,`delivered_item`=? WHERE id = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($data);
    }
}
