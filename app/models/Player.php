<?php

namespace app\models;

class Player extends BaseModel
{

    static $connection = "default";
    static $table = "players";
    static $fields = [
        'id', 'name', 'created'];

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
        $all = static::findAsArray();
        foreach ($all as $key => &$player) {
            $subs = Submission::find(['player_id' => $player->id]);
            $score = 0; $stars = 0;
            foreach ($subs as $sub) {
                $score += $sub->score;
                $stars += $sub->stars;
            }
            $player->score = $score;
            $player->stars = $stars;
        }
        return $all;
    }
}