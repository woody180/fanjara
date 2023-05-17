
<footer id="footer">
    <div class="uk-section uk-background-secondary uk-light">
        <div class="uk-container">
            <!-- footer content begin -->
            <div class="uk-child-width-1-1 uk-child-width-1-2@m uk-text-small uk-grid-match" uk-grid>
                
                <div>
                    <div class="uk-flex uk-flex-column" data-style="justify-content: space-between;">
                        
                        <div>
                            <div>
                                <div class="uk-first-column">
                                    <img src="<?= assetsUrl("images/logo/avelux-logo.png") ?>" alt="<?= APPNAME ?>" width="200" />
                                </div>
                            </div>

                            <p>Imperium Tower - 15 Kuningan Raya 54th Street<br>14th Floor, Jakarta, DKI 10220, Indonesia</p>
                        </div>

                        <div>
                             <span class="uk-label uk-margin-small-right in-margin-bottom@s">
                                <span class="uk-margin-small-right uk-icon" uk-icon="icon: phone; ratio: .7"></span>
                                1-800-123-4567
                            </span>

                            <span class="uk-label in-margin-bottom@s">
                                <span class="uk-margin-small-right uk-icon" uk-icon="icon: mail; ratio: .7"></span>
                                info@fanjara.ge
                            </span>
                        </div>
                        
                    </div>
                </div>
                
                <div>
                    <h3 class="uk-margin-remove"><?= App\Engine\Libraries\Languages::translate('trans.latest_news') ?></h3>
                    <hr class="uk-divider-small">
                    <ul class="uk-list uk-list-divider uk-link-text">
                        <li><a href="#">UBS rogue trader: 'It could happen again'<span class="uk-float-right uk-visible@m">August 2, 2019</span></a></li>
                        <li><a href="#">Amazon boss Bezos becomes world's third richest<span class="uk-float-right uk-visible@m">July 22, 2019</span></a></li>
                        <li><a href="#">Australia cuts interest rates to historic low<span class="uk-float-right uk-visible@m">July 15, 2019</span></a></li>
                    </ul>
                </div>
                
                <div class="uk-width-1-1 uk-grid-margin uk-first-column">
                    <hr class="uk-margin-top uk-margin-medium-bottom">
                    <div class="uk-child-width-1-1 uk-child-width-1-2@m in-footer-subnav uk-grid" data-uk-grid="">
                        <div class="uk-visible@m uk-first-column">
                            <ul class="uk-subnav" data-uk-margin="">
                                <li class="uk-first-column"><a href="#">Contact Us</a></li>
                                <li><a href="#">Term of Services</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Site Map</a></li>
                            </ul>
                        </div>
                        <div class="uk-text-center uk-text-right@m">
                            <p>fanjara.ge © 2022 All rights reserved</p>
                        </div>
                    </div>          
                </div>
            </div>
            <!-- footer content end -->
        </div>
    </div>
</footer>





    <script src="<?= assetsUrl("js/bootstrapFront.js") ?>" type="module"></script>
    
    <?php if (checkAuth([1])): ?>
        <script src="<?= assetsUrl("js/bootstrapBack.js") ?>" type="module"></script>
    <?php endif; ?>
        
    <?= $this->insert('partials/mobileNav') ?>
        
    <?= $this->insert('partials/phoneBubble') ?>
        
        
    <?php if (checkAuth([1])): ?>
    <?= $this->insert('partials/admin_tools') ?>
    <?php endif; ?>

</body>
</html>