<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=comments.send.first
[END_COT_EXT]
==================== */

/**
 * Captcha plugin: comments send first
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL');

if (cot::$cfg['captchamain'] == 'captcha' && cot::$usr['id'] == '0') {
    $rverify = cot_import('rverify', 'P', 'TXT');

    captcha_notbot_validate(cot_import('notbot', 'P', 'TXT'));

    if (!cot_captcha_validate($rverify)) {
        cot_error(cot::$L['captcha_verification_failed'], 'rverify');
    }
}
