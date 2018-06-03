<?php
require_once ("../Database/DBconnect.php");
require_once ("../Models/Rental");
$dbConnection = Database::getInstance();
$db = $dbConnection->getConnection();
if (isset($_GET["rentID"])){
    $rent1=Rental::getRent($db,$_GET["rentID"]);
    $rent1->returnBook($db);
}
if (isset($_POST["rentBook"])){
    $rent=new Rental($_POST["userID"],$_POST["bookID"],$_POST["rentDate"]);
    $rent->rentBook($db);
}