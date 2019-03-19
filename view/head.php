<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
        <meta name="HandheldFriendly" content="true" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="Skyron srl è una start up innovativa, studio di progettazione nautica, costituito da ingegneri, architetti navali, progettisti e designers.">
        <meta name="author" content="Skyron">

        <title><?=TITLE?><?=$title?></title>
<?php foreach($apple_icon as $size => $href) { ?>
        <link rel="apple-touch-icon" sizes="<?= $size ?>" href="<?= $href ?>">
<?php } ?>
<?php foreach($icon as $size => $href) { ?>
        <link rel="icon" type="image/png" sizes="<?= $size ?>" href="<?= $href ?>">
<?php } ?>

        <meta name="msapplication-TileColor" content="#da532c">
<?php foreach($ms_icon as $size => $href) { ?>
        <meta name="msapplication-TileImage"            content="<?= $href ?>">
<?php } ?>
        <link rel="manifest"                               href="<?= $manifest ?>">
        <meta name="theme-color" content="#ffffff">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Custom fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <style>
        .intro {
            background: url(<?=$data["intro-bg"]?>) no-repeat bottom center scroll;
        }
        </style>
<?php foreach($css as $css_) { ?>
        <link rel="stylesheet" href="<?= $css_ ?>">
<?php } ?>
    </head>
    <body  id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
