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

        .text-end {
            text-align: end;
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
            font-size: 14px;
             !important
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
        <label style="font-weight: 600">ABSTRACT OF BID AS CALCULATED</label>
    </div>

    <p style="text-transform: uppercase; font-weight: 600">
        {{ $abstracts->requestDetail->purpose }}
    </p>

    <label for="">Date of Canvass:</label> <span style="margin-left: 10px; text-decoration: underline">{{ date('F, j, Y', strtotime($abstracts->requestDetail->bidInvitation->until) ) }}</span> <br>
    <label for="">Requesting Office:</label> <span style="margin-left: 4px; text-decoration: underline">{{ $abstracts->requestDetail->endUserOffice->name }}</span>
    @php
    $td = array();
    foreach ($abstracts->biddingOffereds as $key => $abstract) {
    foreach ($abstract->biddingOfferedItems as $key => $suppliers) {
    if (!isset($td[$suppliers->description])) {
    $td[$suppliers->description]['data'] = array();
    $td[$suppliers->description]['qty'] = $suppliers->quantity;
    $td[$suppliers->description]['unit'] = $suppliers->item->unit->description;
    $td[$suppliers->description]['item_description'] = $suppliers->item_description;

    }
    array_push($td[$suppliers->description]['data'], array("grand_total" => $abstract->grand_total ,"offer_price" => $suppliers->offer_price, "total_amt" => $suppliers->total_amt));
    }


    }

    @endphp

    <div class="" style="margin-top: 20px">
        <table style="border-collapse: collapse; margin: 0 auto; width: 100% ">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th colspan="9" style="border: 1px solid black; font-size: 13px; padding: 10px; text-align: start">Purchase No. {{ $abstracts->requestDetail->pr_no }}</th>
                    <th colspan="10" style="border: 1px solid black; font-size: 12px">Name of Suppliers</th>
                </tr>
                <tr>
                    <th colspan="7" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">Date: {{ date('F, j, Y', strtotime($abstracts->requestDetail->created_at)) }}</th>
                    <th style="border: 1px solid black; font-size: 13px; padding: 10px"></th>
                    <th style="border: 1px solid black; font-size: 13px; padding: 10px"></th>
                    @foreach ($abstracts->biddingOffereds as $abstract)
                    <th colspan="{{ 10 / count($td[$suppliers->description]['data']) }}" rowspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px">
                        {{ $abstract->supplier->name }}
                    </th>
                    @endforeach

                </tr>
                <tr>
                    <th colspan="7" style="border: 1px solid black; font-size: 12px; padding: 10px">Item</th>
                    <th style="border: 1px solid black; font-size: 12px;">Qty</th>
                    <th style="border: 1px solid black; font-size: 12px;">Unit</th>
                    {{-- @foreach ($td[$suppliers->description]['data'] AS $html)
                    <th colspan="{{ (12 / count($td[$suppliers->description]['data'])) / 2 }}" style="border: 1px solid black; font-size: 12px;">Unit Price</th>
                    <th colspan="{{ (12 / count($td[$suppliers->description]['data'])) / 2 }}" style="border: 1px solid black; font-size: 12px;"> Total Amt. </th>
                    @endforeach --}}
                </tr>
            </thead>
            <tbody>


                @foreach ($td as $key => $det)
                <tr style="text-align: start">
                    <td colspan="7" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start;">{{ $det['item_description'] }}</td>
                    <td style="border: 1px solid black; font-size: 12px;">{{ $det['qty'] }}</td>
                    <td style="border: 1px solid black; font-size: 12px;">{{ $det['unit'] }}</td>
                    @foreach ($det['data'] as $x)
                    <td colspan="{{ (10 / count($td[$suppliers->description]['data'])) / 1 }}" style="border: 1px solid black; font-size: 12px;">{{ number_format($x["offer_price"],2) }}</td>
                    {{-- <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) / 2 }}" style="border: 1px solid black; font-size: 12px;">{{ number_format($x["total_amt"],2) }}</td> --}}
                    @endforeach
                </tr>
                @endforeach
                <tr>
                    <tr style="text-align: start">
                        <td colspan="7" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start;"></td>
                        <td style="border: 1px solid black; font-size: 12px;"></td>
                        <td style="border: 1px solid black; font-size: 12px;"></td>
                        @foreach ($det['data'] as $x)
                        <td colspan="{{ (10 / count($td[$suppliers->description]['data'])) / 1 }}" style="border: 1px solid black; font-size: 12px;"></td>
                        {{-- <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) / 2 }}" style="border: 1px solid black; font-size: 12px;">{{ number_format($x["total_amt"],2) }}</td> --}}
                        @endforeach
                    </tr>
                </tr>
                <tr style="text-align: start">
                    <td colspan="9" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start;">Total</td>
                    @foreach ($det['data'] as $x)
                    {{-- <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) / 2 }}" style="border: 1px solid black; font-size: 12px;"></td> --}}
                    <td colspan="{{ (10 / count($td[$suppliers->description]['data'])) / 1 }}" style="border: 1px solid black; font-size: 12px;">{{ number_format($x['grand_total'], 2) }} </td>
                    @endforeach
                </tr>
                <tr style="text-align: start">
                    <td colspan="7" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start;">Form of Bid Security</td>
                    @foreach ($abstracts->biddingOffereds as $abstract)
                    <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) }}" style="border: 1px solid black; font-size: 12px;">Bidders Bond</td>
                    @endforeach
                </tr>
                <tr style="text-align: start">
                    <td colspan="7" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start;">Bank / Company</td>
                    @foreach ($abstracts->biddingOffereds as $abstract)
                    <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) }}" style="border: 1px solid black; font-size: 12px;">{{ $abstract->bank }}</td>
                    @endforeach
                </tr>
                <tr style="text-align: start">
                    <td colspan="7" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start;">Number</td>
                    @foreach ($abstracts->biddingOffereds as $abstract)
                    <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) }}" style="border: 1px solid black; font-size: 12px;"></td>
                    @endforeach
                </tr>
                <tr style="text-align: start">
                    <td colspan="7" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start;">Validity Peiod</td>
                    @foreach ($abstracts->biddingOffereds as $abstract)
                    <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) }}" style="border: 1px solid black; font-size: 12px;">{{ $abstracts->cash_bond }}</td>
                    @endforeach
                </tr>
                <tr style="text-align: start">
                    <td colspan="7" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start;">Required Bid Security</td>
                    @foreach ($abstracts->biddingOffereds as $abstract)
                    <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) }}" style="border: 1px solid black; font-size: 12px;">{{ $abstracts->cash_bond }}</td>
                    @endforeach
                </tr>
                <tr style="text-align: start">
                    <td colspan="7" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start;">Sufficient / Insufficient</td>
                    @foreach ($abstracts->biddingOffereds as $abstract)
                    <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) }}" style="border: 1px solid black; font-size: 12px;">Sufficient</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>

    <div class="outer-container" style="margin-top: 4%">
        <p class="text-center">
            <label for="" style="font-size: 13px; font-weight: 600">MARIA LOURDES P. SAN MIGUEL</label> <br> <label for="" style="font-size: 12px">Mun. Gen. Services Office</label> <br> <label for="" style="font-size: 11px">Chairman</label>
        </p>
        <p class="text-center">
            <label for="" style="font-size: 13px; font-weight: 600">MELVIN O. BONZA</label> <br> <label for="" style="font-size: 12px">Municipal Administrator</label> <br> <label for="" style="font-size: 11px">Vice Chairman</label>
        </p>
        <p class="text-center">
            <label for="" style="font-size: 13px; font-weight: 600">Engr. PABLO MAGPILY, JR</label> <br> <label for="" style="font-size: 12px">Municipal Engineer</label> <br> <label for="" style="font-size: 11px">Member</label>
        </p>
    </div>

    <div class="outer-container" style="margin-top: 4%">
        <p class="text-center">
            <label for="" style="font-size: 13px; font-weight: 600"> EILEEN S TALABIS </label> <br> <label for="" style="font-size: 12px">Municipal Budget Officer</label>
        </p>
        <p class="text-center">
            <label for="" style="font-size: 13px; font-weight: 600"> Atty. RONALDO C. MARIANO </label> <br> <label for="" style="font-size: 12px">Municipal Legal Officer</label>
        </p>
    </div>

    <div class="outer-container" style="margin-top: 4%">
        <p class="text-center">
            <label for="" style="font-size: 13px; font-weight: 600"> EDGAR S. SAN LUIS </label> <br> <label for="" style="font-size: 12px">Municipal Mayor</label>
        </p>
    </div>

</body>
</html>
