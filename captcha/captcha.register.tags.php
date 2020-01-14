<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=users.register.tags
Tags=users.register.tpl:{USERS_REGISTER_CAPTCHA}
[END_COT_EXT]
==================== */

/**
 * Captcha plugin: users register tag
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL');

if ($cfg['captchamain'] == 'captcha')
{
	$t->assign(array(
		'USERS_REGISTER_CAPTCHA' => cot_captcha_generate(),
	));
}
