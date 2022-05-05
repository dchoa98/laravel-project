<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{route('users.index')}}"><h5>USER</h5></a>
        </div>
    </nav>
    <div class="cotainer form-fix">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Datail User</div>
                    <div class="card-body">
                        <table class="table table-bordered mt-2">
                            <thead>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Address</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$model->username}}</td>
                                    <td>{{$model->email}}</td>
                                    <td>{{$model->phone}}</td>
                                    <td>
                                        @if($model->gender == 1)
                                            Nam
                                        @else
                                            Nữ
                                        @endif
                                    </td>
                                    <td>{{$model->address}}</td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</body>
</html>