<?php
/** @var content string */
/** @var this \yii\web\view */

\app\assets\AppAsset::register($this);
?>

<?php echo $this->beginPage() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="">
    <title>Document</title>
    <?php echo $this->head() ?>
    <?php echo $this->registerCsrfMetaTags() ?>
</head>
<body>
<?php echo $this->beginBody() ?>

<?php echo $content ?>

<?php echo $this->endBody() ?>
</body>
</html>
<?php echo $this->endPage() ?>
