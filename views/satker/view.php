<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Satker */

$this->title = $model->nama_satker;
$this->params['breadcrumbs'][] = ['label' => 'Satkers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="satker-view">

    <div class="card card-primary card-outline">
        <div class="card-header">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id_satker], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id_satker], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
                <?= Html::a('Data Satker', ['index'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'id_satker',
                    'nama_satker',
                ],
            ]) ?>
        </div>
    </div>
</div>