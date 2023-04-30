<!DOCTYPE html>
<html>
<head>
    <title>Practical Test Laravel</title>
</head>
<body>
    <h1>{{ $data['title'] }}</h1>
    <table>
        <tr>
            <td><b>Name</b></td>
            <td>: {{ $data['name'] }}</td>
        </tr>
        <tr>
            <td><b>Email</b></td>
            <td>: {{ $data['email'] }}</td>
        </tr>
        @if($data['phone'])
            <tr>
                <td><b>Phone</b></td>
                <td>: {{ $data['phone'] }}</td>
            </tr>
        @endif
        @if($data['dob'])
            <tr>
                <td><b>Date Of Birth</b></td>
                <td>: {{ $data['dob'] }}</td>
            </tr>
        @endif
        @if($data['gender'])
            <tr>
                <td><b>Gender</b></td>
                <td>: {{ $data['gender'] }}</td>
            </tr>
        @endif
    </table>
    <p>Thank you</p>
</body>
</html>
