<?php

require_once("Template.php");

$page = new Template("Playlist");
// $page->addHeadElement("<link rel=\"stylesheet\" href=\"style.css\">");
$page->finalizeTopSection();

$page->finalizeBottomSection();

print $page->getTopSection();

print "<h1>Home Page</h1>\n";
print "<p>Welcome to the home page of this website.</p><br />\n";
print "<hr>\n";

print "<h2>Form</h2>\n";
print "<p>Text here</p>\n";

print $page->getBottomSection();