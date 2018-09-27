var vientiane = [17.974855, 102.630867];
var upstairsLab = [17.9386939, 102.6216070];
var laoitdev = [17.934687, 102.625121];

var popupVientiane = 'Vientiane';
var popupUpstairsLab = 'Upstairslab <br> Access by LaoThai Road';
var popupLaoItDev = 'LaoItDev';

var Map = {
	initMap: function(map, center, popup) {
		map = L.map(map).setView(center, 17);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		L.marker(center).addTo(map)
		.bindPopup(popup)
		.openPopup();

		map.scrollWheelZoom.disable();
	}
}

var mapPosition = document.getElementById('map');
var myMap = Object.create(Map);
myMap.initMap(mapPosition, upstairsLab, popupUpstairsLab);
