<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Parties */

$this->title = 'Create Parties';
$this->params['breadcrumbs'][] = ['label' => 'Parties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parties-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
