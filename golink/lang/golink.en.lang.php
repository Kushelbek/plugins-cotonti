<?php

/**
 * golink plugin
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2015 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

defined('COT_CODE') or die('Wrong URL.');

$L['info_name'] = 'Hiding external links';
$L['info_desc'] = 'External links through a redirect page with countdown timer';
$L['cfg_golink_timer'] = 'Delay time in seconds';
$L['cfg_golink_class'] = 'The name of the class for links';
$L['cfg_golink_usersdone'] = 'User ID, separated by commas, that are allowed to add links using the open<br>[openlink=url]anchor[/openlink]<br><em style="color:red">ID must be ownerid in Configure</em>';
$L['cfg_golink_datahref'] = 'Handle the href attribute with jQuery';
$L['golink_go'] = 'go to the site';
$L['golink_not_go'] = 'do not go to the site';
$L['golink_go_info'] = 'Transition to an external link';

$L['golink_redirect_time_text'] = 'Redirection happens automatically after <span id="timer">' . $cfg['plugin']['golink']['golink_timer'] .
    '</span> seconds';
$L['golink_comeback'] = 'Return to <strong>' . $sys['domain'] . '</strong>, much more interesting!';
$L['golink_warning'] = 'Administratsiya site is not responsible for the consequences of transition.<br>We also do not recommend that you refer to third-party sites their data, <br>related to <strong>' .
    $sys['domain'] . '</strong>, such as user name, password, other.';
$L['cfg_golink_prfx'] = 'Options open links by default';
$L['cfg_golink_prfx_params'] = array(
    'Single page + timer',
    'Single page',
    'Redirect');
