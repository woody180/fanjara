<form action="action" uk-grid class="uk-child-width-1-1" id="call-request-form">
    
    <h3><?= App\Engine\Libraries\Languages::translate([
        'ge' => 'მოითხოვე ზარი',
        'en' => 'Request a call',
        'ru' => 'Закажите звонок'
    ]) ?></h3>

    <div>
        <p class="uk-margin-remove">
            <?= App\Engine\Libraries\Languages::translate([
                'ge' => 'და მენეჯერ-კონსულტანტი დაგიკავშირდებათ უახლოეს მომავალში',
                'en' => 'and our manager-consultant will contact you as soon as possible.',
                'ru' => 'и наш менеджер-консультант свяжется с вами в ближаишее време.'
            ]) ?>
        </p>
    </div>
    
    <div>
        <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.fullname') ?></label>
        <input name="fullname" type="text" class="uk-input uk-border-rounded" value="<?= getForm('fullname') ?>">
        <p hidden class="uk-text-xsmall error-text uk-margin-remove uk-text-danger" id="error-fullname"></p>
    </div>
    
    
    <div>
        <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.phone') ?></label>
        <input name="phone" type="text" class="uk-input uk-border-rounded" value="<?= getForm('phone') ?>">
        <p hidden class="uk-text-xsmall error-text uk-margin-remove uk-text-danger" id="error-phone"></p>
    </div>
    
    <div>
        <button type="submit" id="call-request-button" class="uk-button uk-button-primary uk-width-1-1" type="button"><?= App\Engine\Libraries\Languages::translate([
            'ru' => 'Заказать звонок',
            'ge' => 'ზარის მოთხოვნა',
            'en' => 'Send call request'
        ]) ?></button>
    </div>
    
</form>