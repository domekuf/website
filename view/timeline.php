<!-- <?=$title?> Section -->
<section id="<?=$id?>" class="container content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2><?=$T->trans($title)?></h2>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">
<?php
function timeline_item($bground, $title, $subtitle, $body, $url, $inv) {
    return '<li'.($inv?' class="timeline-inverted" ':'').'><div class="timeline-image" style="'.$bground.'"><h4>'.$title.'</h4></div>'.
             '<div class="timeline-panel"><div><!--h4 class="subheading">'.$subtitle.'</h4--></div>'.
               '<div class="timeline-body"><p class="text-muted"><a href="'.$url.'">'.$body.'</a></p></div></div></li>';
}

function timeline_item_img($img, $title, $subtitle, $body, $url, $inv) {
    return timeline_item('background-image:url('.$img.')', $title, $subtitle, $body, $url, $inv);
}

foreach ($data["data"] as $i=>$item) {
    $t = new DateTime($item["created_time"]);
?>
                <?= timeline_item_img($item["full_picture"],
                                    '<br>'.$t->format("d"). '/'.$t->format("m").'/'.$t->format("Y"),
                                    "", $item["message"], $item["permalink_url"], $i%2);?>
<?php
}
?>
                </ul>
            </div>
        </div>
    </div>
</section>
