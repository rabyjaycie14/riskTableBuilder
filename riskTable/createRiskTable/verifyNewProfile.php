<?php include '../view/header.php';?>
  <?php require_once('../model/database.php');

  $first_name = filter_input(INPUT_POST, 'first_name');
  $last_name = filter_input(INPUT_POST, 'last_name');
  $email = filter_input(INPUT_POST, 'email');
  $pass =  filter_input(INPUT_POST, 'pass');

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
  $query_2 = "SELECT * FROM users WHERE password='$pass'";
  $statement_2 = $db->prepare($query_2);
  $statement_2->execute();
  $user_info = $statement_2->fetchAll();
  $statement_2->closeCursor();

  if($success){
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
        <input type="submit" name= userID value="Create Risk Table" value="<?php echo $userID; ?>">
      </form>
    </main>
<?php } ?>

<?php include '../view/footer.php';?>
