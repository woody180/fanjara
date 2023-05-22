<?php $this->layout('partials/template', [
    'body_class' => 'init-tinyeditor'
]) ?>


<?= $this->start('scriptsHead') ?>
<script src="<?= assetsUrl('tinyeditor/tinyeditor.js') ?>"></script>
<?= $this->stop() ?>


<?php $this->start('mainSection') ?>

<section class="uk-section">
    <div class="uk-container uk-container-small min-height">
        
        <div>
            
            <?php if (checkAuth([1])): ?>
            <div class="editable" alias="product.<?= $product->id ?>.title">
            <?php endif; ?>
                <h1 class="uk-text-secondary editable-cage">
                    <?= $product->title ?>
                </h1>
            <?php if (checkAuth([1])): ?>
            </div>
            <?php endif; ?>
            
            <div>
                <hr class="uk-margin-remove">
            </div>
        </div>
        
        
        
        <?php if (checkAuth([1])): ?>
        <div class="editable" alias="product.<?= $product->id ?>.body">
            <div class="editable-cage">
        <?php endif; ?>
                
        <?= relevantPath($product->body) ?>
                
        <?php if (checkAuth([1])): ?>
            </div>
        </div>
        <?php endif; ?>
        
        
        
        
        <?php if ($product->gallery): ?>
        <!-- GALLERY -->
        <div class="uk-position-relative">
            
            <?php if (checkAuth([1])): ?>
            <a target="_blank" href="<?= baseUrl("product/{$product->id}/edit") ?>" uk-icon="icon: pencil;" class="uk-icon-button uk-position-absolute uk-position-left-top uk-position-z-index"></a>
            <?php endif; ?>
            
            <div class="fg-product-gallery uk-container uk-container-small">
                <div class="uk-child-width-1-3@m uk-grid-medium" uk-grid uk-lightbox="animation: slide">
                    <?php foreach (explode(',', $product->gallery) as $item): ?>
                    <div>
                        <a class="uk-inline" href="<?= assetsUrl("tinyeditor/filemanager/files/{$item}") ?>">
                            <img src="<?= assetsUrl("tinyeditor/filemanager/files/{$item}") ?>" />
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        
        
        
    </div>
</section>

<?php $this->stop() ?>