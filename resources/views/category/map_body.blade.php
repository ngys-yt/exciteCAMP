<script>
  var map;
  var marker;
  // map表示
  function initMap() {
    // 座標の初期設定(中心)
    const myLatLng = { lat: 34.69139, lng: 135.18306 };
    map = new google.maps.Map(document.getElementById("#map"), {
      zoom: 8,
      center: myLatLng,
    });

      // 検索実行ボタンが押されたとき
    document.getElementById('search').addEventListener('click', function() {

      var place = document.getElementById('keyword').value;
      var geocoder = new google.maps.Geocoder();      // geocoderのコンストラクタ

      geocoder.geocode({
        address: place // 入力した地名
      }, function(results, status) {
        if (status == 'OK') {

          var bounds = new google.maps.LatLngBounds();

          for (var i in results) {
            if (results[0].geometry) {
              // 緯度経度を取得
              var latlng = results[0].geometry.location;
              // 住所を取得
              var address = results[0].formatted_address;
              // 検索結果地が含まれるように範囲を拡大
              bounds.extend(latlng);
              // マーカーのセット
              setMarker(latlng);
              // マーカーへの吹き出しの追加
              setInfoW(place, latlng, address);
              // マーカーにクリックイベントを追加
              markerEvent();
            }
          }
        } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
          alert("見つかりません");
        } else {
          console.log(status);
          alert("エラー発生");
        }
      });
    });

    // 結果クリアーボタン
    document.getElementById('clear').addEventListener('click', function() {
      deleteMakers();
    });
  }

  

// CSSファイル読み込み
// 参考URL ⇨ https://qiita.com/hibikikudo/items/9f96247142c640dd3a6a
  var map = document.createElement('map');
  map.href = 'public/css/map.css';
  map.rel = 'stylesheet';
  map.type = 'text/css';
  var head = document.getElementsByTagName('head')[0];
  head.appendChild(link);
</script>