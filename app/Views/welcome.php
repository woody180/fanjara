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
        
        <div class="uk-text-center uk-text-small uk-card uk-card-body uk-border-rounded uk-width-3-4@m uk-margin-auto">
            <div class="uk-margin-medium-bottom">
                <h1>
                    <?= App\Engine\Libraries\Languages::translate([
                        'ge' => 'ჩვენ შესახებ',
                        'en' => 'About us',
                        'ru' => 'О нас',
                    ]) ?>
                </h1>
                <hr class="uk-divider-small">
                <p>
                    <?= App\Engine\Libraries\Languages::translate([
                        'ge' => 'კომპანია “ა-ვე ლუქსი” პროფესიონალთა გუნდმა დააარსა. აველუქსმა ბინა ვაკეში, კეკელიძის No2-ში დაიდო. კომპანიამ პირველივე დღიდან აქცენტი ისეთი მაღალხარისხიანი პროდუქციის წარმოებაზე გააკეთა, როგორიცაა გერმანული მეტალოპლასმასის კარ-ფანჯარა რეჰაუ. 2009 წელს კომპანიას მიენიჭა REHAU-ს ლიცენზირებული მწარმოებლის სტატუსი (#63762901), რაც იმას ნიშნავს რომ აქ ვერ შეხვდებით ფალსიფიკაციას. აბსოლუტურად ყველა ფანჯარა კომპლექტდება REHAU-ს 1,5 ან 2,0 მმ-იანი არმირებით და REHAU-ს შემამჭიდროვებლებით (რეზინით), რომელიც უნიკალური ტექნოლოგიის წყალობით, მაქსიმალური ჰერმეტულობის გარანტიაა.',
                        'en' => 'The company "A-ve Lux" was founded by a team of professionals. Avelux placed an apartment in Vake, Kekelidze No. 2. From the very first day, the company focused on the production of such high-quality products as German metalloplasma door-window Rehau. In 2009, the company was granted the status of REHAU licensed manufacturer (#63762901), which means that you will not encounter counterfeits here. Absolutely all windows are equipped with REHAU 1.5 or 2.0 mm reinforcements and REHAU sealings (rubber), which, thanks to the unique technology, guarantee maximum tightness.',
                        'ru' => 'Компания «А-ве Люкс» была основана командой профессионалов. Avelux разместил квартиру в Ваке, Кекелидзе №2. С самого первого дня компания сосредоточилась на выпуске такой качественной продукции, как немецкие металлоплазменные двери-окна Rehau. В 2009 году компания получила статус лицензированного производителя REHAU (#63762901), а это значит, что с подделками вы здесь не столкнетесь. Абсолютно все окна оснащены армированием REHAU 1,5 или 2,0 мм и уплотнителями REHAU (резиновыми), которые благодаря уникальной технологии гарантируют максимальную герметичность.',
                    ]) ?>
                </p>
                
                <div class="uk-flex uk-flex-center">
                    <a href="<?= baseUrl("page/about") ?>" class="uk-button-icon uk-button-icon-right">
                        <span uk-icon="icon: arrow-right;"></span>
                        <span><?= App\Engine\Libraries\Languages::translate('trans.read_more') ?></span>
                    </a>
                </div>
            </div>
        </div>

        <!--<div class="fj-category-grid">-->
        <div class="uk-grid-match uk-grid-medium" uk-grid>
            
            <div class="uk-width-1-2@s">
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
            
            <div class="uk-width-1-2@s">
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
            <h1>Headline</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, placeat, odit, quaerat id dolor minima consectetur aut fugiat delectus tenetur ratione blanditiis provident vitae modi suscipit quidem doloremque porro nihil!</p>
        </div>
    </div>

</div>



<?= $this->insert('partials/contact') ?>


<?php $this->stop() ?>