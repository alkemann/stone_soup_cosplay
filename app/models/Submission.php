<?php

namespace app\models;

class Submission extends BaseModel
{

    static $connection = "default";
    static $table = "submissions";
    static $fields = [
        'id', 'challenge_id', 'player_id',
        'score', 'stars', 'morgue_url', 'morgue_text',
        'created'
    ];


    public static function scoreboard($challenge_id)
    {
    	$id = (int) $challenge_id;
    	$q = "SELECT `ss`.`id`, `ss`.`score`, `ss`.`stars`, `ss`.`created`, `inner`.`name` FROM ( SELECT `p`.*, max(`s`.`score`) as `score`
				FROM `players` AS `p`
				LEFT JOIN `submissions` AS `s` ON (`s`.`player_id` = `p`.`id` AND `s`.`challenge_id` = {$id})
				GROUP BY `p`.`id` ) AS `inner`
				LEFT JOIN `submissions` AS `ss` ON (`ss`.`player_id` = `inner`.`id` AND `ss`.`score` = `inner`.`score`)
				ORDER BY `ss`.`score` DESC;";
		$result = static::db()->query($q);
		$all = [];
		foreach ($result as $row) {
			$all[] = new Submission($row);
		}
        return $all;
    }
}