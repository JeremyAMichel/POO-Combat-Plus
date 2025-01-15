<?php

final class Database
{
    private static ?PDO $pdo = null;

    private function __construct() {}

    public static function getConnection(): PDO
    {
        if (self::$pdo === null) {
            try {
                $host = "localhost";
                $dbname = "combat_plus";
                $login = "root";
                $password = "";

                self::$pdo = new PDO("mysql:host={$host};dbname={$dbname}", $login, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $error) {
                echo "Erreur de connexion : " . $error->getMessage();
            }
        }

        return self::$pdo;
    }
}