<?php
use panix\engine\widgets\ListView;
?>
<div class="container">
    <div class="page-title">
        <div></div>
        <h1><?= ($this->h1) ? $this->h1 : $this->context->pageName; ?></h1>
    </div>
<?php
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item',
    //'layout' => '{sorter}{summary}{items}{pager}',
    'layout' => '{items}{pager}',
    'emptyText' => 'Empty',
    'options' => ['class' => 'list-view row'],
    'itemOptions' => ['class' => 'item col-md-6 col-lg-4'],
    'emptyTextOptions' => ['class' => 'alert alert-info'],
    'pager' => [
        'class' => '\panix\engine\widgets\LinkPager',
        'options'=>['class'=>'pagination justify-content-center']
    ]
]);
?>

</div>