<?php
$overlay = "overlay";
//オーバーレイコントロール
$overlay_control_pre = preview_overlay_control($rank_style, $overlay, $item_img_url);
$overlay_control_2_pre = preview_overlay_control($rank_style, $overlay, $item_img_2);
$overlay_control_3_pre = preview_overlay_control($rank_style, $overlay, $item_img_3);
$overlay_control_4_pre = preview_overlay_control($rank_style, $overlay, $item_img_4);
$overlay_control_5_pre = preview_overlay_control($rank_style, $overlay, $item_img_5);
$overlay_control_6_pre = preview_overlay_control($rank_style, $overlay, $item_img_6);
?>
<article class="">
<div class="rank-primary-title-prevew">
			<p class="r-p-t-prev"><?php echo $rank_primary_title;?></p>
		</div>
		<div class="ranking-all-wrap">
		<div class="<?php echo $rank_style;?>" 
			 style="display: <?php echo $rank_on;?> ; background-image: url(<?php echo $overlay_control_pre;?>)"><!--ランキング１位-->
			<a href=<?php echo $item_page_link; ?>></a>
			<div class="<?php echo $rank_pop;?>"><span>1</span></div>
			<div class="ranking-img">
				<img src="<?php echo $item_img_url; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $item_title; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $item_price; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング１位end-->
			
			<div class="<?php echo $rank_style;?>" 
			 style="display: <?php echo $rank_on_2; ?> ; background-image: url(<?php echo $overlay_control_2_pre;?>)"><!--ランキング2位-->
			<a href=<?php echo $item_page_link_2; ?>></a>
			<div class="<?php echo $rank_pop;?>"><span>2</span></div>
			<div class="ranking-img">
				<img src="<?php echo $item_img_url_2; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $item_title_2; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $item_price_2; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング2位end-->
			
			<div class="<?php echo $rank_style_result;?>" 
			 style="display: <?php echo $rank_on_3_result ;?> ; background-image: url(<?php echo $overlay_control_3_result;?>)"><!--ランキング3位-->
			<a href=<?php echo $item_page_link_3_result; ?>></a>
			<div class="<?php echo $rank_pop_result;?>"><span>3</span></div>
			<div class="ranking-img">
				<img src="<?php echo $rank_img_3_result; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $rank_item_name_3_result; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $rank_item_price_3_result; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング3位end-->
			
			<div class="<?php echo $rank_style_result;?>" 
			 style="display: <?php echo $rank_on_4_result ;?> ; background-image: url(<?php echo $overlay_control_4_result;?>)"><!--ランキング4位-->
			<a href=<?php echo $item_page_link_4_result; ?>></a>
			<div class="<?php echo $rank_pop_result;?>"><span>4</span></div>
			<div class="ranking-img">
				<img src="<?php echo $rank_img_4_result; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $rank_item_name_4_result; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $rank_item_price_4_result; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング4位end-->
			
			<div class="<?php echo $rank_style_result;?>" 
			 style="display: <?php echo $rank_on_5_result ;?> ; background-image: url(<?php echo $overlay_control_5_result;?>)"><!--ランキング5位-->
			<a href=<?php echo $item_page_link_5_result; ?>></a>
			<div class="<?php echo $rank_pop_result;?>"><span>5</span></div>
			<div class="ranking-img">
				<img src="<?php echo $rank_img_5_result; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $rank_item_name_5_result; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $rank_item_price_5_result; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング5位end-->
			
			<div class="<?php echo $rank_style_result;?>" 
			 style="display: <?php echo $rank_on_6_result ;?> ; background-image: url(<?php echo $overlay_control_6_result;?>)"><!--ランキング6位-->
			<a href=<?php echo $item_page_link_6_result; ?>></a>
			<div class="<?php echo $rank_pop_result;?>"><span>6</span></div>
			<div class="ranking-img">
				<img src="<?php echo $rank_img_6_result; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $rank_item_name_6_result; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $rank_item_price_6_result; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング6位end-->
		</div>
</article>