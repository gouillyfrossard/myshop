<!DOCTYPE html>
<html>

  <head>
  </head>
  <body>

<?php

require('config.php');
session_start();

if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query);
  $rows = mysqli_num_rows($result);
  if($rows==1){
    $_SESSION['username'] = $username;
    $query2 = "SELECT admin from `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
    $result2 = mysqli_query($conn,$query2);
    $admin = mysqli_fetch_array($result2);
        if ($admin[0] == 1){
          header("Location: admin.php");
        }else{
          header("Location: index.php");
        }    
  }else{
    echo '<script type="text/javascript">';
    echo ' alert("Le nom d\'utilisateur ou le mot de passe est incorrect.")'; 
    echo '</script>';
    
  }
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? <a href="signup.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>