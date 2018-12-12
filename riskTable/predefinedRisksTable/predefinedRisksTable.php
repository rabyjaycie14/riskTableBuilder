<?php include '../view/header.php';?>

<?php require_once('../model/database.php');

try {
    $db = new PDO($dsn, $username, $password);
    $query = 'SELECT * FROM risks';
    $statement = $db->prepare($query);
    $statement->execute();
    $risks = $statement->fetchAll();
    $statement->closeCursor(); ?>

    <main>
      <h1>Table of Predefined Risks and Corresponding Information</h1>
      <p>
        Below is a table of predefined risks and corresponding attributes. You may use this
        information to help you form your own opinions, or incorporate them into your own table.
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
        </tr>
        <?php } ?>
      </table>
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
