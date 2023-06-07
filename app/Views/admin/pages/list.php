<?php $this->layout('partials/template') ?>


<?= $this->start('mainSection') ?>
<section class="uk-section">
    <div class="uk-container min-height">
        
        
        <div class="uk-flex uk-flex-between uk-flex-middle">
            <h3 class="uk-margin-remove"><?= App\Engine\Libraries\Languages::translate('trans.pages') ?></h3>
            
            <a href="<?= baseUrl("page/new") ?>" class="uk-button uk-button-icon uk-button-icon-right uk-button-secondary">
                <span uk-icon="icon: plus"></span>
                <span><?= App\Engine\Libraries\Languages::translate('trans.create') ?></span>
            </a>
        </div>
        

        <ul class="uk-list uk-list-striped">
            <?php foreach ($data->pages as $page): ?>
            <li>
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <div><?= $page->title ?></div>
                    
                    <div class="uk-flex">
                        
                        <span class="uk-icon-button uk-margin-small-right uk-text-xsmall uk-text-uppercase"><?= $page->lang ?></span>
                        
                        <a target="_blank" class="uk-icon-button uk-margin-small-right" href="<?= baseUrl("page/{$page->url}") ?>" uk-icon="icon: pencil;"></a>
                        
                        <form action="<?= baseUrl("page/{$page->id}") ?>" method="POST" onclick="return confirm('Are you sure?')">
                            <?= setMethod('delete') ?>
                            <button uk-icon="icon: trash;" class="uk-icon-button"></button>
                        </form>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        
        
        <?php if ($data->pager): ?>
        <div class="uk-flex uk-flex-center uk-margin-large-top">
            <?= $data->pager ?>
        </div>
        <?php endif; ?>


    </div>
</section>
<?= $this->stop(); ?>
