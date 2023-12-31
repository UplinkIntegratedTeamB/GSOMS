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
        <h4>PROPERTY ACKNOWLEDGEMENT RECEIPT</h4>
    </div>

    <div class="container">
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
                    <td></td>
                </tr>
                <tr>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px; ">QTY</th>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px; ">UNIT</th>
                    <th colspan="4" style="border: 1px solid black; font-size: 12px; padding: 10px; ">DESCRIPTION</th>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px; ">Property Number</th>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px; ">Date Acquired</th>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px; ">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pars->requestDetail->purchaseRequest as $par)
                <tr>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $par->quantity }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $par->item->itemType->type }}</td>
                    <td colspan="4" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $par->item->description }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: end">{{ $par->estimated_cost }}</td>
                </tr>
                @endforeach
                <tr>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></td>
                    <td colspan="4" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">Serial No. <strong>{{ $pars->serial_number }}</strong></td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: end"></td>
                </tr>
            </tbody>
        </table>
        <div class="" style="border: 1px solid black; padding: 10px">
            <div class="outer-container">
                Received from:
                <p class="text-center" style="padding-top: 20px">
                    <strong>ENGR. MA. LOURDES P. SAN MIGUEL</strong>
                </p>
                Received by:
                <p class="text-center">
                    <label for="" style="font-weight: 600">Hon. EDGAR S. SAN LUIS</label> <br>
                    Municipal Mayor
                </p>
            </div>
        </div>
    </div>


</body>
</html>
