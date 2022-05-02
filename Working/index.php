<?php
require_once("Template.php");
require_once("WebServiceClient.php");
require_once("const.php");
$client = new WebServiceClient("http://cnmt310.braingia.org/wwsp/playlist/");

$page = new Template("Playlist");
$page->addHeadElement("<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>");
$page->addHeadElement('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>');
$page->addHeadElement('<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>');
$page->addHeadElement("<script src='javascript.js'></script>");
$page->addHeadElement("<script src='testac.js?" .time() . "'></script>");
$page->finalizeTopSection();

$page->finalizeBottomSection();

print $page->getTopSection();

$client->setMethod("GET");
$action = "playlist_get";
$data = array("apikey" => APIKEY,
              "apiuser" => APIUSER,
              "action" => $action,
              );
$client->setPostFields($data);
$result = json_decode($client->send());

print "<br />\n";
print "<div class='position-relative'>\n";
print "<div class='mx-auto' style='width: 200px;'>\n";
print "<header>\n";
print "<h2>Playlist</h2>\n";
print "</header>\n";
print "</div>\n";

print "<h3 style='text-align: center;'>";
print "Now playing: " . $result[sizeof($result) - 1]->title . " by " . $result[sizeof($result) - 1]->artist;
print "</h3>";
print "<br /><br />\n";

print "<div class='mx-auto' style='width: 500px;'>\n";
print "<form action='#' method='POST'>\n";
print "<label for='searchTitle' class='form-label'>Song List</label>\n";
print "<input class='form-control' id='form-field' placeholder='Type to search...'>\n";
print "</form>\n";
print "</div>\n";

print "<br /><br /><br />\n";


/** replace this section with data pulled from the auto complete
$action = "playlist_get";
$data = array("apikey" => "bcljigpion",	//REPLACE WITH APIKEY WHEN CONST IS WORKING
              "apiuser" => "api60", //APIUSER,
              "action" => $action,
              );
$client->setPostFields($data);

$result = json_decode($client->send());

**/
print "<div class='mx-auto' style='width: 500px;'>\n";
print "<form method=\"POST\" action=\"playlistAdd.php\" onsubmit=\"return validate()\">";
print "<label for=\"title\" class=\"required\">Title:</label>";
print "<input type=\"text\" id=\"title\" name=\"title\"><br />\n";
print "<label for=\"artist\" class=\"required\">Artist:</label>";
print "<input type=\"text\" id=\"artist\" name=\"artist\"><br />\n";
print "<input type=\"submit\" name=\"submit\" value=\"Submit\">\n";
print "<input type=\"reset\" name=\"reset\" value=\"Reset\">\n";
print "</form>\n";
print "</div><br \>\n";

//Displays the playlist for today
$client->setMethod("GET");
$action = "playlist_get";
$data = array("apikey" => APIKEY,
              "apiuser" => APIUSER,
              "action" => $action,
              );
$client->setPostFields($data);

$result = json_decode($client->send());
//print "<div class='mx-auto' style=\"text-align: center, margin-right: auto, margin-left: auto;\">\n";
print "<table style=\"margin-left: auto; margin-right: auto; text-align: center; border: 1px solid;\">";
foreach ($result as $key => $row) {
	if ($row == "Error")
	{
		print "No songs in the playlist";
		break;
	}
	print "<tr style=\"height: 10px; border: 1px solid;\">";
	print "<td style=\"width: 200px; border: 1px solid;\">" . $row->title . "</td>";
	print "<td style=\"width: 200px; border: 1px solid;\">" . $row->artist . "</td>";
//	print "<td>" . $row->album . "</td>";
//	print "<td>" . $row->category . "</td>";
	print "</tr>";
}
print "</table>";
//print "</div>\n";

print "</div>\n";