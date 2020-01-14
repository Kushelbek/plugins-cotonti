<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=ajax
[END_COT_EXT]
==================== */

/**
 * Captcha plugin: ajax
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') && defined('COT_PLUG') or die('Wrong URL.');

$referer = parse_url(getenv("HTTP_REFERER"));

use CotCaptcha\Captcha;

if (!empty($referer) && $referer['host'] == $sys['domain']) {
    require_once $cfg['plugins_dir'].'/captcha/classes/captcha.class.php';

    $captcha_cfg = $cfg['plugin']['captcha'];
    $angle = ((int) $captcha_cfg['cap_angle'] > 0) ? $captcha_cfg['cap_angle'] : 7;
    $offset = ((int) $captcha_cfg['cap_offset'] > 0) ? $captcha_cfg['cap_offset'] : 4;
    $rand_len = ($captcha_cfg['caplen_float']) ? true : false;

    $line_Effects = ($captcha_cfg['cap_line_ef']) ? true : false;
    $lines = ((int) $captcha_cfg['cap_lines'] > 0) ? $captcha_cfg['cap_lines'] : null;
    $linesUnder = ((int) $captcha_cfg['cap_lines_under'] > 0) ? $captcha_cfg['cap_lines_under'] : null;

    $filter_Effects = ($captcha_cfg['cap_filter_ef']) ? true : false;


    /* CAPTCHA */
    if (!empty(cot_import('sid', 'G', 'TXT'))) {
        $_SESSION['captcha_time'] = time();
        $_SESSION['captcha_count'] = 0;
        $capshow = new Captcha(null, $captcha_cfg['caplen'], $rand_len, $captcha_cfg['cap_charset']);
        $_SESSION['phrase'] = $capshow->getSecret();

        $capshow
        ->setMaxOffset($offset)
        ->setMaxAngle($angle)
        ->setLineEffects($line_Effects)
        ->setMaxLines($lines)
        ->setMaxLinesUnder($linesUnder)
        ->setFilterEffects($filter_Effects)
        ->build((int) $captcha_cfg['capw'], $captcha_cfg['caph'])
        ->output()
        ;
    }

    /* CUSTOM CAPTCHA */
    if (!empty(cot_import('csid', 'G', 'TXT'))) {
        $_SESSION['ccaptcha_time'] = time();
        $_SESSION['ccaptcha_count'] = 0;
        $ccapshow = new Captcha(null, $captcha_cfg['caplen'], $rand_len, $captcha_cfg['cap_charset']);
        $_SESSION['cphrase'] = $ccapshow->getSecret();


        $ccapshow
    ->setMaxOffset($offset)
    ->setMaxAngle($angle)
    ->setLineEffects($line_Effects)
    ->setMaxLines($lines)
    ->setMaxLinesUnder($linesUnder)
    ->setFilterEffects($filter_Effects)
    ->build((int) $captcha_cfg['capw'], $captcha_cfg['caph'])
    ->output()
    ;
    }
} else {
    cot_redirect($cfg['mainurl']);
}
