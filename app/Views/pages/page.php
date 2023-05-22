<?php $this->layout('partials/template', [
    'title' => $page->title,
    'body_class' => 'init-tinyeditor'
]) ?>


<?= $this->start('scriptsHead') ?>
<script src="<?= assetsUrl('tinyeditor/tinyeditor.js') ?>"></script>
<?= $this->stop() ?>


<?php $this->start('mainSection') ?>

<section class="uk-section">
    <div class="uk-container">
        
        <div>
            
            <?php if (checkAuth([1])): ?>
            <div class="editable" alias="page.<?= $page->id ?>.title">
            <?php endif; ?>
                <h1 class="uk-text-secondary editable-cage">
                    <?= $page->title ?>
                </h1>
            <?php if (checkAuth([1])): ?>
            </div>
            <?php endif; ?>
            
            <div>
                <hr class="uk-margin-remove">
            </div>
        </div>
        
        <?php if (checkAuth([1])): ?>
        <div class="editable" alias="page.<?= $page->id ?>.body">
            <div class="editable-cage">
        <?php endif; ?>

        <?= relevantPath($page->body) ?>

        <?php if (checkAuth([1])): ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php $this->stop() ?>