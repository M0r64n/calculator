<?php

/* @var $this yii\web\View */
/* @var $model app\Models\CalculatorForm */
/* @var $result float */
/* @var $error string */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Calculator';
?>
<div class="site-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'calculator-form']); ?>

            <?= $form->field($model, 'first_operand')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'operation_key')->dropDownList($model->operations) ?>

            <?= $form->field($model, 'second_operand') ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Calculate'),
                    ['class' => 'btn btn-primary', 'name' => 'calculate-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <?php if ($error): ?>

        <span><?= $error ?></span>

    <?php elseif ($result): ?>

        <span><?= "{$model->first_operand} "
            . ($model->operations[$model->operation_key] ?? 'and')
            . " {$model->second_operand} "
            . Yii::t('app', 'equals')
            . " $result" ?></span>

    <?php endif; ?>

</div>
