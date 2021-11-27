<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="content"> 
        <div class="d-flex justify-content-end mb-4">       

        </div> 
        <table class="table table-bordered mb-5 table-primary">    
        <thead> 
        <tr class="table-primary"> 
            <th scope="col">#</th> 
            <th scope="col">DNI</th> 
            <th scope="col">Apellidos</th> 
            <th scope="col">Nombres</th> 
            <th scope="col">Direccion</th> 
            <th scope="col">Email</th> 
        </tr>     
        </thead>   
        <tbody>  
        @foreach($cliente ?? '' as $data)
        <tr>
            <td scope="row">{{ $data->idcliente }}</td> 
            <td>{{ $data->dni }}</td> 
            <td>{{ $data->apellido }}</td> 
            <td>{{ $data->nombre }}</td> 
            <td>{{ $data->direccion }}</td> 
            <td>{{ $data->email }}</td> 
        </tr>
        @endforeach 
        </tbody> 
        </table> 
        </div>
</body>
</html>