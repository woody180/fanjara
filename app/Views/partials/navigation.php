<div class="uk-flex uk-flex-middle">
    <div id="fj-navigation" class="uk-flex uk-flex-middle" data-responsive="max-width[<?= M_WIDTH ?>]; style[display: block;]">
        <ul class="uk-navbar-nav">
            <li><a class="ln-parse" href="<?= baseUrl() ?>">{{[en="Home"][ge="მთავარი"][ru="Главная страница"]}}</a></li>
            <li>
                <a href="#">{{ [ge="პროდუქცია"][en="Products"][ru="Продукты"] }} <span uk-navbar-parent-icon></span> </a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <?php foreach (initModel('Productcategory')->list() as $pc): ?>
                        <li><a href="<?= baseUrl("productcategory/{$pc->url}") ?>"><?= $pc->title ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </li>
            <li><a href="#"> <span class="ln-parse">{{[en="Services"][ge="სერვისი"][ru="Сервисы"]}}</span> <span uk-navbar-parent-icon></span> </a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="<?= baseUrl("page/consulting") ?>" class="ln-parse">{{ [en="Consulting"][ge="კონსულტაცია"][ru="Консультация"] }}</a></li>
                        <li><a href="<?= baseUrl("projects") ?>">{{ [en="Projects"][ge="პროექტები"][ru="проекты"] }}</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#">{{[ge="კომპანია"][en="Company"][ru="Компания"]}} <span uk-navbar-parent-icon></span></a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="<?= baseUrl("page/about") ?>">{{ [ge="ჩვენს შესახებ"][en="About us"][ru="О нас"] }}</a></li>
                        <li><a href="<?= baseUrl("page/vacancies") ?>">{{ [ge="ვაკანსია"][en="Vacancy"][ru="Вакансия"] }}</a></li>
                        <li><a href="<?= baseUrl("page/partners") ?>">{{ [ge="პარტნიორები"][en="Partners"][ru="Партнеры"] }}</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="<?= baseUrl("page/contact") ?>">{{ [ge="კონტაქტი"][en="Contact us"][ru="Связаться с нами"] }}</a></li>
        </ul>
    </div>


    <div class="uk-visible@m">
        <a href="#" class="uk-button fj-lang-switch-btn">
            <span><?= \App\Engine\Libraries\Languages::active() ?></span>
        </a>

        <div class="uk-position-absolute uk-width-small uk-card uk-padding-small uk-card-default uk-position-z-index uk-overflow-hidden uk-border-rounde uk-margin-top" id="language-switcher-list" uk-dropdown="mode: click">
            <ul class="uk-list uk-list-divider uk-margin-remove">
                <?php foreach (\App\Engine\Libraries\Languages::list() as $lang): ?>
                    <li>
                        <a href="<?= baseUrl("language/switch/{$lang->code}") ?>" class="uk-flex uk-flex-between uk-flex-middle">
                            <div class="lf"><?= img(['src' => "images/flags/{$lang->code}.png", 'width' => 22]) ?></div>
                            <div class="lc uk-text-uppercase uk-text-small"><?= $lang->code ?></div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>

    </div>
</div>