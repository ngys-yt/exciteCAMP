<script>
$('#camp').on('hidden.bs.modal', function (event) {

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

      // 検索実行ボタンが押下されたとき
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

    // 結果クリアーボタン押下時
    document.getElementById('clear').addEventListener('click', function() {
      deleteMakers();
    });

  }

  // マーカーのセットを実施する
  function setMarker(setplace) {
    // 既にあるマーカーを削除
    deleteMakers();

    
      marker = new google.maps.Marker({
        position: setplace,
        map: map,
      });
  }

  //マーカーを削除する
  function deleteMakers() {
    if(marker != null){
      marker.setMap(null);
    }
    marker = null;
  }

  // マーカーへの吹き出しの追加
  function setInfoW(place, latlng, address) {
    infoWindow = new google.maps.InfoWindow({
    content: "<a href='http://www.google.com/search?q=" + place + "' target='_blank'>" + place + "</a><br><br>" + latlng + "<br><br>" + address + "<br><br><a href='http://www.google.com/search?q=" + place + "&tbm=isch' target='_blank'>画像検索 by google</a>"
    });
  }

  // クリックイベント
  function markerEvent() {
    marker.addListener('click', function() {
      infoWindow.open(map, marker);
    });
  }
  
})

// CSSファイル読み込み
// 参考URL ⇨ https://qiita.com/hibikikudo/items/9f96247142c640dd3a6a
  var map = document.createElement('map');
  map.href = 'public/css/map.css';
  map.rel = 'stylesheet';
  map.type = 'text/css';
  var head = document.getElementsByTagName('head')[0];
  head.appendChild(link);
</script>