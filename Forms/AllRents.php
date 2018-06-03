<?php
require_once("../Database/DBconnect.php");
require_once ("../Models/Books");
require_once ("../Models/User");
require_once ("../Models/Rental");
$dbConnection = Database::getInstance();
$db = $dbConnection->getConnection();
$rents = Rental::getAllRents($db);

?>
<!DOCTYPE HTML>
<html lang = "en">
<body>
<h2>Books</h2>
    <table border="1">
        <?php
        foreach ($rents as $key => $value){
            $book = Book::getBook($db,$value["bookID"]);
            $bookName = $book->getTitle();
            $user = User::getUser($db,$value["userID"]);
            $userName = $user->getFirstName().' '.$user->getLastName();
            echo '<tr>';
            echo '<td>'.$bookName.'</td><td>'.$userName.'</td><td>'.$value["rentDate"].'</td>';
            if (isset($value["returnDate"])) {
               echo '<td>'.$value["returnDate"].'</td>';
            }else {
                echo "<td><a href=\"ManageRents.php?rentID=$key\"/>Returned</a></td>";
            }
        }
        ?>
    </table>
    <a href="AddRentForm.php"/>New Rent</a>
</body>
</html>