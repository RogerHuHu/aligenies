<?php
require_once __DIR__.'/server.php';

#error_log($_POST['grant_type']);
#error_log($_POST['client_id']);
#error_log($_POST['client_secret']);
#error_log($_POST['code']);
#error_log($_POST['redirect_uri']);
$m=$_POST['redirect_uri'];
$temp = substr($m,0,strpos($m,"?"));
$_POST['redirect_uri']= $temp;
// Handle a request for an OAuth2.0 Access Token and send the response to the client

$server = new OAuth2\Server($storage,array('access_lifetime'=>186400));
$server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));
$server->addGrantType(new OAuth2\GrantType\RefreshToken($storage, array('always_issue_new_refresh_token' => true)));
$server->handleTokenRequest(OAuth2\Request::createFromGlobals(), new OAuth2\Response())->send();

?>
