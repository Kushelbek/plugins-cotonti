<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=footer.tags
Tags=footer.tpl:{FOOTER_RC}
[END_COT_EXT]
==================== */
/**
 * Highslide plugin: footer
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL.');

require_once cot_langfile('highslide', 'plug');
require_once cot_incfile('highslide', 'plug', 'resources');

if (!cot::$cfg['plugin']['highslide']['main']) {
    if ($env['ext'] != 'index' && $env['location'] != 'home') {
        cot::$out['footer_rc'] .= $R['highslide_js'];
        Resources::embedFooter(cot_rc_minify($R['highslide_qsel'], 'js'));
    }
} else {
    cot::$out['footer_rc'] .= $R['highslide_js'];
    Resources::embedFooter(cot_rc_minify($R['highslide_qsel'], 'js'));
}
