<?php

/* ====================
[BEGIN_COT_EXT]
Hooks=global
Tags=footer.tpl:{FOOTER_RC};header.tpl:{HEADER_HEAD}
[END_COT_EXT]
==================== */

/**
 * ScrollTo plugin: global
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL.');

 function scroll_to_css()
 {
     $cfg_sc = cot::$cfg['plugin']['scrollto'];

     if ($cfg_sc['btn_data_url']) {
         $btn = '
width: '.$cfg_sc['btn_size'].'px;
height: '.$cfg_sc['btn_size'].'px;
background: url('.$cfg_sc['btn_data_url'].') center no-repeat;
background-size: contain;
             ';
     } else {
         $btn = '
border: solid transparent;
border-width: 0 '.$cfg_sc['btn_size'].'px '.($cfg_sc['btn_size'] * 2.4).'px;
border-bottom-color: '.$cfg_sc['btn_color'].';
border-radius: 3px;';
     }

     $css = '
     #scroll-_-to {
         position: fixed;
         z-index: 9990;
         '.$cfg_sc['btn_vertical'].': '.$cfg_sc['btn_vertical_position'].'%;
         '.$cfg_sc['btn_horisontal'].': 0;
         margin-'.$cfg_sc['btn_horisontal'].': '.$cfg_sc['btn_horisontal_margin'].'px;
     }

     #scroll-_-to [hidden] {
         display: none;
     }

     #scroll-_-to div {
         width: 0;
         height: 0;
         margin: 3px 0;
         '.$btn.'
         opacity: '.$cfg_sc['btn_opacity'].';
         transition: All .3s ease-in-out;
     }

     #scroll-_-to div:last-child {
         transform: scale(1,-1);
         margin-top: 0;
     }

     #scroll-_-to div:hover {
         cursor: pointer;
         border-bottom-color: '.$cfg_sc['btn_hovered_color'].';
         opacity: 1;
     }

     #scroll-_-to [disabled] {
      border-bottom-color: '.$cfg_sc['btn_disabled_color'].';
      pointer-events: none;
     }
     ';

     return cot_rc_minify($css, 'css');
 }

function scroll_to_init()
{
    $cfg_sc = cot::$cfg['plugin']['scrollto'];
    $scroll_from = ($cfg_sc['scroll_from'] > 0) ? (int)$cfg_sc['scroll_from'] : 'b.clientHeight/2';

$ret = 'window.addEventListener("load",function(){function g(){0!==window.scrollY?(a.setAttribute("hidden",""),window.scrollBy(0,-'.$cfg_sc['scroll_step'].'),setTimeout(g,'.$cfg_sc['scroll_time'].')):a.removeAttribute("hidden")}function h(){Math.ceil(window.scrollY+b.clientHeight)!=b.scrollHeight?(c.setAttribute("hidden",""),window.scrollBy(0,'.$cfg_sc['scroll_step'].'),setTimeout(h,'.$cfg_sc['scroll_time'].')):c.removeAttribute("hidden")}var b=document.documentElement,e='.$scroll_from.',d=document.body||document.getElementsByTagName("body")[0];if(b.scrollHeight>b.clientHeight+e&&d){var f=document.createElement("div");
f.id="scroll-_-to";f.innerHTML="<div disabled></div><div disabled></div>";d.appendChild(f)}d=document.getElementById("scroll-_-to");var c=d.querySelector("div:first-child"),a=d.querySelector("div:last-child");c&&c.addEventListener("click",g);a&&a.addEventListener("click",h);window.addEventListener("scroll",function(){var d=b.scrollHeight-window.scrollY-b.clientHeight;null!==c&&(window.scrollY>e?c.removeAttribute("disabled"):c.setAttribute("disabled",""));null!==a&&(d>e?a.removeAttribute("disabled"):
a.setAttribute("disabled",""))})});';

    return cot_rc_minify($ret, 'js');
}

Resources::addEmbed(scroll_to_css(), 'css', 99);
Resources::embedFooter(scroll_to_init(), 'js', 99);
