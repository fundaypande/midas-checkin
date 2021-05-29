<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation Form</title>

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <div style="text-align: center">
        <h1 style="margin-bottom: -20px">{{ $property->property_name}}</h1>
        <p>{{ $property->property_adress }}</p>
        <hr>
        <br>
        <h2>ROOM RESERVATION FORM</h2>
    </div>

    <table style="width: 100%">
        <tr style="width: 100%">
            <td style="width: 30%">Type</td>
            <td style="width: 70%">: {{ $data->tipe_reservation }}</td>
        </tr>
        <tr>
            <td>Full Name</td>
            <td>: {{ $data->nama_depan }} {{ $data->nama_belakang }}</td>
        </tr>
        <tr>
            <td>Company name</td>
            <td>: {{ $data->company_name }}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>: {{ $data->address }}</td>
        </tr>
        <tr>
            <td>Email Address</td>
            <td>: {{ $data->email }}</td>
        </tr>
        <tr>
            <td>Phone Number / Telephone Number</td>
            <td>: {{ $data->phone_number }} / {{ $data->telephone_num }}</td>
        </tr>
        <tr>
            <td>Check in / Check out</td>
            <td>: {{ $data->tanggal_checkin }} / {{ $data->tanggal_Checkout }}</td>
        </tr>
        <tr>
            <td>Room Type / No. of Room</td>
            <td>: {{ $data->room_type }} / {{ $data->no_room }}</td>
        </tr>
        <tr>
            <td>Room Rate / Total Pax (Rp.)</td>
            <td>: {{ number_format($data->room_rate,0,',','.') }} / {{ number_format($data->total_pax,0,',','.')  }}</td>
        </tr>
        <tr>
            <td>Billing Instruction</td>
            <td>: {{ $data->billing_instruction }}</td>
        </tr>
        <tr>
            <td>Remark</td>
            <td>: {{ $data->remarks }}</td>
        </tr>
    </table>

    <div style="text-align: right">
        <br>
        <br>
        Date: {{ $data->created_at }} <br>
        Taken By: <br>
        <br>
        <br>
        <br>
        <img style="height: 100px" src="{{ $data->ttdimage }}" alt="" srcset=""> <br>
        {{ $data->nama_depan }} {{ $data->nama_belakang }}
    </div>

</body>
</html>
