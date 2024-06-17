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
<article class="n-section-block">
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
			
			<div class="<?php echo $rank_style; ?>" 
			 style="display: <?php echo $rank_on_3; ?> ; background-image: url(<?php echo $overlay_control_3_pre;?>)"><!--ランキング3位-->
			<a href=<?php echo $item_page_link_3; ?>></a>
			<div class="<?php echo $rank_pop;?>"><span>3</span></div>
			<div class="ranking-img">
				<img src="<?php echo $item_img_url_3; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $item_title_3; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $item_price_3; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング3位end-->
			
			<div class="<?php echo $rank_style; ?>" 
			 style="display: <?php echo $rank_on_4; ?> ; background-image: url(<?php echo $overlay_control_4_pre; ?>)"><!--ランキング4位-->
			<a href=<?php echo $item_page_link_4; ?>></a>
			<div class="<?php echo $rank_pop;?>"><span>4</span></div>
			<div class="ranking-img">
				<img src="<?php echo $item_img_url_4; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $item_title_4; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $item_price_4; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング4位end-->
			
			<div class="<?php echo $rank_style; ?>" 
			 style="display: <?php echo $rank_on_5; ?> ; background-image: url(<?php echo $overlay_control_5_pre; ?>)"><!--ランキング5位-->
			<a href=<?php echo $item_page_link_5; ?>></a>
			<div class="<?php echo $rank_pop;?>"><span>5</span></div>
			<div class="ranking-img">
				<img src="<?php echo $item_img_url_5; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $item_title_5; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $item_price_5; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング5位end-->
			
			<div class="<?php echo $rank_style; ?>" 
			 style="display: <?php echo $rank_on_6; ?> ; background-image: url(<?php echo $overlay_control_6_pre; ?>)"><!--ランキング6位-->
			<a href=<?php echo $item_page_link_6; ?>></a>
			<div class="<?php echo $rank_pop;?>"><span>6</span></div>
			<div class="ranking-img">
				<img src="<?php echo $item_img_url_6; ?>">
			</div>
			<div class="ranking-discription">
				<div class="rank-dis-text">
				<p class="ranking-item-title"><?php echo $item_title_6; ?></p>
				</div>
				<div class="rank-dis-price">
				<p><?php echo $item_price_6; ?>円</p>
				</div>
		    </div>
		</div><!--ランキング6位end-->
		</div>
</article>