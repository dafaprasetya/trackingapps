<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Rute dengan OpenStreetMap</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
</head>
<body>
    <h2 style="text-align:center;">Tracking yang Mengikuti Jalan</h2>
    <div id="map" style="width: 100%; height: 500px;"></div>

    <script>
        // 1. Inisialisasi Peta
        var map = L.map('map').setView([-6.2001, 106.8166], 14); // Jakarta

        // 2. Tambahkan Tile Layer dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // 3. Titik Awal dan Tujuan
        var titikAwal = L.latLng(-6.2001, 106.8166);  // Jakarta
        var titiktitik = L.latLng(-6.2010, 106.8200);  // Jakarta
        var titikAkhir = L.latLng(-6.2060, 106.8255); // Tujuan

        // 4. Tambahkan Routing yang Mengikuti Jalan
        L.Routing.control({
            waypoints: [titikAwal, titikAkhir, titiktitik],
            routeWhileDragging: true,
            createMarker: function(i, waypoint, n) {
                var markerOptions = {
                    draggable: true
                };
                if (i === 0) {
                    markerOptions.title = "Titik Awal";
                } else if (i === n - 1) {
                    markerOptions.title = "Titik Akhir";
                }
                 else if (i === n - 2) {
                    markerOptions.title = "Titik cihuy";
                }
                return L.marker(waypoint.latLng, markerOptions);
            }
        }).addTo(map);
    </script>
</body>
</html>
