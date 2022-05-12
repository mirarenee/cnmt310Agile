<?php
print "<link href='style.css' rel='stylesheet'>";
if (isset($_POST['form-field'])){
	
		if ($_POST['form-field'] == "")
		{
			$error = "Please enter a valid title and artist";
		}
		if (isset ($error))
		{
			print $error;
		}
		else
		{ $cars = array(explode(" - ",$_POST['form-field']));
			require_once("const.php");
			require_once("WebServiceClient.php");
			$client = new WebServiceClient("http://cnmt310.braingia.org/wwsp/playlist/");
			$data = array("apikey" => APIKEY,
              "apiuser" => APIUSER,
              "title" => $cars[0][0],
			  "artist"=> $cars[0][1],
              "album"=> $cars[0][2],
			  "category"=> $cars[0][3],
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
//console.log($_POST['form-field']);
?>