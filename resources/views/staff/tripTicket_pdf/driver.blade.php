<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trip Ticket</title>
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

    </style>

    <div class="text-center">
        <h3>DRIVER'S TRIP TICKET</h3>
        <span>{{ $ticketId }}</span>
    </div>

    <div style="margin-top: 5%">
        <div class="text-center" style="border: 1px solid black; padding: 7px;">
            <strong>A. TO BE FILLED UP BY THE ADMINISTRATIVE OFFICIAL TRAVEL</strong>
        </div>
        <div style="font-size: 16px; border: 1px solid black; padding: 3px; border-top: 0">
            <span>1. NAME OF DRIVER OF THE VEHICLE: {{ $tickets->driver }} </span>
        </div>
        <div style="font-size: 16px; border: 1px solid black; padding: 3px; border-top: 0">
            <span>2. GOVERNMENT CAR/VEHICLE: {{ $tickets->vehicleRegistration->description }} </span>
        </div>
        <div style="font-size: 16px; border: 1px solid black; padding: 3px; border-top: 0">
            <span>3. NAME OF THE AUTHORIZED PASSENGER: {{ $tickets->passenger }} </span>
        </div>
        <div style="font-size: 16px; border: 1px solid black; padding: 3px; border-top: 0">
            <span>4. PLACES TO BE INSPECTED WITHIN SANTA CRUZ VICINITY: {{ $tickets->place_to_visit }} </span>
        </div>
        <div style="font-size: 16px; border: 1px solid black; padding: 3px; border-top: 0">
            <span>5. PURPOSES: {{ $tickets->purpose }} </span>
        </div>

        <div class="outer-container" style="margin: 0; padding: 0;">
            <p style="border: 1px solid black; margin-top: 0; padding-top: 0; border-top: 0; border-right: 0">
                CERTIFYING OFFICIAL TRAVEL:
                <br> <br> <br>
            </p>
            <p style="border: 1px solid black; margin-top: 0; padding-top: 0; border-top: 0;">
                APPROVED FOR OFFICIAL TRAVEL <br> <br> <br>

                <span style="padding-left: 5rem">
                    <strong>ENGR. MA. LOURDES P. SAN MIGUEL</strong> <br>
                </span>

                <span style="padding-left: 6rem" class="text-center">
                    Municipal General Services Officer <br>
                </span>

            </p>
        </div>
        <div class="text-center" style="font-size: 16px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0">
            <strong>TO BE FILLED BY THE DRIVER:</strong>
        </div>
        <table style="width: 100%; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: start">1. TIME DEPARTURE FROM THE OFFICE/GARAGE</td>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: end">8:00:00 AM </td>
                </tr>
                <tr>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: start">2. TIME OF ARRIVAL AT (PER NO. 5 ABOVE)</td>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: end">AM</td>
                </tr>
                <tr>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: start">3. TIME OF DEPARTURE FROM (NO. 4)</td>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: end">PM</td>
                </tr>
                <tr>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: start">4. TIME OF ARRIVAL BAC KTO THE OFFICIAL GARAGE</td>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: end">5:00:00 PM</td>
                </tr>
                <tr>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: start">5. TIME OF ARRIVAL BAC KTO THE OFFICIAL GARAGE</td>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: end">5:00:00 PM</td>
                </tr>
                <tr>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: start">6. GASOLINE CONSUMED, ISSUED, PURCHASED </td>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: end">5:00:00 PM</td>
                </tr>
            </tbody>
        </table>
        <table style="border-collapse: collapse; border: 1px solid black; width: 100%">
            <tbody>
                <tr>
                    <td style="text-align: start">a. Balance in Tank</td>
                    <td>_____________<span style="text-decoration: underline">5ltrs</span></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="font-size: 13px; text-align: start">b. Issued by the Office from the stock </td>
                    <td>_____________<span style="text-decoration: underline">ltrs</span></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: start">c. Add Purchase During Trip </td>
                    <td>_____________<span style="text-decoration: underline">ltrs</span></td>
                    <td>TOTAL</td>
                    <td>_____________<span style="text-decoration: underline">ltrs</span></td>
                </tr>
                <tr>
                    <td style="text-align: start">d. Gasoline used during trip </td>
                    <td>_____________<span style="text-decoration: underline">ltrs</span></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <table style="width: 100%; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: start">7. GASOLINE IN TANK AT THE END OF TRIP </td>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: end"> Ltrs </td>
                </tr>
                <tr>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: start">8. GAS OIL ISSUED</td>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: end">Ltrs</td>
                </tr>
                <tr>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: start">9. LUBRICATING OIL ISSUED </td>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: end">Ltrs</td>
                </tr>
                <tr>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: start">10. VULCANIZING OF TIME </td>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: end"></td>
                </tr>
                <tr>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: start">11. MOTOR OIL ISSUED</td>
                    <td style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: end">Ltrs</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: start">12. SPEEDOMETER READING IF ANY:  AT THE BEGINNING OF TRIP MILES/KMS </td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size: 14px; border: 1px solid black; padding: 3px; border-top: 0; margin-top:0; text-align: start">13. REMARKS</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 5%" class="text-center">
            <h5 style="font-weight: 500">I HEREBY CERTIFY TO THE CORRECTNESS OF THE ABOVE STATEMENT OF RECORD OF TRAVEL</h5>
        </div>

        <div class="outer-container">
            <p class="text-center">
                <br>
                _______________________________ <br>
                Passenger's Name in Print / Signiture
            </p>
            <p class="text-center">
                {{ $tickets->driver }} <br>
                ________________________________ <br>
                Driver's Name in Print / Signiture
            </p>
        </div>

    </div>

</body>
</html>
