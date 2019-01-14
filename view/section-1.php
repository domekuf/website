<!-- <?=$title?> Section -->
<section id="<?=$id?>" class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2><?=$T->trans($title)?></h2>
        </div>
    </div>
<?php
foreach ($data as $k=>$d) { 
?>
    <div class="row featurette">
        <div class="col-md-7 <?php if ($k % 2) { ?> col-md-push-5 <?php } ?>">
            <h2 class="featurette-heading"><?=$d["last"]?> <span class="text-muted"><?=$d["first"]?></span></h2>
            <p class="lead"><?=$d["description"]?></p>
        </div>
        <div class="col-md-5 <?php if ($k % 2) { ?> col-md-pull-7 <?php } ?>">
            <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500" src="https://picsum.photos/g/500/500?v=<?=$k?>" data-holder-rendered="true">
        </div>
    </div>
    <hr>

<?php
}
?>
</section>
