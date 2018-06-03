<?php
require_once("../Database/DBconnect.php");
require_once ("../Models/Books");
require_once ("../Models/Writer");
$operation = 'addBook';
$dbConnection = Database::getInstance();
$db = $dbConnection->getConnection();
$title='';
$releaseYear='';
$writerID='';
$ID='';
$selected = '';
$writers=Writer::getAllWriters($db);
if(isset($_GET['bookID'])){
    $book = Book::getBook($db,$_GET["bookID"]);
    $title = $book->getTitle();
    $releaseYear = $book->getReleaseYear();
    $writerID = $book->getWriterID();
    $ID = $book->getBookID();
    $operation = 'updateBook';
}
?>

<!DOCTYPE HTML>
<html lang = "en">
<body>
<div>
    <h2>Book</h2>
    <form action="ManageBooks.php" method="post">
        <?php
        echo "<input hidden type='text' name='bookID' value='$ID'/>";
        echo "<p>Title:";
        echo "   <input type='text' name='title' value='$title' />";
        echo "</p>";
        echo "<p>Release Year:";
        echo "    <input type='number'  name='releaseYear' value='$releaseYear' />";
        echo "</p>";
        echo "<p>Writer";
        echo "<select name='writerID'>";
        foreach ($writers as $key => $value){
            if($key==$writerID) $selected='selected';
            echo "<option value='$key' $selected>".$value["firstName"]." ".$value["lastName"]."</option>";
            $selected='';
        }
        echo "</select>";
        echo "</p>";

        if ($operation=='addBook') {
            echo "<input type='submit' name='addBook' value='Add Book' />";
        }
        else if ($operation=='updateBook'){
            echo "<input type ='submit' name='updateBook' value='Update Book' />";
        }
        ?>
    </form>

</div>
</body>
</html>