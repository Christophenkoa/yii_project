<?php
/** @var content string */
/** @var this \yii\web\view */

\app\assets\AppAsset::register($this);
?>

<?php $this->beginContent('@app/views/layouts/clear.php') ?>

<div class="container">
    <?php echo $content ?>
</div

<?php $this->endContent() ?>
