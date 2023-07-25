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

</style>

<body>

    <div class="text-align: start">
        <p>
            <label for="">NAME OF PROJECT:</label>
            <label for="" style="margin-left: 1em">STC-GOOD No. {{ $resolution->requestDetail->biddingAbstract->good }} {{ $resolution->requestDetail->purpose }}</label> <br> <br>
            <label for="" style="">LOCATION OF THE PROJECT:</label>
            <label for="" style="margin-left: 1em"><b>{{ $resolution->requestDetail->department->name }}</b></label>
        </p>
    </div>

    <div class="text-center">
        <p>
            <label for=""><strong>RESOLUTION NO.</strong>_______</label>

        </p>
    </div>
    <div>
        @php
            use Carbon\Carbon;
            $apprvDate = Carbon::parse($resolution->apprv_date)->format('F j, Y');
            $start = Carbon::parse($resolution->start)->format('F j, Y');
            $end = Carbon::parse($resolution->until)->format('F j, Y');
            $date = Carbon::parse($resolution->date_time)->format('F j, Y');
            $formattedDateTime = Carbon::parse($resolution->date_time)->format('F j, Y g:i a');
        @endphp
        <p>
            <label for="" style="margin-left: 1em">WHEREAS, the Municipal Government of Santa Cruz, Laguna through the Municipal Mayor approved a
                Purchase Request for the
                <b>{{ $resolution->requestDetail->purpose }}</b> with an Approved
                <u><b> P.R. No. {{ $resolution->requestDetail->pr_no }}</b></u> dated <u><b>{{ $apprvDate }}</b></u> with the total amount of <u style="margin-left: 3px"> <b>
                        (P {{ number_format($resolution->requestDetail->grand_total, 2) }} ) <br></b></u></label>
        </p>
        <p>
            <label for="">WHEREAS, the Invitaion to Bid for the above mentioned project was posted on the Bulletin Board
                of Santa Cruz Municipal Hall, conspicuous places, goverment office on <u><b>{{ $start }} - {{ $end }} </b></u></label>
        </p>
        <p>
            <label for="">WHEREAS, in reponse to the said advertisements, <u><b>{{ $count }}</b></u> propective holder
                submitted
                their purchased bid documents of intent and
                application for eligibility on <u><b>{{ $date }}<br></b></u></label>
        </p>
        <p>
            <label for="">WHEREAS, Eligibility, Technical and Financial Proposals of comprising envelope 1&2 were
                submitted on <u><b>{{ $formattedDateTime }}</b></u> and publicly opened at <u><b>2:00 pm.</b></u>The
                prospective bidder passed the preliminary examinations of eligibility requirments</label>
        </p>
        <p>
            <label for="">WHEREAS, the bid proposals for the complying bidder are as follows</label>
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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <td colspan="4" style="border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black; font-size: 12px; padding: 0px; margin: 0">
                        <p class="text-center" style="font-size: 12px;">
                            <b>Name of Bidder</b> <br>
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p class="text-center" style="font-size: 12px;">
                            <b>Bid Amount (As Read)</b>
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p class="text-center" style="font-size: 12px;">
                            <b>Bid Security Amount</b>
                        </p>
                    </td>

                </tr>
            </thead>
            <tbody>
                @foreach ($offers->biddingOffereds as $request)
                <tr>
                    <td colspan="4" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: start; font-size: 12px;">
                            {{ $request->supplier->name }}
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: end; font-size: 12px;">
                            {{ $request->grand_total }}
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: end; font-size: 12px;">
                            {{ number_format($offers->cash_bond, 2) }}
                        </p>
                    </td>
                </tr>
                @endforeach

        </table>

        <div class="" style="margin-top: 3%">
            <p>
                <label for="">WHEREAS, the detailed evaluation of bids conducted on {{ $date }} resulted;</label>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td colspan="4" style="border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black; font-size: 12px; padding: 0px; margin: 0">
                            <p class="text-center" style="font-size: 12px;">
                                <b>Name of Bidder</b> <br>
                            </p>
                        </td>
                        <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                            <p class="text-center" style="font-size: 12px;">
                                <b>Bid Amount (As Read)</b>
                            </p>
                        </td>
                        <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                            <p class="text-center" style="font-size: 12px;">
                                <b>Bid Security Amount</b>
                            </p>
                        </td>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($offers->biddingOffereds as $request)
                <tr>
                    <td colspan="4" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: start; font-size: 12px;">
                            {{ $request->supplier->name }}
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: end; font-size: 12px;">
                            {{ $request->grand_total }}
                        </p>
                    </td>
                    <td colspan="3" style="border: 1px solid black;  padding: 0px; margin: 0">
                        <p style="text-align: end; font-size: 12px;">
                            {{ number_format($offers->cash_bond, 2) }}
                        </p>
                    </td>
                </tr>
                @endforeach
            </table>
            <div>
                <p>
                    <label for="">WHEREAS, upon careful examination, validation and verification of all eligibility,
                        technical and financial requirments submitted by eligible bidder two complying bidder
                        passed the post conducted on <u><b>{{ $date }}</b></u></label>
                </p>
                <p>
                    <label for="">WHEREAS, the bid <u><b>{{ $offers->winners->name }}</b></u> has been found to be <strong style="margin-left: 3px; text-transform: uppercase">complying and the lowest bidders.</strong></label>
                </p>
                <p>
                    <label for="">NOW, THEREFORE, We, the members of the Bids and Awards Committee, hereby RESOLVE as it
                        is hereby RESOLVED to recommend to <b>{{ $resolution->requestDetail->purpose }} </b> to MICHAEL M.
                        MAGNAYE owner of Reign Enterprises with postal address at Baranggay Babukal, Santa Cruz, Laguna
                        of <b>(P {{ $gtotal->grand_total }})</b></label> <br>
                    {{-- <label for="" style="margin-left: 2em">Done this <u>26th</u> of December 2022</label> --}}
                </p>


                <div class="outer-container" style="margin-top: 1em">
                    <p class="text-center">
                        <label for="" style="font-size: 15px"><strong>ENGR. MARIA LOURDES P. SAN MIGUEL</strong></label> <br>
                        <span style="font-size: 13px">Chairman</span> <br>
                        <span style="font-size: 13px">Municipal General Services Officer</span>
                    </p>
                    <p class="text-center">
                        <label for="" style="font-size: 15px"><strong>MELVIN O. BONZA</strong></label> <br>
                        <span style="font-size: 13px">Vice Chairman</span> <br>
                        <span style="font-size: 13px">Municipal Administrator</span>
                    </p>
                    <p class="text-center">
                        <label for="" style="font-size: 15px"><strong>ENGR. PABLO M. MAGPILY, JR</strong></label> <br>
                        <span style="font-size: 13px">Member</span> <br>
                        <span style="font-size: 13px">Municipal Engineer</span>
                    </p>
                </div>

                <div class="outer-container" style="margin-top: 10px">
                    <p class="text-center">
                        <label for="" style="font-size: 15px"><strong>ENGR. MARIA LOURDES P. SAN MIGUEL</strong></label> <br>
                        <span style="font-size: 13px">Chairman</span> <br>
                        <span style="font-size: 13px">Municipal General Services Officer</span>
                    </p>
                    <p class="text-center">
                        <label for="" style="font-size: 15px"><strong>ENGR. PABLO M. MAGPILY, JR</strong></label> <br>
                        <span style="font-size: 13px">Member</span> <br>
                        <span style="font-size: 13px">Municipal Engineer</span>
                    </p>
                </div>

                <div class="outer-container">
                    <p class="text-center">
                        <label for="" style="font-size: 15px"><strong>EDGAR S. SAN LUIS</strong></label> <br>
                        <span style="font-size: 13px">Municipal Mayor</span>
                    </p>
                </div>
            </div>
</body>

</html>
