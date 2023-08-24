<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NOTICE OF POST QUALIFICATION</title>
</head>
<body>

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        .text-center {
            text-align: center;
        }

        table th,
        table td {
            width: 120px;
            /* set width to 100 pixels */
            text-align: center;
            /* center align the text inside */
        }

        .container {
        width: 90%;
        margin-left: 5%;
        display: flex;
        justify-content: center;
        align-items: center;
        }

        .content {
          text-align: center;
        }

        p {
            font-size: 16px;
        }

        .outer-container {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
        }

        .outer-container p {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
        }
        .header-logo{
            width: 120px;
            height:120px;
            float: left;
            margin-left: 2em;
        }


        </style>


        <div class="text-center">
        <img class="header-logo" src="{{ asset('images/brand/bgstacruz.png') }}" />
            <label style="margin-right: 11em; text-transform: uppercase;" for="">Republic of the Philippines</label> <br>
            <label style="margin-right: 11em; text-transform: uppercase;" for="">Province of Laguna</label><br>
            <label style="margin-right: 11em; text-transform: uppercase;" for="">Municipality of Sta Cruz</label> <br>
            <!-- <label for="">OFFICE OF THE MUNICIPAL GENERAL SERVICES</label> -->
            <label style="margin-right: 11em;" for="">2/F Municipal Hall, Cailes Street</label><br>
            <label style="margin-right: 11em;" for="">Brgy. III. Santa Cruz, Laguna</label><br>
            <label style="margin-right: 11em;" for="">Telephone Number - (049) 501-0250</label>
        </div>
        <br>
        <div class="text-center">
            <h3>NOTICE OF POST QUALIFICATION</h3>
        </div>

        <div class="" style="margin-top: 5%;">
            <p>
                Nmae <br>
                Address
            </p>
        </div>



        <div class="" style="margin-top: 4%">
            <p style="margin-top: 10px; text-decoration: underline">
                Dear Sir / Madame
            </p>
            <p style="margin-top: 4%">
                <label for="" style="margin-left: 2em">Upon</label> careful examination validation and verification of the eligibility, technical and financial requirements that you have submitted for the bidding
                of <label for="" style="text-decoration: underline; font-weight: 600">STC-GOOD-NO. {{ $res->biddingAbstract->good }}</label> <label for="" style="font-weight: 600">{{ $res->purpose }}</label> of the Municipal Government of Stanta Cruz,
                Laguna we are happy to inform you that you have successfully passed post qualification.
            </p>

            <p style="margin-top: 5%">
                Very truly yours,
            </p>

            <p style="margin-top: 5%">
                <label for="" style="font-weight: 600">ENGR. MARIA LOURDES P. SAN MIGUEL</label> <br> BAC Chairman <br> Municipal General Services Officer
            </p>

            <p style="margin-top: 3%">
               ___________________________<br> Received by the Bidder: <br>Date: ______________________
            </p>

        </div>

</body>
</html>
