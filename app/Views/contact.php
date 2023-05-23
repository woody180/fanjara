<?php $this->layout('partials/template') ?>


<?php $this->start('mainSection') ?>

<div class="banner-header">
    <?= img(['src' => 'images/get-in-touch.jpg']) ?>
</div>

<section class="uk-section">
    <div class="uk-container min-height">
        
        <div class="fj-contact-card uk-card uk-card-default uk-card-body min-height upper uk-border-rounded uk-width-2-3@l uk-width-1-2@m uk-margin-auto uk-text-center">
            <span uk-icon="icon: phone; ratio: 3;"></span>
            
            <div class="uk-flex uk-flex-column uk-flex-between fj-contact-card-inner uk-margin-top">
                <div class="uk-margin">
                    <p class="uk-text-large uk-text-uppercase heading-font">
                    <?= App\Engine\Libraries\Languages::translate([
                        'en' => 'GET IN TOUCH',
                        'ru' => 'Свяжитесь с нами',
                        'ge' => 'დაგვიკავშირდი'
                    ]) ?>
                    </p>
                    <a href="tel:+995(32)2238060">+995 (32) 223 80 60</a>

                    <hr class="uk-divider-icon uk-width-medium uk-margin-auto">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2977.168778950643!2d44.78094669284393!3d41.73845227220213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40447294d9ac56d5%3A0x64f0df4884501d3!2s87%20Akaki%20Tsereteli%20Ave%2C%20T&#39;bilisi!5e0!3m2!1sen!2sge!4v1684833557005!5m2!1sen!2sge" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>


                <div class="uk-flex uk-flex-center uk-margin-top">
                    
                    <div class="uk-flex">
                        <a href="#" uk-icon="icon: facebook" class="uk-icon-button uk-margin-small-right"></a>
                        <a href="#" uk-icon="icon: twitter" class="uk-icon-button uk-margin-small-right"></a>
                        <a href="#" uk-icon="icon: instagram" class="uk-icon-button"></a>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
</section>

<?php $this->stop() ?>