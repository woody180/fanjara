<?php $this->layout('partials/template') ?>

<?php $this->start('mainSection') ?>

<?php if (initModel('slider')->list()): ?>
<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="min-height: 400; max-height: 700; autoplay: true; autoplay-interval: 5000; pause-on-hover: false;">

    <ul class="uk-slideshow-items">
        <?php foreach (initModel('slider')->list() as $slide): ?>
        <li>
            <?php if ($slide->url): ?>
            <a target="_blank" href="<?= $slide->url ?>" class="uk-position-absolute" data-style="z-index: 2; left: 0; top: 0; width: 100%; height: 100%"></a>
            <?php endif; ?>
            
            <img src="<?= assetsUrl("tinyeditor/filemanager/files/{$slide->slide}") ?>" alt="" uk-cover>
            <div <?= (strlen($slide->description) < 1 && strlen($slide->title) < 1 ) ? 'hidden' : ''  ?> class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center">
                <h3 <?= (strlen($slide->title) < 1) ? 'hidden' : ''  ?> class="uk-margin-remove"><?= $slide->title ?></h3>
                <p <?= (strlen($slide->description) < 1) ? 'hidden' : ''  ?> class="uk-margin-remove"><?= $slide->description ?></p>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

</div>
<?php endif; ?>


<section class="uk-section">
    <div class="uk-container">

        <!--<div class="fj-category-grid">-->
        <div class="uk-grid-match uk-grid-medium" uk-grid>
            
            <div class="uk-width-2-3@m uk-width-1-2@s">
                <div class="uk-card uk-card-body uk-height-medium uk-position-responsive uk-border-rounde uk-overflow-hidden uk-light uk-overflow-hidden uk-border-rounded" data-bg-color="#F2F2F2" data-bg="<?= assetsUrl("tinyeditor/filemanager/files/{$categories[0]->banner}") ?>" bg-size="cover" bg-position="bottom right">
                    <a href="<?= baseUrl("productcategory/{$categories[0]->url}") ?>" class="layer-film"></a>
                    
                    <a href="<?= baseUrl("productcategory/{$categories[0]->url}") ?>" class="uk-position-relative uk-position-z-index uk-link-reset uk-flex uk-height-1-1" data-style="flex-flow: wrap; align-content: space-between;">
                        <h3 data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 18px;]" class="uk-width-1-1"><?= $categories[0]->title ?></h3>
                        
                        <button class="uk-button uk-button-default uk-button-icon uk-button-icon-right">
                            <span uk-icon="icon: arrow-right"></span>
                            <span data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 12px;]"><?= App\Engine\Libraries\Languages::translate('trans.read_more') ?></span>
                        </button>
                    </a>
                </div>
            </div>
            
            <div class="uk-width-1-3@m uk-width-1-2@s">
                <div class="uk-card uk-card-body uk-height-medium uk-position-responsive uk-border-rounde uk-overflow-hidden uk-light uk-overflow-hidden uk-border-rounded" data-bg-color="#F2F2F2" data-bg="<?= assetsUrl("tinyeditor/filemanager/files/{$categories[4]->banner}") ?>" bg-size="cover" bg-position="bottom right">
                    <a href="<?= baseUrl("productcategory/{$categories[4]->url}") ?>" class="layer-film"></a>
                    
                    <a href="<?= baseUrl("productcategory/{$categories[4]->url}") ?>" class="uk-position-relative uk-position-z-index uk-link-reset uk-flex uk-height-1-1" data-style="flex-flow: wrap; align-content: space-between;">
                        <h3 data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 18px;]" class="uk-width-1-1"><?= $categories[4]->title ?></h3>
                        
                        <button class="uk-button uk-button-default uk-button-icon uk-button-icon-right">
                            <span uk-icon="icon: arrow-right"></span>
                            <span data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 12px;]"><?= App\Engine\Libraries\Languages::translate('trans.read_more') ?></span>
                        </button>
                    </a>
                </div>
            </div>
            
            
            
            
            
            <div class="uk-width-1-3@m uk-width-1-2@s">
                <div class="uk-card uk-card-body uk-height-medium uk-position-responsive uk-border-rounde uk-overflow-hidden uk-light uk-overflow-hidden uk-border-rounded" data-bg-color="#F2F2F2" data-bg="<?= assetsUrl("tinyeditor/filemanager/files/{$categories[3]->banner}") ?>" bg-size="cover" bg-position="bottom right">
                    <a href="<?= baseUrl("productcategory/{$categories[3]->url}") ?>" class="layer-film"></a>
                    
                    <a href="<?= baseUrl("productcategory/{$categories[3]->url}") ?>" class="uk-position-relative uk-position-z-index uk-link-reset uk-flex uk-height-1-1" data-style="flex-flow: wrap; align-content: space-between;">
                        <h3 data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 18px;]" class="uk-width-1-1"><?= $categories[3]->title ?></h3>
                        
                        <button class="uk-button uk-button-default uk-button-icon uk-button-icon-right">
                            <span uk-icon="icon: arrow-right"></span>
                            <span data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 12px;]"><?= App\Engine\Libraries\Languages::translate('trans.read_more') ?></span>
                        </button>
                    </a>
                </div>
            </div>
            
            <div class="uk-width-1-3@m uk-width-1-2@s">
                <div class="uk-card uk-card-body uk-height-medium uk-position-responsive uk-border-rounde uk-overflow-hidden uk-light uk-overflow-hidden uk-border-rounded" data-bg-color="#F2F2F2" data-bg="<?= assetsUrl("tinyeditor/filemanager/files/{$categories[2]->banner}") ?>" bg-size="cover" bg-position="bottom right">
                    <a href="<?= baseUrl("productcategory/{$categories[2]->url}") ?>" class="layer-film"></a>
                    
                    <a href="<?= baseUrl("productcategory/{$categories[2]->url}") ?>" class="uk-position-relative uk-position-z-index uk-link-reset uk-flex uk-height-1-1" data-style="flex-flow: wrap; align-content: space-between;">
                        <h3 data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 18px;]" class="uk-width-1-1"><?= $categories[2]->title ?></h3>
                        
                        <button class="uk-button uk-button-default uk-button-icon uk-button-icon-right">
                            <span uk-icon="icon: arrow-right"></span>
                            <span data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 12px;]"><?= App\Engine\Libraries\Languages::translate('trans.read_more') ?></span>
                        </button>
                    </a>
                </div>
            </div>
            
            <div class="uk-width-1-3@m uk-width-1-2@s">
                <div class="uk-card uk-card-body uk-height-medium uk-position-responsive uk-border-rounde uk-overflow-hidden uk-light uk-overflow-hidden uk-border-rounded" data-bg-color="#F2F2F2" data-bg="<?= assetsUrl("tinyeditor/filemanager/files/{$categories[1]->banner}") ?>" bg-size="cover" bg-position="bottom right">
                    <a href="<?= baseUrl("productcategory/{$categories[1]->url}") ?>" class="layer-film"></a>
                    
                    <a href="<?= baseUrl("productcategory/{$categories[1]->url}") ?>" class="uk-position-relative uk-position-z-index uk-link-reset uk-flex uk-height-1-1" data-style="flex-flow: wrap; align-content: space-between;">
                        <h3 data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 18px;]" class="uk-width-1-1"><?= $categories[1]->title ?></h3>
                        
                        <button class="uk-button uk-button-default uk-button-icon uk-button-icon-right">
                            <span uk-icon="icon: arrow-right"></span>
                            <span data-responsive="max-width[<?= M_WIDTH ?>]; style[font-size: 12px;]"><?= App\Engine\Libraries\Languages::translate('trans.read_more') ?></span>
                        </button>
                    </a>
                </div>
            </div>



            
            
        </div>
    
    </div>
</section>



<div class="uk-position-relative uk-height-medium uk-background-cover uk-light uk-flex uk-flex-middle" uk-parallax="bgy: 200" style="background-image: url('https://www.okna.ru/local/templates/kaleva/images/new-index/25years.webp');">
    <div class="layer-film"></div>
    <div class="uk-container">
        <div class="uk-width-1-2@m uk-text-center uk-margin-auto uk-margin-auto-vertical uk-position-relative uk-position-z-index">
            <?= App\Engine\Libraries\Languages::translate([
                'ge' => 'ყოველი ჩვენგანი ხომ გამორჩეულია, განსხვავებულია პრიორიტეტებით, თავისი ოცნებებით და სურვილებით.
ასეთივე ნაირფეროვანია ჩვენთან არჩევანი.
მოგვეცეთ საშუალება თქვენი სახლისგან მეტი კომფორტის და სიამოვნების მიღება შთაგაგონოთ.',
                'en' => 'After all, each of us is unique, has different priorities, dreams and desires.
Our selection is just as diverse.
Let us inspire you to get more comfort and pleasure from your home.',
                'ru' => 'Ведь каждый из нас уникален, имеет разные приоритеты, мечты и желания.
Наш ассортимент такой же разнообразный.
Позвольте нам вдохновить вас на получение большего комфорта и удовольствия от вашего дома.'
            ]) ?>
        </div>
    </div>

</div>



<?= $this->insert('partials/contact') ?>


<?php $this->stop() ?>