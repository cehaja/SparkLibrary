<?php
require_once("../Database/DBconnect.php");
require_once ("../Models/Writer");
$dbConnection = Database::getInstance();
$db = $dbConnection->getConnection();
$writers = Writer::getAllWriters($db);
$update = 'update';
$delete = 'delete';
?>
<!DOCTYPE HTML>
<html lang = "en">
<body>
<h2>Writers</h2>
    <table border="1">
        <?php
        foreach ($writers as $key => $value){
            echo '<tr>';
            echo '<td>'.$value["firstName"].'</td><td>'.$value["lastName"].'</td><td>'.$value["birthDate"].'</td>';
            echo "<td><a href=\"ManageWriters.php?writerID=$key&&operation=$update\"/>Update</a></td>";
            echo "<td><a href=\"ManageWriters.php?writerID=$key&&operation=$delete\"/>Delete</a></td>";
        }
        ?>
    </table>
    <a href="AddWriterForm.php">New Writer</a>
</body>
</html>