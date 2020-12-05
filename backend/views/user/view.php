<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->firstname;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'firstname',
            'secount_name',
            'last_name',
            'sex',
            'jshsh',
            'birth_date',
            'seriesParport',
            'email:email',
            [
                'attribute' => 'phone',
                'value' => function ($model) {
                    return Html::a($model->phone,'tel:'.$model->phone);
                },
                'label' => 'Phone',
                'format' => 'raw'
            ],
            [
                'attribute' => 'part_id',
                'value' => function ($model) {
                    return $model->part->name;
                },
                'label' => 'Parties'
            ],
            [
                'attribute' => 'region_id',
                'value' => function ($model) {
                    return $model->region->name;
                },
                'label' => 'Region'
            ],
            'status',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
