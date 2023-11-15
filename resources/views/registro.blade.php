<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro</title>
    <!-- Incluir CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mt-5">Registro</h2>

        <form method="POST" action="{{ route('register') }}" class="mt-4">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre del usuario</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
                @error('nombre')
               <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
            </div>

            <div class="form-group">
                <label for="email">Correo</label>
                <input type="email" id="email" name="email" class="form-control" required>
                @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @error('password')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>        
        <button type="submit" class="btn btn-primary">Registrar</button>
        
        <div class="mt-3">
            <a href="{{ route('login') }}" class="btn btn-link">¿Ya tienes una cuenta? Inicia sesión</a>
        </div>
                    
        </form>
    </div>

    <!-- Incluir JS de Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>