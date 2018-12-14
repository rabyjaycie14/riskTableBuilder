<?php include '../view/header.php';

$riskDescription = filter_input(INPUT_POST, 'riskDescription');
$userID = filter_input(INPUT_POST, 'userID');

require_once('../model/database.php');

try {
    if ($userID != false) {
        $query = "DELETE FROM risk_table.$userID
                  WHERE riskDescription = :riskDescription";
        $statement = $db->prepare($query);
        $statement->bindValue(':riskDescription', $riskDescription);
        $success = $statement->execute();
        $statement->closeCursor();
    }

    if($success){ ?>
      <main>
        <?php echo "Risk successfully deleted.";?>
        <form action="updateTable.php" method="post">
        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
        <input type="submit" value="View Updated Table"></form>
      </main>
    <?php }
    else{ ?>
      <main>
      <?php echo "Risk deletion unsuccessful. Go back and try again."; ?>
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

<?php include '../view/footer.php'; ?>
