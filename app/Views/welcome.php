<?php $this->layout('partials/template') ?>

<?php $this->start('mainSection') ?>

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="min-height: 400; max-height: 700; autoplay: true; autoplay-interval: 5000; pause-on-hover: false;">

    <ul class="uk-slideshow-items">
        <li>
            <img src="https://www.okna.ru/local/templates/kaleva/images/banner/kaleva-motion.webp" alt="" uk-cover>
            <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center">
                <h3 class="uk-margin-remove">Overlay Bottom Right</h3>
                <p class="uk-margin-remove">Lorem ipsum dolor sit amet.</p>
            </div>
        </li>
        <li>
            <img src="https://www.okna.ru/local/templates/kaleva/images/banner/banner-5.webp" alt="" uk-cover>
            
            <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center">
                <h3 class="uk-margin-remove">Overlay Bottom Right</h3>
                <p class="uk-margin-remove">Lorem ipsum dolor sit amet.</p>
            </div>
        </li>
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

</div>


<section class="uk-section">
    <div class="uk-container">
        
        <div class="uk-text-center uk-text-small uk-card uk-card-body uk-border-rounded uk-width-3-4@m uk-margin-auto">
            <div class="uk-margin-medium-bottom">
                <h1>როგორია თქვენი მოთხოვნები?</h1>
                <hr class="uk-divider-small">
                <p class="uk-margin-small">ყოველი ჩვენგანი ხომ გამორჩეულია, განსხვავებულია პრიორიტეტებით, თავისი ოცნებებით და სურვილებით.</p>
                <p class="uk-margin-small">ასეთივე ნაირფეროვანია ჩვენთან არჩევანი.</p>
                <p class="uk-margin-small">მოგვეცით საშუალება თქვენი სახლისგან მეტი კომფორტის და სიამოვნების მიღება შთაგაგონოთ.</p>
            </div>
        </div>

        <div class="fj-category-grid">
            
            <?php foreach (initModel('Productcategory')->list() as $category): ?>
            <div>
                <div class="uk-card uk-card-body uk-height-medium uk-position-responsive uk-border-rounde uk-overflow-hidden uk-light uk-overflow-hidden uk-border-rounded" data-bg-color="#F2F2F2" data-bg="<?= assetsUrl("tinyeditor/filemanager/files/{$category->banner}") ?>" bg-size="contain" bg-position="bottom right">
                    <a href="<?= baseUrl("productcategory/{$category->url}") ?>" class="layer-film"></a>
                    
                    <a href="<?= baseUrl("productcategory/{$category->url}") ?>" class="uk-position-relative uk-position-z-index uk-link-reset uk-flex uk-height-1-1" data-style="flex-flow: wrap; align-content: space-between;">
                        <h3 data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 18px;]" class="uk-width-1-1"><?= $category->title ?></h3>
                        
                        <button class="uk-button uk-button-default uk-button-icon uk-button-icon-right">
                            <span uk-icon="icon: arrow-right"></span>
                            <span data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 12px;]"><?= App\Engine\Libraries\Languages::translate('trans.read_more') ?></span>
                        </button>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
            
        </div>
    
    </div>
</section>



<div class="uk-position-relative uk-height-medium uk-background-cover uk-light uk-flex uk-flex-middle" uk-parallax="bgy: 200" style="background-image: url('https://www.okna.ru/local/templates/kaleva/images/new-index/25years.webp');">
    <div class="layer-film"></div>
    <div class="uk-container">
        <div class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical uk-position-relative uk-position-z-index">
            <h1>Headline</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, placeat, odit, quaerat id dolor minima consectetur aut fugiat delectus tenetur ratione blanditiis provident vitae modi suscipit quidem doloremque porro nihil!</p>
        </div>
    </div>

</div>



<?= $this->insert('partials/contact') ?>


<?php $this->stop() ?>