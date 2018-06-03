<?php
require_once("../Database/DBconnect.php");
require_once ("../Models/Books");
$dbConnection = Database::getInstance();
$db = $dbConnection->getConnection();

if (isset($_POST["addBook"])){
    $book = new Book($_POST['title'],$_POST['releaseYear'],$_POST['writerID']);
    $book->createBook($db);
}
if(isset($_POST["updateBook"])){
    $book= new Book($_POST["title"],$_POST["releaseYear"],$_POST["writerID"]);
    $book->setBookID($_POST["bookID"]);
    $book->updateBook($db);
}
if (isset($_GET["bookID"])&&isset($_GET["operation"])){
    if ($_GET["operation"]=='delete'){
        Book::deleteBook($db,$_GET["bookID"]);
    }
    if($_GET["operation"]=='update'){
        header('Location: AddBookForm.php?bookID='.$_GET["bookID"]);
    }
}