<!DOCTYPE html>
<html lang="fr" class="no-js sg" dir="ltr">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Super site</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <link rel="shortcut icon" href="#" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

        <!-- CSS only -->
        <link rel="stylesheet" href="style.css" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </head>
<body>





<div class="container">
    <div class="container header">
        <div class="header"><div class="logo"><a href="index.php"><img src="img/Logo.png" class="logo"></a></div></div>
        <div class="header">
            <div class="navigation" aria-label="Accès rapides">
                <ul class="navigation__list navigation__list--inline">
                    <li><a href="admin.php" class="navigation__link">ADMIN</a></li> 
                    <li><a href="#" class="navigation__link">SHOP</a></li>
                    <li><a href="#" class="navigation__link">MAGAZINE</a></li>
                </ul>
            </div>
        </div>
        <div class="header panier">
            <div class="panier"><img src="img/CartButton.png"></div>
            <div class="txt">&nbsp;<?php
            if (isset($_SESSION["usermane"])){?>
                <a href="signin.php" class="txt">LOGOUT</a><?php
            }else{?>
                <a href="signin.php" class="txt">LOGIN</a><?php
            }?></div>
        </div>
    </div>
    <div class="container vert">
        <div class="vert loupe"><img src="img/Search.png"></div>
        <div class="vert">
            <form action="index.php" method="get">
            <div class="vert"><input type="search" name="terme" class="search" placeholder="living room">
            <input type="submit" name="s" value="Rechercher" hidden>
            <hr class="hr">
            </div>
        </div>
    </div>

    <div class="container centre">


    <?php
        include_once('function.php');
        include_once('config.php');

        $array = index_product($conn);

        $arraySearch = index_productSearch($conn);

    ?>

        <?php
        if (empty($_GET['terme'])){
            foreach ($array as $value){
            ?>
                <div class="item fiche">
                    <img src="img/<?php echo $value['id']; ?>.jpg">
                    <div class="txt">
                        <div class="texte"><b>
                        <?php echo $value['name']; ?>
                        </b><br><?php echo $value['descript']; ?></div>
                        <div class="panierAdd"><?php echo $value['price']; ?>€<br><img src="img/CartButtonAdd.png" class="panierAdd"></div>
                    </div>
                </div>
            <?php
            }
        }
        ?>
  
        <?php
        if (isset($_GET['terme'])){
            foreach ($arraySearch as $value){
            
            ?>
                <div class="item fiche">
                    <img src="img/<?php echo $value['id']; ?>.jpg">
                    <div class="txt">
                        <div class="texte"><b>
                        <?php echo $value['name']; ?>
                        </b><br><?php echo $value['descript']; ?></div>
                        <div class="panierAdd"><?php echo $value['price']; ?>€<br><img src="img/CartButtonAdd.png" class="panierAdd"></div>
                    </div>
                </div>
            <?php 
            }
            $rows = mysqli_num_rows($arraySearch);
                if($rows==0){
                echo "Aucun résultats";
            }
        
            
        }
        ?>




    </div>

    <div class="container page">
        <!-- <div class="page"><img src="img/page.png"></div> -->
        <div class="page">&nbsp;</div>

    </div>
</div>





</body>
</html>  
