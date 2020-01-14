<?php

/* ====================
[BEGIN_COT_EXT]
Hooks=admin.config.edit.first
[END_COT_EXT]
==================== */

/**
 * ScrollTo plugin: admin edit config
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL');

if (!function_exists('cfg_color')) {
    function cfg_color($cfg_var, $minlength = 3, $maxlength = 6)
    {
        if (!$minlength) {
            $minlength = 3;
        }
        if (!$maxlength) {
            $maxlength = 6;
        }
        $value = $cfg_var['config_value'];
        $var_name = $cfg_var['config_name'];
        $pattern = '[#a-fA-F\d]+';

        $input_code = '<label><input type="color" name="'.$var_name.'" value="'.$value.'" pattern="'.$pattern.'" title="цвет в формате HEX"></label>';

        return $input_code;
    }
}

if (!function_exists('cfg_color_filter')) {
    function cfg_color_filter(&$input_value, $cfg_var, $minlength = 3, $maxlength = 6)
    {
        if (empty($input_value)) {
            cot_error('Пустое значение', $cfg_var['config_name']);
            return null;
        }

        $is_valid = ltrim($input_value, '#');

        if (ctype_xdigit($is_valid) &&(strlen($is_valid) == 6 || strlen($is_valid) == 3)) {
            return $input_value;
        } else {
            cot_error('Некорректное значение', $cfg_var['config_name']);
            $input_value = $cfg_var['config_value'];
            return null;
        }
    }
}

if (!function_exists('cfg_number_num')) {
    function cfg_number_num($cfg_var, $min = 0, $max = 9999, $step = 1)
    {
        if (!$min) {
            $min = 0;
        }
        if (!$max) {
            $max = 9999;
        }
        if (!$step) {
            $step = 9999;
        }
        $value = $cfg_var['config_value'];
        $var_name = $cfg_var['config_name'];
        $pattern = '[\d]+';

        $input_code = '<label><input type="number" name="'.$var_name.'" value="'.$value.'" min="'.$min.'" max="'.$max.'" step="'.$step.'" pattern="'.$pattern.'" title="введите число"></label>';

        return $input_code;
    }
}
