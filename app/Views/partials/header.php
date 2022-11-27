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