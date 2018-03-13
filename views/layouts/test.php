<?php

use app\assets\AppTest;

AppAssetShop1::register($this);

?>
<?php $this->beginPage() ?>
<head></head>
<?php $this->beginBody() ?>
<body>
<?= $content ?>
<body>
<?php $this->endBody() ?>
<?php $this->endPage() ?>