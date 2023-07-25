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
        font-size: 14px;
        letter-spacing: 1px;

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

    @page {
        size: 216mm 330mm;
        /* Long bond paper size */
        margin: 0;
        /* Optional: Set margins to 0 */
    }

</style>

<body>

    <div class="text-center">
        <p style="font-size: 13px">
            <label for="">Republic of the Philippines</label> <br>
            <label for="">Province of Laguna</label> <br>
            <label for=""><strong>Municipality of Santa Cruz</strong></label> <br>
            <label for="">2/F Municipal Hall, Cailles Street</label> <br>
            <label for="">Brgy. III, Santa Cruz, Laguna</label> <br>
            <label for="">Telephone Number (049) 501-0250</label>
        </p>
    </div>

    <div style="text-align: start;">
        <p style="font-size 11px">
            MINUTES OF THE MEETING FOR THE OPENING OF BID FOR THE PROJECT REFERENCE NO. <strong>STC GOOD NO
                73-2022</strong> FURNISHING MEDICAL SUPPLIES FOR DISASTER MANAGEMENT AND RESPONSE IN MUNICIPALITY OF
            SANTA CRUZ, LAGUNA
        </p>
    </div>
    <div>
        <label for="">Venue : <span style="margin-left: 1em">Municipal General Services Office, Escolapia Building, Santa Cruz, Laguna</span></label> <br>
        <label for="">Date : <span style="margin-left: 1.6em">December 22, 2022</span></label> <br>
        <label for="">Time : <span style="margin-left: 1.6em">2:00 pm.</span></label>
    </div> <br>
    <label for="">The following were present :</label> <br>
    <div class="outer-container">
        <p style="font-size: 14px; margin-left: 1em">
            <label for=""><strong>ATTENDANCE:</strong></label> <br>
            <label for="">{{ $bac->attendance->bac_chairman }}</label> <br>
            <label for="">{{ $bac->attendance->bac_vc }}</label> <br>
            <label for="">{{ $bac->attendance->member_1 }}</label> <br>
            <label for="">{{ $bac->attendance->member_2 }}</label> <br>
            <label for="">{{ $bac->attendance->member_3 }}</label> <br>
            <label for="">{{ $bac->attendance->member_4 }}</label> <br>
            <label for="">{{ $bac->attendance->member_5 }}</label> <br>
            <label for="">{{ $bac->attendance->secretariat }}</label> <br>
            <label for="">RODELIO DE MESA</label> <br>
            <label for=""><strong>OTHERS</strong></label><br>
            @foreach ($bac->biddingOffereds as $supplier)
            <label for="">{{ $supplier->supplier->name }}</label> <br>
            @endforeach
        </p>
        <p style="font-size: 14px">
            <br><label for=""> Chairman</label><br>
            <label for=""> Vice Chairman</label><br>
            <label for="">Member</label><br>
            <label for=""> Member</label><br>
            <label for=""> Member</label><br>
            <label for=""> TWG Member</label> <br>
            <label for=""> TWG Member</label><br>
            <label for=""> BAC Secretariat Member</label><br>
            <label for=""> NGO Representative</label> <br> <br>
            {{-- <label for="">MICHAEL M. MAGNAYE</label><br>
            <label for="">KATHRYN M. PUNO</label> --}}
        </p>
    </div>
    <div style="margin: 0; padding: 0">
        <p style="font-size: 15px">
            <label for="" style="margin-left: 2em">The </label> conference was called to order by the Bids and Awards Committe Chairman, Engr. Maria
            Lourdes P. San Miguel, at 2:00 in the afternoon. There being a qourum the meeting started to the
            Opening of the Bid for the Project Reference <strong>STC GOOD NO {{ $bac->good }} </strong>FURNISHING MEDICAL
            SUPPLIES FOR DISASTER MANAGEMENT AND RESPONSE IN MUNICIPALITY OF SANTA CRUZ, LAGUNA with Approved Budget
            for the Contrat of <strong>(P {{ number_format($bac->requestDetail->grand_total, 2) }}) </strong> with
            attached supporting documents Certificate of Cash Availability of Fund by Ms.Carida P. Lorenzo,
            Municipal Acountant and Certificate of cash Availability by Mr. Ronaldo O. Valles, Municipal Treasurer.
        </p>
        <p style="font-size: 15px">
            <label for="" style="margin-left: 2em">The </label>submitted Eligilibity and Technical Requirements of the <strong>{{ $count }}</strong> Prospective Bidder
            was opened with the assistance of the Technical Working Group Members. After checking, validating,
            and verifying Legal and Technical documents they found out that <strong>{{ $count }}</strong> bidder was complying
        </p>
        <label for="">The Financial envelope was opened and after verification, BAC Chairman read the summary of bids as follow :</label>
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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <th colspan="4" style="border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black; font-size: 15px; padding: 0px; margin: 0;" class="text-center">
                            Name of Bidder
                    </th>
                    <th colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0; font-size: 15px;">
                            Bid Amount <br> (As read)
                    </th>
                    <th colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0; font-size: 15px">
                            Bid Security Amount
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($bac->biddingOffereds as $offer)
                <tr>
                    <td colspan="4" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: start; font-size: 12px;">
                            <strong>{{ $offer->supplier->name }}</strong>
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: end; font-size: 12px;">
                            <strong>{{ $offer->grand_total }}</strong>
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: end; font-size: 12px;">
                            <strong>{{ number_format($bac->cash_bond, 2) }}</strong>
                        </p>
                    </td>
                </tr>
                @endforeach
        </table>

        <div class="" style="margin-top: 5px">
            <label for="" style="margin-left: 2em">Chairman said that the submitted proposal are subject for post evaluation and will be notified regarding the results of the post qualification</label> <br>
            <label for="">
                There's no other agenda to be discuss, the meeting adjouened at 3:10 in the afternoon.
            </label>
        </div>
        <div class="outer-container">
            <p></p>
            <p class="text-center">
                <label for="" style="font-size: 14px"><strong>EVANGELINE A. GALZOTE</strong></label> <br>
                <span style="font-size: 13px">Member BAC Secretariat</span>
            </p>
        </div>
        <div class="outer-container" style="margin-top: 1em">
            <p class="text-center">
                <label for="" style="font-size: 14px"><strong>ENGR. MARIA LOURDES P. SAN MIGUEL</strong></label> <br>
                <span style="font-size: 13px">Municipal General Services Officer</span>
                <span style="font-size: 13px">Chairman</span> <br>
            </p>
            <p class="text-center">
                <label for="" style="font-size: 14px"><strong>MELVIN O. BONZA</strong></label> <br>
                <span style="font-size: 13px">Municipal Administrator</span> <br>
                <span style="font-size: 13px">Vice Chairman</span>
            </p>
            <p class="text-center">
                <label for="" style="font-size: 14px"><strong>ENGR. PABLO MAGPILY, JR.</strong></label> <br>
                <span style="font-size: 13px">Municipal Engineer</span> <br>
                <span style="font-size: 13px">Member</span>
            </p>
        </div>
        <div class="outer-container" style="margin-top: 1em">
            <p class="text-center">
                <label for="" style="font-size: 14px"><strong>ATTY. RONALDO C. MARIANO</strong></label> <br>
                <span style="font-size: 13px">Municipal Legal Officer</span> <br>
                <span style="font-size: 13px">Member</span>
            </p>
            <p class="text-center">
                <label for="" style="font-size: 14px"><strong>EILEEN S. TALABIS</strong></label> <br>
                <span style="font-size: 13px">Municipal Budger Officer</span> <br>
                <span style="font-size: 13px">Member</span>
            </p>
        </div>
</body>

</html>
