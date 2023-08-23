<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NOTICE OF AWARD</title>
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
            <label style="margin-right: 11em;" for="">Republic of the Philippines</label> <br>
            <label style="margin-right: 11em;" for="">Province of Laguna</label><br>
            <label style="margin-right: 11em;" for="">Municipality of Sta Cruz</label> <br>
            <label style="margin-right: 11em;" for="">OFFICE OF THE MUNICIPAL GENERAL SERVICES</label>
        </div>
        <br>
        <div class="" style="margin-top: 5%;">
            <p>
                <label for="" style="font-weight: 600">Supplier:</label> {{ $awards->requestDetail->abstractCanvass->winners->name }} <br>
                <label for="" style="font-weight: 600">Address:</label> {{ $awards->requestDetail->abstractCanvass->winners->address }}
            </p>
        </div>

        <div class="text-center">
            <h3>NOTICE OF AWARD</h3>
        </div>
        <br>
        <div class="">
            <p>
                <label for="" style="margin-left: 2em">This</label> is to inform you that your quoted price for furnishing and delivering this <label for="" style="font-weight: 600; text-transform: uppercase"> {{ $awards->requestDetail->bacRes->item_details }} </label>  in this municipality in the amount of
                <label for="" style="font-weight: 600">{{ $awards->requestDetail->bacRes->amount_in_words }}</label>
                Only was the lowest price obtained as per canvass <label for="" style="font-weight: 600">{{ $awards->requestDetail->abstractCanvass->created_at->format('F j, Y') }}
                </label> Purchase Order <label for="" style="font-weight: 600">{{ $awards->po_no }}</label> In this connection
                said supplies / material / services rendered stated below with the lowest price have been definitely considered by the Local Commmittee on Awards as reasonable and most advantageous to the government.
            </p>
            <p>
                <label for="" style="margin-left: 2em">Purchase Order.</label> These supplies / materials / service rendered should be presented to and checked by the Inspectorate Team - Technical Working Group
            </p>
            <p>
                <label for="" style="margin-left: 2em">It must be understand that the supplies / material to be delivered and services to be rendered will be strictly in accordance with the specifications stipulated in the requisition.</label>
            </p>

            <p style="margin-top: 10%">
                Very truly yours,
            </p>

            <p style="margin-top: 5%">
                <label for="" style="font-weight: 600">MELVIN O. BONZA</label> <br> MBAC Vice Chairman
            </p>

            <p style="margin-top: 10%">
                Received: <br> <label for="" style="margin-left: 3em; font-weight: 600">{{ $awards->requestDetail->abstractCanvass->winners->name }}</label>
            </p>

        </div>
<footer class="outer-container" style="margin-top: 30%;" >
    <img  style="margin: 0 0 0 2em;" src="{{ asset('images/brand/sckn.png') }}" height="30" width="150" alt="">
    <p style="font-size: 11px; margin: 0 0 0 6em;"> <label for="" style="font-weight: 600">Cailles Street Poblacion III. Santa Cruz, Laguna <br> Telephone No. (049) 501-0250</label></p>
</footer>

</body>
</html>
