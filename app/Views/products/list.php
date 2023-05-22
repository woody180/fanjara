<?php $this->layout('partials/template') ?>


<?php $this->start('mainSection') ?>

<section class="uk-section">
    <div class="uk-container min-height">
       
        <div class="uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1 uk-grid-match" uk-grid>
            <?php foreach ($products->data as $product): ?>
                <div>
                    <div class="uk-card uk-card-default uk-overflow-hidden uk-border-rounded">
                        <div class="uk-card-media-top uk-position-relative" data-responsive="max-width[<?= M_WIDTH ?>]; style[height: 170px;]">
                            <?= img(['src' => $product->thumbnail, 'class' => 'uk-object-cover uk-display-block uk-width-1-1'], true) ?>
                        
                            <a class="uk-position-absolute uk-width-1-1 uk-height-1-1" data-style="top: 0; left: 0;" href="<?= baseUrl("product/{$product->url}") ?>"></a>
                        </div>
                        
                        <div class="uk-card-body">
                            <h3 data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 16px]" class="uk-card-title">
                                <a class="uk-link-reset" href="<?= baseUrl("product/{$product->url}") ?>"><?= $product->title ?></a>
                            </h3>
                            
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