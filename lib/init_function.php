<?php
/**
 * テーマ有効時、コンテンツメーカーのテーブルをdbに作成する。
 */

function narukami_theme_activate() {
    global $pagenow;
    if(is_admin() && $pagenow == "themes.php" && isset($_GET["activated"])) {
        do_action('narukami_theme_activate');
	}
}
add_action('init', 'narukami_theme_activate');

function create_theme_tables() {

	global $wpdb;
	$table_name = $wpdb->prefix.'narukami_content_maker';

    //テーブルが存在していなければ作成する
    if ($wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name) {

		if(!empty($wpdb->charset)){
			$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} ";
		}
		if(!empty($wpdb->collate)){
			$charset_collate .= "COLLATE {$wpdb->collate}";
		}
		$sql = "CREATE TABLE {$table_name} (
		  `s_cmaker` varchar(20) NOT NULL,
		  `insert_ids` TEXT NOT NULL,
		  `id` int(11) AUTO_INCREMENT NOT NULL,
		  `rank_pop` varchar(20) NOT NULL,
		  `rank_style` varchar(20) NOT NULL,
		  `rank_primary_title` TEXT NOT NULL,
		  `item_name` TEXT NOT NULL,
		  `item_name_2` TEXT NOT NULL,
		  `item_name_3` TEXT NOT NULL,
		  `item_name_4` TEXT NOT NULL,
		  `item_name_5` TEXT NOT NULL,
		  `item_name_6` TEXT NOT NULL,
		  `item_price` TEXT NOT NULL,
		  `item_price_2` TEXT NOT NULL,
		  `item_price_3` TEXT NOT NULL,
		  `item_price_4` TEXT NOT NULL,
		  `item_price_5` TEXT NOT NULL,
		  `item_price_6` TEXT NOT NULL,
		  `item_img_url` TEXT NOT NULL,
		  `item_img_url_2` TEXT NOT NULL,
		  `item_img_url_3` TEXT NOT NULL,
		  `item_img_url_4` TEXT NOT NULL,
		  `item_img_url_5` TEXT NOT NULL,
		  `item_img_url_6` TEXT NOT NULL,
		  `item_page_link` TEXT NOT NULL,
		  `item_page_link_2` TEXT NOT NULL,
		  `item_page_link_3` TEXT NOT NULL,
		  `item_page_link_4` TEXT NOT NULL,
		  `item_page_link_5` TEXT NOT NULL,
		  `item_page_link_6` TEXT NOT NULL,
		  `rank_on` varchar(20) NOT NULL,
		  `rank_on_2` varchar(20) NOT NULL,
		  `rank_on_3` varchar(20) NOT NULL,
		  `rank_on_4` varchar(20) NOT NULL,
		  `rank_on_5` varchar(20) NOT NULL,
		  `rank_on_6` varchar(20) NOT NULL,
		  `concept_bg_img_url` TEXT NOT NULL,
		  `concept_title` TEXT NOT NULL,
		  `concept_content` TEXT NOT NULL,
		  `grandmenu_img_url` TEXT NOT NULL,
		  `grandmenu_title` TEXT NOT NULL,
		  `grandmenu_pagelink` TEXT NOT NULL,
		  `gm_primary_title` TEXT NOT NULL,
		  `parallax_primary_title` TEXT NOT NULL,
		  `parallax_bg_img_url` TEXT NOT NULL,
		  `parallax_title` TEXT NOT NULL,
		  `parallax_content` TEXT NOT NULL,
		  `column_right_1_bg_img_url` TEXT NOT NULL,
		  `column_right_1_title` TEXT NOT NULL,
		  `column_right_1_content` TEXT NOT NULL,
		  `column_left_1_bg_img_url` TEXT NOT NULL,
		  `column_left_1_title` TEXT NOT NULL,
		  `column_left_1_content` TEXT NOT NULL,
		  `column_2_bg_img_url` TEXT NOT NULL,
		  `column_2_title` TEXT NOT NULL,
		  `column_2_content` TEXT NOT NULL,
		  `column_2_sec_bg_img_url` TEXT NOT NULL,
		  `column_2_sec_title` TEXT NOT NULL,
		  `column_2_sec_content` TEXT NOT NULL,
		  `column_3_bg_img_url` TEXT NOT NULL,
		  `column_3_title` TEXT NOT NULL,
		  `column_3_content` TEXT NOT NULL,
		  `column_3_sec_bg_img_url` TEXT NOT NULL,
		  `column_3_sec_title` TEXT NOT NULL,
		  `column_3_sec_content` TEXT NOT NULL,
		  `column_3_third_bg_img_url` TEXT NOT NULL,
		  `column_3_third_title` TEXT NOT NULL,
		  `column_3_third_content` TEXT NOT NULL,
		  `store_info_title` TEXT NOT NULL,
		  `store_name` TEXT NOT NULL,
		  `store_info_bg_img_url` TEXT NOT NULL,
		  `store_post_number` TEXT NOT NULL,
		  `store_adress` TEXT NOT NULL,
		  `store_phone_num` TEXT NOT NULL,
		  `store_rg_holiday` TEXT NOT NULL,
		  `text_content_bg_color` TEXT NOT NULL,
		  `text_content_title_color` TEXT NOT NULL,
		  `text_content_title` TEXT NOT NULL,
		  `text_content_content` TEXT NOT NULL, 
		  PRIMARY KEY (`id`)
		) {$charset_collate} AUTO_INCREMENT=1;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta($sql);
    }

}

add_action('narukami_theme_activate', 'create_theme_tables');

function ranking_db_farst_insert_data(){
	$url_path = get_theme_file_uri();
	$rank1_img = "/admin-img/sampimg-875_875.jpg";
	$rank2_img = "/admin-img/sampimg-875_875.jpg";
	$rank3_img = "/admin-img/sampimg-875_875.jpg";
	$rank4_img = "/admin-img/sampimg-875_875.jpg";
	$rank5_img = "/admin-img/sampimg-875_875.jpg";
	$rank6_img = "/admin-img/sampimg-875_875.jpg";
	$concept_img = "/admin-img/samp-2400-1400.jpg";
	$column_right_1_img = "/admin-img/sump-1600-1600.jpg";
	$column_left_1_img = "/admin-img/sump-1600-1600.jpg";
	$column_2_bg_img_url = "/admin-img/sump-1600-1600.jpg";
	$column_3_bg_img_url = "/admin-img/sump-1600-1600.jpg";
	$column_2_sec_bg_img_url = "/admin-img/sump-1600-1600.jpg";
	$column_3_sec_bg_img_url = "/admin-img/sump-1600-1600.jpg";
	$column_3_third_bg_img_url = "/admin-img/sump-1600-1600.jpg";
	$rank_primary_t = "RECOMMEND&nbsp;MENU";
	$rank1_img_path = $url_path.$rank1_img;
	$rank2_img_path = $url_path.$rank2_img;
	$rank3_img_path = $url_path.$rank3_img;
	$rank4_img_path = $url_path.$rank4_img;
	$rank5_img_path = $url_path.$rank5_img;
	$rank6_img_path = $url_path.$rank6_img;
	$concept_img_path = $url_path.$concept_img;
	$concept_title_path = "CONCEPT&nbsp;TITLE";
	$column_right_1_bg_img_url_path = $url_path.$column_right_1_img;
	$column_left_1_bg_img_url_path = $url_path.$column_left_1_img;
	$column_2_bg_img_url_path = $url_path.$column_2_bg_img_url;
	$column_3_bg_img_url_path = $url_path.$column_3_bg_img_url;
	$column_2_sec_bg_img_url_path = $url_path.$column_2_sec_bg_img_url;
	$column_3_sec_bg_img_url_path = $url_path.$column_3_sec_bg_img_url;
	$column_3_third_bg_img_url_path = $url_path.$column_3_third_bg_img_url;
	$column_right_1_content_path =<<< EOM
		親譲りの無鉄砲で小供の時から損ばかりしている。小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。なぜそんな無闇をしたと聞く人があるかも知れぬ。別段深い理由でもない。新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張っても、そこから飛び降りる事は出来まい。弱虫やーい。と囃したからである。小使に負ぶさって帰って来た時、おやじが大きな眼をして二階ぐらいから飛び降りて腰を抜かす奴があるかと云ったから、この次は抜かさずに飛んで見せますと答えた。（青空文庫より）
		EOM;
	$column_left_1_content_path =<<< EOM
		親譲りの無鉄砲で小供の時から損ばかりしている。小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。なぜそんな無闇をしたと聞く人があるかも知れぬ。別段深い理由でもない。新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張っても、そこから飛び降りる事は出来まい。弱虫やーい。と囃したからである。小使に負ぶさって帰って来た時、おやじが大きな眼をして二階ぐらいから飛び降りて腰を抜かす奴があるかと云ったから、この次は抜かさずに飛んで見せますと答えた。（青空文庫より）
		EOM;
	$column_2_content_path =<<< EOM
		親譲りの無鉄砲で小供の時から損ばかりしている。小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。なぜそんな無闇をしたと聞く人があるかも知れぬ。別段深い理由でもない。新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張っても、そこから飛び降りる事は出来まい。弱虫やーい。と囃したからである。小使に負ぶさって帰って来た時、おやじが大きな眼をして二階ぐらいから飛び降りて腰を抜かす奴があるかと云ったから、この次は抜かさずに飛んで見せますと答えた。（青空文庫より）
		EOM;
	$column_3_content_path =<<< EOM
		親譲りの無鉄砲で小供の時から損ばかりしている。小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。なぜそんな無闇をしたと聞く人があるかも知れぬ。別段深い理由でもない。新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張っても、そこから飛び降りる事は出来まい。弱虫やーい。と囃したからである。小使に負ぶさって帰って来た時、おやじが大きな眼をして二階ぐらいから飛び降りて腰を抜かす奴があるかと云ったから、この次は抜かさずに飛んで見せますと答えた。（青空文庫より）
		EOM;
	$column_2_sec_content_path =<<< EOM
		親譲りの無鉄砲で小供の時から損ばかりしている。小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。なぜそんな無闇をしたと聞く人があるかも知れぬ。別段深い理由でもない。新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張っても、そこから飛び降りる事は出来まい。弱虫やーい。と囃したからである。小使に負ぶさって帰って来た時、おやじが大きな眼をして二階ぐらいから飛び降りて腰を抜かす奴があるかと云ったから、この次は抜かさずに飛んで見せますと答えた。（青空文庫より）
		EOM;
	$column_3_sec_content_path =<<< EOM
		親譲りの無鉄砲で小供の時から損ばかりしている。小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。なぜそんな無闇をしたと聞く人があるかも知れぬ。別段深い理由でもない。新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張っても、そこから飛び降りる事は出来まい。弱虫やーい。と囃したからである。小使に負ぶさって帰って来た時、おやじが大きな眼をして二階ぐらいから飛び降りて腰を抜かす奴があるかと云ったから、この次は抜かさずに飛んで見せますと答えた。（青空文庫より）
		EOM;
	$column_3_third_content_path =<<< EOM
		親譲りの無鉄砲で小供の時から損ばかりしている。小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。なぜそんな無闇をしたと聞く人があるかも知れぬ。別段深い理由でもない。新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張っても、そこから飛び降りる事は出来まい。弱虫やーい。と囃したからである。小使に負ぶさって帰って来た時、おやじが大きな眼をして二階ぐらいから飛び降りて腰を抜かす奴があるかと云ったから、この次は抜かさずに飛んで見せますと答えた。（青空文庫より）
		EOM;
	$column_right_1_title_path = "SAMPLE&nbsp;TITLE";
	$column_left_1_title_path = "SAMPLE&nbsp;TITLE";
	$column_2_title_path = "SAMPLE&nbsp;PRIMARY";
	$column_3_title_path = "SAMPLE&nbsp;PRIMARY";
	$column_2_sec_title_path = "SAMPLE&nbsp;SECONDERY";
	$column_3_sec_title_path = "SAMPLE&nbsp;SECONDERY";
	$column_3_third_title_path = "SAMPLE&nbsp;TERTIARY";
	$gm_primary_title_path = "GRAND&nbsp;MENU";
	$parallax_primary_title_path = "PARALLAX&nbsp;PRIMARY&nbsp;TITLE";
	$concept_content_sample =<<< EOM
		親譲りの無鉄砲で小供の時から損ばかりしている。小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。なぜそんな無闇をしたと聞く人があるかも知れぬ。別段深い理由でもない。新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張っても、そこから飛び降りる事は出来まい。弱虫やーい。と囃したからである。小使に負ぶさって帰って来た時、おやじが大きな眼をして二階ぐらいから飛び降りて腰を抜かす奴があるかと云ったから、この次は抜かさずに飛んで見せますと答えた。（青空文庫より）
		EOM;
	$grandmenu_img_url_path = [
		$rank1_img_path,
		$rank2_img_path,
		$rank3_img_path,
		$rank4_img_path,
		$rank5_img_path
	];
	$parallax_img_url_path = [
		$rank1_img_path,
		$rank2_img_path,
		$rank3_img_path
	];
	
	$grandmenu_img_url_json = json_encode($grandmenu_img_url_path,JSON_UNESCAPED_UNICODE);
	$parallax_img_url_json = json_encode($parallax_img_url_path,JSON_UNESCAPED_UNICODE);
	
	$grandmenu_img_title_path = [
	"Appetizer",
	"Fish dishes",
	"Rice food",
	"Sake appetizer",
	"Course meal"
	];
	$parallax_title_path = [
	"PARALLAX TITLE 1",
	"PARALLAX TITLE 2",
	"PARALLAX TITLE 3"
	];
	$grandmenu_title_json = json_encode($grandmenu_img_title_path,JSON_UNESCAPED_UNICODE );
	$parallax_title_json = json_encode($parallax_title_path,JSON_UNESCAPED_UNICODE );
	
	$grandmenu_pagelink_path = [
		$url_path,
		$url_path,
		$url_path,
		$url_path,
		$url_path
	];
	$parallax_content_path = [
		"Content for section 1.",
		"Content for section 2.",
		"Content for section 3."
	];
	$grandmenu_pagelink_json = json_encode($grandmenu_pagelink_path,JSON_UNESCAPED_UNICODE);
	$parallax_content_json = json_encode($parallax_content_path,JSON_UNESCAPED_UNICODE);
	
	global $wpdb;
	$tablename = $wpdb->prefix.'narukami_content_maker';
	// 各種データの保存
	$wpdb->insert(
		$tablename,
		array(
		's_cmaker' => '選択してください',
		'insert_ids' => 'insert_id_first',
		'rank_pop' => 'math_sq_bg',
		'rank_style' => 'overlay',
		'rank_primary_title' => $rank_primary_t,
		'item_name' => 'Recommended1',
		'item_name_2' => 'Recommended2',
		'item_name_3' => 'Recommended3',
		'item_name_4' => 'Recommended4',
		'item_name_5' => 'Recommended5',
		'item_name_6' => 'Recommended6',
		'item_price' => 2800,
		'item_price_2' => 2000,
		'item_price_3' => 3200,
		'item_price_4' => 1800,
		'item_price_5' => 1200,
		'item_price_6' => 1800,
		'item_img_url' => $rank1_img_path,
		'item_img_url_2' => $rank2_img_path,
		'item_img_url_3' => $rank3_img_path,
		'item_img_url_4' => $rank4_img_path,
		'item_img_url_5' => $rank5_img_path,
		'item_img_url_6' => $rank6_img_path,
		'item_page_link' => $url_path,
		'item_page_link_2' => $url_path,
		'item_page_link_3' => $url_path,
		'item_page_link_4' => $url_path,
		'item_page_link_5' => $url_path,
		'item_page_link_6' => $url_path,
		'rank_on' => 'rank_show_1',
		'rank_on_2' => 'rank_show_2',
		'rank_on_3' => 'rank_show_3',
		'rank_on_4' => 'rank_show_4',
		'rank_on_5' => 'rank_show_5',
		'rank_on_6' => 'rank_show_6',
		'concept_bg_img_url' => $concept_img_path,
		'concept_title' => $concept_title_path,
		'concept_content' => $concept_content_sample,
		'grandmenu_img_url' => $grandmenu_img_url_json,
		'grandmenu_title' => $grandmenu_title_json,
		'grandmenu_pagelink' => $grandmenu_pagelink_json,
		'gm_primary_title' => $gm_primary_title_path,
		'parallax_bg_img_url' => $parallax_img_url_json,
		'parallax_title' => $parallax_title_json,
		'parallax_content' => $parallax_content_json,
		'parallax_primary_title' => $parallax_primary_title_path ,
		'column_right_1_bg_img_url' => $column_right_1_bg_img_url_path,
		'column_right_1_content' => $column_right_1_content_path,
		'column_right_1_title' => $column_right_1_title_path,
		'column_left_1_bg_img_url' => $column_left_1_bg_img_url_path,
		'column_left_1_content' => $column_left_1_content_path,
		'column_left_1_title' => $column_left_1_title_path,
		'column_2_bg_img_url' => $column_2_bg_img_url_path,
		'column_2_title' => $column_2_title_path,
		'column_2_content' => $column_2_content_path,
		'column_2_sec_bg_img_url' => $column_2_sec_bg_img_url_path,
		'column_2_sec_title' => $column_2_sec_title_path,
		'column_2_sec_content' => $column_2_sec_content_path,
		'column_3_bg_img_url' => $column_3_bg_img_url_path,
		'column_3_title' => $column_3_title_path,
		'column_3_content' => $column_3_content_path,
		'column_3_sec_bg_img_url' => $column_3_sec_bg_img_url_path,
		'column_3_sec_title' => $column_3_sec_title_path,
		'column_3_sec_content' => $column_3_sec_content_path,
		'column_3_third_bg_img_url' => $column_3_third_bg_img_url_path,
		'column_3_third_title' => $column_3_third_title_path,
		'column_3_third_content' => $column_3_third_content_path,
		'store_info_title' => 'STORE&nbsp;INFORMATION',
		'store_name' => 'Sample&nbsp;Store',
		'store_info_bg_img_url' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.827853707379!2d139.76454987489524!3d35.681240529975085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd89f700b%3A0x277c49ba34ed38!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1705211196872!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
		'store_post_number' => '100-0005',
		'store_adress' => '東京都千代田区丸の内１丁目',
		'store_phone_num' => '000-0000-0000',
		'store_rg_holiday' => '木曜日',
		'text_content_bg_color' => '#ffffff',
		'text_content_title_color' => '#000',
		'text_content_title' => 'ABOUT',
		'text_content_content' => $concept_content_sample
		),
		array(
			//スタイル
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			//item_name
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			//item_price
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			'%d',
			//item_url
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			//item_link
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			//rank_on
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			//concept
			'%s',
			'%s',
			'%s',
			//grandmenu
			'%s',
			'%s',
			'%s',
			'%s',
			//paralax
			'%s',
			'%s',
			'%s',
			'%s',
			//rightImg1Column
			'%s',
			'%s',
			'%s',
			//leftImg1Column
			'%s',
			'%s',
			'%s',
			//2columns
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			//3columns
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			//store-info
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			//text-content
			'%s',
			'%s',
			'%s',
			'%s'
			
		)
	);
}

add_action('narukami_theme_activate', 'ranking_db_farst_insert_data');
?>