<?php

namespace App\Models;

use App\Database\Database;
use PDO;
use PDOException;

abstract class Model extends Database
{
    protected static $table = "";
    public static function all()
    {
        $db = self::connect();
        $stmt = $db->query('SELECT * FROM ' . static::$table);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function create($data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));

            $query = "INSERT INTO " . static::$table . " ({$columns}) VALUES ({$placeholders})";
            $stmt = self::connect()->prepare($query);

            foreach ($data as $key => $value) {
                if ($key == "password") {

                    $value = password_hash($value, PASSWORD_BCRYPT);
                }
                $stmt->bindValue(':' . $key, $value);
            }

            return $stmt->execute();

        } catch (PDOException $e) {

            echo "Ma'lumotlarni qo'shishda xatolik: " . $e->getMessage();
            return false;
        }
    }

    public static function update(array $data, int $id)
    {
        try {
            $stringValue = "";
            foreach ($data as $key => $value) {
                $stringValue .= "{$key} = :{$key}, ";
            }

            $cleanedString = rtrim($stringValue, ', ');

            $query = "UPDATE " . static::$table . " SET {$cleanedString} WHERE id = :id";
            $stmt = self::connect()->prepare($query);

            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();

        } catch (PDOException $e) {
            echo "Ma'lumotlarni yangilashda xatolik: " . $e->getMessage();
            return false;
        }
    }

    public static function show(int $id)
    {
        try {
            $query = "SELECT * FROM " . static::$table . " WHERE id = :id";
            $stmt = self::connect()->prepare($query);

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            echo "Ma'lumotni olishda xatolik: " . $e->getMessage();
            return false;
        }
    }

    public static function delete(int $id)
    {
        try {
            $query = "DELETE FROM " . static::$table . " WHERE id = :id";
            $stmt = self::connect()->prepare($query);

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Ma'lumotni o'chirishda xatolik: " . $e->getMessage();
            return false;
        }
    }

    public static function attach($data)
    {
        try {
            $db = self::connect();

            $stringValue = "";
            foreach ($data as $key => $value) {
                if ($key == "password") {
                    // $value = password_hash($value, PASSWORD_BCRYPT);
                    continue;
                }

                $stringValue .= "{$key} = :{$key} AND ";
            }
            $cleanedString = rtrim($stringValue, "AND ");
            // dd($cleanedString);
            $query = "SELECT * FROM " . static::$table . " WHERE {$cleanedString}";

            $stmt = $db->prepare($query);

            foreach ($data as $key => $value) {
                if ($key == "password") {
                    // $value = password_hash($value, PASSWORD_BCRYPT);
                    continue;
                }
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_OBJ);
            if ($user) {
                if (isset($data['password']) && password_verify($data['password'], $user->password)) {
                    return $user; 
                } else {
                    
                    // echo "Parol noto'g'ri.";
                    return "Parol noto'g'ri.";
                }
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Xatolik: " . $e->getMessage();
            return false;
        }
    }

}
