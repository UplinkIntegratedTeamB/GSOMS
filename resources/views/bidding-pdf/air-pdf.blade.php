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
            letter-spacing: 1px;
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
        <h4>ACCEPTANCE AND INSPECTION REPORT</h4>
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
                    <td colspan="5" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $air->requestDetail->biddingAbstract->winners->name }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start" colspan="2">AIR No.: {{ $air->c_number }} </td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">PO No.</td>
                    <td colspan="5" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $air->requestDetail->biddingPurchaseOrder->po_no }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start ">Date:</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">Department</td>
                    <td colspan="5" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $air->requestDetail->department->name }}</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">Invoice No. {{ $air->invoice_no }}</td>
                </tr>
                <tr>
                    <td colspan="1" style="border: 1px solid black; font-size: 12px; padding: 10px; ">Item No. </td>
                    <td colspan="1" style="border: 1px solid black; font-size: 12px; padding: 10px; "> Unit</td>
                    <td colspan="5" style="border: 1px solid black; font-size: 12px; padding: 10px; ">Description</td>
                    <td colspan="1" style="border: 1px solid black; font-size: 12px; padding: 10px; ">Quantity </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($air->requestDetail->purchaseRequest as $po)
                <tr>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $po->item->id }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $po->item->itemType->type }}</td>
                    <td colspan="5" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $po->item->description }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $po->quantity }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="8" style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: center"><strong>ACCEPTANCE</strong></td>
                </tr>
            </tbody>
        </table>
        <div class="" style="border: 1px solid black; padding: 10px">
            <div class="outer-container">
                <p>
                  Date Received: <br> ( ) Partial ( pls. specify quantity ) <br> (X) Complete

                </p>
                <p class="text-center">
                    <label for="" style="font-weight: 600">Hon. EDGAR S. SAN LUIS</label> <br>
                    Municipal Mayor
                </p>
            </div>
        </div>
        <div style="border: 1px solid black; padding: 10px" class="text-center">
                <strong style="font-size: 12px">INSPECTION</strong>
        </div>
        <div class="" style="border: 1px solid black; padding: 10px">
            <div>
                <p>
                    Date Inspected : <br>
                    <label for="" style="font-size: 11px">(  ) Inspected, verified and found OK as to quantity and specifications </label>
                </p>
            </div>
            <div class="outer-container">
                <p class="text-center">
                    <label for="" style="font-weight: 600">Hon. EDGAR S. SAN LUIS</label> <br>
                    Municipal Mayor

                </p>
                <p class="text-center">
                    <label for="" style="font-weight: 600">Hon. EDGAR S. SAN LUIS</label> <br>
                    Municipal Mayor
                </p>
            </div>
        </div>
    </div>

</body>
</html>
