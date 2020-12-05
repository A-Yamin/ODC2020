<?php

use abdualiym\cms\entities\Articles;
use abdualiym\language\Language;
use yii\helpers\StringHelper;
use yii\helpers\Url;


/**
 * @var $model Articles
 */
?>

<div class="entry clearfix">
    <div class="entry-timeline">
        <?= Yii::$app->formatter->asDate($model->date, 'php:d') ?><span><?= Yii::$app->formatter->asDate($model->date, 'php:M') ?></span>
        <div class="timeline-divider"></div>
    </div>
    <div class="entry-image">
        <a href="<?= $model->getUploadedFileUrl('photo') ?>" data-lightbox="image">
            <img class="image_fade" src="<?= $model->getThumbFileUrl('photo', 'thumb') ?>" alt="<?= Language::getAttribute($model, 'title') ?>">
        </a>
    </div>
    <div class="entry-title">
        <h2><a href="<?= Url::to(['blog/view', 'slug' => $model->slug]) ?>"><?= Language::getAttribute($model, 'title') ?></a></h2>
    </div>
    <ul class="entry-meta clearfix">
        <li><a href="#"><i class="icon-user"></i> admin</a></li>
        <li><i class="icon-tag"></i> <a href="#"><?= Language::get($model->category, 'title') ?></a></li>
    </ul>
    <div class="entry-content">
        <p><?= StringHelper::truncate(strip_tags(Language::getAttribute($model, 'content')), 150, '...') ?></p>
        <a href="<?= Url::to(['blog/view', 'slug' => $model->slug]) ?>" class="more-link"><?= Yii::t('app', 'Read More') ?></a>
    </div>
</div>
