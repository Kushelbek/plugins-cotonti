<?php

/* ====================
[BEGIN_COT_EXT]
Code=scrollto
Name=ScrollTo
Category=navigation-structure
Description=Customizable scroll up / down onclick buttons
Version=1.0.1
Date=2019-03-13
Author=Roffun
Copyright=Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
Notes=BSD License
Auth_guests=R
Lock_guests=12345A
Auth_members=R
Lock_members=12345A
[END_COT_EXT]
[BEGIN_COT_EXT_CONFIG]
btn_size=01:custom:cfg_number_num(10,48,1):16:buttons width
scroll_time=05:custom:cfg_number_num(0,40,2):20:time
scroll_step=07:custom:cfg_number_num(0,80,2):54:step
scroll_from=08:custom:cfg_number_num(0,2000,10):0:height from
btn_data_url=09:textarea:::data image url
sep_position=10:separator:::buttons position
btn_horisontal=11:select:left,right:right:buttons horisontal position
btn_horisontal_margin=12:custom:cfg_number_num(0,80,2):4:horisontal margin
btn_vertical=13:select:top,bottom:top:buttons vertical position
btn_vertical_position=14:custom:cfg_number_num(0,50,1):50:vertical position in %
sep_colors=20:separator:::buttons color and opacity
btn_color=21:custom:cfg_color(3,6):#5a6a74:btn color
btn_hovered_color=22:custom:cfg_color(3,6):#3790c8:btn hover color
btn_disabled_color=23:custom:cfg_color(3,6):#d5d5d5:btn disable color
btn_opacity=24:custom:cfg_number_num(.1,1,.1):.5:opacity
[END_COT_EXT_CONFIG]

* ==================== */


 /**
  * ScrollTo plugin: setup
  *
  * @author Roffun
  * @copyright Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
  * @license BSD License
  **/

 defined('COT_CODE') or die('Wrong URL.');
