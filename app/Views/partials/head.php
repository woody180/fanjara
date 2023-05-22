<!DOCTYPE html>
<html lang="<?= App\Engine\Libraries\Languages::active() ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="baseurl" content="<?= URLROOT ?>">
    <meta name="csrf_token" content="<?= csrf_hash() ?>">

    <link rel="stylesheet" href="<?= assetsUrl('css/uikit.min.css') ?>">
    <link rel="stylesheet" href="<?= assetsUrl('css/main.min.css') ?>">

    <script src="<?= assetsUrl('js/uikit.min.js') ?>"></script>
    <script src="<?= assetsUrl('js/uikit-icons.min.js') ?>"></script>
    
    <?= $this->section('scriptsHead') ?>
    
    <title><?= $title ?? APPNAME; ?></title>
</head>
<body <?= isset($body_class) ? 'class="'.$body_class.'"' : null ?>>

<?php $this->insert('partials/header') ?>