<script>
    $(document).ready(function () {
        var video = document.getElementById('video');
        var canvas = document.getElementById('cv');
        var ctx = canvas.getContext('2d');
        var localMediaStream = null;

        $('#btn-webCam').click(function () {
            $('#modal-Web').modal({
                show: true,
                backdrop: "static"
            });
            navigator.getUserMedia({video: true}, function (stream) {
                video.src = window.URL.createObjectURL(stream);
                localMediaStream = stream;
            }, function (error) {
                console.log('error pic', error)
            });
        });

        $('#btnTakePhoto').click(function () {
            if (localMediaStream) {
                ctx.drawImage(video, 0, 0, 300, 250);
                document.getElementById('imgem').src = canvas.toDataURL('image/png');
                document.getElementById('fotoFinal').src = canvas.toDataURL('image/png'); //poe a foto do noivo
            }
        });
    });
</script>