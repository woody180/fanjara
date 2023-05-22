<?php $this->layout('partials/template') ?>


<?= $this->start('mainSection') ?>
<section class="uk-section">
    <div class="uk-container min-height">

        <form uk-grid class="uk-child-width-1-1" action="<?= baseUrl("page") ?>" method="POST">
            
            <?= csrf_field() ?>
            
            <div class="uk-width-1-2@m">
                <label for="" class="uk-form-label">*<?= App\Engine\Libraries\Languages::translate('trans.title') ?></label>
                <input type="text" name="title" class="uk-input uk-border-rounded" value="<?= getForm('title') ?>">
                <?= show_error('error', 'title') ?>
            </div>

            <div class="uk-width-1-2@m">
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.url') ?></label>
                <input type="text" name="url" class="uk-input uk-border-rounded" value="<?= getForm('url') ?>">
                <?= show_error('error', 'url') ?>
            </div>

            <div>
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.description') ?></label>
                <textarea name="description" class="uk-textarea uk-border-rounded tiny-area"><?= getForm('description') ?></textarea>
                <?= show_error('error', 'description') ?>
            </div>
            
            <div>
                <button class="uk-button uk-button-secondary uk-width-1-1" type="submit"><?= App\Engine\Libraries\Languages::translate('trans.create') ?></button>
            </div>
        </form>

    </div>
</section>
<?= $this->stop(); ?>
