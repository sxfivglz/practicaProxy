<!DOCTYPE html>
<html lang="es">

<head>
    <title>Iniciar sesión</title>
    <!-- Incluir CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mt-5">Iniciar sesión</h2>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form method="POST" action="{{ route('login') }}" class="mt-4">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

           <!-- Resto de tu código HTML... -->
        
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        
        <div class="mt-3">
            <a href="{{ route('register') }}" class="btn btn-link">¿No tienes una cuenta? Regístrate</a>
        </div>
        
        <!-- Resto de tu código HTML... -->
        </form>
    </div>

    <!-- Incluir JS de Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>