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
        <input type="submit">
    </form>
<?php
}
?>
