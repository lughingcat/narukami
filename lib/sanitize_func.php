<?php
function sanitize_option_value($value) {
    if (is_array($value)) {
        foreach ($value as $key => $item) {
            $value[$key] = sanitize_option_value($item); // 再帰的に処理
        }
    } else {
        // URLとして有効かどうかをチェック
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            $value = esc_url($value);
        } else {
            $value = sanitize_text_field($value);
        }
    }
    return $value;
}
?>