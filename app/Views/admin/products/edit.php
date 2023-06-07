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
            <h3><?= App\Engine\Libraries\Languages::translate('trans.edit_product') ?></h3>
            <hr class="uk-divider-small">
        </div>
        
        
        <?php if (hasFlashData('success')): ?>
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= getFlashData('success') ?></p>
        </div>
        <?php endif; ?>
        
        <form enctype="multipart/form-data" action="<?= baseUrl("product/{$product->id}") ?>" class="uk-child-width-1-1" method="post" uk-grid>
            
            <?= setMethod('put') ?>
            
            <div class="uk-width-1-2@m">
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.title') ?></label>
                <input type="text" name="title" class="uk-input uk-border-rounded" value="<?= $product->title ?>">
                <?= show_error('error', 'title') ?>
            </div>
            
            <div class="uk-width-1-2@m">
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.url') ?></label>
                <input type="text" name="url" class="uk-input uk-border-rounded" value="<?= $product->url ?>">
            </div>
            
            <div>
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.priceconstructorurl') ?></label>
                <input type="text" name="constructorurl" class="uk-input uk-border-rounded" value="<?= $product->constructorurl ?>">
                <?= show_error('error', 'constructorurl') ?>
            </div>
            
            
            <div>
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.details') ?></label>
                <textarea name="details" class="uk-textarea uk-border-rounded"><?= $product->details ?></textarea>
                <?= show_error('error', 'details') ?>
            </div>

            
            <div>
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.set_language') ?></label>
                <select name="lang" id="" class="uk-select uk-border-rounded">
                    <?php foreach (\App\Engine\Libraries\Languages::list() as $lng): ?>
                    <option <?= $lng->code == $product->lang ? 'selected' : '' ?> value="<?= $lng->code ?>"><?= ucfirst($lng->language) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            
            <div>
                <div>
                 
                    <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.choose_product_category') ?></label>
                    
                    <select class="uk-select uk-width-1-1 uk-border-rounded" name="productcategory">
                        <?php foreach (initModel('Productcategory')->list() as $pc): ?>
                            <option <?= $pc->id === reset($product->sharedProductcategory)->id ? 'selected' : '' ?> value="<?= $pc->id ?>"><?= $pc->title ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                    <?= show_error('error', 'productcategory') ?>
                </div>
            </div>
            
            
            <div class="uk-width-1-3@m uk-margin-auto">
                <label for="thumb" class="uk-form-label uk-display-block uk-cursor-pointer" id="fj-upload-thumbnail">

                    <?= App\Engine\Libraries\Languages::translate('trans.thumbnail') ?>

                    <input hidden id="thumb" type="file" name="thumbnail" value="">
                    <input hidden type="text" name="thumbnail" value="<?= $product->thumbnail ?>">

                    <div class="uk-width-1-1 uk-card uk-border-rounded uk-overflow-hidden" style="border: 1px solid #e5e5e5; height: 195px;">

                        <a id="fj-remove-thumb" href="#" uk-icon="icon: close;" class="uk-icon-button uk-position-top-right uk-margin-right uk-margin-top uk-position-z-index"></a>

                        <img class="uk-display-block uk-object-cover uk-width-1-1" src="<?= assetsUrl("tinyeditor/filemanager/files/{$product->thumbnail}") ?>" />
                    </div>
                </label>
                
                <?= show_error('error', 'thumbnail') ?>
            </div>
            
            
<!--            <div class="uk-width-2-3@m">
                
                <label for="" class="uk-form-label"><?= ''// App\Engine\Libraries\Languages::translate('trans.gallery') ?></label>
                <input id="fg-gallery-hidden" type="hidden" name="gallery" value="<?= ''//$product->gallery ?>">
                
                <div id="fg-filemanager" class="js-upload uk-placeholder uk-text-center uk-margin-remove uk-cursor-pointer">
                    <span uk-icon="icon: cloud-upload"></span>
                    <div>
                        <span class="uk-link">Upload gallery files from here</span>
                    </div>
                </div>
                
                
                <ul id="fj-sortable-gallery" class="uk-grid-small uk-child-width-1-2 uk-child-width-1-4@s uk-margin-top" uk-sortable="handle: .uk-card" uk-grid>
                    <?php //foreach (explode(',',$product->gallery) as $i => $gallery): ?>
                    <li data-img="<?= ''//$gallery ?>">
                        <div class="uk-position-relative uk-border-rounded uk-card uk-card-default uk-card-body uk-text-center" data-bg="<?= ''// assetsUrl("tinyeditor/filemanager/files/{$gallery}") ?>">
                            <a data-index="<?= ''// $i ?>" href="#" uk-icon="icon: trash;" class="uk-icon-button fj-gallery-image-trash"></a>
                        </div>
                    </li>
                    <?php //endforeach; ?>
                </ul>

                
                <?= ''//show_error('error', 'gallery') ?>
            </div>-->
            
            
            <div>
                <button class="uk-button uk-button-secondary uk-width-1-1"><?= App\Engine\Libraries\Languages::translate('trans.update') ?></button>
            </div>
            
        </form>
        
    </div>
</section>

<?= $this->stop(); ?>


<?= $this->start('scripts') ?>
<script src="<?= assetsUrl('tinyeditor/tinyeditor.js') ?>"></script>
<?= $this->stop() ?>