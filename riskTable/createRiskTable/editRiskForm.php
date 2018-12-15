<?php include '../view/header.php';?>

<?php require_once('../model/database.php');

$userID = $_POST["userID"];
$riskDescription = $_POST["riskDescription"];

try{
  $db = new PDO($dsn, $username, $password);

  $query = "SELECT * FROM `$userID`
            WHERE riskDescription= :riskDescription";
  $statement = $db->prepare($query);
  $statement->bindValue(':riskDescription', $riskDescription);
  $success = $statement->execute();
  $risks = $statement->fetchAll();
  $statement->closeCursor();
 ?>

  <html>
    <main>
      <h3>Update Risk Information</h3>
      <?php foreach($risks as $risk){?>
        <form action="updateRisk.php" method="post">
            <label>Risk Description</label>
            <input type="text" name="description" value="<?php echo $risk['riskDescription'];?>"><br>

            <label>Risk Category</label>
            <input type="text" name="category" value="<?php echo $risk['riskCategory'];?>"><br>

            <label>Risk Probability</label>
            <input type="text" name="riskProbability" value="<?php echo $risk['riskProbability'];?>"><br>

            <label>Risk Impact</label>
            <input type="text" name="impact" value="<?php echo $risk['riskImpact'];?>"><br>

            <label>Risk Information Sheet</label>
            <input type="text" name="RIS" value="<?php
                            if($risk['riskInfoSheet'] == 0){
                              echo "No";
                            }
                            else {
                              echo "Yes";
                            }
                         ?>
                      ">
            <input type="hidden" name="riskID" value="<?php echo $risk['riskID']; ?>">
            <input type="hidden" name="userID" value="<?php echo $userID; ?>">
            <input type="submit" value="Update"><br>
        </form>
    <?php } ?>
  </main>
</html>


<?php } catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
} ?>

<?php include '../view/footer.php'; ?>
