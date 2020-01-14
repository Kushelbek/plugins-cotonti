<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=rc
Tags=header.tpl:{HEADER_HEAD}
[END_COT_EXT]
==================== */

/**
 * highslide plugin: rc
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL.');

if ($cfg['plugin']['highslide']['css'])
{
	Resources::addFile($cfg['plugins_dir'] .'/highslide/css/highslide.custom.css','css',99);
}
