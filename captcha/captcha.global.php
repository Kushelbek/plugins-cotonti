<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=global
[END_COT_EXT]
==================== */

/**
 * Captcha plugin: global
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL');

require_once cot_langfile('captcha', 'plug');

/**
 * Generates a block with a captcha image and a text field for entering
 *
 * @return string
 */

function captcha_generate()
{
    $cfg_captcha = cot::$cfg['plugin']['captcha'];
    $notbot = 0;
    $notbot_input = '';
    $R['notbot_input'] = '<p><label><input name="notbot" type="checkbox" required> '.cot::$L['captcha_no_bot'].'</label></p>';

    if ($cfg_captcha['attempts_sec'] && time() - $_SESSION['captcha_time'] <= 1) {
        cot_error(cot::$L['captcha_too_frequent_requests']);
        $notbot_input = $R['notbot_input'];
    }

    if ($cfg_captcha['attempts'] > 0 && $_SESSION['captcha_attempts'] >= $cfg_captcha['attempts']) {
        cot_error(cot::$L['captcha_too_many_attempts']);
        $notbot_input = $R['notbot_input'];
    }

    $salt = md5(mt_rand());
    $sid = md5(uniqid(time()));
    $_SESSION['captcha_salt'] = $salt;

    $t = new XTemplate(cot_tplfile('captcha', 'plug'));

    $img = '<img src="'.cot_url('index', 'r=captcha').'&amp;sid='.$sid.'" alt="'.cot::$L['captcha_refresh'].'" onclick="this.src=\''.cot_url('index', 'r=captcha').'&amp;sid='.time().'\' + Math.random().toString(36).substr(2);this.blur();" oncontextmenu="return false">';
    $input = cot_inputbox('text', 'rverify', '', 'size="14" maxlength="20" autocomplete="off" placeholder="'.cot::$L['Captcha_code_reply'].'" title="'.cot::$L['Captcha_code_reply_info'].'" required').'<input type="hidden" name="captcha_salt" value="' . $salt . '">';

    $t->assign(array(
        'CAPTCHA_IMG' => $img,
        'CAPTCHA_INPUT' => '<p>'.$input.'</p>'.$notbot_input,
    ));

    $t->parse();
    return $t->text();
}

/**
 * Generates a form inside which a block with a captcha image and a text field for input
 * This function is used to display captcha in an arbitrary place.
 *
 * @return string
 */
function captcha_generate_custom()
{
    global $captcha_verifyed;
    $cfg_captcha = cot::$cfg['plugin']['captcha'];
    $cnotbot = cot_import('cnotbot', 'P', 'TXT');
    $cnotbot_input = '';
    $R['cnotbot_input'] = '<p><label><input name="cnotbot" type="checkbox" required> '.cot::$L['captcha_no_bot'].'</label></p>';

    if ($cfg_captcha['attempts_sec'] && time() - $_SESSION['ccaptcha_time'] <= 1) {
        cot_error(cot::$L['captcha_too_frequent_requests']);
        $cnotbot_input = $R['cnotbot_input'];
    }

    if ($cfg_captcha['attempts'] > 0 && $_SESSION['ccaptcha_attempts'] >= $cfg_captcha['attempts']) {
        if ($cnotbot == 'on' || time() - $_SESSION['ccaptcha_time'] > 1800) {
            $_SESSION['ccaptcha_attempts'] = 0;
            $cnotbot = 0;
        } else {
            cot_error(cot::$L['captcha_too_many_attempts']);
            $cnotbot_input = $R['cnotbot_input'];
        }
    }

    $csalt = securimageSalt();
    $csid = md5(uniqid(time()));
    $_SESSION['ccaptcha_salt'] = $csalt;

    $t = new XTemplate(cot_tplfile('captcha.custom', 'plug'));

    $cimg = '<img src="'.cot_url('index', 'r=captcha').'&amp;csid='.$csid.'" alt="'.cot::$L['captcha_refresh'].'" onclick="this.src=\''.cot_url('index', 'r=captcha').'&amp;csid='.time().'\' + Math.random().toString(36).substr(2);this.blur();" oncontextmenu="return false">';
    $cinput = cot_inputbox('text', 'cverify', '', 'size="14" maxlength="20" autocomplete="off" placeholder="'.cot::$L['Captcha_code_reply'].'" title="'.cot::$L['Captcha_code_reply_info'].'" required').'<input type="hidden" name="ccaptcha_salt" value="' . $csalt . '">';

    $t->assign(array(
        'CAPTCHA_IMG' => $cimg,
        'CAPTCHA_INPUT' => '<p>'.$cinput.'</p>'.$cnotbot_input,
        'CAPTCHA_SUBMIT' => '<button type="submit" formaction="">'.cot::$L['Submit'].'</button>'
    ));

    if (!empty(cot_import('cverify', 'P', 'TXT')) && cot_check_xp()) {
        $cverify = cot_import('cverify', 'P', 'TXT');
        $ccaptcha_verifyed = false;
        if (!captcha_validate_custom($cverify)) {
            cot_message(cot::$L['captcha_verification_failed'], 'warning');
        }
    }

    cot_display_messages($t);

    $t->parse();
    return $t->text();
}

/**
 * Validates captcha input.
 *
 * @param string $res user result.
 * @return bool
 */
function captcha_validate($res)
{
    if (time() - $_SESSION['captcha_time'] > cot::$cfg['plugin']['captcha']['delay']) {
        if (cot_import('captcha_salt', 'POST', 'ALP') == $_SESSION['captcha_salt']) {
            if ($_SESSION['captcha_count'] == 0) {
                if ($res == $_SESSION['phrase']) {
                    unset(
                        $_SESSION['captcha_count'],
                        $_SESSION['captcha_attempts'],
                        $_SESSION['captcha_time'],
                        $_SESSION['captcha_salt'],
                        $_SESSION['phrase']);
                    return true;
                }
            }
        }
    }
    $_SESSION['captcha_count']++;
    $_SESSION['captcha_attempts']++;
    return false;
}

/**
 * Validates captcha input notbot.
 *
 * @param string $notbot user result.
 */
function captcha_notbot_validate($notbot)
{
    if (cot::$cfg['plugin']['captcha']['attempts'] > 0 && $_SESSION['captcha_attempts'] >= cot::$cfg['plugin']['captcha']['attempts']) {
        if ($notbot == 'on' || time() - $_SESSION['captcha_time'] > 1800) {
            $_SESSION['captcha_attempts'] = 0;
            $notbot = 0;
        }
    }
    return false;
}

/**
 * Validates custom captcha input.
 *
 * @param string $cres user result.
 * @return bool
 */
function captcha_validate_custom($cres)
{
    global $ccaptcha_verifyed;
    if (time() - $_SESSION['ccaptcha_time'] > cot::$cfg['plugin']['captcha']['delay']) {
        if (cot_import('ccaptcha_salt', 'P', 'TXT') == $_SESSION['ccaptcha_salt']) {
            if ($_SESSION['ccaptcha_count'] == 0) {
                if ($cres == $_SESSION['cphrase']) {
                    $ccaptcha_verifyed = true;
                    unset(
                        $_SESSION['ccaptcha_count'],
                        $_SESSION['ccaptcha_attempts'],
                        $_SESSION['ccaptcha_time'],
                        $_SESSION['ccaptcha_salt'],
                        $_SESSION['cphrase']);
                    return true;
                }
            }
        }
    }
    $_SESSION['ccaptcha_count']++;
    $_SESSION['ccaptcha_attempts']++;
    return false;
}

/**
 * Generate random salt for custom captcha every hour.
 */
function securimageSalt()
{
    $tmp = cot::$cfg['site_id'].date('H').cot::$sys['domain'];
    mb_substr(md5($tmp), 0, 20);
}

$cot_captcha[] = 'captcha';
