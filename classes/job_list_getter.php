<?php

require_once 'db_config.php';
class Job_collection extends DB
{

    public function freelancerJobHuntView($id)
    {
        $sql = "SELECT 
        jobs.id as jobid,
        jobs.title as jobtitle,
        jobs.descriptions,
        categories.id as catid,
        categories.title as cattitle,
        jobs.level,
        jobs.required_skills,
        jobs.budget,
        jobs.due_date,
        jobs.date_created,
        jobs.status,
        userinfo.id as userid,
        concat(userinfo.firstname,' ',userinfo.lastname) as fullname,
        accountinfo.profile_pic
        FROM jobs,accountinfo,categories,userinfo
        WHERE 
        jobs.owner_id = userinfo.id 
        and categories.id = jobs.category_id
        and accountinfo.owner_id = userinfo.id 
        AND jobs.status = 1 and jobs.due_date > ? and jobs.id = ? ORDER BY jobs.date_created DESC";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([date("Y-m-d"),$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllJobOnGoingForBid()
    {
        $sql = "SELECT 
        jobs.id as jobid,
        jobs.title as jobtitle,
        jobs.descriptions,
        categories.id as catid,
        categories.title as cattitle,
        jobs.level,
        jobs.required_skills,
        jobs.budget,
        jobs.due_date,
        jobs.date_created,
        jobs.status,
        userinfo.id,
        concat(userinfo.firstname,' ',userinfo.lastname) as fullname,
        accountinfo.profile_pic
        FROM jobs,accountinfo,categories,userinfo
        WHERE 
        jobs.owner_id = userinfo.id 
        and categories.id = jobs.category_id
        and accountinfo.owner_id = userinfo.id 
        AND jobs.status = 1 and jobs.due_date > ? ORDER BY jobs.date_created DESC";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([date("Y-m-d")]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllJobsOFClient($id = NULL)
    {
        $data = [$_SESSION['ownerid']];
        $addition = "";
        if ($id != null) {
            $addition = " and jobs.id = ? ";
            array_push($data, $id);
        }
        $sql = "SELECT
        jobs.id,
        jobs.owner_id,
        jobs.title,
        categories.title as category,
        jobs.descriptions,
        jobs.level,
        jobs.required_skills,
        jobs.budget,
        jobs.due_date,
        jobs.date_created,
        jobs.status,
        CASE
        	WHEN jobs.status = 1 THEN 'On Going for Bid'
            WHEN jobs.status = 2 THEN 'Already started'
        	WHEN jobs.status = 3 THEN 'Successful'
        END 
        as status_text
        FROM jobs,categories
        WHERE jobs.category_id = categories.id
        and owner_id = ? $addition
        ORDER BY jobs.date_created DESC";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStaredJob($id)
    {
     
        $sql = "SELECT
        jobs.id,
        jobs.owner_id,
        jobs.title,
        categories.title as category,
        jobs.descriptions,
        jobs.level,
        jobs.required_skills,
        jobs.budget,
        jobs.due_date,
        jobs.date_created,
        jobs.status
        FROM jobs,categories
        WHERE jobs.category_id = categories.id and jobs.status = 3
        and owner_id = ? and  jobs.id = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([$_SESSION['ownerid'],$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getFreelancerStarted($id)
    {
     
        $sql = "SELECT
        jobs.id,
        jobs.owner_id,
        jobs.title,
        categories.title as category,
        jobs.descriptions,
        jobs.level,
        jobs.required_skills,
        jobs.budget,
        jobs.due_date,
        jobs.date_created,
        jobs.status
        FROM jobs,categories
        WHERE jobs.category_id = categories.id and jobs.status = 3
        and jobs.id = ?";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getWorkListOfFreelancer($id)
    {
        $sql = "SELECT 
        jobs.id as jobid,
        jobs.title as jobtitle,
        jobs.descriptions,
        categories.id as catid,
        categories.title as cattitle,
        jobs.level,
        jobs.required_skills,
        jobs.budget,
        jobs.due_date,
        jobs.date_created,
        jobs.status,
        userinfo.id as userid,
        concat(userinfo.firstname,' ',userinfo.lastname) as fullname,
        accountinfo.profile_pic
        FROM jobs,accountinfo,categories,userinfo
        WHERE 
        jobs.owner_id = userinfo.id 
        and categories.id = jobs.category_id
        and accountinfo.owner_id = userinfo.id 
        AND jobs.status = 3 and jobs.id = ? ";
      
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
