<?php

/* @var $this yii\web\View */
/* @var $model yeesoft\redirect\models\Redirect */

$this->title = Yii::t('yee', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/redirect', 'Redirects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', compact('model')) ?>