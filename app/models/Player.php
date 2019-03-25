<?php

namespace app\models;

class Player extends BaseModel
{

    static $connection = "default";
    static $table = "players";
    static $fields = [
        'id', 'name', 'reddit', 'created'
    ];
    static $relations = [
        'submissions' => ['type' => 'has_many', 'class' => Submission::class, 'local' => 'id', 'foreign' => 'player_id'],
    ];

    public static function list()
    {
    	$all = static::find([],['order' => '`name` ASC']);
    	$list = [];
    	foreach ($all as $p) {
    		$list[$p->id] = $p->name;
    	}
    	return $list;
    }

    public static function scoreboard()
    {
        $all = static::findAsArray([], ['with' => 'submissions', 'order' => '`name` ASC']);
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

    public static function scoreboardForSet($set)
    {
        $s = (int) $set;
        $q = "SELECT `p`.`id` AS `pid`, `name` AS `player`, `total`, `sky` AS `stars` FROM `players` AS `p`
                LEFT JOIN (
                    SELECT `s`.`player_id` AS `pid`, SUM(`s`.`score`) AS `total`, SUM(`s`.`stars`) AS `sky`
                    FROM `submissions` AS `s`
                    LEFT JOIN `challenges` AS `c` ON (`s`.`challenge_id` = `c`.`id`)
                    WHERE `s`.`accepted` = 1 AND `s`.`hs` = 1 AND `c`.`setnr` = {$s}
                    GROUP BY `s`.`player_id`
                ) AS `inner` ON (`p`.`id` = `inner`.`pid`)
                WHERE `inner`.`total` > 0 ORDER BY `total` DESC";
        $result = static::db()->query($q);

        $challenges_in_set = Challenge::findAsArray(['setnr' => $set, 'draft' => 0], ['order' => '`week` ASC']);
        $scoreboards = [];
        foreach ($challenges_in_set as $c) {
            $scoreboards[$c->id] = Submission::scoreboard($c->id);
        }
        $out = [];
        foreach ($result as $row) {
            $row['week'] = [];
            foreach ($scoreboards as $cid => $scores) {
                $in = false;
                foreach ($scores as $sub) {
                    if ($row['pid'] == $sub->player_id) {
                        $row['week'][$cid] = ['score' => $sub->score, 'stars' => $sub->stars];
                        $in = true;
                        break;
                    }
                }
                if (!$in) {
                    $row['week'][$cid] = null;
                }
            }
            $out[] = $row;
        }
        return $out;
    }
}