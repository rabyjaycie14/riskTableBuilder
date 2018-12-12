<?php include '../view/header.php';

$email = $_POST["email"];
$pass = $_POST["pass"];

require_once('../model/database.php');

try {
    $db = new PDO($dsn, $username, $password);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
    $statement = $db->prepare($query);
    $statement->execute();
    $user_info = $statement->fetchAll();
    $statement->closeCursor();

    foreach($user_info as $user){
      $userID = $user["userID"];
    }

    $query_2 = "SELECT  * FROM risk_table.$userID";
    $statement_2 = $db->prepare($query_2);
    $statement_2->execute();
    $user_db = $statement_2->fetchAll();
    $statement_2->closeCursor();

    if(!$user_info){
      ?>
      <main>
      <?php
      echo "User Login Failed, Please go back and try again or create a new profile"; ?>
      <form action="login.php" method="post">
        <input type="submit" value="Login">
      </form>

      <form action="createNewProfile.php" method="post">
        <input type="submit" value="Create New Profile">
      </form>

      <?php
    }
    else{ ?>
      <main>
        <h2>User Login Successful!</h2>
        <?php
          foreach($user_db as $udb){
            echo $udb["riskDescription"];
          }
          if(!$user_db){
            echo "OOPS! You don't have a risk table yet! Click below to get started!"; ?>
            <form action="createRiskTable.php" method="post">
              <input type="hidden" name="userID" value="<?php echo $user['userID']; ?>">
              <input type="submit" value="Create New Risk Table">
            </form>
        <?php  }
          else{
            echo "Awesome, you already have a risk table! Click below to edit/update your table!"; ?>
            <form action="updateTable.php" method="post">
              <input type="hidden" name="userID" value="<?php echo $user['userID']; ?>">
              <input type="submit" value="View/Update Risk Table Information">
            </form>
          <?php }
        ?>

      </main>
  <?php } ?>

<?php
}  catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
} ?>

 <?php include '../view/footer.php'; ?>
