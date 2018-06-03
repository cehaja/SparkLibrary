<?php
require_once("../Database/DBconnect.php");
require_once ("../Models/User");
$operation = 'addUser';
$dbConnection = Database::getInstance();
$db = $dbConnection->getConnection();
$fName='';
$lName='';
$bDate='';
$ID='';
    if(isset($_GET['userID'])){
        $user = User::getUser($db,$_GET["userID"]);
        $fName = $user->getFirstName();
        $lName = $user->getLastName();
        $bDate = $user->getBirthDate();
        $ID = $user->getUserID();
        $operation = 'updateUser';
    }
?>

<!DOCTYPE HTML>
<html lang = "en">
<body>
<div>
    <h2>Add User</h2>
    <form action="ManageUsers.php" method="post">
        <?php
        echo "<input hidden type='text' name='userID' value='$ID'/>";
        echo "<p>First Name:";
        echo "   <input type='text' name='firstName' value='$fName' />";
        echo "</p>";
        echo "<p>Last Name:";
        echo "    <input type='text'  name='lastName' value='$lName' />";
        echo "</p>";
        echo "<p>Birth Date:";
        echo "  <input type='date' name='birthDate' value='$bDate' />";
        echo "</p>";

            if ($operation=='addUser') {
                echo "<input type='submit' name='addUser' value='Add User' />";
            }
            else if ($operation=='updateUser'){
                echo "<input type ='submit' name='updateUser' value='Update User' />";
            }
        ?>
    </form>

</div>
</body>
</html>

