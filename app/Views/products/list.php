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
            
            <a href="https://www.markilux.com/en-de/awning?filters=189612_189613_156791_156795" target="_blank" class="uk-display-block uk-button uk-button-primary uk-button-icon uk-button-icon-right">
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
        
        
        
       
        <div class="uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1 uk-grid-match" uk-grid>
            <?php foreach ($products->data as $product): ?>
                <div>
                    <div class="uk-card uk-card-default uk-overflow-hidden uk-border-rounded">
                        
                        <?php if (checkAuth([1])): ?>
                        <a uk-tooltip="<?= App\Engine\Libraries\Languages::translate('trans.edit') ?>" target="_blank" href="<?= baseUrl("product/{$product->id}/edit") ?>" class="uk-icon-button uk-position-top-left uk-position-z-index uk-margin-left uk-margin-top" uk-icon="icon: link;"></a>
                        <?php endif; ?>
                        
                        <div class="uk-card-media-top uk-position-relative" data-responsive="max-width[<?= M_WIDTH ?>]; style[height: 170px;]">
                            <?= img(['src' => $product->thumbnail, 'class' => 'uk-object-cover uk-display-block uk-width-1-1'], true) ?>
                        
                            <a target="_blank" class="uk-position-absolute uk-width-1-1 uk-height-1-1" data-style="top: 0; left: 0;" href="<?= $product->constructorurl ?>"></a>
                        </div>
                        
                        <div class="uk-card-body">
                            <h3 data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 16px]" class="uk-card-title uk-margin-remove">
                                <a target="_blank" class="uk-link-reset" href="<?= $product->constructorurl ?>"><?= $product->title ?></a>
                            </h3>
                            
                            <?php if (strlen($product->details)): ?>
                            <hr>
                            <p class="uk-text-small"><?= nl2br($product->details) ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="uk-card-footer">
                            <a target="_blank" href="<?= $product->constructorurl ?>" class="uk-button uk-button-text"><?= App\Engine\Libraries\Languages::translate('trans.read_more') ?></a>
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