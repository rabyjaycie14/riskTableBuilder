<?php include '../view/header.php';

$userID = $_POST["userID"];
$riskSelection = filter_input(INPUT_POST, 'risk_list');
$riskID = NULL;

require_once('../model/database.php');

try {

  $db = new PDO($dsn, $username, $password);
  $query = "SELECT * FROM risks WHERE riskDescription ='$riskSelection'";
  $statement = $db->prepare($query);
  $statement->execute();
  $risks = $statement->fetchAll();
  $statement->closeCursor();

  foreach($risks as $risk){
    $riskDescription = $risk['riskDescription'];
    $riskCategory = $risk['riskCategory'];
    $riskProbability = $risk['riskProbability'];
    $riskImpact = $risk['riskImpact'];
    $riskInfoSheet = $risk['riskInfoSheet'];
  }

  if ($riskID != null || $riskDescription == null || $riskCategory == null || $riskProbability == null || $riskImpact == null || $riskInfoSheet == null) { ?>
      <main>
        <?php $error = "Risk information invalid. Go back and try again.";?>
        <form action="addRiskForm.php" method="post">
          <input type="hidden" name="userID" value="<?php echo $userID; ?>">
          <input type="submit" value="Go Back">
        </form>
    </main>

  <?php }
  else {
    $db = new PDO($dsn, $username, $password);

    $query = "INSERT INTO risk_table.$userID
                 (riskID, riskDescription, riskCategory, riskProbability, riskImpact, riskInfoSheet)
              VALUES
                 (:riskID, :riskDescription, :riskCategory, :riskProbability, :riskImpact, :riskInfoSheet)";
    $statement = $db->prepare($query);
    $statement->bindValue(':riskID', $riskID);
    $statement->bindValue(':riskDescription', $riskDescription);
    $statement->bindValue(':riskCategory', $riskCategory);
    $statement->bindValue(':riskProbability', $riskProbability);
    $statement->bindValue(':riskImpact', $riskImpact);
    $statement->bindValue(':riskInfoSheet', $riskInfoSheet);
    $success = $statement->execute();
    $statement->closeCursor();

    if($success){ ?>
      <main>
        <?php echo "Risk successfully added.";?>
        <form action="updateTable.php" method="post">
        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
        <input type="submit" value="View Updated Table"></form>
      </main>
    <?php }
    else{ ?>
      <main>
      <?php echo "Risk creation unsuccessful. Go back and try again."; ?>
      <form action="addRiskForm.php" method="post">
      <input type="hidden" name="userID" value="<?php echo $userID; ?>">
      <input type="submit" value="Go Back"></form>
      </main>
    <?php }
  }
}  catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
} ?>

<?php include '../view/footer.php'; ?>
