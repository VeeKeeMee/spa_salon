<?php include('functions.php') ?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Page. Spa-Salon in Brooklyn, NY</title>
    <link rel="stylesheet" href="C:\openserver\domains\localhost\spa_salon\style.css">
</head>
 
<body>

    <h2>SingUP</h2>

    <form method="post" action="register.php" class = "signForm">
  
    <?php include('errors.php'); ?>

      <label>Enter Username</label>
      <input type="text" name="username" value="<?php echo $username; ?>">
      <label>Enter Password</label>
      <input type="password" name="password_1">
      <label datefmt_format = "YYYY-MM-DD">DOB</label>
      <input type="b_day" name="b_day" value="<?php echo $b_day; ?>">

      <button type="submit" class="signBut" name="reg_user">Register</button>

      <p>Already have a cabinet?<a href="index.php" action = "login">Login Here!</a></p>
    
    </form>
    
</body>
</html>