<?php
require_once("../Database/DBconnect.php");
require_once ("../Models/Writer");
$dbConnection = Database::getInstance();
$db = $dbConnection->getConnection();

if (isset($_POST["addWriter"])){
    $writer = new Writer($_POST['firstName'],$_POST['lastName'],$_POST['birthDate']);
    $writer->createWriter($db);
}
if(isset($_POST["updateWriter"])){
    $writer= new Writer($_POST["firstName"],$_POST["lastName"],$_POST["birthDate"]);
    $writer->setWriterID($_POST["userID"]);
    $writer->updateWriter($db);
}
if (isset($_GET["writerID"]) && isset($_GET["operation"])){
    if ($_GET["operation"]=='delete'){
        Writer::deleteWriter($db,$_GET["writerID"]);
    }
    if($_GET["operation"]=='update'){
        header('Location: AddWriterForm.php?writerID='.$_GET["writerID"]);
    }
}