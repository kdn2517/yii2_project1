		<div class="content product-box-main">
			<div class="wrap">
				<div class="content-right product-box">
					<div class="product-box-head">
							<div class="product-box-head-left">
								<h3><?=$category?></h3>
							</div>
							
							<div class="clear"> </div>
					</div>
					<div class="product-grids">
							<script type="text/javascript">
								jQuery(function() {
									jQuery('.starbox').each(function() {
										var starbox = jQuery(this);
										starbox.starbox({
											average: starbox.attr('data-start-value'),
											changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
											ghosting: starbox.hasClass('ghosting'),
											autoUpdateAverage: starbox.hasClass('autoupdate'),
											buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
											stars: starbox.attr('data-star-count') || 5
										}).bind('starbox-value-changed', function(event, value) {
											if(starbox.hasClass('random')) {
												var val = Math.random();
												starbox.next().text(' '+val);
												return val;
											} 
										})
									});
								});
							</script>
							<!---//End-rate---->
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
								<div class="clear"> </div>
							</div>
							<div class="more-product-info">
								<span> </span>
							</div>
						</div>
						<?php } ?>
						<div class="clear"> </div>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
		</div>