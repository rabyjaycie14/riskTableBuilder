<?php include '../view/header.php';

$userID = $_POST["userID"];

$riskDescription = filter_input(INPUT_POST, 'description');

$riskCategory = filter_input(INPUT_POST, 'category');
$riskProbability = filter_input(INPUT_POST, 'probability');
$riskImpact = filter_input(INPUT_POST, 'impact');
$riskInfoSheet = filter_input(INPUT_POST, 'RIS');


if($riskDescription == null || $riskCategory == false || $riskProbability == null || $riskImpact == null || $riskInfoSheet == null){
     $error = "Invalid risk data. Check all fields and try again.";
     include('../errors/error.php');
 }

 else{
  require_once('../model/database.php');

  $query = 'INSERT INTO risk_table.$userID
              (riskDescription, riskCategory, riskProbability, riskImpact, riskInfoSheet)
            VALUES
              (:riskDescription, :riskCategory, :riskProbability, :riskImpact, :riskInfoSheet)';
  $statement = $db->prepare($query);
  $statement->bindValue(':riskDescription', $riskDescription);
  $statement->bindValue(':riskCategory', $riskCategory);
  $statement->bindValue(':riskProbability', $riskProbability);
  $statement->bindValue(':riskImpact', $riskImpact);
  $statement->bindValue(':riskInfoSheet', $riskInfoSheet);
  $statement->execute();
  $statement->closeCursor();

  if($query){ ?>
  <main>
    <?php echo "Risk was added successfully."; ?>
    <form action="updateTable.php" method="post">
    <input type="hidden" name="userID" value="<?php echo $userID; ?>">
    <input type="submit" value="View Updated Table"></form>
  </main>
<?php }
  else{ ?>
    <main>
    <?php echo "Add risk unsuccessful. Go back and try again."; ?>
    <form action="addRiskForm.php" method="post">
    <input type="hidden" name="userID" value="<?php echo $userID; ?>">
    <input type="submit" value="Go Back"></form>
    </main>
  <?php }
}
?>
<?php include '../view/footer.php'; ?>
