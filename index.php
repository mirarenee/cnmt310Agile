<?php
require_once("Template.php");
require_once("WebServiceClient.php");
//require_once("const.php");
$client = new WebServiceClient("http://cnmt310.braingia.org/wwsp/playlist/");

$page = new Template("Playlist");
$page->addHeadElement("<link rel='stylesheet' href='main.css'>");
$page->addHeadElement('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>');
$page->addHeadElement('<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>');
$page->addHeadElement("<script src='javascript.js'></script>");
$page->addHeadElement("<script src='testac.js?" .time() . "'></script>");
$page->finalizeTopSection();

$page->finalizeBottomSection();

print $page->getTopSection();

print "<header>\n";
print "<h2 style='color:white;'>Playlist</h2>\n";
print "</header>\n";
print "<main>\n";
print "<form action='#' method='POST'>\n";
print "Field: <input type=\"text\" name=\"form-field\" id=\"form-field\"><br />\n";
print "<input type=\"submit\" name=\"submit\">\n";
print "</form>\n";

print "<br /><br /><br /><br />\n";

/** replace this section with data pulled from the auto complete
$action = "playlist_get";
$data = array("apikey" => "bcljigpion",	//REPLACE WITH APIKEY WHEN CONST IS WORKING
              "apiuser" => "api60", //APIUSER,
              "action" => $action,
              );
$client->setPostFields($data);

$result = json_decode($client->send());

**/

print "<table>";
foreach ($result as $key => $row) {
	print "<tr>";
	print "<td>" . $row->title . "</td>";
	print "<td>" . $row->artist . "</td>";
	print "<td>" . $row->album . "</td>";
	print "<td>" . $row->category . "</td>";
	print "</tr>";
}
print "</table>\n";