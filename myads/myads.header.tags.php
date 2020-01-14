<?php
/* ====================
[BEGIN_COT_EXT]
Code=myads
Hooks=header.tags
Tags=header.tpl:{HEADER_MYADS}
Order=10
[END_COT_EXT]
==================== */

/**
 * myads tags of plugin
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2014 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/
defined('COT_CODE') or die('Wrong URL');

$t->assign('HEADER_MYADS', $cfg['plugin']['myads']['myads_headerlist']);
