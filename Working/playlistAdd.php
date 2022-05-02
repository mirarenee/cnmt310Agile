<?php
require_once("WebServiceClient.php");
require_once("const.php");
$client = new WebServiceClient("http://cnmt310.braingia.org/wwsp/playlist/");

$data = array("apikey" => APIKEY,
              "apiuser" => APIUSER,
			  //$_POST will be swapped with a variable made in isset
              "title" => $_POST['title'],
              "artist" => $_POST['artist'],
              "action" => "playlist_add",
);
$client->setPostFields($data);
//$client->send(); is what adds the song to db.
//print shows ID of song in the db. 
$client->send();


print "Song added\n\n";
print "<a href=\"index.php\">Back to website</a>";