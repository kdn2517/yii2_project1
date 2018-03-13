<div class="img-slider">
    <div class="wrap">
        <ul id="jquery-demo">
            <?php foreach($products as $product) { ?>
                <li>
        	    <a href="details?id=<?=$product->id?>">
                        <img src="/web/uploads/<?=$product->image?>" alt="" />
                    </a>
                    <div class="slider-detils">
		    	<h3>САМОЕ <label>КРУТОЕ</label></h3>
		    	<a class="slide-btn" href="details?id=<?=$product->id?>">Подробнее</a>
		    </div>
		</li>
		<li>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="clear"> 
</div>
<div class="wrap">
    <div class="price-rage">
        <h3>Weekly selection:</h3>
        <div id="slider-range">
        </div>
    </div>
</div>
<div class="content">
    <div class="wrap">
        <div class="content-right">
            <div class="product-grids">
                <?php foreach($products as $product) { ?>
                    <div class="product-grid last-grid" onclick="location.href='details.html';"><?=$product->name?>
                        <div class="product-pic">
                           <a href="details?id=<?=$product->id?>"><img src="/web/uploads/<?=$product->image?>" title="product-name" height="300px"/></a>
                        </div>
                        <div class="product-info">
                            <div class="product-info-cust">
                                <a href="details?id=<?=$product->id?>">Подробнее</a>
                            </div>
                            <div class="product-info-price">
                                <a href="details?id=<?=$product->id?>"><?=$product->price?> руб.</a>
                            </div>
                            <div class="clear"> 
                            </div>
                        </div>
                        <div class="more-product-info">
                           <span> </span>
                        </div>
                    </div>
                <?php } ?>
                <div class="clear"> 
                </div>
            </div>
        </div>
        <div class="clear"> 
        </div>
    </div>
</div>