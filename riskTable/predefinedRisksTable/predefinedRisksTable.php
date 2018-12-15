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
      <h1>What Is A Risk Table?</h1>
      <p>
        Risk tables play a crucial role in evaluating known and unknown risks of a
        project. By visualizing existing and potential risks, our risk table tool allows
        users to classify and assess the highest impacts of a project. Our tool also
        is a cost-effective measures that helps users devote less time in resolving
        issues, and more time into their project.
      </p>

      <table align="center">
        <th>Impact Values</th>
        <th>Description</th>
          <tr>
            <td>1</td>
            <td>Catastrophic</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Critical</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Marginal</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Negligible</td>
          </tr>
      </table>

      <br>

      <table align="center">
        <th>Category Name</th>
        <th>Category Acronym</th>
        <th>Description</th>
          <tr>
            <td>Business Impact Risk</td>
            <td>BU</td>
            <td>Risks associated with constraints imposed
                by management or the marketplace.</td>
          </tr>
          <tr>
            <td>Process Definition Risk</td>
            <td>Pd</td>
            <td>Risks associated with the degree to which
                the software process has been defined and
                is followed by the development
                organization.
            </td>
          </tr>
          <tr>
            <td>Product Size Risks</td>
            <td>Ps</td>
            <td>Risks associated with the overall size of the software to be built or modified</td>
          </tr>
          <tr>
            <td>Staff Size and Experience Risk</td>
            <td>ST</td>
            <td>Risks associated with the overall technical
                and project experience of the software
                engineers who will do the work.
            </td>
          </tr>
          <tr>
            <td>Stakeholder Characteristics Risk</td>
            <td>CU</td>
            <td>Risks associated with the sophistication of the stakeholder and the
                developer's ability to communicate with the customer in a timely manner.
            </td>
          </tr>
          <tr>
            <td>Technology To Be Built</td>
            <td>TE</td>
            <td>Risks associated with the complexity of the
                system to be built and the “newness” of the
                technology that is packaged by the system.
            </td>
          </tr>
      </table>

      <br>

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
