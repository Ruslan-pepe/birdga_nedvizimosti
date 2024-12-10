<!DOCTYPE html>
<html>
<head>
  <title>Быстрый старт. Размещение интерактивной карты на странице</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script src="https://api-maps.yandex.ru/v3/?apikey=e7692a53-8e97-4a20-ae6f-ec1e70062c30&lang=ru_RU"></script>
  <script>
    initMap();

    async function initMap() {
      await ymaps3.ready;

      const {YMap, YMapDefaultSchemeLayer} = ymaps3;

      const map = new YMap(
        document.getElementById('map'),
        {
          location: {
            center: [37.588144, 55.733842],
            zoom: 10
          }
        }
      );

      map.addChild(new YMapDefaultSchemeLayer());
    }
  </script>
</head>

<body>
<div id="map" style="width: 600px; height: 400px"></div>
</body>
</html>