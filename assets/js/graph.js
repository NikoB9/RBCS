function GeneratePlacesChart(DIR, SDR, SEISUR, SPCPR, SDA, SDAF, SCC)
{
  AmCharts.makeChart("PlaceChart", {
    "type": "pie",
    "theme": "black",
    "titles": [
		{
			"text": "Places occupées",
			"size": 15
		}],
    "titleField": "Sous direction",
  	"valueField": "places",
    "dataProvider": [
      {
  			"Sous direction": "Direction",
  			"places": DIR
  		},
      {
  			"Sous direction": "SCC",
  			"places": SCC
  		},
  		{
  			"Sous direction": "SdA",
  			"places": SDA
  		},
  		{
  			"Sous direction": "SDAF",
  			"places": SDAF
  		},
  		{
  			"Sous direction": "SEISUR",
  			"places": SEISUR
  		},
  		{
  			"Sous direction": "SDR",
  			"places": SDR
  		},
  		{
  			"Sous direction": "SPCPR",
  			"places": SPCPR
  		}],
    "labelText": "[[title]] : [[value]]",
    "balloonText": "<span style='font-size:14px'><b>[[title]]</b></span><br>[[value]] ([[percents]]%)",
    "balloon": {
  		"cornerRadius": 3,
  		"shadowAlpha": 0.22
  	},
    "outlineColor": "#FFFFFF",
    "outlineAlpha": 0,
    "outlineThickness": 0,
    "color": "#1c88e3",
    "colors": [
  		"#67b7dc",
  		"#3498DB",
  		"#2C3E50",
  		"#22313F",
  		"#6BB9F0",
  		"#59ABE3",
  		"#22A7F0",
  		"#b7b83f",
  		"#b9783f",
  		"#b93e3d",
  		"#913154"
  	],
    "startRadius": "0%",
    "pullOutEffect": "easeOutSine",
    "pullOutDuration": 0.2,
  	"sequencedAnimation": true,
  	"startEffect": "easeInSine",
    "startDuration": 0.2,
    "legend": {
		"enabled": true,
		"align": "center",
		"bottom": 0,
		"markerType": "circle",
		"maxColumns": 3
	},
    "export": {
      "enabled": false
    }
  });
}


function GenerateCatChart(A, B, C)
{
  AmCharts.makeChart("CatChart", {
    "type": "pie",
    "theme": "black",
    "titles": [
		{
			"text": "Categories",
			"size": 15
		}],
    "titleField": "Categorie",
  	"valueField": "nbr",
    "dataProvider": [
      {
  			"Categorie": "Categorie A",
  			"nbr": A
  		},
      {
  			"Categorie": "Categorie B",
  			"nbr": B
  		},
  		{
  			"Categorie": "Categorie C",
  			"nbr": C
  		}],
    "labelText": "[[title]] : [[value]]",
    "balloonText": "<span style='font-size:14px'><b>[[title]]</b></span><br>[[value]] ([[percents]]%)",
    "balloon": {
  		"cornerRadius": 3,
  		"shadowAlpha": 0.22
  	},
    "outlineColor": "#FFFFFF",
    "outlineAlpha": 0,
    "outlineThickness": 0,
    "color": "#1c88e3",
    "colors": [
  		"#67b7dc",
  		"#3498DB",
  		"#2C3E50",
  		"#22313F",
  		"#6BB9F0",
  		"#59ABE3",
  		"#22A7F0",
  		"#b7b83f",
  		"#b9783f",
  		"#b93e3d",
  		"#913154"
  	],
    "startRadius": "0%",
    "pullOutEffect": "easeOutSine",
    "pullOutDuration": 0.2,
  	"sequencedAnimation": true,
  	"startEffect": "easeInSine",
    "startDuration": 0.2,
    "legend": {
		"enabled": true,
		"align": "center",
		"bottom": 0,
		"markerType": "circle",
		"maxColumns": 3
	},
    "export": {
      "enabled": false
    }
  });
}
