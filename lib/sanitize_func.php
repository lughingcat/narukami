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