<?php 
    require_once 'db_config.php';
    class Categories extends DB{
        private $id;
        private $title;
        private $descripton;
        
        function setTitle($title){
            $this->title = $title;
        }
        function setDescriptions($descripton){
            $this->descripton = $descripton;
        }
        function setId($id){
            $this->id = $id;
        }
        function insert(){
            $sql = "INSERT INTO `categories`(`title`, `descriptions`) VALUES (?,?)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([
                $this->title,
                $this->descripton
            ]);
        }     
        function update(){
            $sql = "UPDATE `categories` SET `title`= ? ,`descriptions`= ? WHERE id = ?";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([
                $this->title,
                $this->descripton,
                $this->id,
            ]);
        }
        function delete(){
            $sql = "DELETE FROM `categories` where id = ?";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([$this->id]);
        }

        function display(){
            $sql = "SELECT * FROM `categories` order by id DESC";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        function displayOrderByName(){
            $sql = "SELECT * FROM `categories` order by title";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        function getSingleCategory(){
            $sql = "SELECT * FROM `categories` where id = ?";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([$this->id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    }

?>