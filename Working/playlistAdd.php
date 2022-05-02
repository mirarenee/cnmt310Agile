<?php
require_once("WebServiceClient.php");
require_once("const.php");
print "<link href='style.css' rel='stylesheet'>";
$client = new WebServiceClient("http://cnmt310.braingia.org/wwsp/playlist/");

$data = array("apikey" => APIKEY,
              "apiuser" => APIUSER,
              "title" => $_POST['title'],
              "artist" => $_POST['artist'],
              "action" => "playlist_add",
);
$client->setPostFields($data);
//$client->send(); is what adds the song to db.

$client->send();


print "<h3>Song added</h3><br /><br />\n";
print "<a href=\"index.php\">Back to website</a>";