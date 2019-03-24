<?php

namespace app\models;

class Submission extends BaseModel
{

    static $connection = "default";
    static $table = "submissions";
    static $fields = [
        'id', 'challenge_id', 'player_id', 'hs',
        'score', 'stars', 'morgue_url', 'morgue_text',
        'created'
    ];
    static $relations = [
        'player' => ['type' => 'belongs_to', 'class' => Player::class, 'local' => 'player_id', 'foreign' => 'id'],
        'challenge' => ['type' => 'belongs_to', 'class' => Challenge::class, 'local' => 'challenge_id', 'foreign' => 'id']
    ];

    public static function scoreboard($challenge_id)
    {
    	$id = (int) $challenge_id;
        return static::findAsArray(['challenge_id' => $id, 'accepted' => 1, 'hs' => 1], ['order' => '`score` DESC, `stars` DESC', 'with' => 'player']);

        // Automatic pick highest
        /*
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
        */
    }
}