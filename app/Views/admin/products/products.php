<?php $this->layout('partials/template') ?>

<?= $this->start('mainSection') ?>

<section class="uk-section">
    <div class="uk-container min-height">
        
        <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-large-bottom">
            <h3 class="uk-margin-remove"><?= \App\Engine\Libraries\Languages::translate('trans.products') ?></h3>
            
            <div>
                <a href="<?= baseUrl("product/new") ?>" class="uk-button uk-button-primary"><?= \App\Engine\Libraries\Languages::translate('trans.add_product') ?></a>
            </div>
        </div>
        
        
        <ul class="uk-list uk-list-striped">
            <?php foreach ($products->data as $product): ?>
            <li>
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <div><?= $product->title ?></div>
                    
                    <div class="uk-flex">
                        <a href="<?= baseUrl("product/{$product->id}/edit") ?>" uk-icon="icon: pencil;" class="uk-icon-button"></a>
                        <form method="post" action="<?= baseUrl("product/{$product->id}") ?>" onclick="return confirm('Are you sure?')">
                            <?= setMethod('delete') ?>
                            <button uk-icon="icon: trash;" class="uk-icon-button"></button>
                        </form>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        
    </div>
</section>

<?= $this->stop(); ?>
