<div id="main-header" uk-sticky>
    <div data-style="padding: 6px 0; background-color: #f3f3f3; height: 40px;" class="uk-text-small uk-flex uk-flex-middle uk-visible@m">
        <div class="uk-container uk-flex-1">
            <div uk-grid class="uk-child-width-1-2 uk-grid-collapse">
                <div class="uk-flex uk-flex-middle">
                    <div>
                        <?= App\Engine\Libraries\Languages::translate([
                            'ge' => 'თბილისი, წერეთლის 87ზ',
                            'en' => 'Tbilisi, Tsereteli 87Z',
                            'ru' => 'Тбилиси, Церетели 87з',
                        ]) ?>
                    </div>
                </div>

                <div>
                    <div class="uk-flex uk-flex-right uk-flex-middle">
                        
                        <a uk-toggle="target: #call-request" href="#" class="uk-text-bold uk-link-reset uk-margin-right"><?= App\Engine\Libraries\Languages::translate(['ge' => 'მოითხოვე ზარი', 'en' => 'Request Call', 'ru' => 'Заказать звонок']) ?></a>
                        
                        <a href="tel:+995322238060" class="uk-link-reset uk-text-bold">+995 (32) 223 80 60</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-background-default uk-box-shadow-medium" data-responsive="max-width[980]; style[padding: 15px 0]">
        <div class="uk-container">
            <nav uk-navbar>

                <div class="uk-navbar-left">
                    <a href="<?= baseUrl() ?>" class="uk-display-block">
                        <img src="<?= assetsUrl("images/logo/avelux-logo.png") ?>" alt="<?= APPNAME ?>" width="300" />
                    </a>
                </div>

                <div class="uk-navbar-right">

                    <div class="uk-visible@m">
                        <?= $this->insert('partials/navigation') ?>
                    </div>

                    <div class="uk-hidden@m">
                        <a uk-toggle="target: #fg-mobile-nav-offcanvas" href="#" uk-icon="icon: menu; ratio: 1.3" aria-expanded="false"></a>
                    </div>

                </div>

            </nav>
        </div>
    </div>
</div>