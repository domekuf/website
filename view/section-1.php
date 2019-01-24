<!-- <?=$title?> Section -->
<section id="<?=$id?>" class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2><?=$T->trans($title)?></h2>
        </div>
    </div>
<?php
foreach ($data as $k=>$o) {
    $d = $o["title"];
    $c = $o["content"];
    $p = $o["photo"];
?>
    <div class="row featurette">
        <div class="col-md-7 <?php if ($k % 2) { ?> col-md-push-5 <?php } ?>">
            <h2 class="featurette-heading"><?=$d?> <span class="text-muted"><!--text here--></span></h2>
            <p class="lead"><?=$c?></p>
        </div>
        <div class="col-md-5 <?php if ($k % 2) { ?> col-md-pull-7 <?php } ?>">
            <img class="featurette-image img-responsive center-block" alt="<?=$p?>" src="<?=$p?>" data-holder-rendered="true">
        </div>
    </div>
    <hr>

<?php
}
?>
</section>
