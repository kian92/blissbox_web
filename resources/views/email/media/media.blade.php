<!--<!DOCTYPE html>

To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

<html>
    <head>
        <style>
            hr{
                height: 30px;
                border-style: solid;
                border-color: #BCA1A1;
                border-width: 2px 0 0 0;
                border-radius: 20px;
            }
            hr:before {
                display: block;
                content: "";
                height: 30px;
                margin-top: -31px;
                border-style: solid;
                border-color: #BCA1A1;
                border-width: 0 0 2px 0;
                border-radius: 20px;
            }
        </style>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=2.0">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    </head>
    <body style="background-color:#BCA1A1;
          text-align: center;
          font-family: 'Quicksand', serif;
          color: lightgray;">

        <table style="border: 15px white solid; margin: 25px;">
            <tr>
                <td>
                    <table style="background-color:white; margin: 10px;">
                        <tr>
                            <td>
                                replace the src with link
                                <img style="width:100%;" id="header" src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/blissbox.png" alt=""/>
                                <h1 style="margin-top: -20px;">
                                    INVITES
                                </h1>
                            </td>
                        </tr>

                        <tr>

                            <td>
                                <h1>
                                    Name here
                                </h1>
                                <hr style="color:#BCA1A1; width: 60%;">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3 style="padding-right: 15px;padding-left: 15px">TO ATTEND THE PRODUCT LAUNCH OF BLISSBOX ASIA<br/><br/>REGISTRATION 6:PM-6:15PM</h3>

                            </td>
                        </tr>
                        <tr>
                            <td style="border-top: 3px black solid; margin-top: -10px;border-bottom: 3px black solid;">
                                <div align="center">
                                    <table>
                                        <tr>
                                            <td>
                                                <table style="margin-top:-25px; padding-right: 0px;">
                                                    <tr>
                                                        <td>
                                                            <h1>05</h1>
                                                        </td>
                                                        <td>
                                                            <h4 style="float: right;">
                                                                OCTOBER 2017<br/>6pm-8pm
                                                            </h4>
                                                        </td>
                                                        <td>
                                                            <h1 style="padding-left: 50px; padding-right: 50px; color: black;"><b>|</b></h1>
                                                        </td>
                                                        <td>
                                                            <h4 style="margin-left:0px; padding-top: 10px;">ARTISTRY CAFE<br/>17 JALAN PINANG,<br/>SINGAPORE 199149</h4>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>SEE YA THERE!</h3>
                                <h3>RPVP BY 29TH SEPTEMBER 2017 TO:<br/>JENNIFER KWEK<br/>97923408<br/>JENNIFER@BLISSBOX.ASIA</h3>
                            </td>

                        </tr>

                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>-->

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <style>
        #header{
            width: 100%;
        }
        hr{
            height: 30px;
            border-style: solid;
            border-color: #BCA1A1;
            border-width: 2px 0 0 0;
            border-radius: 20px;
        }
        h1,h3,h4,p{
            color: darkgray;
            font-family: 'Quicksand'
        }

        hr:before {
            display: block;
            content: "";
            height: 30px;
            margin-top: -31px;
            border-style: solid;
            border-color: #BCA1A1;
            border-width: 0 0 2px 0;
            border-radius: 20px;
        }
    </style>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Yellowtail" rel="stylesheet">
</head>
<body style="
          background-color: #BCA1A1;
                text-align: center;
                font-family: 'Quicksand', serif;
                color: lightgray;">

<table style="border: 10px white solid; margin: 20px;">
    <tr>
        <td>
            <table style="background-color:white;">
                <tr>
                    <td>
                        <!--                replace the src with link-->
                        <img id="header" src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/blissbox.png" alt=""/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h1 style="margin-top: -20px; font-size: 23px">
                            Invites
                        </h1>
                    </td>
                </tr>
                <tr>

                    <td>
                        <h1 style="font-family: 'Yellowtail', cursive;" >
                            {{ $name }}
                        </h1>
                        <hr style="color:#BCA1A1; width: 60%">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 style="padding-right: 15px;padding-left: 15px">TO ATTEND THE PRODUCT LAUNCH OF BLISSBOX ASIA</h3>
                        <h3 style="padding-right: 15px;padding-left: 15px"> REGISTRATION 6:00PM-6:15PM</h3>
                    </td>
                </tr>
                <tr>
                    <td style="border-top: 2px black solid; border-bottom: 2px black solid;">
                        <div align="center">
                            <table>
                                <tr>
                                    <td>

                                        <table style="margin-top:-25px; padding-right: 0px;" >

                                            <tr>

                                                <td>
                                                    <h1>05</h1>
                                                </td>
                                                <td>
                                                    <h4 style="float: right;">
                                                        OCTOBER 2017<br/>6:00pm-8:00pm
                                                    </h4>
                                                </td>

                                                <td>
                                                    <h4 style="padding-left: 30px; font-size: 30px; padding-right: 30px;"><b>|</b></h4>
                                                </td>
                                                <td>
                                                    <h4 style="margin-top:35px;">ARTISTRY CAFE<br/>17 JALAN PINANG,<br/>SINGAPORE 199149</h4>
                                                </td>
                                            </tr>
                                        </table>

                                    </td>

                                </tr>


                            </table>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td> <h3 style="margin-top:25px; margin-bottom: 15px;">SEE YA THERE!</h3></td>
                </tr>
                <tr>
                    <td> <h3>RSVP BY 29TH SEPTEMBER 2017 T0:<br/>
                            JENNIFER KWEK<br/>
                            97923408<br/>
                            JENNIFER@BLISSBOX.ASIA</h3></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>