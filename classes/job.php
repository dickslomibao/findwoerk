<?php 
    require_once 'db_config.php';
    class Job extends DB{
        private $id;
        private $owner_id;
        private $title;
        private $descriptions;
        private $category_id;
        private $level;
        private $skills;
        private $budget;
        private $due_date;
        private $status;

        public function setId($id){
            $this->id = $id;
        }
        public function setOwnerId($owner_id){
            $this->owner_id = $owner_id;
        }
        public function setTitle($title){
            $this->title = $title;
        }
        public function setDescriptions($descriptions){
            $this->descriptions = $descriptions;
        }
        public function setCategory_id($category_id){
            $this->category_id = $category_id;
        }
        public function setLevel($level){
            $this->level = $level;
        }
        public function setSkills($skills){
            $this->skills = $skills;
        }
        public function setBudget($budget){
            $this->budget = $budget;
        }
        public function setDueDate($due_date){
            $this->due_date = $due_date;
        }
        public function setStatus($status){
            $this->status = $status;
        }

        public function insert(){

            $sql = "INSERT INTO `jobs`(`id`, `owner_id`, `title`, `descriptions`, `category_id`, `level`, `required_skills`, `budget`, `due_date`,`date_created`,`status`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([
                $this->id,
                $this->owner_id,
                $this->title,
                $this->descriptions,
                $this->category_id,
                $this->level,
                $this->skills,
                $this->budget,
                $this->due_date,
                date("Y-m-d H:i:s"),
                $this->status,
            ]);
        }


        public function updateJobStatus($id){
            $sql = "UPDATE `jobs` SET `status`=2 where `id` =?";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([$id]);
        }

        public function startjob($id){
            $sql = "UPDATE `jobs` SET `status`=3 where `id` =?";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([$id]);
        }
    }



?>