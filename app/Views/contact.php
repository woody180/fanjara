<?php $this->layout('partials/template') ?>


<?php $this->start('mainSection') ?>

<div class="banner-header">
    <?= img(['src' => 'images/get-in-touch.jpg']) ?>
</div>

<section class="uk-section">
    <div class="uk-container min-height">
        
        <div class="fj-contact-card uk-card uk-card-default uk-card-body min-height upper uk-border-rounded uk-width-3-4@l uk-width-2-3@m uk-margin-auto uk-text-center">
            <span uk-icon="icon: phone; ratio: 3;"></span>
            
            <div class="uk-flex uk-flex-column uk-flex-between fj-contact-card-inner uk-margin-top">
                <div class="uk-margin">
                    <p class="uk-text-large uk-text-uppercase heading-font">
                    <?= App\Engine\Libraries\Languages::translate([
                        'en' => 'GET IN TOUCH',
                        'ru' => 'Свяжитесь с нами',
                        'ge' => 'დაგვიკავშირდი'
                    ]) ?>
                    </p>
                    <a href="tel:+995(32)2238060">+995 (32) 223 80 60</a>

                    <hr class="uk-divider-icon uk-width-medium uk-margin-auto">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d1488.5581333987327!2d44.782359!3d41.739585!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDHCsDQ0JzIyLjUiTiA0NMKwNDYnNTYuNSJF!5e0!3m2!1sen!2sge!4v1687075211986!5m2!1sen!2sge" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>


                <div class="uk-flex uk-flex-center uk-margin-top">
                    
                    <div class="uk-flex">
                        <a href="#" uk-icon="icon: facebook" class="uk-icon-button uk-margin-small-right"></a>
                        <a href="#" uk-icon="icon: twitter" class="uk-icon-button uk-margin-small-right"></a>
                        <a href="#" uk-icon="icon: instagram" class="uk-icon-button"></a>
                    </div>
                    
                </div>
            </div>
        </div>
        
        
        <div  id="contact-form" data-style="margin-bottom: -145px;" class="uk-margin-medium-top uk-card uk-card-default uk-card-body upper uk-border-rounded uk-width-3-4@l uk-width-2-3@m uk-margin-auto">
            <p class="uk-text-bold"><?= App\Engine\Libraries\Languages::translate('trans.info') ?></p>
                    
            <ul class="uk-list uk-list-striped">
                <li>
                    <div class="uk-flex uk-flex-middle uk-flex-top">
                        <span uk-icon="icon: receiver" class="uk-display-inline-block uk-margin-right"></span>
                        <span class="uk-text-small">+995(32) 223 80 60</span>
                    </div>
                </li>

                <li>
                    <div class="uk-flex uk-flex-middle uk-flex-top">
                        <span uk-icon="icon: mail" class="uk-display-inline-block uk-margin-right"></span>
                        <span class="uk-text-small">info@fanjara.ge</span>
                    </div>
                </li>

                <li>
                    <div class="uk-flex uk-flex-middle uk-flex-top">
                        <span uk-icon="icon: location" class="uk-display-inline-block uk-margin-right"></span>
                        <span class="uk-text-small">
                         <?= App\Engine\Libraries\Languages::translate([
                            'ge' => 'თბილისი, წერეთლის 87ზ',
                            'en' => 'Tbilisi, Tsereteli 87Z',
                            'ru' => 'Тбилиси, Церетели 87з',
                        ]) ?>
                        </span>
                    </div>
                </li>
            </ul>


            <p class="uk-margin-small uk-text-small">
                <?=
                    App\Engine\Libraries\Languages::translate([
                        'en' => 'Visit our office for complete information and to place an order.',
                        'ge' => 'ამომწურავი ინფორმაციის მისაღებად და შეკვეთის გასაფორმებლად გვესტუმრეთ ოფისში.',
                        'ru' => 'Посетите наш офис для получения полной информации и оформления заказа.',
                    ]);
                ?>
            </p>
            <hr class="uk-divider-small">
            <p class="uk-margin-small uk-text-small"> <?= App\Engine\Libraries\Languages::translate([
                            'ge' => 'ორ.-პარ. 10:00-19:00 სთ.',
                            'en' => 'Mon.-fr. 10:00-19:00 h.',
                            'ru' => 'Пн.-Пт. 10:00-19:00',
                        ]) ?></p>
            <p class="uk-margin-small uk-text-small"><?= App\Engine\Libraries\Languages::translate([
                            'ge' => 'შაბათი - კვირა: შეთანხმებით',
                            'en' => 'Saturday - Sunday: by agreement',
                            'ru' => 'суббота-воскресенье: по договоренности',
                        ]) ?></p>
        
        
        
            
            
            <div class="uk-margin-large-top uk-background-muted uk-card uk-card-body uk-border-rounded">
                
                <?php if (hasFlashData('error')): ?>
                <div class="uk-alert-warning" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p><?= getFlashData('error') ?></p>
                </div>
                <?php endif; ?>
                
                
                <?php if (hasFlashData('success')): ?>
                <div class="uk-alert-warning" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p><?= getFlashData('success') ?></p>
                </div>
                <?php endif; ?>

                
                <?= $this->insert('partials/contact_form') ?>
            </div>
        
        </div>
        
    </div>
</section>

<?php $this->stop() ?>