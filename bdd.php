<?php
include('config/mysql.php');
function connexion() {
    try {
        $mysqlClient = new PDO(
            //on formate et on utilise les constantes de config/mysql.php
        sprintf('mysql:host=%s;dbname=%s;port=%s;charset=utf8', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
        MYSQL_USER,
        MYSQL_PASSWORD,
        
         [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $mysqlClient;
}
