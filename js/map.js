var mymap = L.map('mapid').setView([48.5779, 7.7538], 14);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiZHJlYW1pbiIsImEiOiJjandrZm5oMTEwZnZ6NGFwMzZ1ZDQzNnRoIn0.XyNGtIXbm0RzVhg7YwmwGg'
}).addTo(mymap);

var {icon: myIcon} = L.icon({
    iconUrl: 'https://image.flaticon.com/icons/png/512/83/83519.png',
    iconSize: [40, 40],
    popupAnchor: [-3, -76]
});

var ugc = L.marker([48.573, 7.76486], {icon: myIcon}).addTo(mymap);
var vox = L.marker([48.5817603, 7.7463857], {icon: myIcon}).addTo(mymap);
var star = L.marker([48.5836898, 7.7424634], {icon: myIcon}).addTo(mymap);
var stex = L.marker([48.58276816048823, 7.742249965667725], {icon: myIcon}).addTo(mymap);
var videone = L.marker([48.5781482, 7.7337262], {icon: myIcon}).addTo(mymap);
var regie = L.marker([48.5618, 7.7404900000000225], {icon: myIcon}).addTo(mymap);

ugc.bindPopup("UGC Ciné Cité Strasbourg Etoile<br/>25 Av. du Rhin");
vox.bindPopup("Ciné Vox<br/>17 Rue des Francs-Bourgeois");
star.bindPopup("Cinéma Star<br/>27 Rue du Jeu-des-Enfants");
stex.bindPopup("Le Star Saint-Exupéry<br/>18 Rue du Vingt-Deux Novembre");
videone.bindPopup("Videone<br/>1 Rue d'Obernai");
regie.bindPopup("Ciné Régie<br/>33 Rue du Maréchal Lefebvre");