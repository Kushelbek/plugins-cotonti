<?php
/**
 * myads functions of plugin
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2014 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL');
require_once cot_langfile('myads', 'plug');

$myads_path = $cfg['plugin']['myads'];

$myads_header = $myads_path['myads_header'];
$myads_main_top = $myads_path['myads_main_top'];
$myads_main_bottom = $myads_path['myads_main_bottom'];
$myads_sideleft_top = $myads_path['myads_sideleft_top'];
$myads_sideleft_bottom = $myads_path['myads_sideleft_bottom'];
$myads_sideright_top = $myads_path['myads_sideright_top'];
$myads_sideright_bottom = $myads_path['myads_sideright_bottom'];
$myads_footer = $myads_path['myads_footer'];

if ($env['location'] == 'administration' || $m == 'add' || $m == 'edit')
{
     if (!empty($cfg['plugin']['myads']['myads_tdesc']))
     {
          $tdesc = array();
          foreach (preg_split('#,#', $cfg['plugin']['myads']['myads_tdesc']) as $tdsc)
          {
               $tdesc = array_merge($tdesc, explode(",", $tdsc));
          }
     }
     else
     {
          $tdesc = false;
     }

     if (!empty($cfg['plugin']['myads']['myads_cdesc']))
     {
          $cdesc = array();
          foreach (preg_split('#,#', $cfg['plugin']['myads']['myads_cdesc']) as $cdsc)
          {
               $cdesc = array_merge($cdesc, explode(",", $cdsc));
          }
     }
     else
     {
          $cdesc = false;
     }
}

function myads_usersdone()
{
     global $cfg, $usr;
     $myads_usersdone = array();
     foreach (preg_split('/[\s,]+/', $cfg['plugin']['myads']['myads_usersdone']) as $myadsu)
     {
          $myads_usersdone = array_merge($myads_usersdone, explode("\n", $myadsu));
     }

     if (in_array($usr['profile']['user_id'], $myads_usersdone))
     {
          return "myads_done";
     }
     return false;
}
