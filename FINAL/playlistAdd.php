<?php
print "<link href='style.css' rel='stylesheet'>";
if (isset($_POST['title']) && isset($_POST['artist']))
	{
		$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
		$artist = filter_var($_POST['artist'], FILTER_SANITIZE_STRING);
		if ($title == "" || $artist == "")
		{
			$error = "Please enter a valid title and artist";
		}
		if (isset ($error))
		{
			print $error;
		}
		else
		{
			require_once("const.php");
			require_once("WebServiceClient.php");
			$client = new WebServiceClient("http://cnmt310.braingia.org/wwsp/playlist/");
			$data = array("apikey" => APIKEY,
              "apiuser" => APIUSER,
              "title" => $title,
              "artist" => $artist,
              "action" => "playlist_add",
			);
			$client->setPostFields($data);
			$client->setPostFields($data);
			//$client->send(); is what adds the song to db.
			$client->send();
			print "<h3>Song added</h3><br /><br />\n";
			print "<a href=\"index.php\">Back to website</a>";
		}
	}
?>