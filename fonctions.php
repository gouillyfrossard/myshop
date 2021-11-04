<?php

require('config.php');

function show_users($conn){
    $query = "SELECT username, admin FROM users";
    $result = mysqli_query($conn,$query);
    foreach ($result as $value){
        echo $value['username'] . " => " . $value['admin'] . "\n";
    }
}

function check_admin($conn, $name){
    $query = "SELECT admin from users WHERE username='$name'";
    $result = mysqli_query($conn,$query);
    $admin = mysqli_fetch_array($result);
    if ($admin[0] != 1){
        header("Location: index.php");
        sleep(1);
        echo '<script type="text/javascript">';
        echo ' alert("Vous n\'avez pas les droits\n")'; 
        echo '</script>';
    }
}

function edit_user($conn, $user){
    $query = "UPDATE `users` SET admin = case 
                WHEN admin = '1' THEN NULL
                WHEN admin IS NULL THEN '1' 
                ELSE admin 
                END
                WHERE username = '$user'";
    mysqli_query($conn,$query);
    echo '<script type="text/javascript">';
    echo ' alert("Droits d\'admin modifiés!\n")'; 
    echo '</script>';
}

function delete_user($conn, $user){
    $query = "DELETE FROM `users` WHERE username='$user'";
    mysqli_query($conn,$query);
    echo '<script type="text/javascript">';
    echo ' alert("Utilisateur supprimé!\n")'; 
    echo '</script>';
}

function add_product($conn, $id, $name, $price, $category_id){
    $query = "INSERT INTO products (id, name, price, category_id) VALUES $id, $name, $price, $category_id";
    mysqli_query($conn,$query);
    echo "Produit créé!\n";
}

function show_product($conn){
    $query = "SELECT * FROM products";
    $result = mysqli_query($conn,$query);    
    foreach ($result as $value){
        echo $value['name'] . "\n";
    }
}

function edit_product($conn, $name, $new_name, $new_price){
    $query = "UPDATE `products` SET name='$new_name', price='$new_price' WHERE name='$name'";
    $result = mysqli_query($conn,$query);
    echo "Produit modifié!\n";
}

function delete_product($conn, $name){
    $query = "DELETE FROM products WHERE name='$name'";
    mysqli_query($conn,$query);    
    echo '<script type="text/javascript">';
    echo ' alert("Produit supprimé!\n")'; 
    echo '</script>';
}

function index_product($conn){
    $query = "SELECT * FROM `products`";
    $result = mysqli_query($conn,$query);

    return $result;
}

function remove_session(){
    session_unset();
    session_destroy();
    session_reset();
    header("Location: signin.php");
}