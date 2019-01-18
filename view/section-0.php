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
    if (!($k % 3)) {
?>
    <div class="row">
<?php
    }
?>
        <a href="#" data-toggle="modal" data-target="#modal-<?=$k?>">
            <div class="col-lg-4">
                <img class="img-circle" src="https://picsum.photos/g/200/200?v=<?=$d?>" alt="<?=$d?>" width="200" height="200">
                <p><?=$T->trans($d)?></p>
            </div>
        </a>

        <div id="modal-<?=$k?>" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="background-color: black;border-color:grey">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span style="color:white" aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><?=$T->trans($d)?></h4>
                    </div>
                    <div class="modal-body">
                        <p>
                        <?=$c?>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
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
