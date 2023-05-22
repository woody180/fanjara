<ul class="uk-navbar-nav">
    <li class="uk-active"><a href="<?= baseUrl() ?>">მთავარი</a></li>
    <li>
        <a href="#">პროდუქცია <span uk-navbar-parent-icon></span> </a>
        <div class="uk-navbar-dropdown">
            <ul class="uk-nav uk-navbar-dropdown-nav">
                <?php foreach (initModel('Productcategory')->list() as $pc): ?>
                <li><a href="<?= baseUrl("productcategory/{$pc->url}") ?>"><?= $pc->title ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </li>
    <li><a href="<?= baseUrl("get-in-touch") ?>">სერვისი <span uk-navbar-parent-icon></span> </a>
        <div class="uk-navbar-dropdown">
            <ul class="uk-nav uk-navbar-dropdown-nav">
                <li><a href="<?= baseUrl("page/consulting") ?>">კონსულტაცია</a></li>
                <li><a href="<?= baseUrl("page/projects") ?>">პროექტები</a></li>
            </ul>
        </div>
    </li>
    <li><a href="<?= baseUrl("get-in-touch") ?>">კომპანია <span uk-navbar-parent-icon></span></a>
        <div class="uk-navbar-dropdown">
            <ul class="uk-nav uk-navbar-dropdown-nav">
                <li><a href="<?= baseUrl("page/about") ?>">ჩვენს შესახებ</a></li>
                <li><a href="<?= baseUrl("page/vacancies") ?>">ვაკანსია</a></li>
                <li><a href="<?= baseUrl("page/partners") ?>">პარტნიორები</a></li>
            </ul>
        </div>
    </li>
    <li class="uk-active"><a href="<?= baseUrl("page/contact") ?>">კონტაქტი</a></li>
</ul>