<?php

use app\models\Challenge;

$id = $_GET['id'] ?? false;

if ($id == false) {
	return $this->request->redirect('/');
}

$cha = Challenge::get($id);
if (!$cha) {
	return $this->request->redirect('/');
}


if ($data = $this->request->getPostData()) {
	if ($data['active'] == '1' && $cha->active == 0) {
		Challenge::deactivateAll();
	}
	$cha->save($data);
	return $this->request->redirect('/');
}

?>
<h2>Edit: <?=$cha->name?></h2>
<form method="POST">
	<fieldset>
		<input type="submit" name="Save">
		<br />
		<br />
		<label>
			<span>Name</span><br />
			<input type="text" name="name" value="<?=$cha->name?>" />
		</label>
		<br />
		<br />
		<label>
			<span>Shortform description (aka 'MiBe', 'MiFi^Mak' or 'Mino Fi/Skal Mak'</span><br />
			<input type="text" name="shortform" value="<?=$cha->shortform?>" />
		</label>
		<br />
		<br />
		<label>
			<span>Description</span><br />
			<textarea name="description" cols="100" rows="3"><?=$cha->description?></textarea>
		</label>
		<br />
		<br />
		<label>
			<input type="hidden" name="draft" value="0" />
			<input type="checkbox" name="draft" value="1" <?=($cha->draft)?'checked="checked"':''?> />
			<span>Draft (Drafts are hidden from public)</span>
		</label>
		<br />
		<br />
		<label>
			<input type="hidden" name="active" value="0" />
			<input type="checkbox" name="active" value="1" <?=($cha->active)?'checked="checked"':''?> />
			<span>Active (will deactivate currently active)</span>
		</label>
		<br />
		<br />
		<label>
			<input type="hidden" name="bonus" value="0" />
			<input type="checkbox" name="bonus" value="1" <?=($cha->bonus)?'checked="checked"':''?> />
			<span>Bonus challenge (won't count for set scoreboard)</span>
		</label>
		<br />
		<br />
		<label>
			<span>Set</span><br />
			<input type="number" name="setnr"  value="<?=$cha->setnr?>"/>
		</label>
		<br />
		<br />
		<label>
			<span>Week</span><br />
			<input type="number" name="week"  value="<?=$cha->week?>" />
		</label>
		<br />
		<br />
		<label>
			<span>Species</span><br />
			<input type="text" name="species"  value="<?=$cha->species?>" />
		</label>
		<br />
		<br />
		<label>
			<span>Background</span><br />
			<input type="text" name="background"  value="<?=$cha->background?>" />
		</label>
		<br />
		<br />
		<label>
			<span>God(s)</span><br />
			<input type="text" name="gods"  value="<?=$cha->gods?>" />
		</label>
		<br />
		<br />
		<label>
			<span>Reddit thread</span><br />
			<input type="text" name="reddit" value="<?=$cha->reddit?>" />
		</label>
		<br />
		<br />
		<label>
			<span>Wiki URL</span><br />
			<input type="text" name="wiki" value="<?=$cha->wiki?>" />
		</label>
		<br />
		<br />
		<label>
			<span>Character icon image</span><br />
			<input type="text" name="icon"  value="<?=$cha->icon?>" />
		</label>
		<br />
		<br />
		<label>
			<span>Conduct 1 Name</span><br />
			<input type="text" name="conduct_name_1" value="<?=$cha->conduct_name_1?>" />
		</label>
		<br />
		<br />
		<label>
			<span>Conduct 1 Description</span><br />
			<textarea name="conduct_1" cols="100" rows="3"><?=$cha->conduct_1?></textarea>
		</label>
		<br />
		<br />
		<label>
			<span>Conduct 2 Name</span><br />
			<input type="text" name="conduct_name_2" value="<?=$cha->conduct_name_2?>" />
		</label>
		<br />
		<br />
		<label>
			<span>Conduct 2 Description</span><br />
			<textarea name="conduct_2" cols="100" rows="3"><?=$cha->conduct_2?></textarea>
		</label>
		<br />
		<br />
		<label>
			<span>Conduct 3 Name</span><br />
			<input type="text" name="conduct_name_3" value="<?=$cha->conduct_name_3?>" />
		</label>
		<br />
		<br />
		<label>
			<span>Conduct 3 Description</span><br />
			<textarea name="conduct_3" cols="100" rows="3"><?=$cha->conduct_3?></textarea>
		</label>
		<br />
		<br />
		<label>
			<span>Bonus 1 Name</span><br />
			<input type="text" name="bonus_name_1" value="<?=$cha->bonus_name_1?>" />
		</label>
		<br />
		<br />
		<label>
			<span>Bonus 1 Description</span><br />
			<textarea name="bonus_1" cols="100" rows="3"><?=$cha->bonus_1?></textarea>
		</label>
		<br />
		<br />
		<label>
			<span>Bonus 2 Name</span><br />
			<input type="text" name="bonus_name_2" value="<?=$cha->bonus_name_2?>" />
		</label>
		<br />
		<br />
		<label>
			<span>Bonus 2 Description</span><br />
			<textarea name="bonus_2" cols="100" rows="3"><?=$cha->bonus_2?></textarea>
		</label>
		<br />
		<br />
		<label>
			<span>Special Rule</span><br />
			<textarea name="special_rule" cols="100" rows="3"><?=$cha->special_rule?></textarea>
		</label>
		<br />
		<br />
		<input type="submit" name="Save">
	</fieldset>
</form>