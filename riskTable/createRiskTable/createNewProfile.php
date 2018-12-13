<?php include '../view/header.php';?>

<html>
  <main>
      <h2>Create New Profile</h2>
      <form action="verifyNewProfile.php" method="post">
        <label>First Name </label>
        <input type="text" name="first_name"><br>

        <label>Last Name  </label>
        <input type="text" name="last_name"><br>

        <label>Email  </label>
        <input type="text" name="email"><br>

        <label>Password </label>
        <input type="text" name="pass"><br>
        <input type="submit" value="Create Profile"><br>
      </form>
  </main>
</html>

<?php include '../view/footer.php';?>
