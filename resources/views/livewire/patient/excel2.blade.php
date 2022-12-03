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
                                <th>ID</th>
                                <th>NOMBRES</th>
                                <th>APELLIDOS</th>
                                <th>DNI</th>
                                <th>TELÉFONO</th>
                                <th>>E-MAIL</th>
                                <th>FECHA NACIMIENTO</th>
                                <th>SEXO</th>
                                <th>NOMBRE PADRE</th>
                                <th>DNI Padre</th>
                                <th>NOMBRE MADRE</th>
                                <th>DNI MADRE</th>
                                <th>FECHA CREACIÓN</th>
                                <th>FECHA ACTUALIZACIÓN</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($patients as $patient)
                            <tr>
                                    <td>{{$patient->id}}</td>
                                    <td>{{$patient->name}}</td>
                                    <td>{{$patient->lastname}}</td>
                                    <td>{{$patient->dni}}</td>
                                    <td>{{$patient->phone}}</td>
                                    <td>{{$patient->email}}</td>
                                    <td>{{$patient->date_birth}}</td>
                                    <td>{{$patient->gender}}</td>
                                    <td>{{$patient->father_fullname}}</td>
                                    <td>{{$patient->father_dni}}</td>
                                    <td>{{$patient->mother_fullname}}</td>
                                    <td>{{$patient->mother_dni}}</td>
                                    <td>{{$patient->created_at}}</td>
                                    <td>{{$patient->updated_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    
</body>
</html>