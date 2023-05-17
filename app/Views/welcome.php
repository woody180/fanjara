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


<section class="uk-section" data-bg-color="#f1f3f5">
    <div class="uk-container">
        
        <div class="uk-margin-medium-bottom">
            <h1><?= App\Engine\Libraries\Languages::translate('trans.our_products') ?></h1>
            <hr class="uk-divider-small">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, veritatis, ipsa, atque sed possimus rem explicabo magni tenetur unde amet quasi eius quidem tempore at nesciunt adipisci vero hic et.</p>
        </div>
        
        <div uk-grid class="uk-grid-match">
            
            <?php foreach ($fakeData as $fd): ?>
            <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-2@s uk-width-1-1">
                <div class="product-card uk-card uk-background-default uk-overflow-hidden uk-border-rounded">
                    <div class="uk-card-media-top" data-responsive="max-width[980]; style[height: 160px]">
                        <img src="<?= $fd['img'] ?>" class="uk-object-cover uk-width-1-1" alt="" />
                    </div>
                    <div class="uk-card-body">
                        <a href="#" class="uk-link-reset uk-margin-small-bottom uk-display-block uk-text-normal"><?= $fd['title'] ?></a>
                        
                        <div class="uk-text-small">
                            <p class="uk-margin-remove">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            
        </div>
        
        
        <div class="uk-width-1-1 uk-flex uk-flex-center uk-margin-medium-top">
            <a href="#" class="uk-button uk-button-primary uk-button-icon uk-button-icon-right">
                <span uk-icon="icon: arrow-right"></span>
                <span><?= App\Engine\Libraries\Languages::translate('trans.read_more') ?></span>
            </a>
        </div>
    
    </div>
</section>









<section class="uk-section" data-bg-color="#fff">
    <div class="uk-container">
        
        <div class="uk-margin-medium-bottom">
            <h1><?= App\Engine\Libraries\Languages::translate('trans.contact_us') ?></h1>
            <hr class="uk-divider-small">
            <p>ამომწურავი ინფორმაციის მისაღებად და შეკვეთის გასაფორმებლად გვესტუმრეთ ოფისში.</p>
        </div>
        
        
        <div uk-grid class="uk-grid-match">
            
            <div class="uk-width-1-3@m uk-width-1-2@s uk-width-1-1">
                <div class="uk-card uk-card-body uk-background-muted uk-border-rounded">
                    
                    <p class="uk-text-bold"><?= App\Engine\Libraries\Languages::translate('trans.info') ?></p>
                    
                    <ul class="uk-list uk-list-striped">
                        <li>
                            <div class="uk-flex uk-flex-middle uk-flex-top">
                                <span uk-icon="icon: receiver" class="uk-display-inline-block uk-margin-right"></span>
                                <span class="uk-text-small">+995(32) 223 80 60</span>
                            </div>
                        </li>
                        
                        <li>
                            <div class="uk-flex uk-flex-middle uk-flex-top">
                                <span uk-icon="icon: mail" class="uk-display-inline-block uk-margin-right"></span>
                                <span class="uk-text-small">info@fanjara.ge</span>
                            </div>
                        </li>
                        
                        <li>
                            <div class="uk-flex uk-flex-middle uk-flex-top">
                                <span uk-icon="icon: location" class="uk-display-inline-block uk-margin-right"></span>
                                <span class="uk-text-small">თბილისი, კეკელიძის #2</span>
                            </div>
                        </li>
                    </ul>
                    
                    
                    <p class="uk-margin-small uk-text-small">ამომწურავი ინფორმაციის მისაღებად და შეკვეთის გასაფორმებლად გვესტუმრეთ ოფისში.</p>
                    <hr class="uk-divider-small">
                    <p class="uk-margin-small uk-text-small">ორ.-შაბ. 10:00-19:00 სთ.</p>
                    <p class="uk-margin-small uk-text-small">კვირა 11:00-16:00 სთ.</p>
                </div>
            </div>
            
            
            <div class="uk-width-2-3@m uk-width-1-2@s uk-width-1-1">
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2978.0260843619326!2d44.75221231585861!3d41.71995597923521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7d77607df9cdd127!2zNDHCsDQzJzExLjgiTiA0NMKwNDUnMTUuOCJF!5e0!3m2!1sen!2sge!4v1669722182702!5m2!1sen!2sge" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        
    </div>
</section>



<?php $this->stop() ?>