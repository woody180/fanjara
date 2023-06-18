
<footer id="footer">
    <div class="uk-section uk-background-secondary uk-light">
        <div class="uk-container">
            <!-- footer content begin -->
            <div class="uk-child-width-1-1 uk-child-width-1-2@m uk-text-small uk-grid-match" uk-grid>
                
                <div>
                    <div class="uk-flex uk-flex-column" data-style="justify-content: space-between;">
                        
                        <div>
                            <div>
                                <div class="uk-first-column">
                                    <img id="footer-logo" src="<?= assetsUrl("images/logo/avelux-logo-light.png") ?>" alt="<?= APPNAME ?>" width="300" />
                                </div>
                                
                                <div class="uk-margin-small-top uk-margin-medium-bottom">
                                    <p class="uk-margin-remove">
                                        <?= App\Engine\Libraries\Languages::translate([
                                            'ge' => 'REHAU-ს ოფიციალური პარტნიორი 2009 წლიდან', 
                                            'en' => 'Official partner of REHAU since 2009', 
                                            'ru' => 'Официальный партнер REHAU с 2009 года.']) ?>
                                    </p>
                                    <p class="uk-margin-remove">
                                        <?= App\Engine\Libraries\Languages::translate([
                                            'ge' => 'markilux-ის წარმომადგენელი საქართველოში 2013 წლიდან', 
                                            'en' => 'Markilux representative in Georgia since 2013', 
                                            'ru' => 'Представитель Markilux в Грузии с 2013 года.']) ?>
                                    </p>
                                </div>
                            </div>

                            <p>
                                <?=
                                    App\Engine\Libraries\Languages::translate([
                                        'ge' => 'შპს ავე ლუქსის საკონტაქტო მონაცემები',
                                        'ru' => 'Контактные данные ООО «Аве Люкс»',
                                        'en' => 'Contact details of Ave Lux Ltd',
                                    ]);
                                ?>
                            </p>
                            
                            <hr class="uk-divider-small">
                            
                            <a href="tel:+995322238060" class="uk-display-block uk-margin-bottom uk-link-reset">
                                <span uk-icon="icon: receiver"></span>
                                <span class="uk-display-inline-block uk-margin-small-left">+995(32)223 80 60</span>
                            </a>
                            
                            <a href="mailto:info@fanjara.ge" class="uk-display-block uk-margin-bottom uk-link-reset">
                                <span uk-icon="icon: mail"></span>
                                <span class="uk-display-inline-block uk-margin-small-left">info@fanjara.ge</span>
                            </a>
                        </div>
                        
                    </div>
                </div>
                
                <div class="fj-footer-columns">
                    
                    <div>
                        <div class="uk-list uk-list-divider uk-margin-remove">
                            <h3><?= App\Engine\Libraries\Languages::translate(['ge' => 'სერვისი', 'en' => 'Service', 'ru' => 'Сервис']) ?></h3>
                            
                            <ul class="uk-list">
                                <li>
                                    <a href="<?= baseUrl('page/consultation') ?>">
                                        <?= App\Engine\Libraries\Languages::translate(['ge' => 'კონსულტაცია', 'en' => 'Consultation', 'ru' => 'Консультация']) ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= baseUrl('page/window-configuration') ?>">
                                        <?= App\Engine\Libraries\Languages::translate(['ge' => 'ფანჯრის კონფიგურაცია', 'en' => 'Window configuration', 'ru' => 'Kонфигурация окна']) ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= baseUrl('page/tentis-konfiguratsia') ?>">
                                        <?= App\Engine\Libraries\Languages::translate(['ge' => 'ტენტის კონფიგურაცია', 'en' => 'Tent configuration', 'ru' => 'Конфигурация палатки']) ?>
                                    </a>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                    
                    
                    <div>
                        <div class="uk-list uk-list-divider uk-margin-remove">
                            <h3><?= App\Engine\Libraries\Languages::translate(['ge' => 'ინფორმაცია', 'en' => 'Information', 'ru' => 'Информация']) ?></h3>
                            
                            <ul class="uk-list">
                                <li>
                                    <a href="<?= baseUrl('page/fanjris-shesakheb') ?>">
                                        <?= App\Engine\Libraries\Languages::translate(['ge' => 'ფანჯრის შესახებ', 'en' => 'About the window', 'ru' => 'Об окне']) ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= baseUrl('page/saketebis-shesakheb') ?>">
                                        <?= App\Engine\Libraries\Languages::translate(['ge' => 'საკეტების შესახებ', 'en' => 'About locks', 'ru' => 'О замках']) ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= baseUrl('page/sheminvis-shesakheb') ?>">
                                        <?= App\Engine\Libraries\Languages::translate(['ge' => 'შემინვის შესახებ', 'en' => 'About listening', 'ru' => 'О прослушивании']) ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= baseUrl('page/tentebis-shesakheb') ?>">
                                        <?= App\Engine\Libraries\Languages::translate(['ge' => 'ტენტების შესახებ', 'en' => 'About tents', 'ru' => 'О палатках']) ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= baseUrl('page/frequently-asked-questions') ?>">
                                        <?= App\Engine\Libraries\Languages::translate(['ge' => 'ხშირად დასმული კითხვები', 'en' => 'Frequently Asked Questions', 'ru' => 'Часто задаваемые вопросы']) ?>
                                    </a>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
                
           
            </div>
            <!-- footer content end -->
        </div>
    </div>
</footer>





    <script src="<?= assetsUrl("js/bootstrapFront.js") ?>" type="module"></script>
    
    <?php if (checkAuth([1])): ?>
        <script src="<?= assetsUrl("js/bootstrapBack.js") ?>" type="module"></script>
    <?php endif; ?>
        
    <?= $this->insert('partials/mobileNav') ?>
        
    <?= $this->insert('partials/phoneBubble') ?>
        
        
    <?php if (checkAuth([1])): ?>
    <?= $this->insert('partials/admin_tools') ?>
    <?php endif; ?>
        
        
    <?= $this->section('scriptsFooter') ?>

</body>
</html>