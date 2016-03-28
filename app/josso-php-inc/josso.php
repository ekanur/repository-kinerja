<?php

/**
 * PHP Josso lib.  Include this in all pages you want to use josso.
 *
 * @package  org.josso.agent.php
 *
 * @version $Id: josso.php 613 2008-08-26 16:42:10Z sgonzalez $
 * @author Sebastian Gonzalez Oyuela <sgonzalez@josso.org>
 */

/**
JOSSO: Java Open Single Sign-On

Copyright 2004-2008, Atricore, Inc.

This is free software; you can redistribute it and/or modify it
under the terms of the GNU Lesser General Public License as
published by the Free Software Foundation; either version 2.1 of
the License, or (at your option) any later version.

This software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this software; if not, write to the Free
Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA
02110-1301 USA, or see the FSF site: http://www.fsf.org.
*/

require_once('class.jossoagent.php');
require_once('class.jossouser.php');
require_once('class.jossorole.php');

require('josso-cfg.inc');

session_start();

$josso_agent = jossoagent::getNewInstance();
$ssoSessionId = $josso_agent->accessSession();

/**
 * Use this function when ever you want to start user authentication.
 */
function jossoRequestLogin() {

    $currentUrl = $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'];

    jossoRequestLoginForUrl($currentUrl);
}


/**
 * Use this function when ever you want to logout the current user.
 */
function jossoRequestLogout() {

    $currentUrl = $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'];

    jossoRequestLogoutForUrl($currentUrl);
}



/**
 * Creates a login url for the current page, use to create links to JOSSO login page
 */
function jossoCreateLoginUrl() {

    // Get JOSSO Agent instance
    $josso_agent = & jossoagent::getNewInstance();

    $currentUrl = $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'];
    $loginUrl = $josso_agent->getBaseCode().'/servicelogin'. '?josso_current_url=' . $currentUrl;

    return $loginUrl;

}

/**
 * Creates a logout url for the current page, use to create links to JOSSO logout page
 */
function jossoCreateLogoutUrl() {

    // Get JOSSO Agent instance
    $josso_agent = & jossoagent::getNewInstance();

    $currentUrl = createBaseUrl() . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'];
    $logoutUrl =  $josso_agent->getBaseCode().'/servicelogout'. '?josso_current_url=' . $currentUrl;

    return $logoutUrl;

}


function jossoRequestLoginForUrl($currentUrl) {

    $_SESSION['JOSSO_ORIGINAL_URL'] = $currentUrl;

    // Get JOSSO Agent instance
    $josso_agent = & jossoagent::getNewInstance();
    $securityCheckUrl = createBaseUrl().$josso_agent->getBaseCode().'/public/servicecheck';

    $loginUrl = $josso_agent->getGatewayLoginUrl(). '?josso_back_to=' . $securityCheckUrl;

    $loginUrl = $loginUrl . createFrontChannelParams();

    forceRedirect($loginUrl);

}

function jossoRequestLogoutForUrl($currentUrl) {

    // Get JOSSO Agent instance
    $josso_agent = & jossoagent::getNewInstance();
    $logoutUrl = $josso_agent->getGatewayLogoutUrl(). '?josso_back_to=' . $currentUrl;

    $logoutUrl = $logoutUrl . createFrontChannelParams();

    // Clear SSO Cookie
    setcookie("JOSSO_SESSIONID", '', 0, "/"); // session cookie ...
    $_COOKIE['JOSSO_SESSIONID'] = '';


    forceRedirect($logoutUrl);

}

function forceRedirect($url,$die=true) {
    if (!headers_sent()) {
        ob_end_clean();
        header("Location: " . $url);
    }
    printf('<HTML>');
    printf('<META http-equiv="Refresh" content="0;url=%s">', $url);
    printf('<BODY onload="try {self.location.href="%s" } catch(e) {}"><a href="%s">Redirect </a></BODY>', $url, $url);
    printf('</HTML>');
    if ($die)
        die();
}

function createBaseUrl() {
    // ReBuild securityCheck URL
    $protocol = 'http';
    $host = $_SERVER['HTTP_HOST'];

    if (isset($_SERVER['HTTPS'])) {

        // This is a secure connection, the default PORT is 443
        $protocol = 'https';
        if ($_SERVER['SERVER_PORT'] != 443) {
            $port = $_SERVER['SERVER_PORT'];
        }

    } else {
        // This is a NON secure connection, the default PORT is 80
        $protocol = 'http';
        if ($_SERVER['SERVER_PORT'] != 80) {
            $port = $_SERVER['SERVER_PORT'];
        }
    }

    return $protocol.'://'.$host.(isset($port) ? ':'.$port : '');

}

function createFrontChannelParams() {
    // Add some request parameters like host name
    $host = $_SERVER['HTTP_HOST'];
    $params = '&josso_partnerapp_host=' . $host;

    return $params;

    // TODO : Support josso_partnerapp_ctx param too ?

}

?>
