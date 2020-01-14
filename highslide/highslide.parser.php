<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=parser.last
Order=99
[END_COT_EXT]
==================== */

/**
 * Highslide plugin: parser
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

 defined('COT_CODE') or die('Wrong URL.');

if (cot_plugin_active('attacher') && $cfg['plugin']['highslide']['incontent']) {
    $text = preg_replace('#<a(.+?)href="(.+?)' . $cfg['plugin']['attacher']['folder'] . '/_thumbs/([0-9]+)/(.+?)"(.*?)[+>]#i', '<a data-hs-link="'.$env['ext'].'" $1href="$2' . $cfg['plugin']['attacher']['folder'] . '/_thumbs/$3/$4"$5>', $text);
}
