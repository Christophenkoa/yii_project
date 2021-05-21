<?php
    /** @var content string */
    /** @var this \yii\web\view */
?>

<?php $this->beginContent('@app/views/layouts/clear.php') ?>
<header>
    Header goes here
</header>

<div class="container">
    <?php echo $content ?>
</div

<footer>
    Footer goes here
</footer>
<?php $this->endContent() ?>
