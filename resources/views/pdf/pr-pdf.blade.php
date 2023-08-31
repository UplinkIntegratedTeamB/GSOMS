<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('images/brand/bgstacruz.png') }}">
    <title>PURCHASE REQUEST</title>
</head>
<body>

<style>

* {
    font-family: 'Poppins', sans-serif;
}

.text-center {
    text-align: center;
}

table th, table td {
    width: 120px; /* set width to 100 pixels */
    text-align: center; /* center align the text inside */
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
    <label style="margin-right: 11em;" for="">Municipality of Sta Cruz</label>

    <h4 style="margin-right: 11em;">OFFICE OF THE MUNICIPAL GENERAL SERVICES</h4>
    <h3 style="margin-right: 11em;">PURCHASE REQUEST</h3>
</div>

<div class="container">
<table style="border-collapse: collapse; margin: 0 auto ">
        <thead>
            <tr>
                <th colspan="1"></th>
                <th colspan="1"></th>
                <th colspan="1"></th>
                <th colspan="1"></th>
                <th colspan="1"></th>
                <th colspan="1"></th>
                <th colspan="1"></th>
                <th colspan="1"></th>
                <th colspan="1"></th>
                <th colspan="1"></th>
                <th colspan="1"></th>
                <th colspan="1"></th>
            </tr>
            <tr >
                <th style="border: 1px solid black; text-align: start" colspan="2" ><label for="" style="font-size: 13px;">Department</label></th>
                <th style="border: 1px solid black; text-align: start"><label for="" style="font-size: 15px;"></label></th>
                <th style="border-top: 1px solid black; width: 300px; text-align: start" colspan="7"><label for="" style="font-size: 13px;"> {{ $requestDetail->department->name }} </label></th>
                <th style="border: 1px solid black;" colspan="1"><label for="" style="font-size: 11px;">PR. No.</label></th>
                <th style="border: 1px solid black;" colspan="1"><label for="" style="font-size: 11px;">{{ $requestDetail->pr_no }}</label></th>
                <th style="border: 1px solid black;" colspan="1"><label for="" style="font-size: 11px;">{{ date('F j, Y', strtotime($requestDetail->date1)) }}</label></th>
            </tr>
            <tr style="">
                <th style="border: 1px solid black; text-align: start" colspan="2" ><label for="" style="font-size: 13px;">Section</label></th>
                <th style="border: 1px solid black; text-align: start"><label for="" style="font-size: 15px;">  </label></th>
                <th style="border: 1px solid black; text-align: start" colspan="7"><label for="" style="font-size: 13x;"> {{ $requestDetail->division?->name }} </label></th>
                <th style="border: 1px solid black; text-align: start" colspan="2"><label for="" style="font-size: 13px;">Resolution No.</label></th>
                <th style="border: 1px solid black; text-align: start"><label for="" style="font-size: 15px;"></label></th>
            </tr>
            <tr >
                <th style="border: 1px solid black;" colspan="1" ><label for="" style="font-size: 15px;"></label></th>
                <th style="border: 1px solid black;" colspan="1" ><label for="" style="font-size: 15px;"></label></th>
                <th style="border: 1px solid black;"><label for="" style="font-size: 15px;"></label></th>
                <th style="border: 1px solid black;" colspan="7"><label for="" style="font-size: 15px;"></label></th>
                <th style="border: 1px solid black; text-align: start" colspan="2"><label for="" style="font-size: 15px;">Quotation No.</label></th>
                <th style="border: 1px solid black;"><label for="" style="font-size: 15px;"></label></th>
            </tr>
            <tr style="text-align: center">
                <th style="border: 1px solid black;"><label for="" style="font-size: 13px;">Item. No</label></th>
                <th style="border: 1px solid black;"><label for="" style="font-size: 13px;">Quantity</label></th>
                <th style="border: 1px solid black;"><label for="" style="font-size: 13px;">Unit of Issue</label></th>
                <th style="border: 1px solid black;" colspan="8"><label for="" style="font-size: 13px;">Item Description</label></th>
                <th style="border: 1px solid black;" colspan="" ><label for="" style="font-size: 13px;">Unit Cost</label></th>
                <th style="border: 1px solid black;"><label for="" style="font-size: 13px;">Total Cost</label></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requestDetail->purchaseRequest as $purchaseRequest)
            <tr style="text-align: center">
                <td style="border: 1px solid black; font-size: 13px; text-align: start">{{ $loop->index + 1 }}</td>
                <td style="border: 1px solid black; font-size: 13px; text-align: start">{{ $purchaseRequest->quantity }}</td>
                <td style="border: 1px solid black; font-size: 13px; text-align: start">{{ $purchaseRequest->item->unit->description }}</td>
                <td style="border: 1px solid black; font-size: 13px; text-align: start" colspan="8"> {{ $purchaseRequest->description  }} </td>
                <td style="border: 1px solid black; font-size: 13px; text-align: end" colspan="1">{{ number_format($purchaseRequest->unit_price, 2) }}</td>
                <td style="border: 1px solid black; font-size: 13px; text-align: end">{{ number_format($purchaseRequest->estimated_cost, 2) }}</td>
            </tr>
            @endforeach
            <tr style="text-align: center">
                <td style="border: 1px solid black; font-size: 13px; text-align: start"></td>
                <td style="border: 1px solid black; font-size: 13px; text-align: start"></td>
                <td style="border: 1px solid black; font-size: 13px; text-align: start"></td>
                <td style="border: 1px solid black; font-size: 13px; text-align: start" colspan="8"></td>
                <td style="border: 1px solid black; font-size: 13px; text-align: end" colspan="1"></td>
                <td style="border: 1px solid black; font-size: 13px; text-align: end"></td>
            </tr>
            <tr style="text-align: center">
                <td style="border: 1px solid black;"></td>
                <td style="border: 1px solid black;"></td>
                <td style="border: 1px solid black;"></td>
                <td style="border: 1px solid black;" colspan="8"></td>
                <th style="border: 1px solid black; font-size: 13px" colspan="1">Total</th>
                <th style="border: 1px solid black; font-size: 13px; text-align: end">{{ number_format($requestDetail->grand_total, 2) }}</th>
            </tr>
        </tbody>
        <tfoot>
            <tr style="">
                <td style="border-bottom: 1px solid black; border-left: 1px solid black">Purpose:</td>
                <td style="border-bottom: 1px solid black; border-right: 1px solid black; text-align: start" colspan="12">{{ $requestDetail->purpose }}</td>
            </tr>
            <tr style="border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
                <td colspan="2"><br> <br> Requested By:</td>
                <td></td>
                <td></td>
                <th></th>
                <td colspan="8" rowspan=""> <br> Certified as to cash Availability <br> Amount : <strong>{{ number_format($requestDetail->grand_total, 2) }}</strong></td>
            </tr>
            <tr style="border-left: 1px solid black; border-right: 1px solid black;">
                <td colspan="4"> <br> <br> <label for="" style="font-weight: 600; text-transform: uppercase;">{{ $requestDetail->requested_by }}</label> <br> {{ $requestDetail->department->name }} Representative </td>
                <th></th>
                <td colspan="8" rowspan=""> <br> <label for="" style="font-weight: 600; text-transform: uppercase;" >Ronaldo O. Valles</label> <br> Municipal Treasuser </td>
            </tr>
            <tr style="border-left: 1px solid black; border-right: 1px solid black;">
                <td colspan="4"> <br> <br> Noted as to Submitted and Approved <br> Annual Procurement Plan </td>
                <th></th>
                <td colspan="8" rowspan=""> <br> <br> Approved By: </td>
            </tr>
            <tr style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black">
                <td colspan="4"> <br><br> <label for="" style="font-weight: 600; text-transform: uppercase;">{{ $requestDetail->evaluated_by }}</label> <br> Municipal General Services Officer </td>
                <th></th>
                <td colspan="8" rowspan=""> <br> <br> <label for="" style="font-weight: 600; text-transform: uppercase;;">Edgar S. San Luis</label> <br> Municipal Mayor </td>
            </tr>
        </tfoot>
    </table>
</div>

<footer class="outer-container" style="margin-top: 20%;" >
    <img  style="margin: 0 0 0 2em;" src="{{ asset('images/brand/sckn.png') }}" height="30" width="150" alt="">
    <p style="font-size: 11px; margin: 0 0 0 6em;"> <label for="" style="font-weight: 600">Cailles Street Poblacion III. Santa Cruz, Laguna <br> Telephone No. (049) 501-0250</label></p>
</footer>
</body>
</html>
