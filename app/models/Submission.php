<?php

namespace app\models;

class Submission extends BaseModel
{

    static $connection = "default";
    static $table = "submissions";
    static $fields = [
        'id', 'challenge_id', 'player_id', 'hs', 'accepted', 'online', 
        'score', 'stars', 'morgue_url', 'morgue_text', 'comment', 'late',
        'created'
    ];
    static $relations = [
        'player' => ['type' => 'belongs_to', 'class' => Player::class, 'local' => 'player_id', 'foreign' => 'id'],
        'challenge' => ['type' => 'belongs_to', 'class' => Challenge::class, 'local' => 'challenge_id', 'foreign' => 'id']
    ];

    public static function scoreboard($challenge_id)
    {
    	$id = (int) $challenge_id;
        return static::findAsArray(['challenge_id' => $id, 'accepted' => 1, 'hs' => 1], ['order' => '`score` DESC, `stars` DESC']);
    }

    public static function sendToModeration(array $conditions): bool
    {
        return static::db()->update(static::$table, $conditions, ['accepted' => 0, 'hs' => 0]) > 0;
    }

    public function isScoring(): bool
    {
        return $this->hs == 1 && $this->accepted == 1;
    }
}