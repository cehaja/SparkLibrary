<?php
require_once("../Database/DBconnect.php");
require_once ("../Models/User");
$dbConnection = Database::getInstance();
$db = $dbConnection->getConnection();
$users = User::getAllUsers($db);
$update = 'update';
$delete = 'delete';
?>
<!DOCTYPE HTML>
<html lang = "en">
<body>
<h2>Users</h2>
    <table border="1">
    <?php
        foreach ($users as $key => $value){
            echo '<tr>';
            echo '<td>'.$value["firstName"].'</td><td>'.$value["lastName"].'</td><td>'.$value["birthDate"].'</td>';
            echo "<td><a href=\"ManageUsers.php?userID=$key&&operation=$update\"/>Update</a></td>";
            echo "<td><a href=\"ManageUsers.php?userID=$key&&operation=$delete\"/>Delete</a></td>";
    }
    ?>
    </table>
    <a href="AddUserForm.php"/>New User</a>
</div>
</body>
</html>