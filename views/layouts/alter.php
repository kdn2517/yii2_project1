<?php

use app\assets\AppAssetShop1;
use yii\helpers\Html;
use yii\bootstrap\Nav;

AppAssetShop1::register($this);

$this->beginPage() 
        
?>
<!DOCTYPE HTML>
<head>
    <?php $this->head() ?>
    <title><?=$this->params['pageTitle']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Функция прокручивает документ в начало (0, 1) сразу после загрузки 
страницы-->
    <script type="application/x-javascript">
        addEventListener("load", function() 
            { 
                setTimeout(hideURLbar, 0); 
            }, 
            false); 
            function hideURLbar()
            { 
                window.scrollTo(0,1); 
            } 
    </script>

<!-- Функция скрывае элемент с id=demo,  -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#demo').hide();
            $('.vticker').easyTicker();
        });
    </script>
    
    <script>
        $(document).ready(function () 
        {
            $(".megamenu").megamenu();
        });
    </script>
    
    <script>
        jQuery('#jquery-demo').slippry({
            // general elements & wrapper
            slippryWrapper: '<div class="sy-box jquery-demo" />', // wrapper to wrap everything, including pager
            // options
            adaptiveHeight: false, // height of the sliders adapts to current slide
            useCSS: false, // true, false -> fallback to js if no browser support
            autoHover: false,
            transition: 'fade'
        });
    </script>
    
    <script type='text/javascript'>//<![CDATA[ 
        $(window).load(function () {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 500,
                values: [100, 400],
                slide: function (event, ui) {
                    $("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) + 
                    " - $" + $("#slider-range").slider("values", 1));

        });//]]>  
    </script>
    
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
            });
        });
    </script>
</head>
<?php $this->beginBody() ?>
<body>
    <div class="header">
        <div class="top-header">
            <div class="wrap">
                <div class="top-header-left">
                    <ul>
                        
                        <script type="text/javascript">
                            $(function () {
                                var $cart = $('#cart');
                                $('#clickme').click(function (e) {
                                    e.stopPropagation();
                                    if ($cart.is(":hidden")) {
                                        $('#info').slideUp("slow");
                                        $cart.slideDown("slow");
                                    } else {
                                        $cart.slideUp("slow");
                                    }
                                });
                                $(document.body).click(function () {
                                    if ($cart.not(":hidden")) {
                                        $cart.slideUp("slow");
                                    }
                                });
                            });
                        </script>
                        
                        <li><a class="cart" href="#"><span id="clickme"> </span></a></li>
                        
                        <div id="cart">Вставляем сюда <span>значения из корзины</span></div>
                        
                        <script type="text/javascript">
                            $(function () {
                                var $info = $('#info');
                                $('#clickme1').click(function (e) {
                                    e.stopPropagation();
                                    if ($info.is(":hidden")) {
                                        $('#cart').slideUp("slow");
                                        $info.slideDown("slow");
                                    } else {
                                        $info.slideUp("slow");
                                    }
                                });
                                $(document.body).click(function () {
                                    if ($info.not(":hidden")) {
                                        $info.slideUp("slow");
                                    }
                                });
                            });
                            </script>
                        
                            <li><a class="info" href="#"><span id="clickme1"> </span></a></li>
                        
                            <div id="info"><span></span>Какая-то информация</div>
                    </ul>
                </div>
                <div class="top-header-center">
                    <div class="top-header-center-alert-left">
                        <h3>Бесплатная доставка</h3>
                    </div>
                    <div class="top-header-center-alert-right">
                        <div class="vticker">
                            <ul>
                                <li>При заказе от 10 000 рублей <label>Возвраты всегда бесплатно.</label></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clear"> </div>
                </div>
                <div class="top-header-right">
                <?php    echo Nav::widget([
                    'options' => ['class' => 'top-header-right'],
                    'items' => [
                    Yii::$app->user->isGuest ? (
                    ['label' => 'Регистрация', 'url' => ['signup']]
                    ) : (Yii::$app->user->identity->role ?
                    (['label' => 'CRUD', 'url' => ['/products/index']]) : (
                    ['label' => 'Корзина']
                    )),
                    Yii::$app->user->isGuest ? (
                    ['label' => 'Войти', 'url' => ['login']]
                    ) : (
                    '<li>'
                        . Html::beginForm(['logout'], 'post')
                        . Html::submitButton(
                        'Выйти (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'
                    ),
                    ],
                    ]);?>

                </div>
                <div class="clear"> </div>
            </div>
        </div>
        
        <!----start-bottom-header---->
        <div class="header-bottom">
            <div class="wrap">
                <!-- start header menu -->
                <ul class="megamenu skyblue">
                    
                    <?php 
                    $categories = \app\models\Category::find()->all();
                    foreach($categories as $category){
                    ?>
                    <li class="grid"><a class="color2" href="#"><?=$category->name?></a>
                        <div class="megapanel">
                            <div class="row">
                                <div class="col1">
                                    <div class="h_nav">
                                        <ul>
                                            <?php 
                                                $subCategories = app\models\SubCategory::findAll(['category' => $category]);
                                                foreach ($subCategories as $subCategory) { ?>
                                                    <li><a href="/shop1/products?id=<?=$subCategory->id?>"><?=$subCategory->name?></a></li>
                                                <?php } ?>
                                        </ul>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <!----//End-bottom-header---->
    <!---//End-header---->






<?= $content ?>    

    
    
    
    
    
    
 <div class="bottom-grids">
     <span>Какая-то информация</span>
		</div>
		<!---- //End-bottom-grids---->
		<!--- //End-content---->   
<div class="footer">
			<div class="wrap">
                            <span>Какая-то информация</span>
				<div class="clear"> </div>
			</div>
		</div>
		
	</body>
        <?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>

