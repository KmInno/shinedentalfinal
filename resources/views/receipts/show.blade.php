<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Receipt - POS Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 300px;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header h2 {
            margin: 5px 0;
        }

        .receipt-details {
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
            margin-bottom: 10px;
        }

        .receipt-details table {
            width: 100%;
        }

        .receipt-details table td {
            padding: 5px 0;
        }

        .receipt-details table .font-bold {
            font-weight: bold;
        }

        .receipt-image {
            text-align: center;
            margin-bottom: 10px;
        }

        .receipt-image img {
            max-width: 100%;
        }

        .actions {
            text-align: center;
        }

        .actions button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Receipt Details</h2>
        </div>
        <div class="receipt-details">

            <div class="receipt-image">
                <img src="{{ asset('images/shine_recipt.jpeg') }}" alt="Receipt Image">
            </div>
            <table>
                <tbody>
                    <tr>
                        <td class="font-bold">ID:</td>
                        <td>{{ $receipt->id }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Patient:</td>
                        <td>{{ $receipt->patient->name }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Issued By:</td>
                        <td>{{ $receipt->issuer->name }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Doctor:</td>
                        <td>{{ $receipt->doctor->name }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Prescription:</td>
                        <td>{{ $receipt->prescription }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Procedure:</td>
                        <td>{{ $receipt->procedure->name }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Balance:</td>
                        <td>${{ $receipt->balance }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Discount:</td>
                        <td>${{ $receipt->discount }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Total Cost:</td>
                        <td>${{ $receipt->total_cost }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="actions">
            <button onclick="window.print()">Print</button>
        </div>
    </div>
</body>

</html>
