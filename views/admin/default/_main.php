<?php
use panix\ext\tinymce\TinyMce;

/**
 * @var \panix\engine\bootstrap\ActiveForm $form
 * @var \panix\mod\manages\models\Manages $model
 */
?>

<?= $form->field($model, 'first_name')->textInput(['maxlength' => 50]) ?>
<?= $form->field($model, 'last_name')->textInput(['maxlength' => 50]) ?>
<?= $form->field($model, 'position')->textInput(['maxlength' => 50]) ?>
<?= $form->field($model, 'email')->textInput(['maxlength' => 50]) ?>
<?= $form->field($model, 'phone')->telInput() ?>
<?= $form->field($model, 'social_1')->textInput(['maxlength' => 255]) ?>
<?= $form->field($model, 'social_2')->textInput(['maxlength' => 255]) ?>


<?=
$form->field($model, 'text')->tinyMce();
?>


<?= $form->field($model, 'image', [
    'parts' => [
        '{buttons}' => $model->getFileHtmlButton('image')
    ],
    'template' => '<div class="col-sm-4 col-lg-2">{label}</div>{beginWrapper}{input}{buttons}{error}{hint}{endWrapper}'
])->fileInput() ?>
