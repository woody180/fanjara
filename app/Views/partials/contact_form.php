<form uk-grid class="uk-child-width-1-1" method="POST" action="<?= baseUrl("mail") ?>">
    
    <?= csrf_field() ?>
    
    <div class="uk-width-1-3@m">
        <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.name') ?></label>
        <input name="name" type="text" class="uk-input uk-border-rounded" value="<?= getForm('name') ?>">
        <?= show_error('errors', 'name') ?>
    </div>
    
    <div class="uk-width-1-3@m">
        <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.subject') ?></label>
        <input name="subject" type="text" class="uk-input uk-border-rounded" value="<?= getForm('subject') ?>">
        <?= show_error('errors', 'subject') ?>
    </div>
    
    <div class="uk-width-1-3@m">
        <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.email') ?></label>
        <input name="email" type="text" class="uk-input uk-border-rounded" value="<?= getForm('email') ?>">
        <?= show_error('errors', 'email') ?>
    </div>
    
    <div>
        <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.message') ?></label>
        <textarea name="message" class="uk-textarea uk-border-rounded uk-height-small"><?= getForm('message') ?></textarea>
        <?= show_error('errors', 'message') ?>
    </div>
    
    
    <div>
        <button class="uk-button uk-button-secondary uk-border-rounded uk-width-1-1"><?= App\Engine\Libraries\Languages::translate('trans.send') ?></button>
    </div>
</form>