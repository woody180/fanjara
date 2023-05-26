<?php $this->layout('partials/template', [
    'title' => APPNAME . ' - ' . App\Engine\Libraries\Languages::translate(['ge' => 'პროექტები', 'en' => 'Projects', 'ru' => 'Проекты'])
]) ?>


<?php $this->start('mainSection') ?>

<section id="projects-section" class="uk-section" data-style="background: #f0f0f0;">
    <div class="uk-container min-height">
      
        <div class="uk-grid-match uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2" uk-grid="masonry: true">
            <?php foreach ($projects->data as $project): ?>

                <div>
                    <div class="fg-project-dir uk-card uk-card-hover uk-background-default uk-border-rounded uk-card-body uk-position-relative">
                        
                        <?php if (checkAuth([1])): ?>
                        <div class="admin-buttons">
                            <a href="<?= baseUrl("projects/{$project->id}/edit") ?>" uk-icon="icon: pencil;" uk-tooltip="pos: right; title: Edit;" class="uk-icon-button"></a>
                            
                            <form method="POST" action="<?= baseUrl("projects/{$project->id}") ?>" uk-icon="icon: trash;" uk-tooltip="pos: right; title: Delete;" class="uk-icon-button uk-cursor-pointer">
                                <?= setMethod('delete') ?>
                                <button onclick="return confirm('Are you sure?')" type="submit"></button>
                            </form>
                        </div>
                        <?php endif; ?>

                        <?= img(['src' => $project->cover, 'class' => 'my-class'], true) ?>

                        <div class="uk-position-z-index">
                            <span uk-icon="icon: album" ratio="3"></span>

                            <a href="<?= baseUrl("projects/{$project->url}") ?>" class="project-dir uk-position-absolute uk-position-top-left uk-width-1-1" data-style="height: 100%;"></a>

                            <h3 class="uk-card-title uk-margin-remove-top">
                                <a href="<?= baseUrl("projects/{$project->url}") ?>" class="uk-link-reset heading-font"><?= $project->title ?></a>
                            </h3>
                            <p></p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        
        
        <?php if ($projects->pager): ?>
        <div class="uk-margin-large-top uk-flex uk-flex-center">
            <?= $projects->pager ?>
        </div>
        <?php endif; ?>
        
    </div>
</section>

<?php $this->stop() ?>