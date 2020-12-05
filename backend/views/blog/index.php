<?php

use abdualiym\cms\entities\ArticleCategories;
use abdualiym\language\Language;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $category ArticleCategories */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Language::get($category, 'title');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postcontent nobottommargin clearfix">
    <div id="posts" class="post-timeline clearfix">
        <div class="timeline-border"></div>

        <?php Pjax::begin(); ?>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_blog_item',
            'summary' => ''
        ]) ?>

        <?php Pjax::end(); ?>

    </div>
</div>
