<div id="fg-mobile-nav-offcanvas" uk-offcanvas="overlay: true;">
    <div class="uk-offcanvas-bar">

        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <div id="fg-mobile-nav">
            <?= $this->insert('partials/navigation') ?>
        </div>
        
        <div class="uk-margin-medium-top uk-text-uppercase">
            <a href="<?= URLROOT . '/ge' ?>" class="uk-icon-button uk-margin-small-right">ge</a>
            <a href="<?= URLROOT . '/ru' ?>" class="uk-icon-button uk-margin-small-right">ru</a>
            <a href="<?= URLROOT . '/en' ?>" class="uk-icon-button">en</a>
        </div>
    </div>
</div>