<?php

/* @var $this yii\web\View */
/* @var $model yeesoft\redirect\models\Redirect */

$this->title = Yii::t('yee', 'Update "{item}"', ['item' => $model->slug]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/redirect', 'Redirects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yee', 'Update');
?>

<?= $this->render('_form', compact('model')) ?>



