<section class="uk-section" data-bg-color="#fff">
    <div class="uk-container">
        
        <div class="uk-margin-large-bottom uk-text-center">
            <h1><?= App\Engine\Libraries\Languages::translate('trans.contact_us') ?></h1>
            <hr class="uk-divider-small">
            <p>
                <?=
                    App\Engine\Libraries\Languages::translate([
                        'en' => 'Visit our office for complete information and to place an order.',
                        'ge' => 'ამომწურავი ინფორმაციის მისაღებად და შეკვეთის გასაფორმებლად გვესტუმრეთ ოფისში.',
                        'ru' => 'Посетите наш офис для получения полной информации и оформления заказа.',
                    ]);
                ?>
            </p>
        </div>
        
        
        <div uk-grid class="uk-grid-match">
            
            <div class="uk-width-1-3@m uk-width-1-2@s uk-width-1-1">
                <div class="uk-card uk-card-body uk-background-muted uk-border-rounded">
                    
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
                                <span class="uk-text-small"><?= App\Engine\Libraries\Languages::translate([
                            'ge' => 'თბილისი, წერეთლის 87ზ',
                            'en' => 'Tbilisi, Tsereteli 87Z',
                            'ru' => 'Тбилиси, Церетели 87з',
                        ]) ?></span>
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
                    <p class="uk-margin-small uk-text-small"><?= App\Engine\Libraries\Languages::translate([
                            'ge' => 'ორ.-შაბ. 10:00-19:00 სთ.',
                            'en' => 'Mon.-Sat. 10:00-19:00 h.',
                            'ru' => 'Пн.-Сб. 10:00-19:00',
                        ]) ?></p>
                    <p class="uk-margin-small uk-text-small"><?= App\Engine\Libraries\Languages::translate([
                            'ge' => 'კვირა 11:00-16:00 სთ.',
                            'en' => 'Sunday 11:00-16:00.',
                            'ru' => 'Воскресенье 11:00-16:00.',
                        ]) ?></p>
                </div>
            </div>
            
            
            <div class="uk-width-2-3@m uk-width-1-2@s uk-width-1-1">
                <div class="uk-overflow-hidden uk-border-rounded">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d1488.5581333987327!2d44.782359!3d41.739585!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDHCsDQ0JzIyLjUiTiA0NMKwNDYnNTYuNSJF!5e0!3m2!1ska!2sge!4v1687074950875!5m2!1ska!2sge" width="100%" height="440" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        
    </div>
</section>