    let map;
    let marker;
      // map表示
    function initMap() {
        // 座標の初期設定(中心)
        const myLatLng = { lat: 34.69139, lng: 135.18306 };
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: myLatLng,
        });
    
          // 検索実行ボタンが押されたとき
        document.getElementById('search').addEventListener('click', function() {
    
            const place = document.getElementById('keyword').value;
            const geocoder = new google.maps.Geocoder();      // geocoderのコンストラクタ
    
            geocoder.geocode({address: place}, function(results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
    
                    // 変換に成功したら
            // あらかじめ作ったmapインスタンスの中心緯度経度を設定
            map.setCenter(results[0].geometry.location);
            // 中心にマーカーを設定
            new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
            });
    
                    for (const i in results) {
                        if (results[0].geometry) {
                        // 緯度経度を取得
                            const latlng = results[0].geometry.location;
                        // 住所を取得
                            const address = results[0].formatted_address;
                        // マーカーへの吹き出しの追加
                            setMarker(latlng);
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
function setInfoW(place, address) {
    infoWindow = new google.maps.InfoWindow({
    content: "<a href='http://www.google.com/search?q=" + place + "' target='_blank'>" + place + "</a><br><br>" + address + "</a>"
    });
}

  // クリックイベント
function markerEvent() {
    marker.addListener('click', function() {
        infoWindow.open(map, marker);
    });
}


// mapを開く
$('#camp_show').on('click', function() {
    $('#camp').modal('show');
});