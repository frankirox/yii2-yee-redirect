<?php

use yeesoft\models\User;
use yeesoft\helpers\Html;
use yeesoft\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model yeesoft\redirect\models\Redirect */
/* @var $form yeesoft\widgets\ActiveForm; */
?>

<?php $form = ActiveForm::begin() ?>

<div class="row">
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-body">

                <?= $form->languageSwitcher($model); ?>

                <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-body">

                <?php if (!$model->isNewRecord): ?>
                    <?= $form->field($model, 'createdDatetime')->value() ?>

                    <?= $form->field($model, 'updatedDatetime')->value() ?>

                    <?= $form->field($model, 'updatedByName')->value() ?>

                    <?= $form->field($model, 'created_by')->dropDownList(User::getUsersList()) ?>
                <?php endif; ?>

                <?= $form->field($model, 'status_code')->textInput(['maxlength' => true]) ?>

                <div class="row">
                    <?php if ($model->isNewRecord): ?>
                        <div class="col-md-6">
                            <?= Html::submitButton(Yii::t('yee', 'Create'), ['class' => 'btn btn-primary btn-block']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= Html::a(Yii::t('yee', 'Cancel'), ['index'], ['class' => 'btn btn-default btn-block']) ?>
                        </div>
                    <?php else: ?>
                        <div class="col-md-6">
                            <?= Html::submitButton(Yii::t('yee', 'Save'), ['class' => 'btn btn-primary btn-block']) ?>
                        </div>
                        <div class="col-md-6">
                            <?=
                            Html::a(Yii::t('yee', 'Delete'), ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-default btn-block',
                                'data' => [
                                    'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                    'method' => 'post',
                                ],
                            ])
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
