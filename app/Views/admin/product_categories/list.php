<?php $this->layout('partials/template') ?>


<?= $this->start('mainSection') ?>
<section class="uk-section">
    <div class="uk-container min-height">
        
        
        <div class="uk-flex uk-flex-between uk-flex-middle">
            <h3 class="uk-margin-remove"><?= App\Engine\Libraries\Languages::translate('trans.product_categories') ?></h3>
            
            <a href="<?= baseUrl("page/new") ?>" class="uk-button uk-button-icon uk-button-icon-right uk-button-secondary">
                <span uk-icon="icon: plus"></span>
                <span><?= App\Engine\Libraries\Languages::translate('trans.create') ?></span>
            </a>
        </div>
        

        <ul class="uk-list uk-list-striped">
            <?php foreach ($categories->data as $category): ?>
            <li>
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <div><?= $category->title ?></div>
                    
                    <div class="uk-flex">
                        
                        <span class="uk-icon-button uk-margin-small-right uk-text-xsmall uk-text-uppercase"><?= $category->lang ?></span>
                        
                        <a target="_blank" class="uk-icon-button uk-margin-small-right" href="<?= baseUrl("productcategory/{$category->url}") ?>" uk-icon="icon: pencil;"></a>
                        
                        <form action="<?= baseUrl("productcategory/{$category->id}") ?>" method="POST" onclick="return confirm('Are you sure?')">
                            <?= setMethod('delete') ?>
                            <button uk-icon="icon: trash;" class="uk-icon-button"></button>
                        </form>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        
        
        
        <?php if ($categories->pager): ?>
        <div class="uk-flex uk-flex-center uk-margin-large-top">
            <?= $categories->pager ?>
        </div>
        <?php endif; ?>


    </div>
</section>
<?= $this->stop(); ?>
