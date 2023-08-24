<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qouted</title>
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
            <label style="margin-right: 11em;"for="">OFFICE OF THE MUNICIPAL GENERAL SERVICES</label>
        </div>
            <br>
        <div class="" style="margin-top: 5%;">
            <p>
                {{ $quotes->biddingAbstract->winners->name }} <br>
                {{ $quotes->biddingAbstract->winners->address }}
            </p>
        </div>

        <div class="">
            <p>
                This is to inform you that your quoted price for <label for="" style="font-weight: 600">{{ $quotes->purpose }}</label> with <i style="font-weight: 600">Purchase Request No.</i>
                <label for="" style="text-decoration: underline">{{ $quotes->pr_no }}</label> dated <label for="" style="text-decoration: underline; font-weight: 600;">{{ date('F, j, Y', strtotime($quotes->created_at)) }}</label> has been accepted by the Municipal Bid and Award Commitee.
            </p>

            <div class="">
                <table style="border-collapse: collapse; margin: 0 auto ">
                    <thead>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: center" >Item No.</td>
                            <td style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: center">Unit of Issue</td>
                            <td style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: center">Quantity</td>
                            <td colspan="4" style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: center">Description</td>
                            <td style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: center">Unit Cost</td>
                            <td style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: center">Total Cost</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start">{{ $loop->index + 1}}</td>
                            <td style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start">{{ $item->item->unit->description }}</td>
                            <td style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start">{{ $item->quantity }}</td>
                            <td colspan="4" style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start">{{ $item->item_description }}</td>
                            <td style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: end">{{ number_format($item->offer_price, 2) }}</td>
                            <td style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: end">{{ number_format($item->total_amt, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p style="text-align: justify;">
                <label for="" style="margin-left: 2em">You</label> are advised to deliver the said items within <label for="" style="text-decoration: underline">7</label> working days upon receipt of the approved
                Purchase Order. These supplies/ materials /service rendered should be presented and checked by the Inspectorate Team- Technical Working Group.
                <br>
                <label for="" style="margin-left: 2em">It</label> must be understood that the supplies / materials to be delivered and services to be rendered will be strictly in accordance with specifications stipulated in the requisition.
            </p>
            <p style="margin-top: 7%">
                ENGR. MARIA LOURDES P. SAN MIGUEL <br>
                Municipal General servicer Officer
            </p>
        </div>
<footer class="outer-container" style="margin-top: 20%;" >
    <img  style="margin: 0 0 0 0em;" src="{{ asset('images/brand/sckn.png') }}" height="30" width="150" alt="">
    <p style="font-size: 11px; margin: 0 0 0 6em;"> <label for="" style="font-weight: 600">Cailles Street Poblacion III. Santa Cruz, Laguna <br> Telephone No. (049) 501-0250</label></p>
</footer>
</body>
</html>
