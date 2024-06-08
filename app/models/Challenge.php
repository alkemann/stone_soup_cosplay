<?php

namespace app\models;

class Challenge extends BaseModel
{

    static $connection = "default";
    static $table = "challenges";
    static $fields = [
        'id', 'name', 'description', 'setnr', 'week',
        'icon', 'reddit', 'wiki', 'shortform', 'special_rule',
        'background', 'gods', 'species', 'bonus',
        'conduct_1', 'conduct_2', 'conduct_3', 'bonus_1', 'bonus_2',
        'conduct_name_1', 'conduct_name_2', 'conduct_name_3', 'bonus_name_1', 'bonus_name_2',
        'active', 'draft', 'created'
    ];
     static $relations = [
        'submissions' => ['type' => 'belongs_to', 'class' => Submission::class, 'local' => 'id', 'foreign' => 'challenge_id']
    ];

    public static function historicSets(): array
    {
        $q = "SELECT `setnr`, COUNT(`setnr`) as `count` FROM `submissions` AS `s` ".
        "LEFT JOIN `challenges` AS `c` ON (`s`.`challenge_id` = `c`.`id`) ".
        "WHERE `hs` = 1 AND `accepted` = 1 AND `score` > 0 GROUP BY `setnr` ORDER BY `setnr` ASC;";
        $result = static::db()->query($q);
        if (!$result) return [];
        $out = [];
        foreach ($result as $row) {
            $out[$row['setnr']] = $row['count'];
        }
        return $out;
    }

    public static function active(): ?Challenge
    {
        $query = "SELECT * FROM `challenges` WHERE `active` = 1 AND `draft` = 0 AND `setnr` < 32 ORDER BY `setnr` DESC, `week` DESC LIMIT 1;";
        $result = static::db()->query($query);
        if ($result) {
            $data = array_pop($result);
            return new Challenge($data);
        } else {
            return null;
        }
    }

    public static function tournamentActive(): ?Challenge
    {
        $query = "SELECT * FROM `challenges` WHERE `active` = 1 AND `draft` = 0 AND `setnr` >= 32 ORDER BY `setnr` DESC, `week` DESC LIMIT 1;";
        $result = static::db()->query($query);
        if ($result) {
            $data = array_pop($result);
            return new Challenge($data);
        } else {
            return null;
        }
    }

    public static function deactivateAll(): bool
    {
        $res = static::db()->update(static::$table, ['active' => 1], ['active' => 0]);
        return $res > 0;
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

    public static function findBySets(bool $include_drafts, int $limit = 50, int $offset = 0, bool $include_tournament = false): array
    {
        $query = 'SELECT `c`.*, COUNT(`s`.`id`) AS `subs` FROM `challenges` AS `c` '.
            'LEFT JOIN `submissions` AS `s` ON (`s`.`challenge_id` = `c`.`id` AND `s`.`hs` = 1 AND `s`.`accepted` = 1) ';
        if ($include_tournament) {
            $query .= 'WHERE 1=1 ';
        } else {
            $query .= 'WHERE `c`.`setnr` < 32 ';
        }
        $query .= ($include_drafts) ? '' : 'AND `draft` = 0 ';
        $query .= 'GROUP BY `c`.`id` '.
            'ORDER BY `c`.`setnr` DESC, `c`.`week` DESC '.
            "LIMIT {$offset},{$limit};";
        $result = static::db()->query($query);
        $all = [];
        foreach ($result as $row) {
            $all[$row['id']] = new Challenge($row);
        }
        return $all;
    }


    //temporary function, to be removed -- just for test purposes
     public static function findBySetsTEST(bool $include_drafts, int $limit = 50, int $offset = 0, bool $include_tournament = false, $include_academy = true, bool $chronological = false): array
    {
        $query = 'SELECT `c`.*, COUNT(`s`.`id`) AS `subs` FROM `challenges` AS `c` '.
            'LEFT JOIN `submissions` AS `s` ON (`s`.`challenge_id` = `c`.`id` AND `s`.`hs` = 1 AND `s`.`accepted` = 1) ';
        if ($include_tournament) {
            $query .= 'WHERE 1=1 ';
        } else {
            $query .= 'WHERE `c`.`setnr` < 32 ';
        }
        if ($include_academy) {
            //default behavior includes this
        } else {
            $query .= 'AND `c`.`setnr` > 0 ';
        }
        $ascdesc = "DESC";
        if ($chronological) $ascdesc = "ASC";
        $query .= ($include_drafts) ? '' : 'AND `draft` = 0 ';
        $query .= 'GROUP BY `c`.`id` '.
            'ORDER BY `c`.`setnr` ' . $ascdesc . ' , `c`.`week` DESC '.
            "LIMIT {$offset},{$limit};";
        $result = static::db()->query($query);
        $all = [];
        foreach ($result as $row) {
            $all[$row['id']] = new Challenge($row);
        }
        return $all;
    }

    /********/

    public function shortform(): string
    {
        return empty($this->shortform) ? "{$this->species}, {$this->background}, {$this->gods}" : $this->shortform;
    }

}
