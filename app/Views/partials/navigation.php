<ul class="uk-navbar-nav">
    <li class="uk-active"><a href="<?= baseUrl() ?>">მთავარი</a></li>
    <li><a href="<?= baseUrl("pages/about") ?>">ჩვენ შესახებ</a></li>
    <li>
        <a href="#">კარ-ფანჯრები <span uk-navbar-parent-icon></span> </a>
        <div class="uk-navbar-dropdown">
            <ul class="uk-nav uk-navbar-dropdown-nav">
                <?php foreach (initModel('Productcategory')->list() as $pc): ?>
                <li><a href="<?= baseUrl("productcategory/{$pc->url}") ?>"><?= $pc->title ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </li>
    <li><a href="<?= baseUrl("news") ?>">სიახლეები</a></li>
    <li><a href="<?= baseUrl("get-in-touch") ?>">კონტაქტი</a></li>
</ul>