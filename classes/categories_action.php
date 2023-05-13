<?php 
require_once 'categories.php';
$category = new Categories;

if(isset($_POST['insert-category'])){
    $category->setTitle($_POST['title']);
    $category->setDescriptions($_POST['descriptions']);
    try{
        $category->insert();
        echo "200";
    }catch(PDOException $ex){
      
    }
}
if(isset($_POST['update-category'])){
    $category->setId($_POST['id']);
    $category->setTitle($_POST['title']);
    $category->setDescriptions($_POST['descriptions']);
    try{
        $category->update();
        echo "200";
    }catch(PDOException $ex){
      
    }
}
if(isset($_POST['delete-category'])){
    $category->setId($_POST['id']);
    try{
        $category->delete();
        echo "200";
    }catch(PDOException $ex){
      
    }
}

if(isset($_POST['display-category'])){
    echo json_encode( $category->display());
}

if(isset($_POST['single-category'])){
    $category->setId($_POST['id']);
    echo json_encode($category->getSingleCategory());
}

$category->closeConnection();
