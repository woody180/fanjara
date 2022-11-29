<div id="main-header">
    <div data-style="padding: 6px 0; background-color: #f3f3f3" class="uk-text-small">
        <div class="uk-container">
            <div uk-grid class="uk-child-width-1-2 uk-grid-collapse">
                <div>
                    <div>თბილისი, კეკელიძის #2</div>
                </div>

                <div>
                    <div class="uk-flex uk-flex-right">
                        <a href="tel:+995322238060" class="uk-link-reset">+995 (32) 223 80 60</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-background-default uk-box-shadow-medium" data-responsive="max-width[980]; style[padding: 15px 0]" uk-sticky>
        <div class="uk-container">
            <nav uk-navbar>

                <div class="uk-navbar-left">
                    <a href="<?= baseUrl() ?>" class="uk-display-block">
                        <img src="https://mx-static.markilux.com/images/81283/storage/master/markilux-logo-rgb-2020.svg" alt="alt" width="200" />
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