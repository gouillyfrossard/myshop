<?php

include_once("fonctions.php");
include_once("config.php");


session_start();
check_admin($conn, $_SESSION['username']);



?>

<!DOCTYPE html>
<html lang="fr" class="no-js sg" dir="ltr">
    <head>
        <meta charset="UTF-8">

        <title>Admin</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <link rel="shortcut icon" href="#" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="style.css" type="text/css">

    </head>
<body>

<div class="container">
    <div class="container header">
        <div class="header"><div class="logo"><a href="index.php"><img src="img/Logo.png" class="logo"></a></div></div>
        <div class="header">
            <div class="navigation" aria-label="Accès rapides">
                <ul class="navigation__list navigation__list--inline">
                    <li><a href="#" class="navigation__link">HOME</a></li> 
                    <li><a href="#" class="navigation__link">SHOP</a></li>
                    <li><a href="#" class="navigation__link">MAGAZINE</a></li>
                </ul>
            </div>
        </div>
        <div class="header panier">
            <div class="panier"><img src="img/CartButton.png"></div>
            <div class="txt"><a href="signin.php">LOGOUT</a></div>
            
            <script>
                
                const logout = document.querySelector('.txt');

                logout.addEventListener('click', remove_session());
                
            </script>

        </div>
    </div>
    <!-- <div class="container vert">
        <div class="vert loupe"><img src="img/Search.png"></div>
        <div class="vert">
            <div class="vert"><input class="search" placeholder="living room">
            <hr class="hr">
            </div>
        </div>
    </div> -->



    <div class="container centre">

    <div class="admin">
        <h1>Administrator interface</h1>

        <div class="formAddProduct">
                
            <details class="details-user">
            <summary>Afficher les utilisateurs</summary>
            <?php
            show_users($conn);
            ?>
            </details>

            <script>
                const detailsUser = document.querySelector('.details-user');

                detailsUser.addEventListener('toggle', event => {
                    if (event.target.open) {
                        console.log('open');
                    } else {
                        console.log('closed');
                    }
                });
            </script>


            <details class="details-edit-user">
            <summary>Modifier un utilisateur</summary>
            <form action="" method="post">
            Nom : <input type="text" name="edit_nom" /><br>
            <br>
            <input type="submit" value="Modifier les droits" />
            
            <?php
            if (isset($_POST["edit_nom"])){
                $name = $_POST["edit_nom"];
                $query = "SELECT username from users WHERE username='$name'";
                $result = mysqli_query($conn,$query);
                $rows = mysqli_num_rows($result);
                if ($rows == 1){
                    edit_user($conn, $name);
                }else{
                    echo '<script type="text/javascript">';
                    echo ' alert("Utilisateur inexistant!\n")'; 
                    echo '</script>';
                }
            }
            ?>
            
            </details>

            <script>
                const detailsUser = document.querySelector('.details-edit-user');

                detailsUser.addEventListener('toggle', event => {
                    if (event.target.open) {
                        console.log('open');
                    } else {
                        console.log('closed');
                    }
                });
            </script>
            </form>

            <details class="details-delete-user">
            <summary>Supprimer un utilisateur</summary>
            <form action="" method="post">
            Nom : <input type="text" name="delete_nom" /><br>

            <br>
            <input type="submit" value="Supprimer l'utilisateur" />

            <?php
            if (isset($_POST["delete_nom"])){
                $name = $_POST["delete_nom"];
                $query = "SELECT username from users WHERE username='$name'";
                $result = mysqli_query($conn,$query);
                var_dump($result);
                $rows = mysqli_num_rows($result);
                if ($rows == 1){
                    delete_user($conn, $name);
                }else{
                    echo '<script type="text/javascript">';
                    echo ' alert("Utilisateur inexistant!\n")'; 
                    echo '</script>';
                }
            }
            ?>
            </details>

            <script>
                const detailsUser = document.querySelector('.details-delete-user');

                detailsUser.addEventListener('toggle', event => {
                    if (event.target.open) {
                        console.log('open');
                    } else {
                        console.log('closed');
                    }
                });
            </script>
            </form>

            <details class="details-add-product">
            <summary>Ajouter un produit</summary>
            <form action="" method="post">
            Nom du produit : <input type="text" name="add_name" /><br>
            Description : <input type="text" name="add_desc" /><br>
            Prix : <input type="text" name="add_price" /><br>
            Image : <input type="file"
                        id="img" name="avatar"
                        accept="image/png, image/jpeg">
            <br>
            <input type="submit" />
            </details>

            <script>
                const detailsUser = document.querySelector('.details-add-product');

                detailsUser.addEventListener('toggle', event => {
                    if (event.target.open) {
                        console.log('open');
                    } else {
                        console.log('closed');
                    }
                });
            </script>
            </form>

            <details class="details-show-products">
            <summary>Liste des produits</summary>
            <?php
            show_product($conn);
            ?>
            </details>

            <script>
                const detailsUser = document.querySelector('.details-show-products');

                detailsUser.addEventListener('toggle', event => {
                    if (event.target.open) {
                        console.log('open');
                    } else {
                        console.log('closed');
                    }
                });
            </script>
            </form>

            <details class="details-edit-product">
            <summary>Editer un produit</summary>
            <form action="" method="post">
            Quel produit voulez-vous modifier? : <input type="text" name="product" /><br>
            
            <input type="submit" value="Modifier" />

            <?php
            // if (isset($_POST["product"])){
            //     afficher les détails du produit choisi;
            // }
            ?>

            </details>

            <script>
                const detailsUser = document.querySelector('.details-edit-product');

                detailsUser.addEventListener('toggle', event => {
                    if (event.target.open) {
                        console.log('open');
                    } else {
                        console.log('closed');
                    }
                });
            </script>
            </form>

            <details class="details-delete-product">
            <summary>Supprimer un produit</summary>
            <form action="" method="post">
            Produit : <input type="text" name="delete_product" /><br>
            
            <input type="submit" />

            <?php
            if (isset($_POST["delete_product"])){
                $name = $_POST["delete_product"];
                $query = "SELECT * FROM product WHERE name='$name'";
                $result = mysqli_query($conn,$query);
                $rows = mysqli_num_rows($result);
                if ($rows == 1){
                    delete_product($conn, $name);
                }else{
                    echo '<script type="text/javascript">';
                    echo ' alert("Produit inexistant!\n")'; 
                    echo '</script>';
                }
            }

            ?>
            </details>

            <script>
                const detailsUser = document.querySelector('.details-delete-product');

                detailsUser.addEventListener('toggle', event => {
                    if (event.target.open) {
                        console.log('open');
                    } else {
                        console.log('closed');
                    }
                });
            </script>
            </form>
        
        
        </div>


    </div>

</div>
</body>
</html>  
