<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
                        <thead>
                            <tr>
                            <th>DNI</th>
                            <th>NOMBRE DEL PACIENTE</th>
                            <th>VACUNA</th>
                            <th>DOSIS</th>
                            <th>LOTE</th>
                            <th>FECHA</th>
                            <th>LOCAL</th>
                            <th>FECHA CREACIÓN</th>
                            <th>FECHA ACTUALIZACIÓN</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($card as $item)
                            <tr>
                                    <td>{{$item->patient->dni }}</td>
                                    <td>{{ $item->patient->name }} {{ $item->patient->lastname }}</td>
                                    <td>{{ $item->vaccine->name }}</td>
                                    <td>{{ $item->number_dosis }}</td>
                                    <td>{{ $item->vaccine->lot_number }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{$item->locale}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    
</body>
</html>