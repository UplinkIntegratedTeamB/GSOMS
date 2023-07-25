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
            <h3>NOTICE TO PROCEED</h3>
        </div>

        <div class="" style="margin-top: 5%;">
            <p>
                <label for="" style="font-weight: 600">Supplier:</label>{{ $ntp->biddingAbstract->winners->name }}<br>
                <label for="" style="font-weight: 600">Address:</label> {{ $ntp->biddingAbstract->winners->address }}
            </p>
        </div>

        <p style="margin-top: 5%">
            <u>Dear Sir / Madame:</u>
        </p>

        <div class="" style="margin-top: 2%">
            <p>
                <label for="" style="margin-left: 2em">The</label> Attached Contract Agreement having been approved, notice is hereby given <label for="" style="font-weight: 600; text-transform: uppercase"> {{ $ntp->biddingAbstract->winners->name }} </label>  that may work commence on the Project
                 <label for="" style="font-weight: 600">STC-GOOD-NO. {{ $ntp->biddingAbstract->good }}</label> <label for="" style="font-weight: 600">{{ $ntp->biddingAbstract->purpose }}</label> Effective <label for="" style="font-weight: 600">{{ $ntp->biddingPurchaseOrder->delivery_date }}</label>/ <label for="">{{ $ntp->biddingPurchaseOrder->no_of_days }}</label>
                 after the receipt of this notice
            </p>
            <p>
                <label for="" style="margin-left: 2em">Upon</label> receipt of this notice, you are responsiible for performing the services under the terms and conditions of the Agreement and in accordance with implementation Schedule.
            </p>
            <p>
                <label for="" style="margin-left: 2em">Please acknowledge receipt and acceptance of this notice by signing both copies in the space provided below. Keep one copy and return the other to the</label> <label for="" style="font-weight: 600"><i>Municipal Government of Sta. Cruz, Laguna</i></label>
            </p>

            <p style="margin-top: 10%">
                Very truly yours,
            </p>

            <p style="margin-top: 5%">
                <label for="" style="font-weight: 600">ENGR. MARIA LOURDES P. SAN MIGUEL</label> <br> BAC Chairman
            </p>
            <p style="margin-top: 5%">
                <label for="" style="font-weight: 600">EDGAR S. SAN LUIS</label> <br> Municipal Mayor
            </p>

            <p style="margin-top: 3%">
               ___________________________<br> Received by the Bidder: <br>Date: ______________________
            </p>

        </div>

</body>
</html>
