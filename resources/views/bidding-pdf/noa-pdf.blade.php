<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NOTICE TO AWARD</title>
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
            <label style="margin-right: 11em;" for="">PROVINCE OF LAGUNA</label><br>
            <label style="margin-right: 11em;" for="">MUNICIPALITY OF STA. CRUZ</label> <br>
            <label style="margin-right: 11em; font-size: 13px;" for="">Municipal Hall, Cailes Street, Brgy. III. Santa Cruz, Laguna</label> <br>
            <label style="margin-right: 11em; font-size: 13px;" for="">Telephone Number - (049) 808-1008/ Telefax - (049 501-0250)</label>
        </div>
        <div class="text-center">
            <h3 style="margin-right: 11em;">NOTICE OF AWARD</h3>
        </div>

        <div class="" style="margin-top: 5%;">
            <p>
                <label for="" style="font-weight: 600">Supplier:</label>{{ $awards->requestDetail->biddingAbstract->winners->name }}<br>
                <label for="" style="font-weight: 600">Address:</label> {{ $awards->requestDetail->biddingAbstract->winners->address }}
            </p>
        </div>

        <div class="">
            <p style="margin-top: 20px">
                <label for="" style="text-decoration: underline; font-weight: 600">Dear Sir / Madame:</label>
            </p>
            @php
                use Carbon\Carbon;
            @endphp
            <p>
            <label style="margin-left: 3em;"> We are happy to notify that your Bid dated </label> <label for="" style="font-weight: 600; text-decoration: underline">{{ Carbon::parse($awards->confirm_date)->format('F j, Y') }}</label> in the execution of the Project Reference No.
                <label for="" style="font-weight: 600;">STC-GOOD NO. {{ $awards->requestDetail->biddingAbstract->good }}</label> <label for="" style="text-decoration: underline; font-weight: 600">{{ $awards->requestDetail->biddingAbstract->purpose }}</label> for the Contract Price of equivalent to
                <label for="" style="font-weight: 600; text-decoration: underline">{{ $awards->requestDetail->biddingResolution->amount_in_word }}</label> <label for="" style="font-weight: 600; text-decoration: underline"> P{{ number_format($awards->requestDetail->biddingAbstract->winner_total, 2) }}</label> as corrected and modified in accorance with Instruction to bidders is hereby accepted.
            </p>
            <p>
                You are hereby required to provide within <label for="">{{ $awards->no_of_days }}</label> day(s) the performance security in the form and amount stipulated in section 11-1 of the Bid data sheet. Failure to provide the performance security shall constitute
                sufficient ground for cancellation of the award and forfeiture of the bid security
            </p>

            <p style="margin-top: 10%">
                Very truly yours,
            </p>

            <p style="margin-top: 5%">
                <label for="" style="font-weight: 600">ENGR. MARIA LOURDES P. SAN MIGUEL</label> <br> BAC Chairman
            </p>

            <p style="margin-top: 3%">
            Received by the Bidder: <br> <label for="" style="text-decoration: underline; font-weight: 600">{{ $awards->requestDetail->biddingAbstract->winners->name }}</label>
            </p>

        </div>

<footer class="outer-container" style="margin-top: 20%;" >
    <img  style="margin: 0 0 0 0em;" src="{{ asset('images/brand/sckn.png') }}" height="30" width="150" alt="">
    <p style="font-size: 11px; margin: 0 0 0 6em;"> <label for="" style="font-weight: 600">Cailles Street Poblacion III. Santa Cruz, Laguna <br> Telephone No. (049) 501-0250</label></p>
</footer>
</body>
</html>
