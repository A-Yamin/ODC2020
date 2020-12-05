<?php

use abdualiym\cms\entities\Articles;
use abdualiym\language\Language;
use yii\helpers\StringHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $article Articles */
/* @var $related Articles */

$this->title = Language::get($article->category, 'title');
$this->params['breadcrumbs'][] = ['label' => Language::get($article->category, 'title'), 'url' => ['blog/index', 'slug' => $article->category->slug]];
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="postcontent nobottommargin clearfix">
    <div class="single-post nobottommargin">
        <div class="entry clearfix">

            <div class="entry-title">
                <h2><?= Language::get($article, 'title') ?></h2>
            </div>

            <ul class="entry-meta clearfix">
                <li><i class="icon-calendar3"></i> <?= Yii::$app->formatter->asDate($article->date, "php:d mm Y") ?></li>
                <li><a href="#"><i class="icon-user"></i> admin</a></li>
                <li><i class="icon-tags"></i> <a href="#"><?= Language::get($article->category, 'title') ?></a></li>
            </ul>

            <div class="entry-image">
                <a href="<?= $article->getUploadedFileUrl('photo') ?>" data-lightbox="image">
                    <img class="image_fade" src="<?= $article->getThumbFileUrl('photo', 'thumb') ?>" alt="Blog Single">
                </a>
            </div>

            <div class="entry-content notopmargin">
                <?= Language::get($article, 'content') ?>
                <div class="clear"></div>

                <div class="si-share noborder clearfix">
                    <span><?= Yii::t('app', 'Share this Post') ?>:</span>
                    <div>
                        <a href="#" class="social-icon si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        <a href="#" class="social-icon si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                        <a href="#" class="social-icon si-borderless si-pinterest">
                            <i class="icon-pinterest"></i>
                            <i class="icon-pinterest"></i>
                        </a>
                        <a href="#" class="social-icon si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>
                        <a href="#" class="social-icon si-borderless si-twitter">
                            <i class="icon-telegram-plane"></i>
                            <i class="icon-telegram-plane"></i>
                        </a>
                        <a href="#" class="social-icon si-borderless si-email3">
                            <i class="icon-email3"></i>
                            <i class="icon-email3"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <h4><?=Yii::t('app','Related Posts')?>:</h4>

        <div class="related-posts clearfix">

            <div class="col_half nobottommargin">

                <?php foreach ($related as $r): ?>

                    <div class="mpost clearfix">
                        <div class="entry-image">
                            <a href="<?= Url::to(['blog/view', 'slug' => $r->slug]) ?>"><img src="<?= $r->getThumbFileUrl('photo', 'thumb') ?>" alt="<?= Language::get($r, 'title') ?>"></a>
                        </div>
                        <div class="entry-c">
                            <div class="entry-title">
                                <h4><a href="<?= Url::to(['blog/view', 'slug' => $r->slug]) ?>"><?= Language::get($article, 'title') ?></a></h4>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> <?= Yii::$app->formatter->asDate($r->date, "php:d mm Y") ?></li>
                            </ul>
                            <div class="entry-content"><?= StringHelper::truncate(strip_tags(Language::getAttribute($r, 'content')), 70, '...') ?></div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>
