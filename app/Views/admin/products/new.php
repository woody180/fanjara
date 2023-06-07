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
            <h3><?= App\Engine\Libraries\Languages::translate('trans.add_product') ?></h3>
            <hr class="uk-divider-small">
        </div>
        
        
        <?php if (hasFlashData('success')): ?>
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= getFlashData('success') ?></p>
        </div>
        <?php endif; ?>
        
        <form enctype="multipart/form-data" action="<?= baseUrl("product") ?>" class="uk-child-width-1-1" method="post" uk-grid>
            <?= csrf_field() ?>
            
            <div class="uk-width-1-2@m">
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.title') ?></label>
                <input type="text" name="title" class="uk-input uk-border-rounded" value="<?= getForm('title') ?>">
                <?= show_error('error', 'title') ?>
            </div>
            
            <div class="uk-width-1-2@m">
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.url') ?></label>
                <input type="text" name="url" class="uk-input uk-border-rounded" value="<?= getForm('url') ?>">
            </div>
            
            <div>
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.priceconstructorurl') ?></label>
                <input type="text" name="constructorurl" class="uk-input uk-border-rounded" value="<?= getForm('constructorurl') ?>">
                <?= show_error('error', 'constructorurl') ?>
            </div>
            
            
            <div>
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.details') ?></label>
                <textarea name="details" class="uk-textarea uk-border-rounded"></textarea>
                <?= show_error('error', 'details') ?>
            </div>
            
            
            <div>
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.set_language') ?></label>
                <select name="lang" id="" class="uk-select uk-border-rounded">
                    <?php foreach (\App\Engine\Libraries\Languages::list() as $lng): ?>
                    <option <?= $lng->code == $_SESSION['lang'] ? 'selected' : '' ?> value="<?= $lng->code ?>"><?= ucfirst($lng->language) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            
            <div>
                <div>
                 
                    <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.choose_product_category') ?></label>
                    
                    <select class="uk-select uk-width-1-1 uk-border-rounded" name="productcategory">
                        <?php foreach (initModel('Productcategory')->list() as $pc): ?>
                            <option value="<?= $pc->id ?>"><?= $pc->title ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                    <?= show_error('error', 'productcategory') ?>
                </div>
            </div>
            
            
            <div class="uk-width-1-3@m uk-margin-auto">
                <label for="thumb" class="uk-form-label uk-display-block uk-cursor-pointer" id="fj-upload-thumbnail">

                    <?= App\Engine\Libraries\Languages::translate('trans.thumbnail') ?>

                    <input hidden id="thumb" type="file" name="thumbnail">

                    <div class="uk-width-1-1 uk-card uk-border-rounded uk-overflow-hidden" style="border: 1px solid #e5e5e5; height: 95px;">

                        <a id="fj-remove-thumb" href="#" uk-icon="icon: close;" class="uk-icon-button uk-position-top-right uk-margin-right uk-margin-top uk-position-z-index"></a>

                        <img hidden="true" class="uk-display-block uk-object-cover uk-width-1-1" src="" />
                    </div>
                </label>
                
                <?= show_error('error', 'thumbnail') ?>
            </div>
            
            
<!--            <div class="uk-width-2-3@m">
                
                <label for="" class="uk-form-label"><?= ''//App\Engine\Libraries\Languages::translate('trans.gallery') ?></label>
                <input id="fg-gallery-hidden" type="hidden" name="gallery" value="">
                
                <div id="fg-filemanager" class="js-upload uk-placeholder uk-text-center uk-margin-remove uk-cursor-pointer">
                    <span uk-icon="icon: cloud-upload"></span>
                    <div>
                        <span class="uk-link">Upload gallery files from here</span>
                    </div>
                </div>
                
                
                <ul id="fj-sortable-gallery" class="uk-grid-small uk-child-width-1-2 uk-child-width-1-4@s uk-margin-top" uk-sortable="handle: .uk-card" uk-grid>
    
                </ul>

                
                <?= ''//show_error('error', 'gallery') ?>
            </div>-->
            
            
            <div>
                <button class="uk-button uk-button-secondary uk-width-1-1"><?= App\Engine\Libraries\Languages::translate('trans.create') ?></button>
            </div>
            
        </form>
        
    </div>
</section>

<?= $this->stop(); ?>