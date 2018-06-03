<?php
require_once("../Database/DBconnect.php");
require_once ("../Models/Books");
require_once ("../Models/Writer");
$dbConnection = Database::getInstance();
$db = $dbConnection->getConnection();
$books = Book::getAllBooks($db);
$update = 'update';
$delete = 'delete';
?>
<!DOCTYPE HTML>
<html lang = "en">
<body>
<h2>Books</h2>
    <table border="1">
        <?php
        foreach ($books as $key => $value){
            $writer = Writer::getWriter($db,$value["writerID"]);
            $wName = $writer->getFirstName().' '.$writer->getLastName();
            echo '<tr>';
            echo '<td>'.$value["title"].'</td><td>'.$value["releaseYear"].'</td><td>'.$wName.'</td>';
            echo "<td><a href=\"ManageBooks.php?bookID=$key&&operation=$update\"/>Update</a></td>";
            echo "<td><a href=\"ManageBooks.php?bookID=$key&&operation=$delete\"/>Delete</a></td>";
        }
        ?>
    </table>
    <a href="AddBookForm.php"/>New Book</a>
</body>
</html>