<?php

use yii\widgets\Pjax;
use yeesoft\helpers\Html;
use yeesoft\grid\GridView;
use yeesoft\redirect\models\Redirect;

/* @var $this yii\web\View */
/* @var $searchModel yeesoft\redirect\models\RedirectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yee/redirect', 'Redirects');
$this->params['breadcrumbs'][] = $this->title;
$this->params['description'] = 'YeeCMS 0.2.0';
$this->params['header-content'] = Html::a(Yii::t('yee', 'Add New'), ['create'], ['class' => 'btn btn-sm btn-primary']);
?>

<div class="box box-primary">
    <div class="box-body">
<?php $pjax = Pjax::begin() ?>

<?=
GridView::widget([
    'pjaxId' => $pjax->id,
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'quickFilters' => false,
    'columns' => [
        ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px'], 'displayFilter' => false],
        [
            'attribute' => 'slug',
            'class' => 'yeesoft\grid\columns\TitleActionColumn',
            'title' => function (Redirect $model) {
                return Html::a($model->slug, ['update', 'id' => $model->id], ['data-pjax' => 0]);
            },
            'buttonsTemplate' => '{update} {delete}',
            'filterOptions' => ['colspan' => 2],
        ],
        'url',
        'status_code',
    ],
]);
?>

        <?php Pjax::end() ?>
    </div>
</div>