<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <button type="button" onclick="clearx();">Clear</button>
        <div id="sample" style="width:100%;height:580px;"></div>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCgOQ0wvjXVTKOyTLLjEhIb71ZRJW8U48g"></script>
        <script>
            var map;
            var gmarkers = [];
            ;
            function loadMap() {
//                inisialisasi map untuk google map
                var mapOptions = {
                    center: new google.maps.LatLng(-7.346436, 112.585151),
                    zoom: 14,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById("sample"), mapOptions);
                //inisialisasi marker google map
                var m = [
                    ["1", -7.316436, 112.565151],
                    ["2", -7.326436, 112.575151],
                    ["3", -7.346436, 112.585151],
                    ["4", -7.336436, 112.595151],
                ];

                var info = new google.maps.InfoWindow();
                for (var i = 0; i < m.length; i++) {
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(m[i][1], m[i][2]),
                        map: map,
                        animation: google.maps.Animation.Drop,
                    });

                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            info.setContent(m[i][0] + " : " + marker.position);
                            info.open(map, marker);
                        }
                    })(marker, i));
                    gmarkers.push(marker);
                }
                map.addListener('center_changed', function () {
                    console.log(map.getCenter());
                });
            }
            google.maps.event.addDomListener(window, 'load', loadMap);

            function clearx() {
                console.log(map.getCenter());
                for (i = 0; i < gmarkers.length-1; i++) {
                    gmarkers[i].setMap(null);
                }
            }
        </script>
    </body>
</html>