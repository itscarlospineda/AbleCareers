<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>

<table id="resumes-table">
    <thead>
        <tr>
            <th>Información</th>
            <th>Educación</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $resume->info }}</td>
            <td>{{ $resume->education }}</td>
            <td><img src="{{ asset("/$resume->photo") }}"></td>
        </tr>
    </tbody>
</table>

</body>
</html>
