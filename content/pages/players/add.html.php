<?php
if ($data = $this->request->getPostData()) {
    $player = new app\models\Player($this->request->getPostData());
    if ($player->save()) {
        session_start();
        $_SESSION['message'] = "Player created";
        return $this->request->redirect('/players/list');
    }
    dd($player);
}

?>
<form method="POST">
    <fieldset>
        <label>
            <span>Name</span><br />
            <input type="text" name="name" placeholder="account name" />
        </label>
        <br />
        <input type="submit" name="Save">
    </fieldset>
</form>