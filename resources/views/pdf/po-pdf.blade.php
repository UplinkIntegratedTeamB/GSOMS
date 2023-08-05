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
            font-size: 14px;
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

        .d-flex {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
        }

    </style>


    <div class="text-center">
        <label for="">Republic of the Philippines</label> <br>
        <label for="">Province of Laguna</label><br>
        <label for="">Municipality of Sta Cruz</label> <br>
        <label for="">OFFICE OF THE MUNICIPAL GENERAL SERVICES</label>
        <h4>PURCHASE ORDER</h4>
    </div>

    <div class="container">
        <table style="border-collapse: collapse; margin: 0 auto ">
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
                </tr>
                <tr>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">Supplier</td>
                    <td colspan="5" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $pos->requestDetail->abstractCanvass->winners->name }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">P.O. No.</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $pos->po_no }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">Address</td>
                    <td colspan="5" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $pos->requestDetail->abstractCanvass->winners->address }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start ">Date:</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></td>
                    <td colspan="5" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">Mode of Procurement: <br>
                        @if($pos->requestDetail->procurement_mode_id == 2)
                        Shopping / Canvass
                        @else
                        Bidding
                        @endif
                    </td>
                </tr>
                <tr>
                    <th colspan="8" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"><i>Gentlemen: Please furnish this office the following articles subject to the term and conditions contained herein:</i></th>
                </tr>
                <tr>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">Place of Delivery: </td>
                    <td colspan="4" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $pos->requestDetail->endUserOffice->name }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">Delivery Term:</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">
                        @if($pos->delivery_term == 1 )
                            Pick-up
                        @elseif($pos->delivery_term == 2)
                            Delivery w/in Calendar days from receipt of PO
                        @else
                        As per schedule
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">Date of Delivery: </td>
                    <td colspan="4" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">Payment Term:</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"> {{ $pos->payment_term }} </td>
                </tr>
                <tr>
                    <td colspan="1" style="border: 1px solid black; font-size: 12px; padding: 10px; ">Item No. </td>
                    <td colspan="1" style="border: 1px solid black; font-size: 12px; padding: 10px; ">Quantity </td>
                    <td colspan="1" style="border: 1px solid black; font-size: 12px; padding: 10px; "> Unit of Voucher </td>
                    <td colspan="3" style="border: 1px solid black; font-size: 12px; padding: 10px; ">Description</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; ">Unit Cost</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; "> Amount </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pos->requestDetail->purchaseRequest as $po)
                <tr>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $po->item->id }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $po->item->quantity }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $po->item->unit->description }}</td>
                    <td colspan="3" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $po->description }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ number_format($po->unit_price, 2) }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ number_format($po->estimated_cost, 2) }}</td>
                </tr>
                @endforeach
                <tr>
                    <td style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start"></td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start">Remarks:</td>
                    <td colspan="4" style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start"></td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start"></td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start"></td>
                </tr>
                <tr>
                    <td colspan="7" style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start">( In Words ) {{ $pos->requestDetail->bacRes->amount_in_words }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: start"> {{ number_format($pos->requestDetail->grand_total, 2) }} </td>
                </tr>
            </tbody>
        </table>
        <div class="" style="border: 1px solid black; padding: 10px">
            <p><i>
                    In case of failure to make the full delivery within the time specified above, a penalty of one-tenth (1/10) of every percent for every day of delay shall be imposed
                </i></p>
            <div class="outer-container">
                <p>
                    Conforme:
                </p>
                <p>
                    Very truly yours,
                </p>
            </div>
            <div class="outer-container" style="margin-top: 5%">
                <p class="text-center">
                    <label for="" style="font-weight: 600">{{ $pos->requestDetail->abstractCanvass->winners->name }}</label> <br>
                    (Signature over printed name)
                </p>
                <p class="text-center">
                    <label for="" style="font-weight: 600">Hon. EDGAR S. SAN LUIS</label> <br>
                    Municipal Mayor
                </p>
            </div>
        </div>
        <div class="d-flex">
            <div class="" style="width: 60%; border: 1px solid black; padding: 10px">
                <label for=""> Funds Available:</label> <br>
                <p class="text-center">
                    <br>
                    <label for="" style="font-weight: 600">CARIDAD P. LORENZO</label> <br>
                    Municipal Accountant
                </p>
            </div>
            <div class="" style="width: 34%; border: 1px solid black; padding: 10px">
                <br>
                <p>
                    <label for="" style="margin-right: 2em">OBR No. :</label> 100-2022-10-10-11-02928 <br> <br>
                    <label for="" style="margin-right: 2em">AMOUNT:</label> {{ number_format($pos->requestDetail->grand_total, 2) }}
                </p>
            </div>
        </div>
    </div>

</body>
</html>
