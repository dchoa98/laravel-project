<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" rel="stylesheet">
       
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{route('users.index')}}"><h5>USER</h5></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="key">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <div class="col-md-10 mx-auto">
            <table class="table table-bordered mt-2">
                <thead>
                    <th>STT</th>
                    <th>Email</th>
                    <th>
                        <a href="{{route('users.add')}}" class="btn btn-secondary">Create</a>
                    </th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->email}}</td>
                        <td class="d-flex justify-content-around">
                            <a href="{{route('users.detail',['id'=>$user->id])}}" class="btn btn-success"><i class="fa fa-edit"></i> Detail</a>
                            <a href="{{route('users.edit',['id'=>$user->id])}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{route('users.delete', ['id'=>$user->id])}}" method="POST">
                                @csrf
                                <button class="btn btn-dark" type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa ?')" ><i class="fa fa-times"></i>  Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                {{$users->links()}}
            </nav>
            </div>
        </div>
    </div>
</body>

</html>