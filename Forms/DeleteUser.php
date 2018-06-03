<?php

require_once("../Database/DBconnect.php");
require_once ("../Models/User");
$dbConnection = Database::getInstance();
$db = $dbConnection->getConnection();
echo ($_GET["operation"]);
