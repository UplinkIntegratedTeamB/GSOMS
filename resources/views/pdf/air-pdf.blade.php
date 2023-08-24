<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ACCEPTANCE AND INSPECTION REPORT</title>
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
        <label style="margin-right: 11em;" for="">Municipality of Sta Cruz</label> <br>
        <label style="margin-right: 11em;" for="">OFFICE OF THE MUNICIPAL GENERAL SERVICES</label>
        <h4 style="margin-right: 11em;">ACCEPTANCE AND INSPECTION REPORT</h4>
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
                    <td style="border: 1px solid black; font-size: 12px; padding: 7px; text-align: start">Supplier</td>
                    <td colspan="5" style="border: 1px solid black; font-size: 12px; padding: 7px; text-align: start">{{ $air->requestDetail->abstractCanvass->winners->name }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 7px; text-align: start" colspan="2">AIR No.: {{ $air->c_number }} </td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; font-size: 12px; padding: 7px; text-align: start">PO No.</td>
                    <td colspan="5" style="border: 1px solid black; font-size: 12px; padding: 7px; text-align: start">{{ $air->requestDetail->purchaseOrder->po_no }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 7px; text-align: start ">Date:</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 7px; text-align: start"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; font-size: 12px; padding: 7px; text-align: start">Department</td>
                    <td colspan="5" style="border: 1px solid black; font-size: 12px; padding: 7px; text-align: start">{{ $air->requestDetail->department->name }}</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 7px; text-align: start">Invoice No. {{ $air->invoice_no }}</td>
                </tr>
                <tr>
                    <td colspan="1" style="border: 1px solid black; font-size: 12px; padding: 7px; ">Item No. </td>
                    <td colspan="1" style="border: 1px solid black; font-size: 12px; padding: 7px; "> Unit</td>
                    <td colspan="5" style="border: 1px solid black; font-size: 12px; padding: 7px; ">Description</td>
                    <td colspan="1" style="border: 1px solid black; font-size: 12px; padding: 7px; ">Quantity </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($air->requestDetail->purchaseRequest as $po)
                <tr>
                    <td style="border: 1px solid black; font-size: 12px; padding: 7px; text-align: start">{{ $loop->index + 1 }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 7px; text-align: start">{{ $po->item->unit->description }}</td>
                    <td colspan="5" style="border: 1px solid black; font-size: 12px; padding: 7px; text-align: start">{{ $po->description }}</td>
                    <td style="border: 1px solid black; font-size: 12px; padding: 7px; text-align: start">{{ $po->quantity }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="8" style="border: 1px solid black; font-size: 12px; padding: 5px; text-align: center"><strong>ACCEPTANCE</strong></td>
                </tr>
            </tbody>
        </table>
        <div class="" style="border: 1px solid black; padding: 7px">
            <div class="outer-container">
                <p>
                  Date Received: <br> ( ) Partial ( pls. specify quantity ) <br> (X) Complete

                </p>
                <p class="text-center">
                    <label for="" style="font-weight: 600">EVANGELINE A. GALZOTE</label> <br>
                    Property Officer
                </p>
            </div>
        </div>
        <div style="border: 1px solid black; padding: 7px" class="text-center">
                <strong style="font-size: 12px">INSPECTION</strong>
        </div>
        <div class="" style="border: 1px solid black; padding: 7px">
            <div>
                <p>
                    Date Inspected : <br>
                    <label for="" style="font-size: 11px">(  ) Inspected, verified and found OK as to quantity and specifications </label>
                </p>
            </div>
            <div class="outer-container">
                <p class="text-center">
                    <label for="" style="font-weight: 600">EDWINA S. FLORES</label> <br>
                    Insperction Officer/Inpection Committee

                </p>
                <p class="text-center">
                    <label for="" style="font-weight: 600">ELEANOR LYNNE F. OMADTO</label> <br>
                    Inspection Officer/Inspection Committee
                </p>
            </div>
        </div>
    </div>
<footer class="outer-container" style="margin-top: 50%;" >
    <img  style="margin: 0 0 0 2em;" src="{{ asset('images/brand/sckn.png') }}" height="30" width="150" alt="">
    <p style="font-size: 11px; margin: 0 0 0 6em;"> <label for="" style="font-weight: 600">Cailles Street Poblacion III. Santa Cruz, Laguna <br> Telephone No. (049) 501-0250</label></p>
</footer>

</body>
</html>
