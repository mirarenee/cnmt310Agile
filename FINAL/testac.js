$(document).ready(function() {
	$( "#title" ).autocomplete({
		minLength: 2,
		source: function (request, response) {
			$.ajax({
				url: "https://cnmt310.braingia.org/wwsp/song/index.php",
				type: "POST",
				dataType: "json",
				data: {
					term: request.term,
					apikey: "nfreocsvox",
					apiuser: "api65"
				},
				success: function (data) {
					if (data.result == "Error") {
						return;
					}
					console.log(data);
					response ($.map(data, function (item) {
					let title = item.title;
					let value = item.title;
					return { label: title, data: value }
				}));
				}
			});
		}
    });
	
	$( "#artist" ).autocomplete({
		minLength: 2,
		source: function (request, response) {
			$.ajax({
				url: "https://cnmt310.braingia.org/wwsp/song/index.php",
				type: "POST",
				dataType: "json",
				data: {
					term: "",
					apikey: "nfreocsvox",
					apiuser: "api65"
				},
				success: function (data) {
					if (data.result == "Error") {
						console.log(data);
						return;
					}
					console.log(data);
					response ($.map(data, function (item1) {
					let artist = item1.artist;
					let value = item1.artist;
					return { label: artist, data: value }
				}));
				}
			});
		}
    });
} );