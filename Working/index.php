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
$page->addHeadElement("<link href='style.css' rel='stylesheet'>");
$page->finalizeTopSection();

$page->finalizeBottomSection();

print $page->getTopSection();

$result = playlistGet($client);

print "<br />\n";
print "<div class='position-relative'>\n";
print "<div class='mx-auto' style='width: 200px;'>\n";
print "<header>\n";
print "<h2>Playlist for " . date("m/d/y") . "</h2>\n";
print "</header>\n";
print "</div>\n";


//Now Playing
print "<h3>";
foreach ($result as $key => $row) {
	if ($row == "Error")
	{
		print "No songs in the playlist";
		break;
	}
	else
	{
		print "Now playing: " . $result[sizeof($result) - 1]->title . " by " . $result[sizeof($result) - 1]->artist;
		break;
	}
}
print "</h3>";
print "<br /><br />\n";

//Playlist add form
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
$result = playlistGet($client);

print "<table>";
foreach ($result as $key => $row) {
	if ($row == "Error")
	{
		print "<h3>No songs in the playlist</h3>";
		break;
	}
	print "<tr>";
	print "<td>" . $row->title . "</td>";
	print "<td>" . $row->artist . "</td>";
	print "<td>" . $row->playouttime . "</td>";
	print "</tr>";
}
print "</table>";
print "</div>\n";

//takes client, executes GET, returns values
function playlistGet($client) {
	$client->setMethod("GET");
	$action = "playlist_get";
	$data = array("apikey" => APIKEY,
              "apiuser" => APIUSER,
              "action" => $action,
              );
	$client->setPostFields($data);

	return json_decode($client->send());
}