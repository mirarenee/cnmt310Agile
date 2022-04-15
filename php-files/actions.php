<?php

require_once("Template.php");

$page = new Template("Survey Page");
$page->addHeadElement("<link rel=\"stylesheet\" href=\"style.css\">");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();

$required = array("email","grade","grad_year");
$errors = false;

$majors = array();
if (isset($_POST['majors']) && is_array($_POST['majors'])) {
  foreach ($_POST['majors'] as $major) {
    $majors[] = $major;
  }
}
else {
	$errors = true;
	print "A major is required<br />\n";
}

foreach ($required as $val) {
  if (!isset($_POST[$val]) || empty($_POST[$val])) {
    print $val . " is required<br />\n";
    $errors = true;
  }
}

if ($errors === true) {
	print $page->getBottomSection();
  exit;
}

print "Thank you for taking this survey.\n";
print $page->getBottomSection();