<?php
require_once("../Database/DBconnect.php");
require_once ("../Models/User");
$dbConnection = Database::getInstance();
$db = $dbConnection->getConnection();

if (isset($_POST["addUser"])){
    $user = new User($_POST['firstName'],$_POST['lastName'],$_POST['birthDate']);
    $user->createUser($db);
}
if(isset($_POST["updateUser"])){
    $user= new User($_POST["firstName"],$_POST["lastName"],$_POST["birthDate"]);
    $user->setUserID($_POST["userID"]);
    $user->updateUser($db);
}
if (isset($_GET["userID"])&&isset($_GET["operation"])){
    if ($_GET["operation"]=='delete'){
        Book::deleteBook($db,$_GET["bookID"]);
    }
    if($_GET["operation"]=='update'){
        header('Location: AddUserForm.php?userID='.$_GET["userID"]);
    }
}