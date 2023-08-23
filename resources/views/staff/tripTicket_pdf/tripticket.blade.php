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
    <h4>Report on Monthly Consumption of Fuel & Oil</h4>
    <span>For the month of {{ $months->first()->month->name }}, {{ date('Y', strtotime($months->first()->created_at)) }}</span>
</div>

<div class="" style="margin-top: 10%">
    <label for="">Supplier: {{ $months->first()->gasStation->name }}</label>
    <table style="border-collapse: collapse; margin: 0 auto">
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
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></th>
                <th colspan="10" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">Amount</th>
                <th colspan="1" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></th>
                <th colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></th>
                <th colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></th>
                <th colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: start"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">Date</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">UNLEADED</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">DIESEL</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">PREMIUM</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">Oil</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">Other</td>
                <td colspan="1" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">Liters</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">Dept./Driver</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">Plate No.</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">Destination/Purpose</td>
            </tr>
            @foreach ($months as $month)
            <tr>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">{{ $month->date }}</td>
                @if($month->gas_type == 2)
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">{{ $month->amount }}</td>
                @else
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">0.00</td>
                @endif
                @if($month->gas_type == 3)
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">{{ $month->amount }}</td>
                @else
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">0.00</td>
                @endif
                @if($month->gas_type == 1)
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">{{ $month->amount }}</td>
                @else
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">0.00</td>
                @endif
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">0.00</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">0.00</td>
                <td colspan="1" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">0.00</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">{{ $month->department->name }} / {{ $month->driver }} </td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">Plate No.</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center">{{ $month->place_to_visit }} / {{ $month->purpose }}</td>
            </tr>
            @endforeach
            <tr style="background: rgb(215, 214, 214)">
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center; font-weight: 600">Total</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center; font-weight: 600">0.00</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center; font-weight: 600">0.00</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center; font-weight: 600">0.00</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center; font-weight: 600">0.00</td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center; font-weight: 600">0.00</td>
                <td colspan="1" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center"></td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center"></td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center"></td>
                <td colspan="2" style="border: 1px solid black; font-size: 12px; padding: 10px; text-align: center"></td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>
