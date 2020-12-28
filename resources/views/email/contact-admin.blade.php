<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>

    <style>
        body{
            font-family: 'Quicksand', serif;
            color:black;

        }
        table{
            padding-left: 15px;
            padding-right: 15px;
        }
        img{
            width: 90%;
        }
        #invoice-header{
            font-size: 200%;
        }
        .label{
            font-size: 90%;
        }
        .below-label{
            font-size: 100%;
        }
        body{
        }
    </style>



    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body>

<table>
    <tr>
        <td>
            <div id="header" style="text-align: center;">
                <img style="width:50%;" src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/blissbox.png" alt="Logo.png">
                <hr id="header-divider" style="height: 3px;
                            width: 100%;
                            background: linear-gradient(90deg, rgb(255, 206, 81), rgb(244, 130, 30), rgb(220, 28, 77), rgb(248, 164, 145), rgb(215, 110, 171), rgb(151, 82, 160), rgb(83, 72, 158), rgb(7, 118, 189), rgb(127, 198, 238), rgb(127, 198, 238), rgb(53, 194, 214), rgb(5, 172, 137), rgb(126, 205, 195));">
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div id="page-top">
                <h1 id="invoice-header" style="text-align: center;"><b>Feedback Details</b></h1>
                <div class="below-label">
                    <p><b>Name:</b>
                        {{ $fields['first_name'] }} {{ $fields['last_name'] }}</p><hr>
                    <p><b>Email:</b>
                        {{ $fields['email'] }}</p><hr>
                    <p><b>Contact:</b>
                        {{ $fields['phone'] }}</p><hr>
                    <p><b>Subject:</b>
                        {{ $fields['subject'] }}</p><hr>
                    <p><b>Message:</b><br/><hr>
                        {{ $fields['message'] }}</p>
                </div>
            </div>
            <hr id="header-divider" style="height: 3px;
                        width: 100%;
                        background: linear-gradient(90deg, rgb(255, 206, 81), rgb(244, 130, 30), rgb(220, 28, 77), rgb(248, 164, 145), rgb(215, 110, 171), rgb(151, 82, 160), rgb(83, 72, 158), rgb(7, 118, 189), rgb(127, 198, 238), rgb(127, 198, 238), rgb(53, 194, 214), rgb(5, 172, 137), rgb(126, 205, 195));">
        </td>
    </tr>
</table>
</body>
</html>