<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            letter-spacing: 1px; !important
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


        </style>


        <div class="text-center">
            <label for="">Republic of the Philippines</label> <br>
            <label for="">Province of Laguna</label><br>
            <label for="">Municipality of Sta Cruz</label> <br>
            <label for="">OFFICE OF THE MUNICIPAL GENERAL SERVICES</label>
        </div>
        <div class="text-center">
            <h3>NOTICE OF ELIGIBILITY</h3>
        </div>

        <div class="" style="margin-top: 5%;">
            <p>
                <label for="" style="font-weight: 600">Supplier:</label>{{ $res->requestDetail->biddingAbstract->winners->name }} <br>
                <label for="" style="font-weight: 600">Address:</label> {{ $res->requestDetail->biddingAbstract->winners->address }}
            </p>
        </div>



        <div class="">
            <p style="margin-top: 20px">
                <label for="" style="text-decoration: underline">Dear Sir / Madame:</label>
            </p>
            <p>
                This is to inform you that you have been declared eligible to Bid for Project Reference No. <label for="" style="font-weight: 600; "><i style="text-decoration: underline">STC-GOOD-NO. {{ $res->requestDetail->biddingAbstract->good }}</i> {{ $res->requestDetail->biddingAbstract->purpose }}</label>
            </p>
            <p style="margin-top: 10%">
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
