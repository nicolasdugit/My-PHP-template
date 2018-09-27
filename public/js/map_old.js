// On initialise la latitude et la longitude de Paris (centre de la carte)
var paris = [48.852969, 2.349903];
var vientiane = [17.974855, 102.630867]
var myMap = null;
var markerClusters; //servira à stocker les groupes de markers
// Nous initialisons une liste de marqueurs
var villes = {
	"Paris": { "lat": 48.852969, "lon": 2.349903 },
	"Brest": { "lat": 48.383, "lon": -4.500 },
	"Quimper": { "lat": 48.000, "lon": -4.100 },
	"Bayonne": { "lat": 43.500, "lon": -1.467 }
};
// Fonction d'initialisation de la carte
function initMap() {
	var markers = [];
	// Créer l'objet "myMap" et l'insèrer dans l'élément HTML qui a l'ID "map"
	myMap = L.map('map').setView(paris, 11);
	markerClusters = L.markerClusterGroup(); // nous initialisons les groupes de markers
	// Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
	L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
		// Il est toujours bien de laisser le lien vers la source des données
		attribution: 'openstreetmap © </a>',
		minZoom: 1,
		maxZoom: 20
	}).addTo(myMap);
	// Nous parcourons la liste des villes
	for (ville in villes) {
		var marker = L.marker([villes[ville].lat, villes[ville].lon]) //pas de .addTo(myMap)
		// Nous ajoutons la popup. A noter que son contenu (ici la variable de la ville) peut etre du HTML
		marker.bindPopup(ville);
		markerClusters.addLayer(marker);
		markers.push(marker); // nous ajoutons le marker à la liste des markers
	}
	var group = new L.featureGroup(markers); // nous créons le groupe des markers pour adapter le zomm
	myMap.fitBounds(group.getBounds().pad(0.5)); //Nous demandons à ce que tous les markers soient visilbles, et ajoutons u padding 0.5 poour que les marker ne soient pas coupés
	myMap.addLayer(markerClusters);
	myMap.scrollWheelZoom.enable();
}

    initMap();

