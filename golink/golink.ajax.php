<?PHP

/* ====================

[BEGIN_COT_EXT]
Hooks=ajax
[END_COT_EXT]

======================= */
/**
 * golink plugin
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2015 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/
defined('COT_CODE') or die('Wrong URL');

$referer = parse_url(getenv("HTTP_REFERER"));

if ($referer != '' && $referer['host'] == $sys['domain']) {
   if (isset($_GET['rdr'])) {
      $rdr = $_GET['rdr'];
      if (!preg_match("/^[^\s.]*(" . $_SERVER['HTTP_HOST'] . ")[^\s.]*$/", $rdr)) {

         header("Refresh:0;URL=" . html_entity_decode(base64_decode($rdr)));
         exit();
      }
   }

   if (isset($_GET['mod'])) {
      $mod = $_GET['mod'];

      if (!preg_match("/^[^\s.]*(" . $_SERVER['HTTP_HOST'] . ")[^\s.]*$/", $mod)) {
         $t = new XTemplate(cot_tplfile('golink.modal', 'plug'));
         $cat_url = '/?r=golink&amp;rdr=' . $mod;
      }
   }

   if (isset($_GET['tmr'])) {
      $tmr = $_GET['tmr'];
      if (!preg_match("/^[^\s.]*(" . $_SERVER['HTTP_HOST'] . ")[^\s.]*$/", $tmr)) {
         $t = new XTemplate(cot_tplfile('golink.timer', 'plug'));
         $cat_url = '/?r=golink&amp;rdr=' . $tmr;
      }
   }

   cot_display_messages($t);
   $t->text('MAIN');
}
else {
   header("Refresh:0;URL=" . $cfg['mainurl']);
}
