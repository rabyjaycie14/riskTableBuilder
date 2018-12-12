<?php include '../view/header.php';?>

<?php require_once('../model/database.php');

$userID = $_POST["userID"];

try {
    $db = new PDO($dsn, $username, $password);
    $query = "SELECT  * FROM risk_table.$userID";
    $statement = $db->prepare($query);
    $statement->execute();
    $risks = $statement->fetchAll();
    $statement->closeCursor(); ?>

    <main>
      <h1>My Table</h1>
      <p>
        Below is your risk table! You may download externally, or edit/update information on your table at any time.
      </p>

      <table align="center">
          <th>Risk Description</th>
          <th>Category</th>
          <th>Probability</th>
          <th>Impact</th>
          <th>Risk Information Sheet</th>

        <?php foreach($risks as $risk){?>
        <tr>
            <td><?php echo $risk['riskDescription']; ?></td>
            <td><?php echo $risk['riskCategory']; ?></td>
            <td><?php echo $risk['riskProbability']; ?></td>
            <td><?php echo $risk['riskImpact']; ?></td>
            <td>
              <?php
                if($risk['riskInfoSheet'] == 0){
                  echo "False";
                }
                else {
                  echo "True";
                }
             ?>
            </td>
        <td>
          <form action="deleteRisk.php" method="post">
            <?php foreach($risks as $risk){
                $riskID = $risk['riskID'];
            } ?>
            <input type="hidden" name="riskID" value="<?php echo $riskID; ?>">
            <input type="submit" value="Delete">
        </form></td>
      </tr>
    <?php } ?>
    </table>
    <form action="addRiskForm.php" method="post">
      <?php echo $userID ?>
      <input type="hidden" name="userID" value="<?php echo $userID; ?>">
      <input type="submit" value="Add Risk">
    </form>
    </main>

<?php
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
} ?>

  </main>
</html>

<?php include '../view/footer.php'; ?>
