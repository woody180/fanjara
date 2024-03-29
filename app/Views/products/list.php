<?php $this->layout('partials/template') ?>


<?php $this->start('mainSection') ?>

<section class="uk-section">
    <div class="uk-container min-height">
        
        <?php if (urlSegments('last') == 'markizebi-da-pergola'): ?>
        <div class="uk-flex uk-flex-right uk-margin-medium-bottom" data-responsive="max-width[960]; style[display: block;]">
            <a href="https://www.markilux.com/en-de/service/fabric-finder" target="_blank" class="uk-display-block uk-button uk-button-primary uk-button-icon uk-button-icon-right uk-margin-right" data-responsive="max-width[960]; style[margin-bottom: 15px; margin-right: 0px !important;]">
                <span>
                    <?= 
                        App\Engine\Libraries\Languages::translate([
                            'ge' => 'მარკიზების ქსოვილის შერჩევა',
                            'en' => 'Awning fabric finder',
                            'ru' => 'Селектор тентовой ткани'
                        ]);
                    ?>
                </span>
                <span uk-icon="icon: arrow-right"></span>
            </a>
            
            <a href="https://www.markilux.com/en-de/awning#overview" target="_blank" class="uk-display-block uk-button uk-button-primary uk-button-icon uk-button-icon-right">
                <span>
                    <?= 
                        App\Engine\Libraries\Languages::translate([
                            'ge' => 'მარკიზების მოდელების კონფიგურატორი',
                            'en' => 'Awning models configurator',
                            'ru' => 'Конфигуратор моделей маркиз'
                        ]);
                    ?>
                </span>
                <span uk-icon="icon: arrow-right"></span>
            </a>
        </div>
        <?php endif; ?>
        
        
        
       
        <div id="fj-product-grid" class="uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1 uk-grid-match" uk-grid uk-sortable="handle: .cursor-move">
            <?php foreach ($products->data as $index => $product): ?>
                <div data-index="<?= $product->ordering ?>" data-id="<?= $product->id ?>">
                    <div class="uk-card uk-card-default uk-overflow-hidden uk-border-rounded uk-flex uk-flex-column uk-flex-between">
                        
                        <?php if (checkAuth([1])): ?>
                            <div class="uk-position-absolute uk-position-left-top uk-position-z-index uk-margin-top uk-margin-left">
                                <a uk-tooltip="<?= App\Engine\Libraries\Languages::translate('trans.edit') ?>" target="_blank" href="<?= baseUrl("product/{$product->id}/edit") ?>" class="uk-icon-button" uk-icon="icon: link;"></a>
                                <span uk-icon="icon: move;" class="uk-icon-button uk-margin-small-right cursor-move" data-style="cursor: move;"></span>
                            </div>
                        <?php endif; ?>
                        
                        <div class="uk-card-media-top uk-position-relative" data-responsive="max-width[<?= M_WIDTH ?>]; style[height: 170px;]">
                            <?= img(['src' => $product->thumbnail, 'class' => 'uk-object-cover uk-display-block uk-width-1-1'], true) ?>
                        
                            <?php if ($product->producturl): ?>
                            <a target="_blank" class="uk-position-absolute uk-width-1-1 uk-height-1-1" data-style="top: 0; left: 0;" href="<?= $product->producturl ?>"></a>
                            <?php endif; ?>
                        </div>
                        
                        <div class="uk-card-body">
                            <div>
                                <h3 data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 16px]" class="uk-card-title uk-margin-remove">
                                    <?php if ($product->producturl): ?>
                                    <a target="_blank" class="uk-link-reset" href="<?= $product->producturl ?>"><?= $product->title ?></a>
                                    <?php else: ?>
                                    <p><?= $product->title ?></p>
                                    <?php endif; ?>
                                </h3>
                            </div>
                            
                            <?php if (strlen($product->details)): ?>
                            <hr>
                            <p class="uk-text-small"><?= nl2br($product->details) ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="uk-card-footer uk-position-relative">
                            <a target="_blank" href="<?= $product->constructorurl ?>" class="uk-button uk-button-text"><?= App\Engine\Libraries\Languages::translate('trans.configurator_link') ?></a>
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