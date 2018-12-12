<?php include '../view/header.php';

$userID = $_POST["userID"];

require('../model/database.php'); ?>

<!DOCTYPE html>
<html>
  <body>
      <main>
        <h1>Add Risk</h1>
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
      </main>
  </body>
</html>

<?php include '../view/footer.php'; ?>
