<?php $this->layout('partials/template', [
    'body_class' => 'init-tinyeditor'
]) ?>


<?= $this->start('scriptsHead') ?>
<script src="<?= assetsUrl('tinyeditor/tinyeditor.js') ?>"></script>
<?= $this->stop() ?>



<?= $this->start('mainSection') ?>

<section class="uk-section">
    <div class="uk-container min-height">
        
        <div class="uk-margin-large-bottom">
            <h3><?= App\Engine\Libraries\Languages::translate('trans.edit_project') ?></h3>
            <hr class="uk-divider-small">
        </div>
        
        
        <?php if (hasFlashData('success')): ?>
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= getFlashData('success') ?></p>
        </div>
        <?php endif; ?>
        
        <form enctype="multipart/form-data" action="<?= baseUrl("projects/{$project->id}") ?>" class="uk-child-width-1-1" method="post" uk-grid>
            <?= setMethod('put') ?>
            
            <div>
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.title') ?></label>
                <input class="uk-input uk-border-rounded" type="text" name="title" value="<?= $project->title ?>" />
                <?= show_error('errors', 'title') ?>
            </div>
            
            
            <div>
                <label for="" class="uk-form-label"><?= App\Engine\Libraries\Languages::translate('trans.set_language') ?></label>
                <select name="lang" id="" class="uk-select uk-border-rounded">
                    <?php foreach (App\Engine\Libraries\Languages::list() as $lang): ?>
                    <option <?= $lang->code == $project->lang ? 'selected' : '' ?> value="<?= $lang->code ?>"><?= $lang->language ?></option>
                    <?php endforeach; ?>
                </select>
                <?= show_error('errors', 'lang') ?>
            </div>
            
            
            <div class="uk-width-1-2">
                <div id="fg-filemanager-cover" class="js-upload uk-placeholder uk-text-center uk-margin-remove uk-cursor-pointer uk-border-rounded">
                    <input id="cover-hidden-input" type="hidden" value="<?= $project->cover ?>" name="cover">
                    <span uk-icon="icon: cloud-upload"></span>
                    <div>
                        <span class="uk-link">Cover image from here</span>
                        <span class="uk-display-block" id="selected-cover"></span>
                    </div>
                </div>
                <?= show_error('errors', 'cover') ?>
            </div>
            
            
            <div class="uk-width-1-2">
                <div id="fg-filemanager-project" class="js-upload uk-placeholder uk-text-center uk-margin-remove uk-cursor-pointer uk-border-rounded">
                    <input id="gallery-hidden-input" type="hidden" value="<?= $project->gallery ?>" name="gallery">
                    <span uk-icon="icon: cloud-upload"></span>
                    <div>
                        <span class="uk-link">Upload gallery files from here</span>
                        <span class="uk-display-block" id="selected-images"></span>
                    </div>
                </div>
                <?= show_error('errors', 'gallery') ?>
            </div>
            
            
            <div>
                <div uk-grid class="uk-grid-small uk-grid-match" id="projects-sort" uk-sortable>
                    <?php foreach (explode(',', $project->gallery) as $index => $imgPath): ?>
                    <li data-img="<?= $imgPath ?>">
                        <div class="uk-position-relative uk-border-rounded uk-card uk-card-default uk-card-body uk-text-center" data-bg="<?= assetsUrl("tinyeditor/filemanager/files/{$imgPath}") ?>">
                            <a data-index="<?= $index ?>" href="#" uk-icon="icon: trash;" class="uk-icon-button fj-project-image-trash"></a>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div>
                <button class="uk-button uk-button-secondary uk-width-1-1"><?= App\Engine\Libraries\Languages::translate('trans.update') ?></button>
            </div>
            
        </form>
        
    </div>
</section>

<?= $this->stop(); ?>