
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
                            </div>

                            <p>
                                <?=
                                    App\Engine\Libraries\Languages::translate([
                                        'ge' => 'წარმოებაში დანერგილი მაღალი სტანდარტის გამო, 2009 წლიდან დღემდე, <br>რეჰაუ ყოველწლიურად გვანიჭებს ოფიციალური პარტნიორის წოდებას.',
                                        'ru' => 'Благодаря высокому стандарту, внедренному в производство, с 2009 года по настоящее время <br>Rehau ежегодно присуждает нам звание официального партнера.',
                                        'en' => 'Due to the high standard introduced in production, since 2009 until now, <br>Rehau has awarded us the title of official partner every year.',
                                    ]);
                                ?>
                            </p>
                        </div>

                        <div>
                             <span class="uk-label uk-margin-small-right in-margin-bottom@s">
                                <span class="uk-margin-small-right uk-icon" uk-icon="icon: phone; ratio: .7"></span>
                                <a class="uk-link-reset" href="tel:+995(32)2238060">+995 (32) 223 80 60</a>
                            </span>

                            <span class="uk-label in-margin-bottom@s">
                                <span class="uk-margin-small-right uk-icon" uk-icon="icon: mail; ratio: .7"></span>
                                <a class="uk-link-reset" href="mailto:info@fanjara.ge">info@fanjara.ge</a>
                            </span>
                        </div>
                        
                    </div>
                </div>
                
                <div class="fj-footer-columns">
                    <div>
                        <div class="uk-list uk-list-divider uk-margin-remove">
                            <?php foreach (initModel('Productcategory')->list() as $pcl): ?>
                            <li>
                                <a href="<?= baseUrl("productcategory/{$pcl->url}") ?>"><?= $pcl->title ?></a>
                            </li>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div>
                        <div class="uk-list uk-list-divider uk-margin-remove">
                            <li>
                                <a href="<?= baseUrl('page/about') ?>">
                                    <?= App\Engine\Libraries\Languages::translate(['ge' => 'ჩვენ შესახებ', 'en' => 'About us', 'ru' => 'О нас']) ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?= baseUrl('page/vacancies') ?>">
                                    <?= App\Engine\Libraries\Languages::translate(['ge' => 'ვაკანსია', 'en' => 'Vacancy', 'ru' => 'Вакансия']) ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?= baseUrl('page/vacancies') ?>">
                                    <?= App\Engine\Libraries\Languages::translate(['ge' => 'პარტნიორები', 'en' => 'Partners', 'ru' => 'Партнеры']) ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?= baseUrl('page/vacancies') ?>">
                                    <?= App\Engine\Libraries\Languages::translate(['ge' => 'კონსულტაცია', 'en' => 'Consulting', 'ru' => 'Консалтинг']) ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?= baseUrl('page/projects') ?>">
                                    <?= App\Engine\Libraries\Languages::translate(['ge' => 'პროექტები', 'en' => 'Projects', 'ru' => 'Проекты']) ?>
                                </a>
                            </li>
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