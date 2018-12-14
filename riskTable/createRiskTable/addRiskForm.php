<?php include '../view/header.php';

$userID = $_POST["userID"];

require('../model/database.php');

try {
    $db = new PDO($dsn, $username, $password);
    $query = "SELECT * FROM risks";
    $statement = $db->prepare($query);
    $statement->execute();
    $risk_info = $statement->fetchAll();
    $statement->closeCursor();

    if(!$risk_info){ ?>
      <main>
      <?php echo "Can't access information. Go back and try again."; ?>
      <form action="updateTable.php" method="post">
      <input type="hidden" name="userID" value="<?php echo $userID; ?>">
      <input type="submit" value="Go Back"></form>
      </main>
    <?php }

}  catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
} ?>

<!DOCTYPE html>
<html>
  <body>
      <main>
        <h1>Create Your Own Risk</h1>
        <form action="addRisk.php" method="post" >

          <label>Risk Description</label>
          <input type="text" name="description"><br>

          <label>Risk Category</label>
          <input type="text" name="category"><br>

          <label>Risk Probability</label>
          <input type="text" name="probability"><br>

          <label>Risk Impact</label>
          <input type="text" name="impact"><br>

          <label>Risk Information Sheet</label>
          <input type="text" name="RIS"><br>

          <label>&nbsp;</label>
          <input type="hidden" name="userID" value="<?php echo $userID; ?>">
          <input type="submit" value="Add Risk"><br>
        </form>

        <h1>Choose Predefined Risks</h1>
        <form action="addPredefinedRisk.php" method="post" >
            <select name="risk_list">
              <?php foreach ($risk_info as $risks){
                echo '<option value="' . $risks['riskDescription'] . '">' . $risks['riskDescription'] . '</option>'; ?>
              <?php } ?>
            </select>
            <input type="submit" value="Add Risk"><br>
            <input type="hidden" name="userID" value="<?php echo $userID; ?>">
        <form>
      </main>
  </body>
</html>

<?php include '../view/footer.php'; ?>
