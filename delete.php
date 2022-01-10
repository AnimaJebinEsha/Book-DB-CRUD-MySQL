<?php
require_once 'database.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM books WHERE id=:id";
    $prepared = $pdo->prepare($query);

    if ($prepared->execute([':id' => $id])) {
        header("Location: /");
    }
}
die();
?>