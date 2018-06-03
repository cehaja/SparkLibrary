<?php
require_once ("../Database/DBconnect.php");
require_once ("../Models/Books");
require_once ("../Models/User");
$dbConnection = Database::getInstance();
$db = $dbConnection->getConnection();
$users = User::getAllUsers($db);
$books = Book::getAllBooks($db);
?>
<!DOCTYPE HTML>
<html lang = "en">
<body>
<div>
    <h2>Rent</h2>
    <form action="ManageRents.php" method="post">
        <?php
        echo "<p>Book: ";
        echo "<select name='bookID'>";
        foreach ($books as $key => $value){
            echo "<option value='$key'>".$value["title"]."</option>";
        }
        echo "</select>";
        echo "<p>User: ";
        echo "<select name='userID'>";
        foreach ($users as $key => $value){
            echo "<option value='$key'>".$value["firstName"]." ".$value["lastName"]."</option>";
        }
        echo "</select>";
        echo "</p>";
        echo "<p>Rent Date";
        echo "<input type='date' name='rentDate'/>";
        echo "</p>";
        echo "<input type='submit' name='rentBook' value='Rent Book' />";
        ?>
    </form>

</div>
</body>
</html>