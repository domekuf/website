<?php
foreach ($forms as $f) {
?>
    <h1> Editor for <?=$f["action"]?> </h1>
    <form method="POST" action="<?=$f["action"]?>">
<?php
    foreach ($f["inputs"] as $key=>$val) {
?>
        <textarea type="text" name="<?=$key?>"><?=$val?></textarea>
        <br/>
<?php
    }
?>
        <input type="submit" value="update">
    </form>
    <form method="POST" action="<?=$f["action_delete"]?>">
        <input type="submit" value="delete">
    </form>
<?php
}
?>
