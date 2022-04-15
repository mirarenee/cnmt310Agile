<?php

require_once("Template.php");

$page = new Template("Survey Page");
$page->addHeadElement("<link rel=\"stylesheet\" href=\"main.css\">");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();

$required = array("title","artist");
$errors = false;

if(isset($_POST['submit'])){
		$message = "";
		$required = array("title","artist");
		
		foreach ($required as $val) {
			if (!isset($_POST[$val]) || empty($_POST[$val])) {
				$message = $message . "<br />" . $val . " is required<br />";
			}
			else {
				$message = "Song added successfully.<br />";
			}
		}
	}
print($message);
print $page->getBottomSection();