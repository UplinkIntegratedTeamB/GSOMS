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

    </style>


    <div class="text-center">
        <label for="">Republic of the Philippines</label> <br>
        <label for="">Province of Laguna</label><br>
        <label for="">Municipality of Sta Cruz</label> <br>
        <label for="">OFFICE OF THE MUNICIPAL GENERAL SERVICES</label>
        <h4>INVENTORY CUSTODIAN SLIP <br> (ICS) </h4>
    </div>

    <div class="">
        <p>Fund Cluster: <label for="" style="text-decoration: underline"> {{ $ics->fund_cluster }} </label></p>
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
                    <th></th>
                </tr>
                <tr>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px;">Qty</th>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px;">Unit</th>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px;">Unit Cost</th>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px;">Total Cost</th>
                    <th colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px;"> Description </th>
                    <th colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px;"> Item No. </th>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px;"> Estimated Usefel Life </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ics->requestDetail->purchaseRequest as $request)
                    <tr>
                        <td style="border: 1px solid black; font-size: 12px; padding: 10px;" >{{ $request->quantity }}</td>
                        <td style="border: 1px solid black; font-size: 12px; padding: 10px;">{{ $request->item->itemType->type }}</td>
                        <td style="border: 1px solid black; font-size: 12px; padding: 10px;">{{ $request->unit_price }}</td>
                        <td style="border: 1px solid black; font-size: 12px; padding: 10px;">{{ $request->estimated_cost }}</td>
                        <td style="border: 1px solid black; font-size: 12px; padding: 10px;" colspan="2">{{ $request->item->description }}</td>
                        <td style="border: 1px solid black; font-size: 12px; padding: 10px;" colspan="2">{{ $request->item->id }}</td>
                        <td style="border: 1px solid black; font-size: 12px; padding: 10px;">{{ $ics->usefel_life }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px;" ></td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px;"></td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px;"> </td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px;"> </td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px;" colspan="2">SN: {{ $ics->serial_number }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px;" colspan="2"></td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px;"></td>
                </tr>
            </tbody>
        </table>
        <div class="" style="border: 1px solid black; padding: 10px">
            <div class="outer-container">
                Received from:
                <p class="text-center" style="padding-top: 5%; text-align: start">
                    <strong>ENGR. MA. LOURDES P. SAN MIGUEL</strong> <br> Municipal General Services Officer
                </p>
                Received by:
                <p class="text-center" style="padding-top: 5%">
                    <label for="" style="font-weight: 600">Hon. EDGAR S. SAN LUIS</label> <br>
                    Municipal Mayor
                </p>
            </div>
        </div>
    </div>

</body>
</html>
