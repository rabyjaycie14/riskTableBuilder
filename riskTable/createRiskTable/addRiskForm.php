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
          <input type="text" name="description" placeholder="Description"><br>

          <label>Risk Category</label>
          <select name="category">
              <option>Product Size</option>
              <option>Business Impact</option>
              <option>Stakeholder Characteristics</option>
              <option>Process Definitions</option>
              <option>Development Environment</option>
              <option>Technology to Be Built</option>
              <option>Staff Size and Experience</option>
          </select>

          <label>Risk Probability</label>
          <select name="probability">
          <?php
              for ($i=1; $i<=100; $i++)
              {
                  ?>
                      <option value="<?php echo $i;?>"><?php echo $i . "%";?></option>
                  <?php
              }
          ?>
          </select>

          <label>Risk Impact</label>
          <select name="impact">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
          </select>

          <label>Risk Information Sheet</label>
          <select name="RIS">
              <option>Yes</option>
              <option>No</option>
          </select>

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
