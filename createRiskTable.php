<?php include '../view/header.php';?>

<?php require_once('../model/database.php');

$userID = $_POST["userID"];

try {

    $db = new PDO($dsn, $username, $password);

    $query = "SELECT * FROM users WHERE userID = '$userID'";
    $statement = $db->prepare($query);
    $statement->execute();
    $user_id = $statement->fetchAll();
    $statement->closeCursor();

    foreach($user_id as $id){
      $userID = $id['userID'];
    }

    $servername = "localhost";
    $username = 'ts_user';
    $password = 'pa55word';
    $dbname = "risk_table";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS `".$userID."` (
            riskID int NOT NULL AUTO_INCREMENT,
            riskDescription varchar(1000) NOT NULL,
            riskCategory varchar(2) NOT NULL,
            riskProbability varchar(25) NOT NULL,
            riskImpact int(5) NOT NULL,
            riskInfoSheet boolean not null default 0,
            PRIMARY KEY (riskID)
            )";

    $conn->close(); ?>

    <main>
      <h1>Success!</h1>
      <p>Your personal risk table has been created succesfully!
      </p>
      <form action="updateTable.php" method="post">
        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
        <input type="submit" value="Edit My Risk Table">
      </form>


<?php
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
} ?>

  </main>
</html>

<?php include '../view/footer.php'; ?>
