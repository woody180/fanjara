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
                        <a href="<?= baseUrl("page/{$page->url}") ?>" uk-icon="icon: pencil;"></a>
                        <form method="POST" uk-icon="icon: trash;">
                            <?= setMethod('DELETE') ?>
                        </form>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>


    </div>
</section>
<?= $this->stop(); ?>
