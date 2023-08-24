<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BILL OF QUANTITIES</title>
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
        <label style="margin-right: 11em;" for="">Municipality of Sta. Cruz</label>
        <h4 style="margin-right: 11em;">BILL OF QUANTITIES</h4>
    </div>

    <table style="border-collapse: collapse; margin-top: 5%; width: 100%">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: start">Requisitioner:</td>
                <td colspan="4" style="border-bottom: 1px solid black; text-align: start">EnP. Joshua Federick J. Vitaliz DLUF</td>
            </tr>
            <tr>
                <td style="text-align: start">Department/Office:</td>
                <td colspan="4" style="border-bottom: 1px solid black; text-align: start">{{ $request->department->name }}</td>
            </tr>
            <tr>
                <td style="text-align: start">Project:</td>
                <td colspan="4" style="border-bottom: 1px solid black; text-align: start">Purpose</td>
            </tr>
            <tr>
                <td style="text-align: start">Location:</td>
                <td colspan="4" style="border-bottom: 1px solid black; text-align: start">{{ $request->department->name }} / {{ $request->division?->name }}</td>
            </tr>
        </tbody>
    </table>

    <table style="border-collapse: collapse; margin-top: 2%; width: 100%">
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
            </tr>
            <tr>
                <th style="border: 1px solid black">Item</th>
                <th style="border: 1px solid black" colspan="3">Description</th>
                <th style="border: 1px solid black">Qty</th>
                <th style="border: 1px solid black" colspan="2">Unit</th>
                <th style="border: 1px solid black" colspan="2">Unit Price</th>
                <th style="border: 1px solid black" colspan="2">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($request->purchaseRequest as $req)
            <tr>
                <td style="border: 1px solid black">{{ $req->item->id }}</td>
                <td style="border: 1px solid black" colspan="3">{{ $req->description }}</td>
                <td style="border: 1px solid black">{{ $req->quantity }}</td>
                <td style="border: 1px solid black" colspan="2">{{ $req->item->unit->description }}</td>
                <td style="border: 1px solid black" colspan="2"></td>
                <td style="border: 1px solid black" colspan="2"></td>
            </tr>
            @endforeach
            <tr>
                <td style="border: 1px solid black" colspan="1"></td>
                <td style="border: 1px solid black; text-align: start" colspan="10">Total Amount</td>
            </tr>
        </tbody>
    </table>

    <div style="margin-top: 4%" class="">
        <strong>AMOUNT IN WORDS: _______________________________________________________________________________</strong>
    </div>

    <div class="text-center">
        Submitted by: <br> <br>
        ____________________________________ <br>
        Signiture over Printed Name <br> <br>

        ____________________________________ <br>
        Date
    </div>

</body>
</html>
