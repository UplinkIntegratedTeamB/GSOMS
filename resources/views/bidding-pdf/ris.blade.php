<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REQUISITION AND ISSUE SLIP</title>
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
        <h4 style="margin-right: 11em;"> REQUISITION AND ISSUE SLIP </h4>
    </div>

    <div class="">
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
                <tr style="text-align: start">
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">Department</th>
                    <td colspan="3" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $ris->requestDetail->department->name }}</td>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">RIS No.</th>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $ris->c_number }}</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">Date:</td>
                </tr>
                <tr>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">Division</th>
                    <td colspan="3" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $ris->requestDetail->division?->name }}</td>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">AIR No.</th>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">{{ $ris->requestDetail->acceptanceInspection->c_number }}</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start">Date</td>
                </tr>
                <tr>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px;">#</th>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px;">Unit</th>
                    <th colspan="5" style="border: 1px solid black; font-size: 12px; padding: 10px;">Description</th>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px;">Qty</th>
                    <th style="border: 1px solid black; font-size: 12px; padding: 10px;"> Unit Price </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ris->requestDetail->purchaseRequest as $request)
                <tr>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px;">{{ $loop->index + 1 }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px;">{{ $request->item->itemType->type }}</td>
                    <td colspan="5" style="border: 1px solid black; font-size: 12px; padding: 10px;">{{ $request->description }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px;">{{ $request->quantity }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 10px;"> {{ $request->unit_price }} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="" style="border: 1px solid black; padding: 10px">
            <p style="font-size: 13px">
                Purpose:
                <label for="" style="margin-left: 20px">
                    {{ $ris->requestDetail->purpose }}
                </label>
            </p>
        </div>
        <div class="" style="border: 1px solid black; padding: 10px">
            <div class="outer-container">
                Issued by:
                <p class="text-center" style="padding-top: 5%;">
                    <strong>ENGR. MA. LOURDES P. SAN MIGUEL</strong> <br> Municipal General Services Officer
                </p>
                Approved by:
                <p class="text-center" style="padding-top: 5%">
                    <label for="" style="font-weight: 600">Hon. EDGAR S. SAN LUIS</label> <br>
                    Municipal Mayor
                </p>
            </div>
        </div>
    </div>
<footer class="outer-container" style="margin-top: 20%;" >
    <img  style="margin: 0 0 0 0em;" src="{{ asset('images/brand/sckn.png') }}" height="30" width="150" alt="">
    <p style="font-size: 11px; margin: 0 0 0 6em;"> <label for="" style="font-weight: 600">Cailles Street Poblacion III. Santa Cruz, Laguna <br> Telephone No. (049) 501-0250</label></p>
</footer>
</body>
</html>
