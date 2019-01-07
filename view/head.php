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
        <link rel="apple-touch-icon" sizes="57x57"         href="favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60"         href="favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72"         href="favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76"         href="favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114"       href="favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120"       href="favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144"       href="favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152"       href="favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180"       href="favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32"    href="favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96"    href="favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16"    href="favicon/favicon-16x16.png">
        <link rel="manifest"                               href="favicon/manifest.json">
        <meta name="msapplication-TileImage"            content="favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <meta name="msapplication-TileColor" content="#ffffff">
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
