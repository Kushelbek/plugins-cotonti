<?php
/**
 * Highslide plugin: resources
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL.');

$R['highslide_js'] = '<script src="'.$cfg['plugins_dir'] . '/highslide/lib/highslide-full.packed.js" defer></script><script src="'.$cfg['plugins_dir'] . '/highslide/js/highslide.cfg.min.js" defer></script>';

$R['highslide_qsel'] = 'window.addEventListener(\'DOMContentLoaded\', function() {
(function(){var h=document.head|| document.getElementsByTagName(\'head\')[0];if(h)var s = document.createElement("link");s.rel = "stylesheet";s.href = "'.$cfg['plugins_dir'] .'/highslide/css/highslide.min.css";h.appendChild(s);}());
hs.graphicsDir = "'.$cfg['plugins_dir'] . '/highslide/lib/graphics/";
 hs.blockRightClick = '.$cfg['plugin']['highslide']['brclick'].';
 hs.showCredits = '.$cfg['plugin']['highslide']['credits'].';
 hs.lang = {
     cssDirection: "ltr",
     loadingText: "'.$L['hs_lang_loading_text'].'",
     loadingTitle: "'.$L['hs_lang_loading_title'].'",
     focusTitle: "'.$L['hs_lang_focus_title'].'",
     fullExpandTitle: "'.$L['hs_lang_full_expand_title'].'",
     creditsText: "'.$L['hs_lang_credits_text'].'",
     creditsTitle: "'.$L['hs_lang_credits_title'].'",
     previousText: "'.$L['hs_lang_previous_text'].'",
     nextText: "'.$L['hs_lang_next_text'].'",
     moveText: "'.$L['hs_lang_move_text'].'",
     closeText: "'.$L['hs_lang_close_text'].'",
     closeTitle: "'.$L['hs_lang_close_title'].'",
     resizeTitle: "'.$L['hs_lang_resize_title'].'",
     playText: "'.$L['hs_lang_play_text'].'",
     playTitle: "'.$L['hs_lang_play_title'].'",
     pauseText: "'.$L['hs_lang_pause_text'].'",
     pauseTitle: "'.$L['hs_lang_pause_title'].'",
     previousTitle: "'.$L['hs_lang_previous_title'].'",
     nextTitle: "'.$L['hs_lang_next_title'].'",
     moveTitle: "'.$L['hs_lang_move_title'].'",
     fullExpandText: "'.$L['hs_lang_full_expand_text'].'",
     number: "'.$L['hs_lang_number'].'",
    restoreTitle:""
 };
});';
