<?php include '../view/header.php';?>
  <?php require_once('../model/database.php');

  $first_name = filter_input(INPUT_POST, 'first_name');
  $last_name = filter_input(INPUT_POST, 'last_name');
  $email = filter_input(INPUT_POST, 'email');
  $pass =  filter_input(INPUT_POST, 'pass');

  if($first_name == NULL || $last_name == NULL || $email == NULL || $pass == NULL){
    echo "Invalid input, Please go back and try again"; ?>
    <form action="createNewProfile.php" method="post">
      <input type="submit" value="Go Back">
    </form>
    <?php
  }
  else {
    $query = 'INSERT INTO users
                (firstName, lastName, email, password)
              VALUES
                (:first_name, :last_name, :email, :pass)';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':pass', $pass);
    $success = $statement->execute();
    $statement->closeCursor();

    $db = new PDO($dsn, $username, $password);
    $query_2 = "SELECT * FROM users WHERE email='$email'";
    $statement_2 = $db->prepare($query_2);
    $statement_2->execute();
    $user_info = $statement_2->fetchAll();
    $statement_2->closeCursor();

    if(!$success && !$user_info){
      ?>
      <main>
      <?php
      echo "Creation of new profile failed, Please go back and try again"; ?>
      <form action="createNewProfile.php" method="post">
        <input type="submit" value="Go Back">
      </form>
      <?php
    }
    else{ ?>
      <main>
        <h2>New Profile Created!</h2>
        <form action="createRiskTable.php" method="post">
          <?php foreach($user_info as $user){
            $userID = $user["userID"];
          }?>
          <input type="hidden" name="userID" value="<?php echo $userID; ?>">
          <input type="submit" value="Create Risk Table">
        </form>
      </main>
  <?php }
  }

  ?>

<?php include '../view/footer.php';?>
