<?php
/**
 * English Language File for myads plugin
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2014 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL.');

$L['Myads'] = 'Myads';
$L['myads_advblock'] = 'Ad unit';
$L['info_name'] = 'Display ad units';
$L['info_desc'] = 'Display ad units in the content, or any place on the site';
$L['myads_style_color'] = ' style="color:#4B6F95"';
$L['myads_textarea_code'] = array('<textarea onclick="this.select();" rows="4" style="resize:none" readonly>', '</textarea>');
$L['myads_input_onclick'] = '<input onclick="this.select();" readonly value="';

$L['cfg_myads_header'] = '<b>In the header (header.tpl)</b><br>' . $L['myads_textarea_code'][0] . '<!-- IF {PHP.myads_header} -->{PHP.myads_header}<!-- ENDIF -->' . $L['myads_textarea_code'][1] .
     '<div' . $L['myads_style_color'] . '>' . $tdesc[0] . '</div>';
$L['cfg_myads_main_top'] = '<b>The central-top part (index.tpl & other)</b><br>' . $L['myads_textarea_code'][0] . '<!-- IF {PHP.myads_main_top} -->{PHP.myads_main_top}<!-- ENDIF -->' . $L['myads_textarea_code'][1] .
     '<div' . $L['myads_style_color'] . '>' . $tdesc[1] . '</div>';
$L['cfg_myads_main_bottom'] = '<b>The central-bottom part (index.tpl & other)</b><br>' . $L['myads_textarea_code'][0] .
     '<!-- IF {PHP.myads_main_bottom} -->{PHP.myads_main_bottom}<!-- ENDIF -->' . $L['myads_textarea_code'][1] . '<div' . $L['myads_style_color'] . '>' . $tdesc[2] . '</div>';
$L['cfg_myads_sideleft_top'] = '<b>In the upper left-hand sidebar (sidebars.tpl)</b><br>' . $L['myads_textarea_code'][0] .
     '<!-- IF {PHP.myads_sideleft_top} -->{PHP.myads_sideleft_top}<!-- ENDIF -->' . $L['myads_textarea_code'][1] . '<div' . $L['myads_style_color'] . '>' . $tdesc[3] . '</div>';
$L['cfg_myads_sideleft_bottom'] = '<b>In the lower left-hand sidebar (sidebars.tpl)</b><br>' . $L['myads_textarea_code'][0] .
     '<!-- IF {PHP.myads_sideleft_bottom} -->{PHP.myads_sideleft_bottom}<!-- ENDIF -->' . $L['myads_textarea_code'][1] . '<div' . $L['myads_style_color'] . '>' . $tdesc[4] . '</div>';
$L['cfg_myads_sideright_top'] = '<b>In the upper right-hand sidebar (sidebars.tpl)</b><br>' . $L['myads_textarea_code'][0] .
     '<!-- IF {PHP.myads_sideright_top} -->{PHP.myads_sideright_top}<!-- ENDIF -->' . $L['myads_textarea_code'][1] . '<div' . $L['myads_style_color'] . '>' . $tdesc[5] . '</div>';
$L['cfg_myads_sideright_bottom'] = '<b>In the lower left-hand sidebar (sidebars.tpl)</b><br>' . $L['myads_textarea_code'][0] .
     '<!-- IF {PHP.myads_sideright_bottom} -->{PHP.myads_sideright_bottom}<!-- ENDIF -->' . $L['myads_textarea_code'][1] . '<div' . $L['myads_style_color'] . '>' . $tdesc[6] . '</div>';
$L['cfg_myads_footer'] = '<b>In the footer (footer.tpl)</b><br>' . $L['myads_textarea_code'][0] . '<!-- IF {PHP.myads_footer} -->{PHP.myads_footer}<!-- ENDIF -->' . $L['myads_textarea_code'][1] .
     '<div' . $L['myads_style_color'] . '>' . $tdesc[7] . '</div>';

$L['cfg_myads_tdesc'] = 'Description template blocks, separated by commas in order';
$L['cfg_myads_cdesc'] = 'Description of content blocks, separated by commas in order';
$L['cfg_myads1'] = '<h3>' . $L['myads_advblock'] . ' №1</h3><div' . $L['myads_style_color'] . '>' . $cdesc[0] . '</div>' . $L['myads_input_onclick'] . '[SCEBANNER1]">';
$L['cfg_myads2'] = '<h3>' . $L['myads_advblock'] . ' №2</h3><div' . $L['myads_style_color'] . '>' . $cdesc[1] . '</div>' . $L['myads_input_onclick'] . '[SCEBANNER2]">';
$L['cfg_myads3'] = '<h3>' . $L['myads_advblock'] . ' №3</h3><div' . $L['myads_style_color'] . '>' . $cdesc[2] . '</div>' . $L['myads_input_onclick'] . '[SCEBANNER3]">';
$L['cfg_myads4'] = '<h3>' . $L['myads_advblock'] . ' №4</h3><div' . $L['myads_style_color'] . '>' . $cdesc[3] . '</div>' . $L['myads_input_onclick'] . '[SCEBANNER4]">';
$L['cfg_myads5'] = '<h3>' . $L['myads_advblock'] . ' №5</h3><div' . $L['myads_style_color'] . '>' . $cdesc[4] . '</div>' . $L['myads_input_onclick'] . '[SCEBANNER5]">';
$L['myads_visy'] = 'Insert available in visual mode!';

$L['cfg_myads_headerlist'] = '<h3>Connecting external scripts</h3>Is displayed in <b>header.tpl</b> tag<br><input onclick="this.select();" size="25" readonly value="{HEADER_MYADSCONNECTS}"><br />Insert the code before <b>&lt;/head></b>';
$L['cfg_myads_footerlist'] = '<h3>Connecting external scripts</h3>Is displayed in <b>footer.tpl</b> added to the<br><input onclick="this.select();" size="25" readonly value="{FOOTER_RC}">';

$L['cfg_myads_usersdone'] = 'User id, separated by commas, that are allowed to insert ads in the full news content';

$L['cfg_myads_sep_else'] = 'AD UNIT FOR INSERTION INTO THE CONTENT VIA EDITOR';
$L['cfg_myads_sep'] = 'WHO CAN INSERT AN AD UNIT IN CONTENT';
$L['cfg_myads_external_sep'] = 'CONNECTING EXTERNAL FILE (JS,CSS)';
