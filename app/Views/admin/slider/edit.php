<?php $this->layout('partials/template', [
    'body_class' => 'init-tinyeditor'
]) ?>


<?= $this->start('scriptsHead') ?>
<script src="<?= assetsUrl('tinyeditor/tinyeditor.js') ?>"></script>
<?= $this->stop() ?>



<?= $this->start('mainSection') ?>

<section class="uk-section">
    <div class="uk-container min-height">
        
        <div class="uk-margin-large-bottom">
            <h3><?= App\Engine\Libraries\Languages::translate('trans.edit_slide') ?></h3>
            <hr class="uk-divider-small">
        </div>
        
        
        <?php if (hasFlashData('success')): ?>
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= getFlashData('success') ?></p>
        </div>
        <?php endif; ?>
        
        <?php if (hasFlashData('danger')): ?>
        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= getFlashData('danger') ?></p>
        </div>
        <?php endif; ?>
        
        
        
        <form enctype="multipart/form-data" action="<?= baseUrl("slider/{$slide->id}") ?>" class="uk-child-width-1-1 uk-grid-match" method="POST" uk-grid>
            <?= setMethod('put') ?>
            
            <div class="uk-width-1-1">
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.title') ?></label>
                <input type="text" name="title" class="uk-input uk-border-rounded" value="<?= $slide->title ?>">
                <?= show_error('error', 'title') ?>
            </div>
            
            <div class="uk-width-1-1">
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.url') ?></label>
                <input type="text" name="url" class="uk-input uk-border-rounded" value="<?= $slide->url ?>">
                <?= show_error('error', 'url') ?>
            </div>
            
            <div>
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.description') ?></label>
                <textarea name="description" class="uk-textarea uk-border-rounded"><?= $slide->description ?></textarea>
                <?= show_error('error', 'description') ?>
            </div>
            
            
            <div>
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.set_language') ?></label>
                <select name="lang" id="" class="uk-select uk-border-rounded">
                    <?php foreach (\App\Engine\Libraries\Languages::list() as $lng): ?>
                    <option <?= $slide->lang == $lng->code ? 'selected' : '' ?> value="<?= $lng->code ?>"><?= ucfirst($lng->language) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            
            <div class="uk-width-2-3@m">
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.image') ?></label>
                <input id="fg-product-category-thumbnail-hidden" type="hidden" name="slide" value="<?= $slide->slide ?>">
                
                <div id="fg-product-category-thumbnail-button" class="js-upload uk-placeholder uk-text-center uk-margin-remove uk-cursor-pointer">
                    <span uk-icon="icon: cloud-upload"></span>
                    <div>
                        <span class="uk-link">Upload slide file from here</span>
                    </div>
                </div>
                <?= show_error('error', 'slide') ?>
            </div>
            
            
            <div class="uk-width-1-3@m">
                <label class="uk-form-label">Slide preview</label>
                <div id="fg-product-category-thumbnail-preview" class="uk-border-rounded uk-position-relative uk-overflow-hidden" style="border: 1px dashed #e5e5e5; height: 110px">
                    
                    <a href="#" uk-icon="icon: trash" class="prouct-category-preview-remove uk-icon-button uk-position-top-right uk-margin-small-right uk-margin-small-top"></a>
                    
                    <?= img(['src' => $slide->slide ?? 'some.png', 'class' => 'uk-object-cover uk-width-1-1'], true) ?>
                </div>
            </div>
            
            
            <div>
                <button class="uk-button uk-button-secondary uk-width-1-1"><?= App\Engine\Libraries\Languages::translate('trans.update') ?></button>
            </div>
            
        </form>
        
    </div>
</section>

<?= $this->stop(); ?>