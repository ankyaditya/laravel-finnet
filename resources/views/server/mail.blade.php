<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Catamaran:400,800');

        * {
            margin: 0;
            border: 0;
            padding: 0;
        }

        body {
            font-family: 'Catamaran', sans-serif;
            background-color: #ffffff;
            font-size: 18px;
            margin: 0 auto;
            padding: 2%;
            color: #ffffff;
        }

        .card {
            max-width: 598px;
            min-width: 0;
            background-color: #e74c3c;
            border: 0 solid rgba(0, 0, 0, 0.125);
            padding: 0% 0% 0% 0%;
            margin: 0 auto;

        }

        #wrapper {
            background: #ffffff;
        }

        .kotakb {
            position: relative;
            vertical-align: middle;
            background-color: #ffffff;
            text-align: center;
            color: #bdc3c7;
            padding: 8px 12px;
            letter-spacing: 1px;
            margin: 0 2% % 0;
            float: center;
            text-decoration: none;
            font-weight: 800;
            margin-top: 8%;
            padding: 8px 12px;
            letter-spacing: 1px;
            border-radius: 8px;

        }

        .kotaka {
            position: relative;
            text-align: center;
            vertical-align: middle;
            background-color: #ffffff;
            color: #bdc3c7;
            letter-spacing: 1px;
            float: center;
            text-decoration: none;
            font-weight: 800;
            letter-spacing: 1px;
            background-color: #bdc3c7;
            margin-bottom: 10%;
            color: #ffffff;
        }

        img {
            max-width: 100%;
        }

        header {
            width: 98%;
        }

        #logo {
            max-width: 220px;
            margin: 0 auto;
        }

        #callout {
            float: right;
            margin: 3% 3% 2% 0;
        }

        .social {
            float: right;
            list-style-type: none;
            margin-top: 8;
        }

        .social li {
            display: inline;
        }

        .banner {
            margin-bottom: 2%;
        }

        .one-col {
            padding: 2%;
        }

        h {
            letter-spacing: 1%;
        }

        p {
            text-align: center;
        }

        .button-holder {
            margin: 0 2% 2% 0;
        }

        .btn {
            float: center;
            background: #28a745;
            color: #ffffff;
            text-decoration: none;
            font-weight: 800;
            margin-top: 8%;
            padding: 8px 12px;
            letter-spacing: 1px;
            border-radius: 8px;
        }

        .btn:hover {
            background: #1c7430;
        }

        .line {
            height: 12px;
            background-color: #e3e9e9;
            width: 100%;

        }

        .two-col {
            float: left;
            width: 46%;
            padding: 2%;
        }

        a {
            color: #ffffff;
            text-decoration: none;
        }

        .contact {
            text-align: center;
            padding-bottom: 0.5%;
        }

        @media(max-width:600px) {
            .two-col {
                width: 97%;
            }
        }
    </style>

</head>

<body style="font-family: 'Catamaran',sans-serif;background-color: #ffffff;font-size: 18px;max-width: 550px;margin: 0 auto;">
    <div class="card" style="font-family: 'Catamaran',sans-serif;background-color: #e74c3c;font-size: 18px;max-width: 598px;margin: 0 auto;">
        <div class="wrapper">
            <header style="width: 100%;">
                <div id="logo">
                    <img src="{{asset('img/finnet2.png')}}" style="max-width: 100%;">
                </div>
            </header>
            <div class="banner" style="margin-bottom: 3%;padding: 0% 2% 0% 2%;">
                <img src="{{asset('img/infra.png')}}" style="max-width: 100%;">
            </div>
            <div class="satu-col" style=" color:#ffffff;padding: 0% 2% 0% 2%;">
                <h1 style="text-align:center">Dear Infra Team</h1>
                <p style="text-align: justify;">We are already have Server request from {{$server->requester_name}}. This is all data request:

                    <li style="margin-left:20px">
                        Form ID <span style="padding-left: 170px">: RS{{$server->id}}</span>
                    </li>
                    <li style="margin-left:20px">
                        Requester Name <span style="padding-left: 105px">: {{$server->requester_name}}</span>
                    </li>
                    <li style="margin-left:20px">
                        Operating System <span style="padding-left: 97px">: {{$server->os}}</span>
                    </li>
                    <li style="margin-left:20px">
                        RAM <span style="padding-left: 195px">: {{$server->ram}} GB</span>
                    </li>
                    <li style="margin-left:20px">
                        CPU <span style="padding-left: 198px">: {{$server->cpu}} GB</span>
                    </li>
                    <li style="margin-left:20px">
                        Disk <span style="padding-left: 198px">: {{$server->disk}} GB</span>
                    </li>
                    <li style="margin-left:20px">
                        Environtment <span style="padding-left: 129px">: {{$server->environtment}}</span>
                    </li>
                    <li style="margin-left:20px">
                        Aplikasi <span style="padding-left: 173px">: {{$server->aplikasi}}</span>
                    </li>
                    <li style="margin-left:20px">
                        Information <span style="padding-left: 143px">: {{$server->description}}</span>
                    </li>

                </p>

            </div>
            <div style="padding: 4%">
                <div class="kotakb" style="padding: 2% 2% 2% 2%;">
                    Please check this request immediately
                </div>
            </div>
            <div class="button-holder" style="text-align:center;" padding: 0% 2% 0% 2%;">
                <a class="btn" href="#" target="_blank" style="text-decoration: none; font-weight: 800;letter-spacing: 1px;border-radius: 8px;">Work Now</a>
            </div>
            <div style="padding: 3% 0% 0% 0%">
                <div class="line" style="height: 12px;background-color: #e3e9e9;margin: 0% auto;width: 96%;padding: 0% 2% 0% 2%;">
                </div>
            </div>
            <div style="padding: 0% 0% 0% 0%">
                <div class="kotaka" style="padding: 3% 2% 0% 2%;">
                    <p class="contact" style="text-align: center;font-size:15px">
                        Telkom Landmark
                    </p>
                    <p class="contact" style="text-align: center;font-size:15px">
                        Jl. Gatot Subroto No.Kav 52, RT.6/RW.1
                    </p>
                    <p class="contact" style="text-align: center;font-size:15px">
                        West Kuningan, Mampang Prapatan, South Jakarta City,<br>
                    </p>
                    <p class="contact" style="text-align: center;font-size:15px">
                        (021) 8299999
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>