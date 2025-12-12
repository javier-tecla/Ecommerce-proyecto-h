<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 403 | Acceso Denegado</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3f51b5; /* Azul Índigo Elegante */
            --background-color: #f7f9fc;
            --text-color: #333;
            --light-text: #666;
            --card-background: #ffffff;
            --border-radius: 12px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
        }

        .container {
            max-width: 500px;
            padding: 40px;
            background-color: var(--card-background);
            border-radius: var(--border-radius);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .error-code {
            font-size: 8rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 0;
            line-height: 1;
            text-shadow: 2px 2px 8px rgba(63, 81, 181, 0.3);
        }

        .error-message {
            font-size: 1.8rem;
            font-weight: 600;
            margin: 15px 0 10px 0;
            color: var(--primary-color);
        }

        .description {
            font-size: 1rem;
            color: var(--light-text);
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .actions a {
            display: inline-block;
            padding: 10px 25px;
            margin: 5px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .actions .btn-home {
            background-color: var(--primary-color);
            color: white;
            border: 2px solid var(--primary-color);
        }

        .actions .btn-home:hover {
            background-color: #303f9f;
            transform: translateY(-2px);
        }

        .actions .btn-contact {
            background-color: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .actions .btn-contact:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <div class="container">
        <p class="error-code">403</p>
        <h1 class="error-message">¡Acceso Denegado! 🚫</h1>
        <p class="description">
            Lo sentimos, no tienes los permisos necesarios para ver esta página o acceder a este recurso. 
            Verifica tu nivel de usuario o contacta al administrador del sistema si crees que esto es un error.
        </p>
        <div class="actions">
            <a href="/admin" class="btn-home">Ir a la página de inicio</a>
            <a href="mailto:soporte@tudominio.com" class="btn-contact">Contactar Soporte</a>
        </div>
    </div>

</body>
</html>

