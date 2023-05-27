<?php $this->layout('partials/template') ?>


<?= $this->start('mainSection') ?>
<section class="uk-section">
    <div class="uk-container min-height">
        
        
        <?php if (hasFlashData('success')): ?>
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= getFlashData('success') ?></p>
        </div>
        <?php endif; ?>
        
        
        <?php if (hasFlashData('message')): ?>
        <div class="uk-alert-primary" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= getFlashData('message') ?></p>
        </div>
        <?php endif; ?>
        
        <?php if (hasFlashData('error')): ?>
        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= getFlashData('error') ?></p>
        </div>
        <?php endif; ?>
        
        <div class="uk-flex uk-flex-between uk-flex-middle">
            <h3 class="uk-margin-remove"><?= App\Engine\Libraries\Languages::translate('trans.product_categories') ?></h3>
            
            <a href="<?= baseUrl("productcategory/new") ?>" class="uk-button uk-button-icon uk-button-icon-right uk-button-secondary">
                <span uk-icon="icon: plus"></span>
                <span><?= App\Engine\Libraries\Languages::translate('trans.create') ?></span>
            </a>
        </div>
        

        <ul class="uk-list uk-list-striped">
            <?php foreach ($slides->data as $slide): ?>
            <li>
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <div><?= $slide->title ?></div>
                    
                    <div class="uk-flex">
                        
                        <span class="uk-icon-button uk-margin-small-right uk-text-xsmall uk-text-uppercase"><?= $slide->lang ?></span>
                        
                        <a class="uk-icon-button uk-margin-small-right" href="<?= baseUrl("slider/{$slide->id}") ?>/edit" uk-icon="icon: pencil;"></a>
                        
                        <form action="<?= baseUrl("slider/{$slide->id}") ?>" method="POST" onclick="return confirm('Are you sure?')">
                            <?= setMethod('delete') ?>
                            <button uk-icon="icon: trash;" class="uk-icon-button"></button>
                        </form>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        
        
        <?php if ($slides->pager): ?>
        <div class="uk-flex uk-flex-center uk-margin-large-top">
            <?= $slides->pager ?>
        </div>
        <?php endif; ?>


    </div>
</section>
<?= $this->stop(); ?>
