<?php $this->layout('partials/template', [
    'title' => $page->title
]) ?>


<?= $this->start('scriptsHead') ?>
<script src="<?= assetsUrl('tinyeditor/tinyeditor.js') ?>"></script>
<?= $this->stop() ?>


<?php $this->start('mainSection') ?>

<?= $page->body ?>

<?php $this->stop() ?>