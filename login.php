<?php include '../view/header.php';

require_once('../model/database.php');

try {
    $db = new PDO($dsn, $username, $password);
    $query = 'SELECT email FROM users';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    ?>
    <main>
      <h2>User Login</h2>
      <form action="validateLogin.php" method="post">

        <label>Email  </label>
        <input type="text" name="email">

        <label>Password </label>
        <input type="text" name="pass">

        <input type="submit" value="Submit">

      </form>
    </main>


<?php }  catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
} ?>

<?php include '../view/footer.php'; ?>
