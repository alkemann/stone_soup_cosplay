<?php

namespace app\models;

class Player extends BaseModel
{

    static $connection = "default";
    static $table = "players";
    static $fields = [
        'id', 'name', 'created'
    ];
    static $relations = [
        'submissions' => ['type' => 'has_many', 'class' => Submission::class, 'local' => 'id', 'foreign' => 'player_id'],
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

    public static function scoreboard()
    {
        $all = static::findAsArray([], ['with' => 'submissions']);
        foreach ($all as $key => &$player) {
            $score = 0; $stars = 0; $subs = 0;
            foreach ($player->submissions() as $sub) {
                if ($sub->accepted && $sub->hs) {
                    $score += $sub->score;
                    $stars += $sub->stars;
                    $subs += 1;
                } 
            }
            $player->subs = $subs;
            $player->score = $score;
            $player->stars = $stars;
        }
        return $all;
    }
}