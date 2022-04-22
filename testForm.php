<?php
//This is for testing that we can add songs to the web service. There is no validation so be careful
require_once("WebServiceClient.php");
require_once("const.php");
$client = new WebServiceClient("http://cnmt310.braingia.org/wwsp/playlist/");

print "<form method=\"POST\">";
print "\t<input type=\"text\" id=\"title\" name=\"title\"><br />\n";
print "\t<input type=\"text\" id=\"artist\" name=\"artist\">\n";
print "\t<input type=\"submit\" name=\"submit\" value=\"Submit\">\n";
print "\t<input type=\"reset\" name=\"reset\" value=\"Reset\">\n";
print "</form>\n";

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
print $client->send();