let map;
let marker;

document.addEventListener("DOMContentLoaded", initMap );

function initMap() {

    // Google Maps APIのジオコーダを使う
    const geocoder = new google.maps.Geocoder();

    // ジオコーダのgeocodeを実行します
    // 第１引数のリクエストパラメータにaddressプロパティを設定する
    // 第２引数はコールバック関数  取得結果を処理する

/***************************** ユーザーの住所をマップの中心に設定 *********************************/
    // address DBのregionを設定
    geocoder.geocode({address: region},function (results, status) {
            
            if (status == google.maps.GeocoderStatus.OK && results[0]) {
                // 取得が成功した場合
                
                // 緯度を取得する
                let lat = results[i].geometry.location.lat();
                // 経度を取得する
                let lng = results[i].geometry.location.lng();
                
                // DBのregionが中心に来るようにマップ表示
                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 9,
                    center: { lat: lat, lng: lng },
                });
            }else{
                // エラーの場合、東京を中心に日本全体を表示
                const tokyo = { lat: 35.68944, lng: 139.69167 };
                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 5,
                    center: tokyo,
                });
            }
        });
/*******************************************************************************************/

/***************************** 投稿されたキャンプ場のマーカー表示 ************************************/
// address はDBのキャンプ場の名前を設定
    camp_names.forEach(camp_name => {
        geocoder.geocode({address: camp_name}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                // 緯度経度を取得
                const latlng = results[0].geometry.location;
                // 住所を取得
                const address = results[0].formatted_address;
                // マーカーへの吹き出しの追加
                setMarker(latlng);
                setInfoW(camp_name, address);
                // マーカーにクリックイベントを追加
                markerEvent();
            }
        });
    });
    
    /***************************** 検索実行ボタンが押されたとき ************************************/
    document.getElementById('search').addEventListener('click', function() {
        
        const place = document.getElementById('keyword').value;
        
        geocoder.geocode({address: place}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                
                // あらかじめ作ったmapインスタンスの中心緯度経度を設定
                map.setCenter(results[0].geometry.location);
                
                
            } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                alert("見つかりません");
            } else {
                console.log(status);
                alert("エラー発生");
            }
        });
    });
}
    /****************************************************************************************/
    
    // マーカーのセットを実施する
function setMarker(setcamp_name) {
    marker = new google.maps.Marker({
        position: setcamp_name,
        map: map,
    });
}
  // マーカーへの吹き出しの追加
function setInfoW(camp_name, address) {
    infoWindow = new google.maps.InfoWindow({
        content: "<a href='http://www.google.com/search?q=" + camp_name + "' target='_blank'>" + camp_name + "</a><br><br>" + address + "</a>"
    });
}

  // クリックイベント
function markerEvent() {
    marker.addListener('click', function() {
        infoWindow.open(map, marker);
    });
}