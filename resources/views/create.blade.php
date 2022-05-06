<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ route('users.index') }}"><h5>USER</h5></a>
    </div>
</nav>
<div class="cotainer form-fix">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add User</div>
                <div class="card-body">
                    <form action="{{ route('users.create') }}" method="POST" enctype="multipart/form-data" class="p-3">
                    @csrf
                        <div class="form-group row bottom-fix ">
                            <label for="username" class="col-md-3 col-form-label text-md-right">Username</label>
                            <div class="col-md-8">
                                <input type="text" id="username" class="form-control" name="username" value="{{ old('$request->keyword') }}">
                                @error('username')
                                <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row bottom-fix ">
                            <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>
                            <div class="col-md-8">
                                <input type="text" id="email" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row bottom-fix ">
                            <label for="phone" class="col-md-3 col-form-label text-md-right">Phone</label>
                            <div class="col-md-8">
                                <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row bottom-fix ">
                            <label for="gender" class="col-md-3 col-form-label text-md-right">Gender</label>
                            <div class="col-md-8">
                                <select name="gender" class="form-select">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row bottom-fix ">
                            <label for="address" class="col-md-3 col-form-label text-md-right">Address</label>
                            <div class="col-md-8">
                                <input type="text" id="address" class="form-control" name="address" value="{{ old('address') }}">
                                @error('address')
                                <span class="form-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" id="addForm">Add</button>
                            <button type="reset" class="btn btn-danger" id="cancel">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>