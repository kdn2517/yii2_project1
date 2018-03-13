		<div class="content details-page">
			<!---start-product-details--->
			<div class="product-details">
				<div class="wrap">
					<ul class="product-head">
						<li><a href="index">Home</a> <span>::</span></li>
						<li class="active-page"><a href="products">Product Page</a></li>
						<div class="clear"> </div>
					</ul>
				<script>
						jQuery(document).ready(function($){
			
							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,
								source_image_width: 900,
								source_image_height: 1000,
								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
				</script>
				<!----//details-product-slider--->
				<div class="details-left">
					<div class="details-left-slider">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
                                                                    <img class="etalage_source_image" src="/web/uploads/<?=$product->image?>" />
								</a>
							</li>
						</ul>
					</div>
					<div class="details-left-info">
						<div class="details-right-head">
						<h1><?=$product->name?></h1>
						
						<p class="product-detail-info"><?=$product->description?></p>
						<div class="product-more-details">
							<ul class="price-avl">
								<li class="price"><label><?=$product->price?> рублей</label></li>
								
								<div class="clear"> </div>
							</ul>
							
							<ul class="prosuct-qty">
								<span>Количество (осталось <?=$product->number?> штук):</span>
								<select>
                                                                    <?php for($i = 1; $i<=$product->number; $i++) { ?>
									<option><?=$i?></option>
                                                                    <?php } ?>
								</select>
							</ul>
							<input type="button" value="add to cart" />
							
						</div>
					</div>
					</div>
					<div class="clear"> </div>
				</div>
				
				<div class="clear"> </div>
			</div>
			<!----product-rewies---->
			<div class="product-reviwes">
				<div class="wrap">
				<!--vertical Tabs-script-->
				<!---responsive-tabs---->
					<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
					<script type="text/javascript">
						$(document).ready(function () {
							 $('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true,   // 100% fit in a container
									closed: 'accordion', // Start closed if in accordion view
									activate: function(event) { // Callback function if tab is switched
									var $tab = $(this);
									var $info = $('#tabInfo');
									var $name = $('span', $info);
										$name.text($tab.text());
										$info.show();
									}
								});
													
							 $('#verticalTab').easyResponsiveTabs({
									type: 'vertical',
									width: 'auto',
									fit: true
								 });
						 });
					</script>
				<!---//responsive-tabs---->
				<!--//vertical Tabs-script-->
				<!--vertical Tabs-->
        		
       		<div class="clear"> </div>
       		<!--- start-similar-products--->
       		
       		<!--- //End-similar-products--->
			</div>
			</div>
			<div class="clear"> </div>
			<!--//vertical Tabs-->
			<!----//product-rewies---->
			<!---//End-product-details--->
			</div>
		</div>
		