<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=parser.last
[END_COT_EXT]
==================== */
/**
 * golink plugin
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2015 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL');

global $sys, $cfg, $env;

if (!function_exists('nolinks_replace'))
{
     function nolinks_replace($m)
     {
          global $sys, $pag, $cfg, $env, $db_com;

          if (preg_match('`^([a-z0-9-.]\.?){0,}' . preg_quote($sys['domain']) . '(/.*)?$`i', $m[4]))
          {
               return $m[0];
          }

          if (($pag['page_OPENLINKSONPAGE'] == 'open') || ($pag['page_OPENLINKSONPAGE'] == 'nofollow'))
          {
               // IF COMMENTS ON PAGE MODULE LOCATION
               if ($env['ext'] == 'page' && $db_com)
               {
                    $prfx = "rdr";

                    $m[5] = (mb_strpos($m[5], 'rel="') === false) ? 'rel="nofollow"' . $m[5] : str_replace('rel="', 'rel="nofollow ', $m[5]);

                    $href = '/?r=golink&amp;' . $prfx . '=' . htmlentities(base64_encode('http' . $m[3] . '://' . $m[4]));
                    return '<a' . $m[1] . 'href="' . $href . '" data-link="' . $href . '" ' . $m[5] . ' target="_blank" class="' . $cfg['plugin']['golink']['golink_class'] . '">';
               }
               else
               {

                    if ($pag['page_OPENLINKSONPAGE'] == 'open')
                    {
                         return $m[0];
                    }
                    else
                    {
                         return '<a' . $m[1] . 'rel="nofollow" href="http' . $m[3] . '://' . $m[4] . '" target="_blank">';
                    }

               }

          }
          else
          {

               if ($prfx == "")
               {
                    $prfx = $cfg['plugin']['golink']['golink_prfx'];
               }

               // IF PAGE MODULE LOCATION
               if ($env['ext'] == 'page')
               {
                    if ($pag['page_OPENLINKSONPAGE'] == 'redirect')
                    {
                         $prfx = "rdr";
                    }
                    if ($pag['page_OPENLINKSONPAGE'] == 'modal')
                    {
                         $prfx = "mod";
                    }
                    if ($pag['page_OPENLINKSONPAGE'] == 'modal_timer')
                    {
                         $prfx = "tmr";
                    }

               }

               $m[5] = (mb_strpos($m[5], 'rel="') === false) ? 'rel="nofollow"' . $m[5] : str_replace('rel="', 'rel="nofollow ', $m[5]);

               $href = '/?r=golink&amp;' . $prfx . '=' . htmlentities(base64_encode('http' . $m[3] . '://' . $m[4]));
               return '<a' . $m[1] . 'href="' . $href . '" data-link="' . $href . '" ' . $m[5] . ' target="_blank" class="' . $cfg['plugin']['golink']['golink_class'] . '">';

          }
     }
}

if (!function_exists('anchorlink_replace'))
{
     function anchorlink_replace($m)
     {
          global $sys, $out;
          $anchor_link = '<a href="' . $out['canonical_uri'] . $m[1] . '">';
          return $anchor_link;
     }
}

if (!function_exists('anchor_replace'))
{
     function anchor_replace($m)
     {
          global $sys;
          $anchor_link = '<a id="' . $m[1] . '" data-name="' . $m[2] . '">';
          return $anchor_link;
     }
}

if (!function_exists('golink_usersdone_link'))
{
     function golink_usersdone_link($m)
     {
          global $cfg, $pag;
          $golink_usersdone = array();
          foreach (preg_split('#,#', $cfg['plugin']['golink']['golink_usersdone']) as $golinku)
          {
               $golink_usersdone = array_merge($golink_usersdone, explode(",", $golinku));
          }
          if (in_array($pag['page_ownerid'], $golink_usersdone))
          {
               return '<a href="' . htmlentities($m[1]) . '" target="_blank">' . $m[2] . '</a>';
          }
          return '<a href="/?r=golink&amp;rdr=' . htmlentities(base64_encode($m[1])) . '" data-link="/?r=golink&amp;mod=' . htmlentities(base64_encode($m[1])) .
               '" rel="nofollow" target="_blank" class="' . $cfg['plugin']['golink']['golink_class'] . '">' . $m[2] . '</a>';
     }
}

// Replace all external links
$text = preg_replace('#<a(.*?)href="//(.*?)#si', '<a $1 href="http://$2', $text);
$text = preg_replace_callback('`<a(.+?)href=("|\')?http(s)?://([^\s"\'>]+)\2?(.*?)>`i', 'nolinks_replace', $text);
$text = preg_replace_callback('`<a href="(#.*)">`i', 'anchorlink_replace', $text);
$text = preg_replace_callback('`<a id="(.*)" name="(.*?)">`i', 'anchor_replace', $text);
$text = preg_replace_callback('`\[openlink=(.*?)\](.*?)\[\/openlink\]`i', 'golink_usersdone_link', $text);
