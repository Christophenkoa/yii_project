<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php echo \app\widgets\ButtonWidget::widget([
            'text' => 'Hello'
    ]) ?>

    <?php \app\widgets\BgWidget::begin([
            'bgColor' => 'red'
    ]) ?>
        Hello World
    <?php \app\widgets\BgWidget::end() ?>
</div>
