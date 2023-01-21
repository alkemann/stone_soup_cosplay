<?php

if ($data = $this->request->getPostData()) {
    $data['reddit'] = empty($data['reddit']) ? $data['name'] : $data['reddit'];
    $data['discord'] = empty($data['discord']) ? $data['name'] : $data['discord'];
    $player = new app\models\Player($data);
    if ($player->save()) {
        session_start();
        $_SESSION['message'] = "Player created";
        return $this->request->redirect('/admin/players/list');
    }
    dd($player);
}

?>
<h2>Adding new Player</h2>
<form method="POST">
    <fieldset>
        <label>
            <span>Name</span><br />
            <input type="text" name="name" />
        </label>
        <br />
        <label>
            <span>Reddit account (leave empty to duplicate "name" field)</span><br />
            <input type="text" name="reddit"  />
        </label>
        <br />
        <label>
            <span>Discord name (leave empty to duplicate "name" field)</span><br />
            <input type="text" name="discord"  />
        </label>
        <br />
        <input type="submit" name="Save">
    </fieldset>
</form>