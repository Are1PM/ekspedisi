<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;

$urlData = Url::to(['site/index']);
$js = <<<js
   $("#satker").on("change",function(){
     $.ajax({
       url : "{$urlData}",
       type : "GET",
       data : "id_satker="+$(this).val(),
       success : function(data){
          $("#tabel").html(data);
       }
     });
   });
js;
$this->registerJs($js);
?>
<div class="surat-index">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <p>
                <?= Html::a('<i class="fas fa-plus"></i> Surat', ['surat/create'], ['class' => 'btn btn-primary']) ?>
            </p>
            <div class="col-lg-3 ml-auto">
                <?= Html::dropDownList('Satker', null, $satker, ['class' => 'form-control', 'id' => 'satker', 'prompt' => '- Pilih Satker -']) ?>
            </div>
        </div>


        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <div class="card-body table-responsive">

            <div id="tabel">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => false,
                    'emptyText' => 'Data tidak ditemukan',
                    'filterModel' => $searchModel,
                    'columns' => [
                        [
                            'class' => 'yii\grid\SerialColumn',
                            'header' => 'No',
                            'headerOptions' => ['class' => 'text-center text-primary'],
                            'contentOptions' => ['class' => 'text-center']
                        ],
                        'perihal',
                        'penerima',
                        'foto',

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Aksi',
                            'headerOptions' => ['class' => 'text-center text-primary'],
                            'contentOptions' => ['class' => 'text-center'],
                            'visibleButtons' => [
                                'update' => false,
                                'delete' => false,
                            ]
                        ],
                    ],
                    'pager' => [
                        'class' => 'yii\bootstrap4\LinkPager',
                    ]
                ]); ?>
            </div>
        </div>
        <?php Pjax::end(); ?>
    </div>
</div>