<?php include '../view/header.php';

require_once('../model/database.php');

$userID = filter_input(INPUT_POST, 'userID',FILTER_DEFAULT);
$riskID = filter_input(INPUT_POST, 'riskID',FILTER_DEFAULT);
$riskDescription = filter_input(INPUT_POST, 'description');
$riskCategory = filter_input(INPUT_POST, 'category');
$riskProbability = filter_input(INPUT_POST, 'riskProbability');
$riskImpact = filter_input(INPUT_POST, 'impact');
$riskInfoSheet = filter_input(INPUT_POST, 'RIS');

if ($riskDescription === null || $riskCategory === null || $riskProbability < 1 || $riskProbability > 100
    || $riskImpact < 1 || $riskImpact > 5 || $riskInfoSheet === null) {
   ?>
    <main>
      <?php echo "Risk information invalid. Go back and try again.";?>
      <form action="editRiskForm.php" method="post">
        <input type="hidden" name="riskDescription" value="<?php echo $riskDescription; ?>">
        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
        <input type="submit" value="Go Back">
      </form>
  </main>

<?php }
else {
    $query = "UPDATE `$userID`
              SET riskDescription= :description,
                  riskCategory = :category,
                  riskProbability = :riskProbability,
                  riskImpact = :impact,
                  riskInfoSheet = :RIS
              WHERE riskID = :riskID";
    $statement = $db->prepare($query);
    $statement->bindValue(':description', $riskDescription);
    $statement->bindValue(':category', $riskCategory);
    $statement->bindValue(':riskProbability', $riskProbability);
    $statement->bindValue(':impact', $riskImpact);
    $statement->bindValue(':RIS', $riskInfoSheet);
    $statement->bindValue(':riskID', $riskID);
    $success = $statement->execute();
    $statement->closeCursor();

    if($success){ ?>
      <main>
        <?php echo "Risk successfully updated.";?>
        <form action="updateTable.php" method="post">
        <input type="hidden" name="riskDescription" value="<?php echo $riskDescription; ?>">
        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
        <input type="submit" value="View Updated Table"></form>
      </main>
    <?php }
    else{ ?>
      <main>
      <?php echo "Risk update unsuccessful. Go back and try again."; ?>
      <form action="editRiskForm.php" method="post">
        <input type="hidden" name="riskDescription" value="<?php echo $riskDescription; ?>">
      <input type="hidden" name="userID" value="<?php echo $userID; ?>">
      <input type="submit" value="Go Back"></form>
      </main>
    <?php }
}


?>
<?php include '../view/footer.php'; ?>
