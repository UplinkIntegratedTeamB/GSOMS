<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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

</style>

<body>

    <div class="text-center">
        <label for="">Republic of the Philippines</label> <br>
        <label for="">Province of Laguna</label><br>
        <label for="">Municipality of Sta Cruz</label> <br>
        <label for="">OFFICE OF THE MUNICIPAL GENERAL SERVICES</label>
    </div>

    <div class="" style="margin-top: 4%">
        <label for="" style="font-weight: 600">Project reference Number:</label> <label for="" style="text-decoration: underline">STC-GOOD NO. {{ $res->biddingAbstract->good }}</label> <br> <br>
        <label for="" style="font-weight: 600">Name of the Project:</label> <label for="" style="text-decoration: underline">{{ $res->purpose }}</label> <br> <br>
        <label for="" style="font-weight: 600">Location of the Project:</label> <label for="" style="text-decoration: underline">{{ $res->department->name }} / {{ $res->division?->name }} </label> <br> <br>
    </div>

    <div class="text-center">
        <p class="">
            <h2>POST QUALIFICATION EVALUATION REPORT</h2>
        </p>
    </div>

    <div class="">
        <p>
            <label for="" style="font-weight: 600">
                1.0
            </label>
            <label for="" style="margin-left: 1em; font-weight: 600">
                PROJECT IDENTIFICATION <br>
            </label>
            <label for="" style="margin-left: 3em">
                Narrative Description of project to be bid.
            </label>
        </p>
        <p>
            TABLE 1. IDENTIFICATION
        </p>
    </div>

    <div class="">
        <table style="border-collapse: collapse; margin: 0 auto ">
            <thead>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3" style="border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black; font-size: 12px; padding: 0px; margin: 0">
                        <p style="text-align: start; font-size: 12px;">
                            1.1 Purchaser or (Employer) <br>
                            <label for="" style="margin-left: 2em">
                                (a) Name
                            </label> <br>
                            <label for="" style="margin-left: 2em">
                                (b) Address
                            </label>
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p class="text-center" style="font-size: 12px;">
                            {{ $res->biddingAbstract->winners->address }}
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: start; font-size: 12px;">
                            1.2 Name of the Project
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p class="text-center" style=" font-size: 12px;">
                            {{ $res->purpose }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: start; font-size: 12px;">
                            1.3 Location of the Project
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p class="text-center" style="font-size: 12px;">
                            {{ $res->department->name }} / {{ $res->division?->name }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: start; font-size: 12px;">
                            1.4 Approved Budget of Contract
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p class="text-center" style="font-size: 12px;">
                            P {{ number_format($res->grand_total, 2) }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: start; font-size: 12px;">
                            1.5 Method of Procurement
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p class="text-center" style="font-size: 12px;">
                            Public Bidding
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="" style="margin-top: 3%">
            <p>
                <label for="" style="font-weight: 600">
                    2.0
                </label>
                <label for="" style="margin-left: 1em; font-weight: 600">
                    INITIAL STEPS IN THE BIDDING PROCESS <br>
                </label>
                <label for="" style="margin-left: 3em">
                    Narrative Description of bidding.
                </label>
            </p>
            <p>
                TABLE 2. INITIAL STEPS IN THE BIDDING PROCESS
            </p>
        </div>
        <table style="border-collapse: collapse; margin: 0 auto ">
            <thead>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3" style="border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black; font-size: 12px; padding: 0px; margin: 0">
                        <p style="text-align: start; font-size: 12px;">
                            2.1 Pre-Procurement Conference <br>
                            <label for="" style="margin-left: 2em">
                                (a) Date of Conference
                            </label>
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p class="text-center" style="font-size: 12px;">
                            Not Applicable
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: start; font-size: 12px;">
                            2.2 Invitation of Apply for Eligibility and to Bid  <br>
                            <label for="" style="margin-left: 2em">
                                (a) Date of first publication
                            </label> <br>
                            <label for="" style="margin-left: 2em">
                                (b) Posting
                            </label> <br>
                            <label for="" style="margin-left: 2em">
                                (c) Date of final publication
                            </label>
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p class="text-center" style=" font-size: 12px;">
                            {{ date('F, j, Y', strtotime($res->biddingResolution->start)) }} <br>
                            Government Electronic Procurement System <br>
                            Buyer's Guide and other conspicuous places <br>
                            {{ date('F, j, Y', strtotime($res->biddingResolution->until)) }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: start; font-size: 12px;">
                            2.3 Eligibility Check  <br>
                            <label for="" style="margin-left: 2em">
                                (a) Date of eligibility check
                            </label> <br>
                            <label for="" style="margin-left: 2em">
                                (b) Number of eligibility envelopes received
                            </label> <br>
                            <label for="" style="margin-left: 2em">
                                (c) Date of Notices sent to bidders
                            </label> <br>
                            <label for="" style="margin-left: 2em">
                                (d) Motion for reconsideration, if any
                            </label>
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p class="text-center" style=" font-size: 12px;">
                            {{ date('F, j, Y', strtotime($res->biddingResolution->until)) }} <br>
                            {{ $count }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: start; font-size: 12px;">
                            2.4 Issuance of Bidding Documents  <br>
                            <label for="" style="margin-left: 2em">
                                (a) Period of availability of Bid Docs
                            </label> <br>
                            <label for="" style="margin-left: 2em">
                                (b) Number of Bid Docs issued
                            </label>
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p class="text-center" style=" font-size: 12px;">
                            {{ date('F, j, Y', strtotime($res->biddingResolution->apprv_date)) }}  <br>
                            {{ $count }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: start; font-size: 12px;">
                            2.5 Amendments to Bidding Documents  <br>
                            <label for="" style="margin-left: 2em">
                                (a) List all issue dates
                            </label>
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p class="text-center" style=" font-size: 12px;">
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: start; font-size: 12px;">
                            2.6 Pre-bid Conference. if any  <br>
                            <label for="" style="margin-left: 2em">
                                (a) Date of Conference, if any
                            </label> <br>
                            <label for="" style="margin-left: 2em">
                                (b) Date of Minutes sent to bidders
                            </label>
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p class="text-center" style=" font-size: 12px;">
                            None
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="" style="margin-top: 4%; margin-bottom: 5%">
            <p>
                <label for="" style="font-weight: 600">
                    1.0
                </label>
                <label for="" style="margin-left: 1em; font-weight: 600">
                   SUBMISSION AND OPENING OF BIDS AND PRELIMINARY EXAMINATION <br>
                </label>
                <label for="" style="margin-left: 3em">
                    Narrative description of bid submission and bid opening.
                </label>
            </p>
        </div>
    </div>

    <div class="" style="margin-top: 15%">
        <p class="text-center">
            <label for="" style="font-weight: 600">TABLE 3. BID SUBMISSION AND OPENING</label>
        </p>
    </div>

    <table style="border-collapse: collapse; margin: 0 auto ">
        <thead>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black; font-size: 12px; padding: 0px; margin: 0">
                    <p style="text-align: start; font-size: 12px;">
                        3.1 Bid Submission Deadline <br>
                        <label for="" style="margin-left: 2em">
                            (a) Original date, time
                        </label> <br>
                        <label for="" style="margin-left: 2em">
                            (b) Extension. if any
                        </label>
                    </p>
                </td>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p class="text-center" style="font-size: 12px;">
                        {{ date('F, j, Y', strtotime($res->biddingResolution->until)) }} 11:00 am
                    </p>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p style="text-align: start; font-size: 12px;">
                        3.2 Bid Opening date, time
                    </p>
                </td>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p class="text-center" style=" font-size: 12px;">
                        {{ date('F, j, Y', strtotime($res->biddingResolution->until)) }} 2:00 pm
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p style="text-align: start; font-size: 12px;">
                        3.3 Minutes of Bid Opening date sent to bidders
                    </p>
                </td>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p class="text-center" style="font-size: 12px;">
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p style="text-align: start; font-size: 12px;">
                        3.4 Numbers of Bid Submitted
                    </p>
                </td>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p class="text-center" style="font-size: 12px;">
                        {{ $count }}
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p style="text-align: start; font-size: 12px;">
                        3.5 Bid validity period (days or weeks)
                        <label for="" style="margin-left: 2em">
                            (a) Originally specified
                        </label> <br>
                        <label for="" style="margin-left: 2em">
                            (b) Extensions/Revision, if any
                        </label>
                    </p>
                </td>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p class="text-center" style="font-size: 12px;">
                        120 days <br>
                        {{ date('F, j, Y', strtotime($res->biddingResolution->until)) }}
                    </p>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="" style="margin-top: 5%">
        <p class="text-center">
            <label for="" style="font-weight: 600">TABLE 4. BID PRICES (AS READ OUT)</label>
        </p>
    </div>

    <table style="border-collapse: collapse; margin: 0 auto ">
        <thead>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black; font-size: 12px; padding: 0px; margin: 0">
                    <p style="text-align: start; font-size: 12px;">
                        BIDDER IDENTIFICATION / NAME
                    </p>
                </td>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p class="text-center" style="font-size: 12px;">
                        BID AS CALCULATED AMOUNT (Php)
                    </p>
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($res->biddingAbstract->biddingOffereds as $supplier)
            <tr>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p style="text-align: start; font-size: 12px; text-transform: uppercase">
                        {{ $supplier->supplier->name }}
                    </p>
                </td>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p class="text-center" style=" font-size: 12px;">
                        {{ $supplier->grand_total }}
                    </p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="">
        <p>
            <label for="" style="font-weight: 600">
                2.0
            </label>
            <label for="" style="margin-left: 1em; font-weight: 600">
               BID EVALUATION <br>
            </label>
            <label for="" style="margin-left: 3em">
                Narrative description of detailed examination of bids.
            </label>
        </p>
    </div>

    <div class="" style="margin-top: 5%">
        <p class="text-center">
            <label for="" style="font-weight: 600">TABLE 5. CORRECTION OF BIDS</label>
        </p>
    </div>

    <table style="border-collapse: collapse; margin: 0 auto ">
        <thead>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black; font-size: 12px; padding: 0px; margin: 0">
                    <p style="text-align: start; font-size: 12px;">
                        BIDDER IDENTIFICATION / NAME
                    </p>
                </td>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p class="text-center" style="font-size: 12px;">
                        BID AS CALCULATED AMOUNT (Php)
                    </p>
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($res->biddingAbstract->biddingOffereds as $supplier)
            <tr>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p style="text-align: start; font-size: 12px; text-transform: uppercase">
                        {{ $supplier->supplier->name }}
                    </p>
                </td>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p class="text-center" style=" font-size: 12px;">
                        {{ $supplier->grand_total }}
                    </p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <div class="" style="margin-top: 5%">
        <p class="">
            <label for="" style="font-weight: 600">POST QUALIFICATION REPORT</label>
        </p>
    </div>

    <table style="border-collapse: collapse; margin: 0 auto ">
        <thead>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black; font-size: 12px; padding: 0px; margin: 0">
                    <p style="text-align: start; font-size: 12px;">
                        BIDDER IDENTIFICATION / NAME
                    </p>
                </td>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p class="text-center" style="font-size: 12px;">
                        POST QUALIFIED / POST DISQUALIFIED
                    </p>
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach ($res->biddingAbstract->biddingOffereds as $supplier)
            <tr>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p style="text-align: start; font-size: 12px; text-transform: uppercase">
                        {{ $supplier->supplier->name }}
                    </p>
                </td>
                <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                    <p class="text-center" style=" font-size: 12px;">
                        Post Qualified
                    </p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="outer-container" style="margin-left: 4rem; margin-top: 3%">
        <p>
            {{-- <i style="font-size: 13px">Preparted by:</i> <br> --}}
            <label for=""><strong>AMADO M. ALCAZAR</strong></label> <br>
            <span style="font-size: 13px">Engineering Assistant II</span> <br>
            <span style="font-size: 13px">MBAC -TWG</span>
            <br> <br> <br> <br>

            <label for=""><strong>GERARDO L. AQUINO</strong></label> <br>
            <span style="font-size: 13px">Architect III</span> <br>
            <span style="font-size: 13px">MBAC -TWG</span>
        </p>
        <p>
            <i style="font-size: 13px"  >Submitted by:</i> <br> <br> <br>
            <label for=""><strong>ROSAURO M. MONTOYA</strong></label> <br>
            <span style="font-size: 13px">Clerk II</span> <br>
            <span style="font-size: 13px">MBAC -Secretariat - Member</span>
        </p>
    </div>
</body>
</html>
