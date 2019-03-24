<?php

namespace app\models;

class Challenge extends BaseModel
{

    static $connection = "default";
    static $table = "challenges";
    static $fields = [
        'id', 'name', 'setnr', 'week',
        'icon', 'reddit',
        'background', 'gods', 'species',
        'conduct_1', 'conduct_2', 'conduct_3', 'bonus_1', 'bonus_2',
        'active', 'draft', 'created'
    ];
     static $relations = [
        'submissions' => ['type' => 'belongs_to', 'class' => Submission::class, 'local' => 'id', 'foreign' => 'challenge_id']
    ];
   
    public static function active(): ?Challenge
    {
        $result = static::findAsArray(['active' => 1, 'draft' => 0], ['limit' => 1]);
        if ($result) {
            return array_pop($result);
        } else {
            return null;
        }
    }

    public static function list()
    {
    	$all = static::find(['draft' => 0], ['order' => '`setnr` DESC, `week` DESC']);
    	$list = [];
    	foreach ($all as $p) {
    		$list[$p->id] = 'Set ' . $p->setnr . ' Week ' . $p->week . ' : ' . $p->name;
    	}
    	return $list;
    }

    public static function findBySets(array $conditions = [], array $options = []): array
    {
        $options['order'] = '`setnr` DESC, `week` DESC';
        $result = static::find($conditions, $options);
        $all = [];
        foreach ($result as $cha) {
            $subs = Submission::db()->query('SELECT COUNT(1) AS `count` FROM submissions WHERE `hs` = 1 AND `accepted` = 1 AND challenge_id = ' . (int) $cha->id);
            $cha->subs = $subs[0]['count'];
            $all[$cha->id] = $cha;
        }

        return $all;
    }
}
