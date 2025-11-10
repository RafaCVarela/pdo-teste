<?php

include "Database.php";

$dsn = "mysql:host=localhost;dbname=rafael-database";
$username = "root";
$password = "";

try {
    
    $db = new Database($dsn, $username, $password);
    $db->getConnection();

    echo "Tudo certo!\n";
} catch (Exception $e){
    echo 'Erro: ' . $e;
}

$query = "SELECT * FROM products WHERE id = :id";
$params = [":id" => 1];

$products = $db->query($query, $params)->fetch();



/*
foreach($products as $product){
    echo $product . "\n";
}
*/
