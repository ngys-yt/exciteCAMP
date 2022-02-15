<script>
  let map;
  let marker;
  // map表示
  function initMap() {
    // 座標の初期設定(中心)
    let myLatLng = new google.maps.latlng(34.69139, 135.18306)
    map = new google.maps.Map(document.getElementById("#map"), {
      zoom: 8,
      center: myLatLng,
    })

      // 都道府県が選択されたとき
    document.getElementById('pref').addEventListener('change', function () {

      let pref = document.getElementById('pref').value
      console.log(pref)
      })

      // 検索実行ボタンが押されたとき
    document.getElementById('search').addEventListener('click', function() {

      let place = document.getElementById('keyword').value
      let geocoder = new google.maps.Geocoder()      // geocoderのコンストラクタ

      geocoder.geocode({
        address: place // 入力した地名
      }, function(results, status) {
        if (status == 'OK') {

          let bounds = new google.maps.LatLngBounds();

          for (let i in results) {
            if (results[0].geometry) {
              // 緯度経度を取得
              let latlng = results[0].geometry.location;
              // 住所を取得
              let address = results[0].formatted_address;
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
      })
    })

    // 結果クリアーボタン
    document.getElementById('clear').addEventListener('click', function() {
      deleteMakers()
    })
  }

  

// CSSファイル読み込み
// 参考URL ⇨ https://qiita.com/hibikikudo/items/9f96247142c640dd3a6a
  let map = document.createElement('map');
  map.href = 'public/css/map.css';
  map.rel = 'stylesheet';
  map.type = 'text/css';
  let head = document.getElementsByTagName('head')[0];
  head.appendChild(link);
</script>