<?php include '../view/header.php';

$userID = $_POST["userID"];



require_once('../model/database.php');

try {

}  catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
} ?>

<?php include '../view/footer.php'; ?>
