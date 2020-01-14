<?php
/**
 * Share functions
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2017 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL');

require_once cot_langfile('share', 'plug');

function share($justify)
{
    if (empty($justify)) {
        $justify = cot::$cfg['plugin']['share']['sh_justify'];
    }
    $t = new XTemplate(cot_tplfile('share', 'plug'));

    $t->assign('SHARE_ID', cot_unique(4).'_');

    if (cot::$cfg['plugin']['share']['sh_counter']) {
        $t->assign(array(
            'SHARE_VKONTAKTE_COUNTER' => '<q data-counter="vkontakte"></q>',
            'SHARE_FACEBOOK_COUNTER' => '<q data-counter="facebook"></q>',
            'SHARE_ODNOKLASSNIKI_COUNTER' => '<q data-counter="odnoklassniki"></q>',
            'SHARE_MOIMIR_COUNTER' => '<q data-counter="moimir"></q>',
            'SHARE_TUMBLR_COUNTER' => '<q data-counter="tumblr"></q>',
            'SHARE_PINTEREST_COUNTER' => '<q data-counter="pinterest"></q>'
		));
    }
    $t->assign(array(
    'SHARE_SIZE' => 'sh-' . cot::$cfg['plugin']['share']['sh_size'],
    'SHARE_JUSTIFY' =>  $justify.'--'
));
    $t->parse('MAIN');

    return $t->text('MAIN');
}
