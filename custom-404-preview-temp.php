<?php
get_header();
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
        // フォームデータを取得して表示
        $notfound_formData = $_POST;
		if(isset($notfound_formData['page404bg-type'])){
			include(get_template_directory() . '/lib/narukami-404/not-found-preview.php');
		}
	}
?>
<?php
get_footer();