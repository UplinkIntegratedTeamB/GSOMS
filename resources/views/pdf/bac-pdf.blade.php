<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/brand/favicon.ico') }}" />
    <title>BAC ROSOLUTION</title>
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

.header-logo{
    width: 70px;
    height:70px;
    margin-left:46%;
}

footer {
  position: fixed;
  width: 100%;
}
</style>

<img class="header-logo" src="{{ asset('images/brand/bgstacruz.png') }}" />
<div class="text-center">
    <label for="">Republic of the Philippines</label> <br>
    <label for="">Province of Laguna</label><br>
    <label for="">Municipality of Santa Cruz</label>
    <hr style="height:2px; border-width:0; color:gray; background-color:black; margin-left:3em; width:90%;">

    <h3>BAC RESOLUTION NO.</h3>
    <label for="">Series of 2023</label>
    <h5 style="text-transform: uppercase">A RESOLUTION ESTABLISHING THE MODE OF PROCUREMENT RE: <br> PROCUREMENT BY {{ $resolution->requestDetail->department->name }} </h5>
</div>

<div class="container">
    <p style="text-align: justify;" class="text-center">
        <strong style="margin-left: 3em;">WHEREAS,</strong> the Municipal Government of Santa Cruz, Laguna through the Municipal Mayor approved a Purchase Request for the Furnishing and Delivering of
        <label for="" style="text-decoration: underline">{{ $resolution->item_details }}</label> in the amount of
        <label for="" style="text-decoration: underline">{{ $resolution->amount_in_words }} ( Php {{ $resolution->requestDetail->grand_total }}) </label> and had been verified to be in the Annual Procurement Plan for FY 2023 with the Approved
        Purchase Request Number <label for="" style="text-decoration: underline">{{ $resolution->requestDetail->pr_no }}</label> dated
        <label for="" style="text-decoration: underline">
            {{ \Carbon\Carbon::parse($resolution->meeting)->format('F j, Y') }}
        </label>
    </p>
</div>

<div class="container" style="margin-top: 30px">
    <p style="text-align: justify;" class="text-center">
        <strong style="margin-left: 3em;">WHEREAS,</strong> paragraph (b) Section 52 of Rule XVI of the Implementing Rules and Regulations of R.A 9184 otherwise known as the Government Procurement Reform Acts allows
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
    <p style="text-align: justify;" class="text-center">
        <strong style="margin-left: 3em;">NOW THEREFORE,</strong> We the Members of Bids and Awards Committee, hereby RESOLVE as it is hereby RESOLVED to recommend to AWARD CONTRACT through Shopping for furnishing and delivering of
        <label for="" style="text-decoration: underline">{{ $resolution->item_details }}</label> with provisions sets forth in Article XVI Section 52 of IRRA of R.A 9184.
    </p>
</div>

<div class="container" style="margin-top: 40px; font-size: 14px">
    Done this <label for="" style="text-decoration: underline">{{ \Carbon\Carbon::parse($resolution->created_at)->format('jS') }}</label> day of <label for="" style="text-decoration: underline">  {{ \Carbon\Carbon::parse($resolution->created_at)->format('F, Y') }} </label> at Santa Cruz Laguna
</div>

<div class="outer-container" style="margin-top: 6%">
        <p class="text-center">
            <label for="" style="font-size: 13px; font-weight: 600" >MELVIN O. BONZA</label> <br> Municipal Administrator
        </p>
        <p class="text-center">
            <label for="" style="font-size: 13px; font-weight: 600" >ATTY. RONALDO C. MARIANO</label> <br> Municipal Legal Officer
        </p>
</div>

<div class="outer-container" style="margin-top: 6%">
    <p class="text-center">
        <label for="" style="font-size: 13px; font-weight: 600" >ENGR. PABLO M. MAGPILY JR.</label> <br> Municipal Engineer
    </p>
    <p class="text-center">
        <label for="" style="font-size: 13px; font-weight: 600" >EnP. JOSHUA FEDERICK J. VITALIZ, DLUP</label> <br> MGDH I-LDRRMO
    </p>
    <p class="text-center">
        <label for="" style="font-size: 13px; font-weight: 600" >EILEEN S. TALABIS</label> <br> Municipal Budget Officer
    </p>
</div>

<div class="outer-container" style="margin-top: 6%">
    <p class="text-center">
        Approved By:
    </p>
    <p style="margin-top: 3em;" class="text-center">
        <label for="" class="text-center" style="font-size: 13px; font-weight: 600" >EDGAR S. SAN LUIS</label> <br> Municipal Mayor
    </p>
    <p class="text-center"></p>
</div>


<footer class="outer-container" style="margin-top: 20%;" >
    <p style="font-size: 11px; margin: 0 0 0 4em;"> <label for="" style="font-weight: 600">Control No.</label> {{ $resolution->c_number }}</p>
    <img  style="margin: 0 0 0 5em;" src="{{ asset('images/brand/sckn.png') }}" height="30" width="150" alt="">
    <p style="font-size: 11px; margin: 0 0 0 6em;"> <label for="" style="font-weight: 600">Cailles Street Poblacion III. Santa Cruz, Laguna <br> Telephone No. (049) 501-0250</label></p>
</footer>

</body>
</html>
