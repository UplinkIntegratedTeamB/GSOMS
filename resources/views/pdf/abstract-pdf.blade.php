<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ABSTRACT OF CANVASS</title>
</head>
<body>

    <style>
        * {
            font-family: 'Poppins', sans-serif;
            /* border: 1px solid black; */
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

        .header-logo {
            width: 120px;
            height: 120px;
            float: left;
            margin-left: 2em;
        }

    </style>

    <div class="text-center">
        <img class="header-logo" src="{{ asset('images/brand/bgstacruz.png') }}" />
        <label style="margin-right: 11em;" for="">Republic of the Philippines</label> <br>
        <label style="margin-right: 11em;" for="">Province of Laguna</label><br>
        <label style="margin-right: 11em;" for="">Municipality of Sta Cruz</label>
        <h5 style="margin-right: 12em;">ABSTRACT OF CANVASS</h5>
    </div>
    <br>
    <p style="text-transform: uppercase">
        {{ $abstracts->requestDetail->bacRes->res_title }}
    </p>

    <label for="">Date of Canvass: {{ date('F, j, Y', strtotime($abstracts->created_at) ) }}</label> <br>
    <label for="">Requesting Office: {{ $abstracts->requestDetail->endUserOffice->name }}</label>
    @php
    $td = array();
    foreach ($abstracts->supplierOffereds as $key => $abstract) {
    foreach ($abstract->supplierOfferedItems as $key => $suppliers) {
    if (!isset($td[$suppliers->description])) {
    $td[$suppliers->description]['data'] = array();
    $td[$suppliers->description]['qty'] = $suppliers->quantity;
    $td[$suppliers->description]['unit'] = $suppliers->item->unit->description;

    }
    array_push($td[$suppliers->description]['data'], array("grand_total" => $abstract->grand_total ,"offer_price" => $suppliers->offer_price, "total_amt" => $suppliers->total_amt));
    }


    }

    @endphp

    <div class="container" style="margin-top: 20px">
        <table style="border-collapse: collapse; width: 100%">
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
                    <th colspan="5" style="border: 1px solid black; font-size: 10px; padding: 5px; text-align: start">Purchase No. {{ $abstracts->requestDetail->pr_no }}</th>
                    <th style="border: 1px solid black; font-size: 13px"></th>
                    <th style="border: 1px solid black; font-size: 13px"></th>
                    <th colspan="12" style="border: 1px solid black; font-size: 12px">Name of Suppliers</th>
                </tr>
                <tr>
                    <th colspan="5" style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start">Date: {{ date('F, j, Y', strtotime($abstracts->requestDetail->created_at)) }}</th>
                    <th style="border: 1px solid black; font-size: 13px; padding: 5px"></th>
                    <th style="border: 1px solid black; font-size: 13px; padding: 5px"></th>
                    @foreach ($abstracts->supplierOffereds as $abstract)
                    <th colspan="{{ 12 / count($td[$suppliers->description]['data']) }}" style="border: 1px solid black; font-size: 12px; padding: 5px">
                        {{ $abstract->supplier->name }}
                    </th>
                    @endforeach

                </tr>
                <tr>
                    <th colspan="5" style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start">Item</th>
                    <th style="border: 1px solid black; font-size: 12px;">Qty</th>
                    <th style="border: 1px solid black; font-size: 12px;">Unit</th>
                    @foreach ($td[$suppliers->description]['data'] AS $html)
                    <th colspan="{{ (12 / count($td[$suppliers->description]['data'])) / 2 }}" style="border: 1px solid black; font-size: 12px;">Unit Price</th>
                    <th colspan="{{ (12 / count($td[$suppliers->description]['data'])) / 2 }}" style="border: 1px solid black; font-size: 12px;"> Total Amt. </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                @foreach ($td as $key => $det)
                <tr style="text-align: start">
                    <td colspan="5" style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start;"> <strong>({{ $loop->index + 1 }})</strong> {{ $key }}</td>
                    <td style="border: 1px solid black; font-size: 12px;">{{ $det['qty'] }}</td>
                    <td style="border: 1px solid black; font-size: 12px;">{{ $det['unit'] }}</td>
                    @foreach ($det['data'] as $x)
                    <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) / 2 }}" style="border: 1px solid black; font-size: 12px;">{{ number_format($x["offer_price"],2) }}</td>
                    <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) / 2 }}" style="border: 1px solid black; font-size: 12px;">{{ number_format($x["total_amt"],2) }}</td>
                    @endforeach
                </tr>
                @endforeach
                <tr style="text-align: start">
                    <td colspan="3" style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: end;">Sub</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px;">Amount</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px;">P</td>
                    @foreach ($det['data'] as $x)
                    <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) / 2 }}" style="border: 1px solid black; font-size: 12px;"></td>
                    <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) / 2 }}" style="border: 1px solid black; font-size: 12px;">{{ number_format($x['grand_total'],2) }} </td>
                    @endforeach
                </tr>
                <tr style="text-align: start">
                    <td colspan="3" style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: end;">Total</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px;">Amount</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px;">P</td>
                    @foreach ($det['data'] as $x)
                    <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) / 2 }}" style="border: 1px solid black; font-size: 12px;"></td>
                    <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) / 2 }}" style="border: 1px solid black; font-size: 12px;">{{ number_format($x['grand_total'], 2) }} </td>
                    @endforeach
                </tr>
                <tr style="text-align: start">
                    <td colspan="7" style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: end;">Remarks</td>
                    @foreach ($td[$suppliers->description] AS $det)
                    <td colspan="{{ (12 / count($td[$suppliers->description]['data'])) }}" style="border: 1px solid black; font-size: 12px;"></td>
                    @endforeach
                </tr>
                <tr style="text-align: start">
                    <td colspan="19" style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start;">PURPOSE: <label style="text-transform: uppercase; margin-left: 10px"> {{ $abstracts->requestDetail->bacRes->item_details }} </label> </td>
                </tr>
                <tr style="text-align: start">
                    <td colspan="19" style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start;">
                        @php
                        $bidWinnersGrouped = $abstracts->bidWinners->groupBy('supplier_id');
                        @endphp

                        @foreach ($bidWinnersGrouped as $supplierId => $supplierBidWinners)
                        @php
                        $itemIDs = $supplierBidWinners->pluck('item_id')->unique();
                        $totalAmt = $supplierBidWinners->sum('total_amt');
                        @endphp

                        Item No. @foreach ($itemIDs as $index => $itemID)
                        {{ $loop->index + 1 }}@unless ($loop->last),@endunless
                        @endforeach are awarded to
                        <label style="text-transform: uppercase">
                            {{ $supplierBidWinners->first()->supplier->name }}
                        </label> in the amount of Php. {{ number_format($totalAmt, 2) }} <br>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="">
            <p> <label for="" style="font-size: 13px; margin-left: 2em">We hereby certify that the the foregoing abstract of proposals is true and correct that we were present when the canvass</label> papers for the <label for="" style="text-transform: uppercase">{{ $abstracts->requestDetail->bacRes->res_title }}</label> were
                opened at the Office of Municipal General Services, Escolapia Building, Rizal St. Santa Cruz, Laguna and for awarded to
                @php
                $bidWinnersGrouped = $abstracts->bidWinners->groupBy('supplier_id');
                @endphp

                <label for="" style="text-transform: uppercase">
                    @php
                    $previousSupplierName = null; // Initialize a variable to store the previous supplier name
                    @endphp

                    @foreach ($bidWinnersGrouped as $supplierId => $supplierBidWinners)
                    @if ($supplierBidWinners->first()->supplier->name !== $previousSupplierName)
                    @unless ($loop->first)
                    /
                    @endunless

                    {{ $supplierBidWinners->first()->supplier->name }}
                    @php
                    $previousSupplierName = $supplierBidWinners->first()->supplier->name; // Update the previous supplier name
                    @endphp
                    @endif
                    @endforeach
                </label>
                in the amount of
                @php
                $totalAmt = 0;
                @endphp

                @foreach ($bidWinnersGrouped as $supplierId => $supplierBidWinners)
                @php
                $totalAmt = $supplierBidWinners->sum('total_amt');
                @endphp
                @if ($loop->first)
                {{ number_format($totalAmt, 2) }}
                @else
                / {{ number_format($totalAmt, 2) }}
                @endif
                @endforeach
                is reasonable and that it was the lowest obtainable most advantageous to the Government this {{ \Carbon\Carbon::parse($abstracts->requestDetail->created_at)->format('jS') }} day of {{ \Carbon\Carbon::parse($abstracts->requestDetail->created_at)->format('F, Y') }}. </p>
        </div>
    </div>

    <div class="outer-container" style="margin-top: 4%">
        <p class="text-center">
            <label for="" style="font-size: 13px; font-weight: 600">WALFRED I. AGOR</label> <br> <label for="" style="font-size: 12px">Mun. Gen. Services Office</label> <br> <label for="" style="font-size: 11px">Representative</label>
        </p>
        <p class="text-center">
            <label for="" style="font-size: 13px; font-weight: 600">JOYLYN U. RODRIGUEZ</label> <br> <label for="" style="font-size: 12px">Municipal Budget Officer</label> <br> <label for="" style="font-size: 11px">Representative</label>
        </p>
        <p class="text-center">
            <label for="" style="font-size: 13px; font-weight: 600">RONALYN M. ELEDANA</label> <br> <label for="" style="font-size: 12px">Office of the Mayor</label> <br> <label for="" style="font-size: 11px">Representative</label>
        </p>
    </div>

    <div class="outer-container" style="margin-top: 4%">
        <p class="">
            <label for="" style="font-size: 13px; font-weight: 600">Recommending Approval:</label>
        </p>
        <p class="">
            <label for="" style="font-size: 13px; font-weight: 600">Approved By:</label>
        </p>
    </div>

    <div class="outer-container" style="margin-top: 4%">
        <p class="text-center">
            <label for="" style="font-size: 13px; font-weight: 600"> ENGR. MA. LOURDES P. SAN MIGUEL </label> <br> <label for="" style="font-size: 12px">Municipal General Services Officer</label>
        </p>
        <p class="text-center">
            <label for="" style="font-size: 13px; font-weight: 600"> EDGAR S. SANLUIS </label> <br> <label for="" style="font-size: 12px">Municipal Mayor</label>
        </p>
    </div>

    <footer class="outer-container" style="margin-top: 20%;">
        <img style="margin: 0 0 0 2em;" src="{{ asset('images/brand/sckn.png') }}" height="30" width="150" alt="">
        <p style="font-size: 11px; margin: 0 0 0 6em;"> <label for="" style="font-weight: 600">Cailles Street Poblacion III. Santa Cruz, Laguna <br> Telephone No. (049) 501-0250</label></p>
    </footer>

</body>
</html>
