<?php

namespace app\models;

class Challenge extends BaseModel
{

    static $connection = "default";
    static $table = "challenges";
    static $fields = [
        'id', 'name', 'setnr', 'week',
        'background', 'gods', 'species',
        'conduct_1', 'conduct_2', 'conduct_3', 'bonus_1', 'bonus_2',
        'created'
    ];
    
    public static function list()
    {
    	$all = static::find();
    	$list = [];
    	foreach ($all as $p) {
    		$list[$p->id] = $p->name;
    	}
    	return $list;
    }
}
