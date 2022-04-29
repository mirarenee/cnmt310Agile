<?php
require_once("../WebServiceClient/WebServiceClient.php");
$client = new WebServiceClient("http://cnmt310.braingia.org/wwsp/playlist/");
// Default is to POST. If you need to change to a GET, here's how:
//$client->setMethod("GET");
$apikey = "test-key";
$apiuser = "test-user";
$zip = "playlist_get";
$data = array("apikey" => $apikey,
              "apiuser" => $apiuser,
              "action" => $zip,
              );
$client->setPostFields($data);
//For Debugging:
//var_dump($client);
var_dump($client->send());
