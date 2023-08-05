<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
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




</style>



<div class="text-center">
    <label for="">Republic of the Philippines</label> <br>
    <label for="">Province of Laguna</label><br>
    <label for="">Municipality of Sta Cruz</label>

    <h4>OFFICE OF THE MUNICIPAL GENERAL SERVICES</h4>
    <h3>PURCHASE REQUEST</h3>
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
                <th style="border: 1px solid black;" colspan="2" ><label for="" style="font-size: 15px;">Department</label></th>
                <th style="border: 1px solid black;"><label for="" style="font-size: 15px;"></label></th>
                <th style="border-top: 1px solid black; width: 300px;" colspan="7"><label for="" style="font-size: 15px;"> {{ $requestDetail->department->name }} </label></th>
                <th style="border: 1px solid black;" colspan="1"><label for="" style="font-size: 11px;">PR. No.</label></th>
                <th style="border: 1px solid black;" colspan="1"><label for="" style="font-size: 11px;">{{ $requestDetail->pr_no }}</label></th>
                <th style="border: 1px solid black;" colspan="1"><label for="" style="font-size: 15px;">1/31/2023</label></th>
            </tr>
            <tr >
                <th style="border: 1px solid black;" colspan="2" ><label for="" style="font-size: 15px;">Section</label></th>
                <th style="border: 1px solid black;"><label for="" style="font-size: 15px;">  </label></th>
                <th style="border: 1px solid black;" colspan="7"><label for="" style="font-size: 15px;"> {{ $requestDetail->division?->name }} </label></th>
                <th style="border: 1px solid black;" colspan="2"><label for="" style="font-size: 15px;">Resolution No.</label></th>
                <th style="border: 1px solid black;"><label for="" style="font-size: 15px;"></label></th>
            </tr>
            <tr >
                <th style="border: 1px solid black;" colspan="1" ><label for="" style="font-size: 15px;"></label></th>
                <th style="border: 1px solid black;" colspan="1" ><label for="" style="font-size: 15px;"></label></th>
                <th style="border: 1px solid black;"><label for="" style="font-size: 15px;"></label></th>
                <th style="border: 1px solid black;" colspan="7"><label for="" style="font-size: 15px;"></label></th>
                <th style="border: 1px solid black;" colspan="2"><label for="" style="font-size: 15px;">Quotation No.</label></th>
                <th style="border: 1px solid black;"><label for="" style="font-size: 15px;"></label></th>
            </tr>
            <tr style="text-align: center">
                <th style="border: 1px solid black;"><label for="" style="font-size: 15px;">Item. <br> No</label></th>
                <th style="border: 1px solid black;"><label for="" style="font-size: 15px;">Quantity</label></th>
                <th style="border: 1px solid black;"><label for="" style="font-size: 15px;">Unit of <br> Issue</label></th>
                <th style="border: 1px solid black;" colspan="8"><label for="" style="font-size: 15px;">Item Description</label></th>
                <th style="border: 1px solid black;" colspan="" ><label for="" style="font-size: 15px;">Estimated Unit <br> Cost</label></th>
                <th style="border: 1px solid black;"><label for="" style="font-size: 15px;">Estimated Total <br> Cost</label></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requestDetail->purchaseRequest as $purchaseRequest)
            <tr style="text-align: center">
                <td style="border: 1px solid black;">{{ $loop->index + 1 }}</td>
                <td style="border: 1px solid black;">{{ $purchaseRequest->quantity }}</td>
                <td style="border: 1px solid black;">{{ $purchaseRequest->item->unit->description }}</td>
                <td style="border: 1px solid black;" colspan="8"> {{ $purchaseRequest->description  }} </td>
                <td style="border: 1px solid black;" colspan="1">{{ number_format($purchaseRequest->unit_price, 2) }}</td>
                <td style="border: 1px solid black;">{{ number_format($purchaseRequest->estimated_cost, 2) }}</td>
            </tr>
            @endforeach
            <tr style="text-align: center">
                <td style="border: 1px solid black;"></td>
                <td style="border: 1px solid black;"></td>
                <td style="border: 1px solid black;"></td>
                <td style="border: 1px solid black;" colspan="8"></td>
                <th style="border: 1px solid black;" colspan="1">Total</th>
                <th style="border: 1px solid black;">{{ number_format($requestDetail->grand_total, 2) }}</th>
            </tr>
        </tbody>
        <tfoot>
            <tr style="">
                <td style="border-bottom: 1px solid black; border-left: 1px solid black">Purpose:</td>
                <td style="border-bottom: 1px solid black;" colspan="8">{{ $requestDetail->purpose }}</td>
                <td style="border-bottom: 1px solid black;"></td>
                <td style="border-bottom: 1px solid black;"></td>
                <th style="border-bottom: 1px solid black;" colspan="1"></th>
                <th style="border-bottom: 1px solid black; border-right: 1px solid black"></th>
            </tr>
            <tr style="border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
                <td colspan="2"><br> <br> Requested By:</td>
                <td></td>
                <td></td>
                <th></th>
                <td colspan="8" rowspan=""> <br> Certified as to cash Availability <br> Amount : {{ number_format($requestDetail->grand_total, 2) }}</td>
            </tr>
            <tr style="border-left: 1px solid black; border-right: 1px solid black;">
                <td colspan="4"> <br> <br> <label for="" style="font-weight: 600">{{ $requestDetail->evaluated_by }}</label> <br> Municipal General Services Officer </td>
                <th></th>
                <td colspan="8" rowspan=""> <br> <label for="" style="font-weight: 600" >Ronaldo O. Valles</label> <br> Municipal Treasuser </td>
            </tr>
            <tr style="border-left: 1px solid black; border-right: 1px solid black;">
                <td colspan="4"> <br> <br> Noted as to Submitted and Approved <br> Annual Procurement Plan </td>
                <th></th>
                <td colspan="8" rowspan=""> <br> <br> Approved By: </td>
            </tr>
            <tr style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black">
                <td colspan="4"> <br><br> <label for="" style="font-weight: 600">{{ $requestDetail->evaluated_by }}</label> <br> Municipal General Services Officer </td>
                <th></th>
                <td colspan="8" rowspan=""> <br> <br> <label for="" style="font-weight: 600">Edgar S. San Luis</label> <br> Municipal Mayor </td>
            </tr>
        </tfoot>
    </table>
</div>
</body>
</html>
