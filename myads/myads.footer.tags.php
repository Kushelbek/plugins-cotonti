<?php
/* ====================
[BEGIN_COT_EXT]
Code=myads
Hooks=footer.tags
Tags=footer.tpl:{FOOTER_RC}
Order=10
[END_COT_EXT]
==================== */

/**
 * myads footer tags of plugin
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2014 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL');

$out['footer_rc'] .= $cfg['plugin']['myads']['myads_footerlist'];
