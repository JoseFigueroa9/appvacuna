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
                                <th>NOMBRE</th>
                                <th>DESCRIPCIÓN</th>
                                <th>STOCK</th>
                                <th>INV. MIN</th>
                                <th>NÚMERO DE LOTE</th>
                                <th>FECHA CREACIÓN</th>
                                <th>FECHA ACTUALIZACIÓN</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($vaccines as $vaccine)
                            <tr>
                                <td>{{$vaccine->name}}</td>
                                <td>{{$vaccine->description}}</td>
                                <td>{{$vaccine->stock}}</td>
                                <td>{{$vaccine->alerts}}</td>
                                <td>{{$vaccine->lot_number}}</td>
                                <td>{{$vaccine->created_at}}</td>
                                <td>{{$vaccine->updated_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    
</body>
</html>