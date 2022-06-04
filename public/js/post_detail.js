'use strict';

        const photos = @json($photos);
        let num = 0;

        function changeImg(num) {
            // id = photo の src を photos[num] に変更
            document.getElementById("photo").setAttribute("src", photos[num]);
        }

        // 一番左の写真から右ボタンを押すと左ボタンが表示される
        // 一番右の写真までいくと右ボタンが消える
        function goForward(){
            num ++;
            if(num == photos.length-1){
                document.getElementById('right').style.display = 'none';
            }else if(num == 1){
                document.getElementById('left').style.display = 'inline';
            }
            changeImg(num);
        }

        // 一番右の写真から左ボタンを押すと右ボタンが表示される
        // 一番左の写真までいくと左ボタンが消える
        function goBack(){
            num --;
            if(num == 0){
                document.getElementById('left').style.display = 'none';
            }else if(num == photos.length-2){
                document.getElementById('right').style.display = 'inline';
            }
            changeImg(num);
        }
