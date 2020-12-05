<?php

use abdualiym\cms\entities\Pages;
use abdualiym\language\Language;

/* @var $this yii\web\View */
/* @var $page Pages */

$this->title = Language::get($page, 'title');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="col_full"><?= Language::get($page, 'content') ?></div>
</div>
