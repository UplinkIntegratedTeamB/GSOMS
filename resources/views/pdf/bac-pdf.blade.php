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
    letter-spacing: 1px; !important
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
    <label for="">Municipality of Sta Cruz</label>

    <h3>BAC RESOLUTION NO.</h3>
    <label for="">Series of 2023</label>
    <h5 style="text-transform: uppercase">A RESOLUTION ESTABLISHING THE MODE OF PROCUREMENT RE: <br> PROCUREMENT BY {{ $resolution->requestDetail->department->name }} </h5>
</div>

<div class="container">
    <p class="text-center">
        <strong>WHEREAS,</strong> the Municipal Government of Santa Cruz, Laguna through the Municipal Mayor approved a Purchase Request for the Furnishing and Delivering of
        <label for="" style="text-decoration: underline">{{ $resolution->item_details }}</label> in the amount of
        <label for="" style="text-decoration: underline">{{ $resolution->amount_in_words }} ( Php {{ $resolution->requestDetail->grand_total }}) </label> and had been verified to be in the Annual Procurement Plan for FY 2023 with the Approved
        Purchase Request Number <label for="" style="text-decoration: underline">{{ $resolution->requestDetail->pr_no }}</label> dated
        <label for="" style="text-decoration: underline">
            {{ \Carbon\Carbon::parse($resolution->meeting)->format('F j, Y') }}
        </label>
    </p>
</div>

<div class="container" style="margin-top: 30px">
    <p class="text-center">
        <strong>WHEREAS,</strong> paragraph (b) Section 52 of Rule XVI of the Implementing Rules and Regulations of R.A 9184 otherwise known as the Government Procurement Reform Acts allows
        <strong>
            @if($resolution->requestDetail->procurement_mode_id == 2)
            Shopping
            @else
            Bidding
            @endif
        </strong>
        for the procurement does not result splitting and that at least three (3) price quotations from bonafide suppliers shall be obtained
    </p>
</div>

<div class="container" style="margin-top: 30px">
    <p class="text-center">
        <strong>NOW THEREFORE,</strong> We the Members of Bids and Awards Committee, hereby RESOLVE as it is hereby RESOLVED to recommend to AWARD CONTRACT through Shopping for furnishing and delivering of
        <label for="" style="text-decoration: underline">{{ $resolution->item_details }}</label> with provisions sets forth in Article XVI Section 52 of IRRA of R.A 9184.
    </p>
</div>

<div class="container" style="margin-top: 40px; font-size: 14px">
    Done this <label for="" style="text-decoration: underline">{{ \Carbon\Carbon::parse($resolution->created_at)->format('jS') }}</label> day of <label for="" style="text-decoration: underline">  {{ \Carbon\Carbon::parse($resolution->created_at)->format('F, Y') }} </label> at Santa Cruz Laguna
</div>

<div class="outer-container" style="margin-top: 4%">
        <p class="text-center">
            <label for="" style="font-size: 13px; font-weight: 600" >ENGR. MARIA LOURDES P. SAN MIGUEL</label> <br> Municipal General Services Officer
        </p>
        <p class="text-center">
            <label for="" style="font-size: 13px; font-weight: 600" >MELVIN O. BONZA</label> <br> Municipal Administrator
        </p>
</div>

<div class="outer-container" style="margin-top: 4%">
    <p class="text-center">
        <label for="" style="font-size: 13px; font-weight: 600" >ATTY. RONALDO C. MARIANO</label> <br> Municipal Legal Officer
    </p>
    <p class="text-center">
        <label for="" style="font-size: 13px; font-weight: 600" >ENGR. PABLO M. MAGPILY JR.</label> <br> Municipal Engineer
    </p>
    <p class="text-center">
        <label for="" style="font-size: 13px; font-weight: 600" >EILEEN S. TALABIS</label> <br> Municipal Budget Officer
    </p>
</div>

<div class="outer-container">
    <p class="text-center">
        Approved By:
    </p>
    <p class="text-center">
        <label for="" class="text-center" style="font-size: 13px; font-weight: 600" >EDGAR S. SAN LUIS</label> <br> Municipal Mayor
    </p>
    <p class="text-center"></p>
    <p class="text-center"></p>
    <p class="text-center"></p>
</div>

<br>

<p style="font-size: 11px"> <label for="" style="font-weight: 600">Control No.</label> {{ $resolution->control_no }}</p>

</body>
</html>
