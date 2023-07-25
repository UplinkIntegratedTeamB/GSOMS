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

    .text-end {
        text-align: end;
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
        letter-spacing: 1px;!important
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
        <h4>OFFICE OF THE MUNICIPAL GENERAL SERVICES</h4>
        <h5>REQUEST FOR QUOTATION (RFQ) OF PRICES</h5>
    </div>

    <div class="outer-container" style="margin-left: 3%">
        <p>
            Date: <i style="text-decoration: underline">{{ date('F j , Y', strtotime($rfq->requestDetail->created_at)) }}</i> <br> <br>
            P.R No.: <i style="text-decoration: underline">{{ $rfq->requestDetail->pr_no }}</i>
        </p>
        <p style="text-align: end">
            Date: <i style="text-decoration: underline">{{ $rfq->date }}</i> <br> <br>
            Quotation No. <i style="text-decoration: underline">{{ $rfq->quotation_no }}</i>
        </p>
    </div>

    <div class="outer-container" style="margin-top: 3%">
        <label for="">__________________________________________</label> <br> <br>
        <label for="">__________________________________________</label>
    </div>

    <div class="container" style="margin-top: 4%">
        <p>
            Please qoute your lowest price on item/s listed below, subject to the General Conditions on the last page, starting the shortest time of delivery and submit your quotation duly signed by your
            representative not later than within the day in the return envelope attacged herewith.
        </p>
    </div>

    <div class="text-end" style="margin-top: 3%">
        ENGR. MA. LOURDES P. SAN MIGUEL <br>
        Municipal General Services Officer
    </div>

    <div class="container">
        <p>
            Note: <br>
            <p for="" style="margin-left: 5%">1. ALL THE ENTRIES MUST BE TYPEWRITTEN</p>
            <p for="" style="margin-left: 5%;">2. DELIVERY PERIOD WITHIN FIVE (5) CALENDAR DAYS</p>
            <p for="" style="margin-left: 5%">3. WARRANTY SHALL BE FOR A PERIOD OF SIX (6) MONTHS FOR SUPPLIES AND MATERIALS, ONE</p>
            <p for="" style="margin-left: 6%">(1) YEAR FOR EQUIPMENT, FROM DATE OF ACCEPTANCE BY THE PROCURING ENTITY </p>
            <p for="" style="margin-left: 5%">4. PRICE VALIDITY SHALL BE A PERIOD OF 120 CALENDAR DAYS</p>
            <p for="" style="margin-left: 5%">5. PHILGEPS REGISTRATION SHALL BE ATTACHED UPON SUBMISSION OF THE QUOTATION</p>
            <p for="" style="margin-left: 5%">6. SUPPLIERS SHALL SUBMIT ORIGINAL BROCHURES SHOWING CERTIFICATIONS OF THE PRODUCT BEING OFFERED.</p>
        </p>
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
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr class="text-center">
                    <th style="font-size: 12px; border: 1px solid black">ITEM</th>
                    <th colspan="6" style="font-size: 12px; border: 1px solid black">ITEM/DESCRIPTION</th>
                    <th style="font-size: 12px; border: 1px solid black">QTY</th>
                    <th style="font-size: 12px; border: 1px solid black">UNIT</th>
                    <th colspan="2" style="font-size: 12px; border: 1px solid black">UNIT PRICE</th>
                    <th colspan="2" style="font-size: 12px; border: 1px solid black">TOTAL PRICE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rfq->requestDetail->purchaseRequest as $pr)
                <tr>
                    <td style="font-size: 12px; border: 1px solid black; padding: 10px">{{ $loop->index + 1 }}</td>
                    <td colspan="6" style="font-size: 12px; border: 1px solid black">- {{ $pr->item->description }}</td>
                    <td style="font-size: 12px; border: 1px solid black">{{ $pr->quantity }}</td>
                    <td style="font-size: 12px; border: 1px solid black">{{ $pr->item->itemType->type }}</td>
                    <td colspan="2" style="font-size: 12px; border: 1px solid black"></td>
                    <td colspan="2" style="font-size: 12px; border: 1px solid black"></td>
                </tr>
                @endforeach
                <tr >
                    <td style="font-size: 12px; border: 1px solid black;"></td>
                    <td colspan="6" style="font-size: 12px; border: 1px solid black"></td>
                    <td style="font-size: 12px; border: 1px solid black"></td>
                    <td style="font-size: 12px; border: 1px solid black"></td>
                    <td colspan="2" style="font-size: 12px; border: 1px solid black;  padding: 10px">TOTAL</td>
                    <td colspan="2" style="font-size: 12px; border: 1px solid black"></td>
                </tr>
            </tbody>
        </table>
        <p>
            Brand and Model: _______________ Warranty: _______________ Delivery Period __________ Price Validity __________
        </p>
    </div>

    <div class="container">
        <p>
            After having carefully read and accepted your general conditions. We qoute you on the item at prices noted above. <br> <br>
        </p>
    </div>

    <div class="outer-container">
        <p>
            <strong>Certified Correct:</strong>
        </p>
        <p class="text-center">
            ________________________________________ <br> Printed Name / Signiture
        </p>
    </div>

    <div class="outer-container">
        <p class="text-center">
            ________________________________________ <br> Canvasser
        </p>
        <p class="text-center">
            ________________________________________ <br> Printed Name / Signiture
        </p>
    </div>

</body>
</html>
