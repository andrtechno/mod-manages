<?php

use panix\engine\Html;
use panix\engine\CMS;

/**
 * @var \panix\mod\manages\models\Manages|\panix\engine\behaviors\UploadFileBehavior $model
 * @var \yii\web\View $this
 */
$image = $model->getImageUrl('image', '320x450');

?>

<div class="manage-card">
    <div class="row no-gutters">
        <div class="col-sm-6">
            <?php if ($image) { ?>
                <?= Html::a(Html::img($image, ['class' => 'img-fluid','alt'=>$model->fullName,'title'=>$model->fullName]), $model->getUrl(),['class' => '']); ?>
            <?php } ?>
        </div>
        <div class="col-sm-6">
            <div class="manage-card__content">
                <div class="manage-card__name">
                    <?= Html::a($model->first_name.'<br/>'.$model->last_name, $model->getUrl(), ['class' => '']); ?>
                </div>
                <div class="manage-card__position">
                    <?= $model->isString('position'); ?>
                </div>



                <ul class="social social-lg outline">
                    <?php if ($model->social_1) { ?>
                        <li><?= Html::a('<svg width="10" height="20" viewBox="0 0 10 20" fill="none" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.81225 9.87364H6.04648C6.04648 14.2924 6.04648 19.7315 6.04648 19.7315H1.94816C1.94816 19.7315 1.94816 14.3452 1.94816 9.87364H0V6.38955H1.94816V4.13598C1.94816 2.52199 2.7151 0 6.08415 0L9.12108 0.011641V3.3937C9.12108 3.3937 7.27564 3.3937 6.91682 3.3937C6.558 3.3937 6.04785 3.57311 6.04785 4.34278V6.39024H9.17039L8.81225 9.87364Z" fill="none"/>
</svg>', $model->social_1, []); ?></li>
                    <?php } ?>
                    <?php if ($model->social_2) { ?>
                        <li><?= Html::a('<svg width="19" height="18" viewBox="0 0 19 18" fill="none" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.25592 17.918H0.237419V5.82822H4.25592V17.918ZM2.2468 4.17737H2.22061C0.872131 4.17737 0 3.24909 0 2.08894C0 0.902596 0.898819 0 2.27348 0C3.64815 0 4.49409 0.902596 4.52028 2.08894C4.52028 3.24909 3.64815 4.17737 2.2468 4.17737ZM18.7458 17.918H14.7278V11.4502C14.7278 9.82482 14.146 8.71628 12.692 8.71628C11.5819 8.71628 10.9208 9.46404 10.6302 10.1859C10.524 10.4442 10.4981 10.8052 10.4981 11.1665V17.918H6.4798C6.4798 17.918 6.53242 6.96245 6.4798 5.82822H10.4981V7.54001C11.0321 6.71622 11.9875 5.54448 14.1195 5.54448C16.7634 5.54448 18.7458 7.27238 18.7458 10.9857V17.918Z" fill="none"/>
</svg>', $model->social_2, []); ?></li>
                    <?php } ?>
                </ul>

            </div>
        </div>
    </div>
</div>
