<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    </style>
</head>
<body>
    <div class="container">
        <div class="vertical-center ">
            <a class="btn btn-3" href="">Reservation</a><br>
            <br>
            <br>
            <br>
            <br>
            <a href="">Login</a>
        </div>
    </div>
</body>
</html>
