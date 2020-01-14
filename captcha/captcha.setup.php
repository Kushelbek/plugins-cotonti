<?php
/* ====================
[BEGIN_COT_EXT]
Code=captcha
Name=Captcha
Category=security-authentication
Description=Protects your site from spam bots with image captcha.
Version=1.0.1
Date=2019-03-31
Author=Roffun
Copyright= Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
Notes=BSD License
Auth_guests=R
Lock_guests=12345A
Auth_members=R
Lock_members=12345A
[END_COT_EXT]

[BEGIN_COT_EXT_CONFIG]
delay=02:string::3:Anti-hammer delay in seconds
attempts=03:string::0:Max captcha attempts per session (0 for unlimited)
attempts_sec=04:radio::1:Limit the number of captcha attempts per second in a session
sep_conf=11:separator:::
caplen=12:string::4:Captcha length
caplen_float=13:radio::0:Captcha float length +- 1
cap_charset=14:textarea::abcdefghijklmnpqrstuvwxyz123456789:Captcha charset symbols
cap_angle=15:string::7:Captcha max angle
cap_offset=16:string::4:Captcha max offset
sep_img=20:separator:::
capw=21:string::220:Captcha image width
caph=22:string::130:Captcha image height
cap_line_ef=31:radio::0:Captcha line effects
cap_lines=32:string::0:Captcha max front lines
cap_lines_under=33:string::0:Captcha max lines under text
cap_filter_ef=43:radio::0:Captcha filter effects
[END_COT_EXT_CONFIG]
==================== */

 /**
  * Captcha plugin: setup
  *
  * @author Roffun
  * @copyright Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
  * @license BSD License
  **/

 defined('COT_CODE') or die('Wrong URL.');
