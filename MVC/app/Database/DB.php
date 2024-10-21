<?php
namespace App\Database;

use PDO;
use PDOException;

class DB extends Database
{
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public static function table($table)
    {
        return new static($table);
    }

    public function where(string $column, string $value)
    {
        try {
            $db = self::connect();

            $query = "SELECT * FROM " . $this->table . " WHERE $column = :value";

            $stmt = $db->prepare($query);

            $stmt->bindValue(':value', $value);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            echo "Xatolik: " . $e->getMessage();
            return false;
        }
    }

    public static function query(string $sql)
    {
        $stmt = self::connect()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}
