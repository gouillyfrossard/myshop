<?php

require('config.php');

function show_users($conn){
    $query = "SELECT username, admin FROM users";
    $result = mysqli_query($conn,$query);
    foreach ($result as $value){
        echo $value['username'], $value['admin'];
    }

}

function edit_user($conn, $user){
    $query = "UPDATE `users` SET admin = 1 WHERE username='$user'";
    mysqli_query($conn,$query);
    echo '<script type="text/javascript">';
    echo ' alert("Droits d\'admin accordés!\n")'; 
    echo '</script>';
}

function delete_user($conn, $user){
    $query = "DELETE FROM `users` WHERE username='$user'";
    mysqli_query($conn,$query);
    echo "Utilisateur supprimé!\n";
}

function add_product($conn, $id, $name, $price, $category_id){
    $query = "INSERT INTO products (id, name, price, category_id) VALUES $id, $name, $price, $category_id";
    mysqli_query($conn,$query);
    echo "Produit créé!\n";
}

function show_product($conn){
    $query = "SELECT * FROM `products`";
    $result = mysqli_query($conn,$query);

    foreach ($result as $value){
        echo $value['name'], $value['price'];
    }
    //return $result;

}

function index_product($conn){
    $query = "SELECT * FROM `products`";
    $result = mysqli_query($conn,$query);

    return $result;
}
function index_productSearch($conn){
    if (isset($_GET['terme'])){
    $query = "SELECT * FROM `products` WHERE `name` LIKE '%". $_GET['terme'] ."%'";
    $result = mysqli_query($conn,$query);

    return $result;
    }
}









function edit_product($conn, $name, $new_name, $new_price){
    $query = "UPDATE `products` SET name='$new_name', price='$new_price' WHERE name='$name'";
    $result = mysqli_query($conn,$query);
    echo "Produit modifié!\n";
}

function delete_product($conn, $name){
    $query = "DELETE FROM `products` WHERE name='$name'";
    mysqli_query($conn,$query);
    echo "Produit supprimé!\n";
}

function add_category($conn, $name){
    $query = "";
}

?>