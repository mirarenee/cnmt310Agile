<?php
//put at top
require_once("WebServiceClient.php");
require_once("const.php");
$client = new WebServiceClient("http://cnmt310.braingia.org/wwsp/playlist/");

//put where we want to have the playlist displayed
$action = "playlist_get";
$data = array("apikey" => APIKEY,
              "apiuser" => APIUSER,
              "action" => $action,
              );
$client->setPostFields($data);


$result = json_decode($client->send());
print "<table>";
foreach ($result as $key => $row) {
	print "<tr>";
	print "<td>" . $row->title . "</td>";
	print "<td>" . $row->artist . "</td>";
	print "<td>" . $row->album . "</td>";
	print "<td>" . $row->category . "</td>";
	print "</tr>";
}
print "</table>";