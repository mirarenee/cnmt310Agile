$(document).ready(function() {
	$( "#form-field" ).autocomplete({
		minLength: 2,
		source: function (request, response) {
			$.ajax({
				url: "https://cnmt310.braingia.org/wwsp/song/index.php",
				type: "POST",
				dataType: "json",
				data: {
					term: request.term,
					apikey: "bcljigpion",
					apiuser:"api60"
				},
				success: function (data) {
					if (data.result == "Error") {
						return;
					}
					console.log(data); //REMOVE THIS FOR FINAL PRODUCT
					response ($.map(data, function (item) {
					let title = item.title + " - " + item.artist + " - " + item.album;
					let value = item.title
					return { label: title, data: item }
				}));
				}
			});
		},
		minLength: 2,
		select: function(event,ui) {
		console.log(ui); //REMOVE THIS FOR FINAL PRODUCT
		}
    });
} );