<?php

namespace app\models;

use alkemann\h2l\traits\{Model, Entity};


abstract class BaseModel implements \JsonSerializable
{
    use Model, Entity;

    public static function getLast()
    {
        $table = static::table();
        $db    = static::db();
        $query = "SELECT * FROM `{$table}` ORDER BY id DESC LIMIT 1;";
        $data  = $db->query($query);
        if (empty($data)) return [];
        else return $data[0];
    }

    public function jsonSerialize()
    {
        return $this->to('array');
    }
}
