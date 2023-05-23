<?php $this->layout('partials/template') ?>


<?php $this->start('mainSection') ?>

<section class="uk-section">
    <div class="uk-container min-height">
       
        <div class="uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1 uk-grid-match" uk-grid>
            <?php foreach ($products->data as $product): ?>
                <div>
                    <div class="uk-card uk-card-default uk-overflow-hidden uk-border-rounded">
                        
                        <?php if (checkAuth([1])): ?>
                        <a uk-tooltip="<?= App\Engine\Libraries\Languages::translate('trans.edit') ?>" target="_blank" href="<?= baseUrl("product/{$product->id}/edit") ?>" class="uk-icon-button uk-position-top-left uk-position-z-index uk-margin-left uk-margin-top" uk-icon="icon: link;"></a>
                        <?php endif; ?>
                        
                        <div class="uk-card-media-top uk-position-relative" data-responsive="max-width[<?= M_WIDTH ?>]; style[height: 170px;]">
                            <?= img(['src' => $product->thumbnail, 'class' => 'uk-object-cover uk-display-block uk-width-1-1'], true) ?>
                        
                            <a class="uk-position-absolute uk-width-1-1 uk-height-1-1" data-style="top: 0; left: 0;" href="<?= baseUrl("product/{$product->url}") ?>"></a>
                        </div>
                        
                        <div class="uk-card-body">
                            <h3 data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 16px]" class="uk-card-title uk-margin-remove">
                                <a class="uk-link-reset" href="<?= baseUrl("product/{$product->url}") ?>"><?= $product->title ?></a>
                            </h3>
                            
                            <?php if (strlen($product->constructorurl)): ?>
                            <a class="uk-text-small uk-flex uk-flex-middle uk-margin-small-top" target="_blank" href="<?= $product->constructorurl ?>">
                                <?= App\Engine\Libraries\Languages::translate('trans.configurator') ?>
                                <span uk-icon="icon: arrow-right;"></span>
                            </a>
                            <?php endif; ?>
                            
                            <?php if (strlen($product->details)): ?>
                            <hr>
                            <p class="uk-text-small"><?= nl2br($product->details) ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="uk-card-footer">
                            <a href="<?= baseUrl("product/{$product->url}") ?>" class="uk-button uk-button-text"><?= App\Engine\Libraries\Languages::translate('trans.read_more') ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        
        <?php if ($products->pager): ?>
        <div class="uk-margin-large-top uk-flex uk-flex-center">
            <?= $products->pager ?>
        </div>
        <?php endif; ?>
        
    </div>
</section>

<?php $this->stop() ?>