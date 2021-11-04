<!DOCTYPE html>
  <html>

  <head>
  </head>

  <body>

  <?php

  require('config.php');
  if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      echo '<script type="text/javascript">';
      echo ' alert("Invalid email.")'; 
      echo '</script>';
      header ("refresh:1");
    }else{
      $email = $_REQUEST['email'];
      $query = "SELECT email from `users` WHERE email='$email'";
      $result = mysqli_query($conn,$query);
      $rows = mysqli_num_rows($result);
      if($rows==1){
        echo '<script type="text/javascript">';
        echo ' alert("Email already exist.")'; 
        echo '</script>';
        header ("refresh:1");
      }else{
        // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username); 
        // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        //requéte SQL + mot de passe crypté
        $query2 = "INSERT into `users` (username, email, password)
                  VALUES ('$username', '$email', '".hash('sha256', $password)."')";
        // Exécuter la requête sur la base de données
        $res = mysqli_query($conn, $query2);
        if($res){
        echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='signin.php'>connecter</a></p>
             </div>";
        }
      }
    }
  }else{
  ?>
  <form class="box" action="" method="post">
    <h1 class="box-title">S'inscrire</h1>
    <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="signin.php">Connectez-vous ici</a></p>
  </form>
  <?php } ?>
  </body>
</html>