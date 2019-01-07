<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main"
                aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger-icon"><span></span><span></span><span></span></div>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <span class="light"><?= $T->trans(TITLE) ?></span> Srl
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="navbar-main">
            <ul class="nav navbar-nav" deleted-class="mr-auto">
                <!-- Dinamically generated -->
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
<?php
foreach ($menu as $element) {
    $label = $element["label"];
    switch ($element["type"]) {
    case "link":
        $link = $element["link"];
?>
        <li>
            <a class="page-scroll" href="<?=$link?>"><?=$T->trans($label)?></a>
        </li>
<?php
        break;
    case "dropdown":
        $options = $data[$element["options"]];
?>
        <li class="nav-item dropdown">
            <a class="nav-link white-text dropdown-toggle" data-toggle="dropdown"><?=$T->trans($label)?></a>
            <div class="dropdown-menu">
<?php
        foreach ($options as $option) {
            $opt_lbl = $option["label"];
            $opt_lnk = $option["link"];
?>
                <a class="dropdown-item" href="<?=$opt_lnk?>"><?=$T->trans($opt_lbl)?></a>
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
    </div>
</nav>
