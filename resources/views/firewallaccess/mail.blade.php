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

        boda {
            font-family: 'Catamaran', sans-serif;
            background-color: #d8dbdb;
            font-size: 18px;
            max-width: 800px;
            margin: 0 auto;
            padding: 2%;
            color: #565859;
        }

        #wrapat {
            background: #f6faff;
        }

        imagi {
            max-width: 100%;
        }

        hitdar {
            width: 98%;
        }

        #legoz {
            max-width: 220px;
            margin: 2% 0 0 5%;
            float: left
        }

        #calot {
            float: right;
            margin: 3% 3% 2% 0;
        }

        .sosial {
            float: right;
            list-style-type: none;
            margin-top: 8;
        }

        .social li {
            display: inline;
        }

        .banur {
            margin-bottom: 3%;
        }

        .satu-col {
            padding: 2%;
        }

        hz {
            letter-spacing: 1%;
        }

        pz {
            text-align: justify;
        }

        .buton-holder {
            float: right;
            margin: 0 2% 4% 0;
        }

        .buton {
            float: right;
            background: #303840;
            color: #f6faff;
            text-decoration: none;
            font-weight: 800;
            padding: 8px 12px;
            letter-spacing: 1px;
            border-radius: 8px;
        }

        .buton:hover {
            background: #58585A;
        }

        .garis {
            clear: both;
            height: 2px;
            background-color: #e3e9e9;
            margin: 4% auto;
            width: 96%;

        }

        .dua-col {
            float: left;
            width: 46%;
            padding: 2%;
        }

        az {
            color: #607cc3;
            text-decoration: none;
        }

        .kontak {
            text-align: center;
            padding-bottom: 3%;
        }

        @media(max-width:600px) {
            .dua-col {
                width: 97%;
            }
        }
    </style>

</head>
<boda style="font-family: 'Catamaran',sans-serif;background-color: #d8dbdb;font-size: 18px;max-width: 800px;margin: 0 auto;padding: 2%;color: #565859;">
    <div class="wrapat">
        <hitdar style="width: 98%;">
            <div id="legoz" style="max-width: 220px;margin: 2% 0 0 5%;float: left;">
                <imagi src="" style="max-width: 100%;">
                </imagi>
            </div>
            <div id="calot" style="float: right;margin: 3% 3% 2% 0;">
                <ul class="sosial" style="float: right;list-style-type: none;margin-top: 8;">
                    <li>
                        <a href="#" target="_blank"><img src=""></a>
                    </li>
                </ul>
            </div>
        </hitdar>
        <div class="banur" style="margin-bottom: 3%;">
            <img scr="">
        </div>
        <div class="satu-col" style="padding: 2%;">
            <hz1>Ini Coba coba saja</hz1>
            <pz style="text-align: justify;">{{$firewallaccesss->requester_name}}
            </pz>
            <pz style="text-align: justify;">{{$firewallaccesss->project_name}}
            </pz>
            <pz style="text-align: justify;">{{$firewallaccesss->source}}
            </pz>
            <pz style="text-align: justify;">{{$firewallaccesss->destination}}
            </pz>
            <pz style="text-align: justify;">{{$firewallaccesss->port}}
            </pz>
            <pz style="text-align: justify;">{{$firewallaccesss->access_period}}
            </pz>
            <pz style="text-align: justify;">{{$firewallaccesss->description}}
            </pz>
            <div class="buton-holder" style="float: right;margin: 0 2% 4% 0;">
                <az class="buton" href="#" target="_blank" style="color: #f6faff;text-decoration: none;float: right;background: #303840;font-weight: 800;padding: 8px 12px;letter-spacing: 1px;border-radius: 8px;">Lagi...</az>
            </div>
        </div>
        <div class="dua-col" style="float: left;width: 46%;padding: 2%;">
        </div>
        <div class="dua-col" style="float: left;width: 46%;padding: 2%;">
        </div>
        <div class="garis" style="clear: both;height: 2px;background-color: #e3e9e9;margin: 4% auto;width: 96%;">
            <p class="kontak" style="text-align: center;padding-bottom: 3%;">
                Anky Aditya<br>
            </p>
        </div>
    </div> <!-- end wrapper -->
</boda>

</html>