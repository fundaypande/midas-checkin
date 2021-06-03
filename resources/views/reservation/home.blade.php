<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <title>Online Reservation</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        .container {
            height: 100vh;
            position: relative;
            width:100%
        }

        .vertical-center {
            margin: 0 auto;
            position: absolute;
            top: 50%;
            text-align: center;
            width: 100%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
        .btn {
            flex: 1 1 auto;
            margin: 10px;
            padding: 30px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            /* text-shadow: 0px 0px 10px rgba(0,0,0,0.2);*/
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
        }
        .btn-3 {
            background-image: linear-gradient(to right, #84fab0 0%, #8fd3f4 51%, #84fab0 100%);
        }
        .btn:hover {
            background-position: right center; /* change the direction of the change here */
        }
        #qr-canvas {
        margin: auto;
        width: calc(100% - 20px);
        max-width: 400px;
        }

        #btn-scan-qr {
        cursor: pointer;
        }

        #btn-scan-qr img {
        height: 10em;
        padding: 15px;
        margin: 15px;
        background: white;
        }

        #qr-result {
        font-size: 1.2em;
        margin: 20px auto;
        padding: 20px;
        max-width: 700px;
        background-color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="vertical-center ">
            <h1>QR Code Scanner</h1>

            <a id="btn-scan-qr">
                <img src="https://uploads.sitepoint.com/wp-content/uploads/2017/07/1499401426qr_icon.svg">
            </a>

            <canvas hidden="" id="qr-canvas"></canvas>

            <div id="qr-result" hidden="">
                <b>Data:</b> <span id="outputData"></span>
            </div>
            <a class="btn btn-3" href="">Reservation</a><br>
            <br>
            <br>
            <br>
            <br>
            <a href="">Login</a>
        </div>
    </div>
    <script src="./src/qrCodeScanner.js"></script>
    <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>

    <script>
        qrcode.result = Error("error decoding QR Code");
        //...
        qrcode.callback(Error("Failed to load the image"));

        const qrcode = window.qrcode;

        const video = document.createElement("video");
        const canvasElement = document.getElementById("qr-canvas");
        const canvas = canvasElement.getContext("2d");

        const qrResult = document.getElementById("qr-result");
        const outputData = document.getElementById("outputData");
        const btnScanQR = document.getElementById("btn-scan-qr");

        let scanning = false;


        qrcode.callback = (res) => {
        if (res) {
            outputData.innerText = res;
            scanning = false;

            video.srcObject.getTracks().forEach(track => {
            track.stop();
            });

            qrResult.hidden = false;
            btnScanQR.hidden = false;
            canvasElement.hidden = true;
        }
        };


        btnScanQR.onclick = () =>
        navigator.mediaDevices
            .getUserMedia({ video: { facingMode: "environment" } })
            .then(function(stream) {
            scanning = true;
            qrResult.hidden = true;
            btnScanQR.hidden = true;
            canvasElement.hidden = false;
            video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
            video.srcObject = stream;
            video.play();
            tick();
            scan();
            });
        


        function tick() {
        canvasElement.height = video.videoHeight;
        canvasElement.width = video.videoWidth;
        canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);

        scanning && requestAnimationFrame(tick);
        }

        function scan() {
        try {
            qrcode.decode();
        } catch (e) {
            setTimeout(scan, 300);
        }
        }
    </script>

</body>
</html>
