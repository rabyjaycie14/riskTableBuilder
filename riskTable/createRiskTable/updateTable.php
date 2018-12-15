<?php include '../view/header.php';?>

<?php require_once('../model/database.php');

$userID = $_POST["userID"];

try {
    $db = new PDO($dsn, $username, $password);
    $query = "SELECT *
              FROM `$userID`
              ORDER BY riskProbability DESC";
    $statement = $db->prepare($query);
    $statement->execute();
    $risks = $statement->fetchAll();
    $statement->closeCursor(); ?>

    <main>
      <h1>My Table</h1>
      <table align="center">
          <th>Risk Description</th>
          <th>Category</th>
          <th>Probability</th>
          <th>Impact</th>
          <th>Risk Information Sheet</th>
          <th>Delete</th>
          <th>Edit</th>

        <?php foreach($risks as $risk){?>
        <tr>
            <td><?php echo $risk['riskDescription']; ?></td>
            <td><?php echo $risk['riskCategory']; ?></td>
            <td><?php echo $risk['riskProbability']; ?></td>
            <td><?php echo $risk['riskImpact']; ?></td>
            <td>
              <?php
                if($risk['riskInfoSheet'] == 0){
                  echo "No";
                }
                else {
                  echo "Yes";
                }
             ?>
          </td>
          <td>
            <form action="deleteRisk.php" method="post">
              <input type="hidden" name="riskDescription" value="<?php echo $risk['riskDescription']; ?>">
              <input type="hidden" name="userID" value="<?php echo $userID; ?>">
              <input type="submit" value="Delete">
            </form>
          </td>
          <td>
            <form action="editRiskForm.php" method="post">
              <input type="hidden" name="riskDescription" value="<?php echo $risk['riskDescription']; ?>">
              <input type="hidden" name="userID" value="<?php echo $userID; ?>">
              <input type="submit" value="Edit">
            </form>
          </td>
      </tr>
    <?php } ?>
    </table>
    <form action="addRiskForm.php" method="post">
      <input type="hidden" name="userID" value="<?php echo $userID; ?>">
      <input type="submit" value="Add Risk">
    </form>

    <input type="button" value="Print" onClick="window.print()">

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
