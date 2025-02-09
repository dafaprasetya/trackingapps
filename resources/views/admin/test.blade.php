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
    {{-- <h2 style="text-align:center;">Tracking yang Mengikuti Jalan</h2>
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
                    markerOptions.title = "Titik ";
                }
                return L.marker(waypoint.latLng, markerOptions);
            }
        }).addTo(map);
    </script> --}}
    <h2 style="text-align:center;">Tracking Statis Seperti Strava</h2>
    <div id="map" style="width: 100%; height: 500px;"></div>
    <p id="distance">Jarak: 0 km</p>

    <script>
        // 1. Inisialisasi Peta
        var map = L.map('map').setView([-6.2001, 106.8166], 14); // Jakarta

        // 2. Tambahkan Tile Layer dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: ''
        }).addTo(map);

        // 3. Data Jalur Statis (Koordinat Jalur)
        var track = [
            [-6.2001, 106.8166],  // Titik awal
            [-6.2055, 106.8180],
            [-6.2030, 106.8205],
            [-6.2045, 106.8230],
            [-6.2060, 106.8255]   // Titik akhir
        ];

        L.Routing.control({
            waypoints: track,
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
                    markerOptions.title = "Titik ";
                }
                return L.marker(waypoint.latLng, markerOptions);
            }
        }).addTo(map);
        // 4. Tambahkan Jalur ke Peta
        var polyline = L.polyline(track, { color: 'blue', weight: 5 }).addTo(map);

        // 5. Hitung Jarak Total (Haversine Formula)
        function calculateDistance(coords) {
            var R = 6371; // Radius bumi dalam km
            var totalDistance = 0;

            for (var i = 0; i < coords.length - 1; i++) {
                var lat1 = coords[i][0] * Math.PI / 180;
                var lon1 = coords[i][1] * Math.PI / 180;
                var lat2 = coords[i + 1][0] * Math.PI / 180;
                var lon2 = coords[i + 1][1] * Math.PI / 180;

                var dLat = lat2 - lat1;
                var dLon = lon2 - lon1;
                var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                        Math.cos(lat1) * Math.cos(lat2) *
                        Math.sin(dLon / 2) * Math.sin(dLon / 2);
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                totalDistance += R * c;
            }

            return totalDistance.toFixed(2);
        }

        // 6. Tampilkan Jarak di Halaman
        document.getElementById('distance').innerText = "Jarak: " + calculateDistance(track) + " km";

        // 7. Pusatkan Peta ke Jalur
        map.fitBounds(polyline.getBounds());

    </script>
</body>
</html>
