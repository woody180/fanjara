<?php $this->layout('partials/template') ?>

<?= $this->start('mainSection') ?>

<section class="uk-section" data-style="background-color: #f3f3f3">
    <div class="uk-container min-height">
        
        <div class="uk-child-width-1-3@m" uk-grid>
        <?php foreach ($files as $vid): ?>
            <?php $info = pathinfo($vid); ?>
            <div>
                <a uk-toggle href="#modal-media-video" class="uk-display-block uk-card uk-card-body uk-card-default uk-border-rounde uk-background-default">
                    <h3 class="uk-card-title"><?= $info['filename'] ?></h3>
                </a>
            </div>
            
            <div id="modal-media-video" class="uk-flex-top" uk-modal>
                <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
                    <button class="uk-modal-close-outside" type="button" uk-close></button>
                    <video src="<?= assetsUrl("tinyeditor/filemanager/files/videos/{$info['basename']}") ?>" width="1920" height="1080" controls playsinline uk-video></video>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        
    </div>
</section>

<?= $this->stop(); ?>