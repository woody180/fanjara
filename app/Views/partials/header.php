<div class="uk-container">
    <nav uk-navbar>
        
        <div class="uk-navbar-left">
            some other stuff
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