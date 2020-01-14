<?php

/* ====================
[BEGIN_COT_EXT]
Code=myads
Name=Myads
Category=administration-management
Description=Display ad units in the content, or any place on the site
Version=2.3.3
Date=08.12.2019
Author=Roffun
Copyright=Copyright (c) Roffun, 2014 - 2019 | https://github.com/Roffun
Notes=BSD License
English | Русский
SQL=
Auth_guests=R
Lock_guests=W12345A
Auth_members=R
Lock_members=W12345A
Requires_modules=
Requires_plugins=
Recommends_modules=page
Recommends_plugins=boxes
[END_COT_EXT]

[BEGIN_COT_EXT_CONFIG]
myads_header=01:textarea:::
myads_main_top=02:textarea:::
myads_main_bottom=03:textarea:::
myads_sideleft_top=04:textarea:::
myads_sideleft_bottom=05:textarea:::
myads_sideright_top=06:textarea:::
myads_sideright_bottom=07:textarea:::
myads_footer=08:textarea:::
myads_tdesc=09:textarea::header, center-top, cener-bottom, left-top, left-bottom, right-top, right-bottom, bottom:
myads_sep_else=18:separator:::
myads1=19:textarea:::
myads2=20:textarea:::
myads3=21:textarea:::
myads4=22:textarea:::
myads5=23:textarea:::
myads_cdesc=24:textarea::scebanner1, scebanner2, scebanner3, scebanner4, scebanner5:
myads_external_sep=25:separator:::
myads_headerlist=26:textarea:::
myads_footerlist=27:textarea:::
myads_sep=30:separator:::
myads_usersdone=31:string::1:
[END_COT_EXT_CONFIG]
==================== */

/**
 * Myads setup plugin
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2014 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL.');
