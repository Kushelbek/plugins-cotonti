<?php

/* ====================
[BEGIN_COT_EXT]
Code=golink
Name=Golink
Description=Обработка внешних ссылок
Version=2.1.5
Date=08-12-2016
Author=Roffun
Copyright=Copyright (c) Roffun, 2015 - 2019 | https://github.com/Roffun
Notes=BSD License
Auth_guests=R
Lock_guests=12345A
Auth_members=RW
Lock_members=
Requires_modules=page
Requires_plugins=
Recommends_modules=
Recommends_plugins=ckeditor,html
[END_COT_EXT]

[BEGIN_COT_EXT_CONFIG]
golink_timer=01:select:0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,20,25,30:5:
golink_class=02:string::golink:
golink_datahref=04:radio::1:
golink_prfx=05:select:tmr,mod,rdr:mod:
golink_usersdone=31:string::1:
[END_COT_EXT_CONFIG]
==================== */

defined('COT_CODE') or die('Wrong URL');

/**
 * golink plugin
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2015 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/
