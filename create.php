<?php
require_once 'database.php';


if(isset($_GET['submit'])) {

    $available_ = true;
    if($_GET['available'] == 'No' || $_GET['available'] == 'no' || $_GET['available'] == 'NO' || $_GET['available'] == 'nO') $available_ = false;
    $title = $_GET['title'];
    $author = $_GET['author'];
    $pages = $_GET['pages'];
    $isbn = $_GET['isbn'];

    $query = "INSERT INTO books (title, author, available, pages, isbn) VALUES(:title, :author, :available_, :pages, :isbn)";
    $prepared = $pdo->prepare($query);

    $prepared->bindParam(':title', $title);
    $prepared->bindParam(':author', $author);
    $prepared->bindParam(':available_', $available_, PDO::PARAM_BOOL);
    $prepared->bindParam(':pages', $pages);
    $prepared->bindParam(':isbn', $isbn);

    if($prepared->execute()){
        header("Location: /index.php");
    }
    else
    {
        echo "Failed...";
    }
}

?>


<! DOCTYPE html>
    <html lang="en">

    <head>
        <title>BOOKS</title>

        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="navbar">
            <div class="nav-left">
                <div style="display:flex; width: 100%; height:100%; justify-content: center; align-items: center;">
                    <h2>BOOKS</h2>
                </div>
            </div>
            <div class="nav-right">
                <nav style="margin-right: 100px;">
                    <a href="/index.php" class="nav-item">HOME</a>
                    <a href="/create.php" class="nav-item">CREATE</a>
                </nav>
            </div>
        </div>

        <div class="content">
            <form class="content" style="width: 60% !important;" name="form" method="get" action="/create.php">
                <table style="width: 70%;">
                    <tr class="tr-form">
                        <td class="table-head">Title:</td>
                        <td class="table-body"><input name="title" id="title" class="is-fullwidth" type="text" required></td>
                    </tr>
                    <tr class="tr-form">
                        <td class="table-head">Author:</td>
                        <td class="table-body"><input name="author" id="author" class="is-fullwidth" type="text" required></td>
                    </tr>
                    <tr class="tr-form">
                        <td class="table-head">Available:</td>
                        <td class="table-body"><input name="available" id="available" class="is-fullwidth" type="text" required></td>
                    </tr>
                    <tr class="tr-form">
                        <td class="table-head">Pages:</td>
                        <td class="table-body"><input name="pages" id="pages" class="is-fullwidth" type="number" required></td>
                    </tr>
                    <tr class="tr-form">
                        <td class="table-head">ISBN:</td>
                        <td class="table-body"><input name="isbn" id="isbn" class="is-fullwidth" type="number" required></td>
                    </tr>
                    <tr class="tr-form">
                        <td style="border: 0px !important;"></td>
                        <td style="border: 0px !important;"><input type="submit" name="submit" value="Submit" style="float: right;"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>

    </html>