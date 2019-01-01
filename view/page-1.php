<nav class="navbar navbar-expand-lg peach-gradient lighten-3 mb-4 font-weight-bold z-depth-1">
    <a class="navbar-brand white-text" href="#"><?= TITLE ?></a>
    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent20"
        aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
        <div class="hamburger-icon"><span></span><span></span><span></span></div>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent20">
        <ul class="navbar-nav mr-auto">
        <!-- Dinamically generated -->
<?php
$menu = $data["menu"];
foreach ($menu as $element) {
    $label = $element["label"][$lang];
    switch ($element["type"]) {
    case "link":
        $link = $element["link"];
?>
        <li class="nav-item">
            <a class="nav-link white-text" href="#<?=$link?>"><?=$label?></a>
        </li>
<?php
        break;
    case "dropdown":
        $options = $data[$element["options"]];
?>
        <li class="nav-item dropdown">
            <a class="nav-link white-text dropdown-toggle" data-toggle="dropdown"><?=$label?></a>
            <div class="dropdown-menu">
<?php
        foreach ($options as $option) {
            $opt_lbl = $option["label"];
            $opt_lnk = $option["link"];
?>
                <a class="dropdown-item" href="<?=$opt_lnk?>"><?=$opt_lbl?></a>
<?php
        }
?>
            </div>
        </li>
<?php
        break;
    }
}
?>
        </ul>
    </div>
</nav>
<div class="container row">
    <div class="col-12">
        <p><?= json_encode($data);?></p>
    </div>
</div>
