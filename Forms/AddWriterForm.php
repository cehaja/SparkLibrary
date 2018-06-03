<?php
require_once("../Database/DBconnect.php");
require_once ("../Models/Writer");
$operation = 'addWriter';
$dbConnection = Database::getInstance();
$db = $dbConnection->getConnection();
$fName='';
$lName='';
$bDate='';
$ID='';
if(isset($_GET['writerID'])){
    $writer = Writer::getWriter($db,$_GET["writerID"]);
    $fName = $writer->getFirstName();
    $lName = $writer->getLastName();
    $bDate = $writer->getBirthDate();
    $ID = $writer->getWriterID();
    $operation = 'updateWriter';
}
?>

<!DOCTYPE HTML>
<html lang = "en">
<body>
<div>
    <h2>Add User</h2>
    <form action="ManageWriters.php" method="post">
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

        if ($operation=='addWriter') {
            echo "<input type='submit' name='addWriter' value='Add Writer' />";
        }
        else if ($operation=='updateWriter'){
            echo "<input type ='submit' name='updateWriter' value='Update Writer' />";
        }
        ?>
    </form>

</div>
</body>
</html>

