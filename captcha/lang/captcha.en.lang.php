<?php

/**
 * Captcha plugin: english translation
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL.');

$L['info_name'] = 'Captcha';
$L['info_desc'] = 'Protects website from spam bots with simple arithmetic tasks (requires JavaScript)';
$L['info_notes'] = $L['captcha_license'].'<br>'.$L['captcha_oficial'];

$L['captcha_too_many_attempts'] = 'Too many attempts!';
$L['captcha_too_frequent_requests'] = 'Too frequent requests!';
$L['captcha_verification_failed'] = "Verificaion failed!";
$L['captcha_refresh'] = "Click to refresh";
$L['Captcha_code_reply'] = 'The code from the image';
$L['Captcha_code_reply_info'] = 'Enter the characters you see in the image into this field';
$L['captcha_no_bot'] = "I AM NOT BOT!";

$L['cap_num'] = '123456789';
$L['cap_latin_small'] = 'abcdefghijklmnpqrstuvwxyz';
$L['cap_latin_big'] = 'ABCDEFGHIJKLMNPQRSTUVWXYZ';

$L['cfg_delay'] = 'Anti hammering delay';
$L['cfg_delay_hint'] = 'sec';
$L['cfg_attempts'] = 'Max. number of attempts before the bot check';
$L['cfg_attempts_hint'] = '0 - unlimited';
$L['cfg_attempts_sec'] = 'Limit retries per second';

$L['cfg_sep_conf'] = 'PARAMETERS FOR CAPTURE TEXT GENERATION';
$L['cfg_caplen'] = 'Number of characters';
$L['cfg_caplen_float'] = 'Change by 1 randomly the number of characters';
$L['cfg_cap_angle'] = 'Maximum tilt angle of characters';
$L['cfg_cap_offset'] = 'Maximum indent (spread) characters';

$L['cfg_sep_img'] = 'CAPTCHA IMAGE PARAMETERS';
$L['cfg_capw'] = 'Image width';
$L['cfg_caph'] = 'Image height';
$L['cfg_cap_line_ef'] = 'Enable the effect of overlapping lines above and below the text.';
$L['cfg_cap_lines'] = 'Number of lines above the text <br><i> 0 - default algorithm </i>';
$L['cfg_cap_lines_under'] = 'Number of lines under the text <br <i> 0 - the default algorithm </i>';
$L['cfg_cap_filter_ef'] = 'Enable overlay of color filters effect';

$L['cfg_cap_charset'] = '<b>Symbols for random generation</b>:<br><p>'.$L['cap_num'].'<br>'.$L['cap_latin_small'].'<br>'.$L['cap_latin_big'].'</p><hr><i>* Latin numbers and letters are supported</i>';
