<?php

use panix\engine\widgets\Pjax;
use panix\engine\Html;
use panix\engine\CMS;

/**
 * @var \panix\mod\manages\models\Manages|\panix\engine\behaviors\UploadFileBehavior $model
 * @var \yii\web\View $this
 */
$image = $model->getImageUrl('image');
?>
<div class="container">
    <div class="page-title">
        <div></div>
        <h1><?= $model->isString('first_name') . ' ' . $model->isString('last_name'); ?></h1>
    </div>

    <div class=" manage-card-post">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-lg-4">

                        <?php if ($image) { ?>
                            <span class="img-bg bottom left">
                        <?= Html::img($image, ['class' => 'img-fluid','alt'=>$model->fullName,'title'=>$model->fullName,]); ?>
                    </span>
                        <?php } ?>
                    </div>
                    <div class="col-lg-8">
                        <div class="manage-card-post__info">


                        <div class="manage-card-post__position mb-2">
                            <?= $model->isString('position'); ?>
                        </div>

                        <div class="manage-card-post__phone mb-2">
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.5903 11.8669L13.4047 9.68134C12.6241 8.90077 11.2971 9.21303 10.9849 10.2277C10.7507 10.9303 9.97018 11.3206 9.26766 11.1644C7.70652 10.7741 5.59899 8.74466 5.2087 7.10546C4.97453 6.40292 5.44287 5.62235 6.14539 5.38821C7.16013 5.07598 7.47235 3.74901 6.69178 2.96844L4.50619 0.782846C3.88173 0.236447 2.94505 0.236447 2.39865 0.782846L0.915567 2.26593C-0.567516 3.82707 1.07168 7.96409 4.74036 11.6328C8.40904 15.3014 12.5461 17.0187 14.1072 15.4576L15.5903 13.9745C16.1367 13.35 16.1367 12.4133 15.5903 11.8669Z"
                                      fill="#467CBB"/>
                            </svg>

                            <?= Html::tel($model->phone); ?>
                        </div>
                        <div class="manage-card-post__email mb-3">
                            <svg width="16" height="12" viewBox="0 0 16 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.4642 1.72474C15.4642 1.70706 15.4764 1.68984 15.4756 1.67236L10.7529 6.2229L15.4699 10.6281C15.4727 10.5966 15.4642 10.5649 15.4642 10.5327V1.72474Z"
                                      fill="#467CBB"/>
                                <path d="M10.0322 6.92236L8.10425 8.77727C8.00669 8.87113 7.88069 8.9182 7.75463 8.9182C7.63118 8.9182 7.50774 8.87315 7.41085 8.78285L5.48817 6.99121L0.740356 11.5676C0.855801 11.6091 0.979717 11.6413 1.10948 11.6413H14.3998C14.5925 11.6413 14.7733 11.5826 14.9304 11.495L10.0322 6.92236Z"
                                      fill="#467CBB"/>
                                <path d="M7.7491 7.72021L14.9565 0.777341C14.7934 0.680319 14.6034 0.615234 14.3998 0.615234H1.10947C0.844358 0.615234 0.601434 0.718173 0.412231 0.875169L7.7491 7.72021Z"
                                      fill="#467CBB"/>
                                <path d="M0 1.89429V10.533C0 10.6322 0.022793 10.7278 0.0475359 10.8192L4.73645 6.3039L0 1.89429Z"
                                      fill="#467CBB"/>
                            </svg>
                            <?= Html::mailto($model->email); ?>
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



                        <div class="mce-content-body mt-4 mt-lg-5 content">
                            <?= $model->isText('text'); ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


