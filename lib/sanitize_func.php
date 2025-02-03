<?php
//サニタイズ関数
function sanitize_option_value($value) {
    if (is_array($value)) {
        foreach ($value as $key => $item) {
            $value[$key] = sanitize_option_value($item); // 再帰的に処理
        }
    } else {
        // <iframe>タグの場合
        if (strpos($value, '<iframe') !== false) {
            // 正規表現でsrc属性を取り出してサニタイズ
            preg_match('/src=["\'](https?:\/\/[^\s]+)["\']/', $value, $matches);
            if (isset($matches[1]) && filter_var($matches[1], FILTER_VALIDATE_URL)) {
                $value = preg_replace('/src=["\'](https?:\/\/[^\s]+)["\']/', 'src="' . esc_url($matches[1]) . '"', $value);
            }
        } else {
            // URLとして有効かどうかをチェック
            if (filter_var($value, FILTER_VALIDATE_URL)) {
                $value = esc_url($value);
            } else {
                $value = wp_kses_post($value);
            }
        }
    }
    return $value;
}
//サニタイズコード版

function sanitize_code_value($value) {
    // 配列の場合
    if (is_array($value)) {
        foreach ($value as $key => $item) {
            $value[$key] = sanitize_code_value($item); // 再帰的に処理
        }
    } else {
        // 単一の値の場合
        // 許可するタグリスト（style と script を許可）
        $allowed_tags = [
            'style' => [],  // <style> タグを許可
            'script' => ['type' => true],  // <script> タグを許可（type 属性も許可）
            'iframe' => ['src' => true, 'width' => true, 'height' => true, 'frameborder' => true, 'allowfullscreen' => true], // iframeを許可する場合
            'a' => ['href' => true, 'title' => true, 'target' => true], // リンクを許可
            'p' => [], 'br' => [], 'strong' => [], 'em' => [], 'span' => [], // その他基本的なタグ
        ];

        // サニタイズ処理
        $value = wp_kses($value, $allowed_tags);  // 許可リストを適用
    }
    return $value;
}

//snsチェックボタン関数
function sns_checkbox_value($sns, $value){
	$switch = "";
	$display = "";
	
	if(isset($sns)){
		if($sns === $value){
			$switch = "checked";
			$display = "";
		}else{
			$switch = "";
			$display = "none";
		}
	}
	return ['switch' => $switch, 'display' => $display];
}
?>