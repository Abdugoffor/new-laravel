<?php

namespace App\Database;

use PDO;
use PDOException;

class Database
{
    public static function connect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo 'Bazaga ulanishda xatolik: ' . $e->getMessage();
            return null;
        }
    }
}
