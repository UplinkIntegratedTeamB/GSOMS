<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INVITATION TO BID</title>
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
        <label style="margin-right: 11em;" for="">MUNICIPAL GOVERNMENT OF SANTA CRUZ, LAGUNA</label>
    </div>
<br><br><br>
    <div class="">
        <label for="">Project Reference Number:</label> <span style="margin-left: 3em">STC -GOOD- NO. {{ $bids->bidInvitation->good }}</span> <br> <br>
        <label for="">Location of the Project:</label> <span style="margin-left: 3em"> {{ $bids->department->name }} </span> <br>
    </div>

    <div class="text-center">
        <h4>INVITATION TO BID</h4>
    </div>

    <div class="">
        <label for="">THE MUNICIPAL GOVERNMENT OF STA CRUZ, LAGUNA, through its MUNICIPAL BIDS and AWARDS COMMITEE (MBAC) invites suppliers to apply for eligibility and to bid for the here under project. </label>
    </div>

    <div class="outer-container">
        <p>Name of the Project:</p>
        <p>STC-GOOD-NO. {{ $bids->bidInvitation->good }}</p>
        <p>{{ $bids->purpose }}</p>
    </div>

    <div class="outer-container">
        <p> Approved Budget for the Contract:</p>
        <p style="margin-right: 6em;">STC-GOOD-NO. {{ $bids->bidInvitation->good }}</p>
        <p style="margin-right: 6em;">( P {{ number_format($bids->grand_total, 2) }} )</p>
    </div>

    <div class="outer-container">
        <p>Brief Description:</p>
        <p style="margin-left: 1.5em;">STC-GOOD-NO. {{ $bids->bidInvitation->good }}</p>
        <p>{{ $bids->purpose }}</p>
    </div>

    <div class="outer-container">
        <p>Contract Duration:</p>
        <p>{{ $bids->bidInvitation->day }} DAYS</p>
        <p></p>
    </div>

    <div class="outer-container">
        <p>Delivery Period:</p>
        <p></p>
        <p></p>
    </div>

    <div class="">
        <label for="">
            Prospective bidders should have experience in undertaking a similar project within last two (2) years within an amount of at least
            50% of the proposed project for bidding. The Eligibility Check/Screening as well as the Preliminary Examination of Bids shall use non-discretionary
            `` pass/fail `` criteria. Post - qualification of the lowest calculated of bids shall be conducted. <br>
            All participants relative to Eligibility Statement and Screening. Bid Security, Performance Security, Pre-Bidding Conference Evaluation of Bids, Post Qualification
            and Award of Contract shall be governed by the pertinent provision of R.A 9184 and its Revised Implementing Rules and Regulation ( Revised IRR ). <br>
            The complete schedule of the activities is listed, as follows.
        </label>
    </div>

    <div class="container" style="margin-top: 2rem">
        <table style="border-collapse: collapse; margin: 0 auto; padding: 5px; ">
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
                    <th colspan="2" style="border: 1px solid black; font-size: 12px; padding: 3px; text-align: center">ACTIVITIES</th>
                    <th colspan="2" style="border: 1px solid black; font-size: 12px; padding: 3px; text-align: center">SCHEDULE</th>
                    <th colspan="2" style="border: 1px solid black; font-size: 12px; padding: 3px; text-align: center">TIME</th>
                    <th colspan="2" style="border: 1px solid black; font-size: 12px; padding: 3px; text-align: center">VENUE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">Bidding Pre-Procurement Conference</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">{{ $bids->bidInvitation->pre_procurement }}</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">2:00 PM</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">OFFICE OF THE MGSO ESCOLAPIA <br> BUILDING, STA CRUZ LAGUNA </td>
                </tr>
                <tr>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">Issuance of Bid Documents</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">{{ date('F, j, Y', strtotime($bids->bidInvitation->start)) }}</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">8:00 PM <br> 5:00 PM</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">OFFICE OF THE MGSO ESCOLAPIA <br> BUILDING, STA CRUZ LAGUNA </td>
                </tr>
                <tr>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">Pre-Bid Conference</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">{{ $bids->bidInvitation->pre_bid }}</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start"></td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">OFFICE OF THE MGSO ESCOLAPIA <br> BUILDING, STA CRUZ LAGUNA </td>
                </tr>
                <tr>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">Deadline of Receipt of Bids</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">{{ date('F, j, Y', strtotime($bids->bidInvitation->until)) }}</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">11:00 AM</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">OFFICE OF THE MGSO ESCOLAPIA <br> BUILDING, STA CRUZ LAGUNA </td>
                </tr>
                <tr>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">Opening of Bids</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">{{ date('F, j, Y', strtotime($bids->bidInvitation->opening_of_bids)) }}</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">2:00 PM</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">OFFICE OF THE MGSO ESCOLAPIA <br> BUILDING, STA CRUZ LAGUNA </td>
                </tr>
                <tr>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">Bid Evaluation</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">{{ date('F, j, Y', strtotime($bids->bidInvitation->bid_evaluation)) }}</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start"></td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start"></td>
                </tr>
                <tr>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">Post Qualification</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">{{ date('F, j, Y', strtotime($bids->bidInvitation->post_qualification)) }}</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start"></td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start"></td>
                </tr>
                <tr>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">Notice Of Awards</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start">{{ date('F, j, Y', strtotime($bids->bidInvitation->notice_of_award)) }}</td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start"></td>
                    <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 2.5px; text-align: start"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="">
        <p>
            Bid Documents will be available only to prospective bidders upon payment of applicable amount Registration Fee payable to the  OFFICE OF THE MUNICIPAL TREASURER. <br>
            The Procuring Entity Assumes no responsibility whatsoever to compensate or indemmify bidders for any expenses incurred in the preparation of the bid.
        </p>
    </div>

    <div class="">
        <p>Date of Publication - {{ date('F, j', strtotime($bids->bidInvitation->start)) }} - {{ date('F, j, Y', strtotime($bids->bidInvitation->until)) }} <br> PhilGeps and other conspicuous places</p>
    </div>
    <br>
    <div class="outer-container">
    <p>Noted By:</p>
    <p>Approved By:</p>
    </div>

    <div class="outer-container text-center">
        <p>
            <strong>MELVIN O. BONZA</strong> <br>
            <span>Municipal Admin</span> <br>
            <span>BAC CHAIRMAN</span>
        </p>
        <p>
            <strong>EDGAY S. SAN LUIS</strong> <br>
            <span>Municipal Mayor</span> <br>
        </p>
    </div>

</body>
</html>
