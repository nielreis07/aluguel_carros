<?php

namespace App\Models;

use App\Core\Database;

class Configuration
{
    public static function getHeaderData()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM slide LIMIT 1");
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
