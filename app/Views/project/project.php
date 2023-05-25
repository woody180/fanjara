<?php $this->layout('partials/template', [
    'title' => APPNAME . ' - ' . $project->title
]) ?>


<?php $this->start('mainSection') ?>

<section id="projects-section" class="uk-section" data-style="background: #f0f0f0;">
    <div class="uk-container min-height">
      
       
        <div class="uk-margin-large-bottom">
            <h1 class="uk-text-dark"><?= $project->title ?></h1>
            <hr class="uk-divider-small">
        </div>
        
      
        <?php if (strlen($project->gallery)): ?>
        
        <div class="fg-product-gallery uk-child-width-1-3@m uk-child-width-1-2" uk-grid uk-lightbox>
            <?php foreach (explode(',', $project->gallery) as $image): ?>
            <div>
                <a class="uk-inline" href="<?= assetsUrl("tinyeditor/filemanager/files/{$image}") ?>">
                    <?= img(['src' => $image], true) ?>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        
        <?php endif; ?>
        
    </div>
</section>

<?php $this->stop() ?>