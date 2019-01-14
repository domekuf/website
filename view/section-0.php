<!-- <?=$title?> Section -->
<section id="<?=$id?>" class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2><?=$T->trans($title)?></h2>
        </div>
    </div>
<?php
foreach ($data as $k=>$d) {
    if (!($k % 3)) {
?>
    <div class="row">
<?php
    }
?>
        <a href="#" data-toggle="modal" data-target="#sample-modal">
            <div class="col-lg-4">
                <img class="img-circle" src="https://picsum.photos/g/200/200?v=<?=$d?>" alt="Generic placeholder image" width="200" height="200">
                <p><?=$T->trans($d)?></p>
            </div>
        </a>
<?php
    if (! (($k - 2) % 3)) {
?>
    </div>
<?php
    }
?>
<?php
}
?>
</section>
