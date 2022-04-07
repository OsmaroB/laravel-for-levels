<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Index</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Ingreso de usuario</h1>
            </div>
            @if($errors->any())
            <div class="col-8 mx-auto mt-2 mb-2">
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    - {{ $error }} <br>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="col-8 mx-auto mt-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST">
                            <div class="form-row">
                                <div class="col-12">
                                    <input type="text" name="name" class="form-control m-2 p-2" placeholder="Ingresa el nombre del usuario" value="{{ old('name')}}">
                                </div>
                                <div class="col-12">
                                    <input type="email" name="email" class="form-control m-2 p-2" placeholder="Ingresa el correo del usuario" value="{{ old('email') }}">
                                </div>
                                <div class="col-12">
                                    <input type="password" name="password" class="form-control m-2 p-2" placeholder="Ingresa la contraseña">
                                </div>
                                <div class="col-auto">
                                    <div class="row">
                                        @csrf
                                        <button type="submit" class="btn btn-block btn-success">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8 mx-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('user.destroy', $user) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input 
                                        type="submit" 
                                        value="Eliminar" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm(`¿Desea eliminar el usuario {{ $user->name }}`)"
                                    >
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>