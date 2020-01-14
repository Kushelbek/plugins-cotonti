<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=comments.newcomment.tags
Tags=comments.tpl:{COMMENTS_FORM_CAPTCHA}
[END_COT_EXT]
==================== */

/**
 * Captcha plugin: comments tag
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL');

if ($usr['id'] == '0' && $cfg['captchamain'] == 'captcha')
{
	$t->assign(array(
		'COMMENTS_FORM_CAPTCHA' => cot_captcha_generate()
	));
}
