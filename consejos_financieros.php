<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consejos Financieros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            font-size: 18px;
            color: #333;
        }

        .header {
            background-color: #34495e;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 15px;
            overflow: hidden;
            width: 300px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 15px;
        }

        .card-content h3 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #34495e;
        }

        .card-content p {
            margin: 0;
            color: #666;
        }

        .card-content a {
            background-color: #ff8800;
            border: none;
            border-radius: 5px;
            color: white;
            display: block;
            margin-top: 15px;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .card-content a:hover {
            background-color: #ff6600;
        }

        .menu-container {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }

        .menu-items {
            display: none;
            position: absolute;
            background-color: #34495e;
            padding: 15px;
            border-radius: 10px;
            color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .menu-items.open {
            display: block;
        }

        .menu-items ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-items li {
            margin-bottom: 15px;
        }

        .menu-items a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        .btn {
            background-color: #ff8800;
            border: none;
            color: white;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin-top: 20px;
            margin-left: 20px;
            cursor: pointer;
            border-radius: 10px;
        }

        .btn:hover {
            background-color: #ff6600;
        }
    </style>
</head>

<body>
    <div class="menu-container">
        <button id="menu-toggle" class="btn">☰ Menú</button>
        <div class="menu-items open">
            <ul>
                <li><a href="home.php">Inicio</a></li><br>
                <li><a href="movimientos.php">Mostrar movimientos</a></li><br>
                <li><a href="detalles_finanzas.php">Detalle de finanzas</a></li>
                <li><a href="https://wa.link/og772g">Soporte usuarios vía Whatsapp</a></li>
            </ul>
        </div>
    </div>

    <div class="header">
        <h1>Consejos Financieros</h1>
    </div>

    <div class="container">
        <div class="card">
            <img src="https://www.marketeroslatam.com/wp-content/uploads/2021/10/presupuesto.jpg" alt="Consejo 1">
            <div class="card-content">
                <h3>Establece un presupuesto</h3>
                <p>Aprende a crear y mantener un presupuesto mensual.</p>
                <a href="consejo1.html">Leer más</a>
            </div>
        </div>

        <div class="card">
            <img src="https://cdn.aarp.net/content/dam/aarp/money/budgeting_savings/2021/10/1140-emergency-savings-fund-esp.jpg" alt="Consejo 2">
            <div class="card-content">
                <h3>Fondo de emergencia</h3>
                <p>La importancia de tener un fondo de emergencia.</p>
                <a href="consejo2.html">Leer más</a>
            </div>
        </div>

        <div class="card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQe8Yj3rwTz6J2XbFSWjeALd98FROvfxLZQuA&s" alt="Consejo 3">
            <div class="card-content">
                <h3>Reduce tus deudas</h3>
                <p>Estrategias para reducir y eliminar deudas.</p>
                <a href="consejo3.html">Leer más</a>
            </div>
        </div>

        <div class="card">
            <img src="https://diario.mx/jrz/media/uploads/galeria/2020/02/24/20200224083936349-0-1631955.jpg" alt="Consejo 4">
            <div class="card-content">
                <h3>Invierte sabiamente</h3>
                <p>Consejos básicos para invertir tu dinero.</p>
                <a href="consejo4.html">Leer más</a>
            </div>
        </div>

        <div class="card">
            <img src="https://www.mibcr.com/wps/wcm/connect/blog/2d5493ba-d553-4829-8c0f-73078f689356/FOTO+BOLET%C3%8DN+DE+SOSTENIBILIDAD+1+EDUCACI%C3%93N+FINANCIERA.jpg?MOD=AJPERES&CACHEID=ROOTWORKSPACE.Z18_4024H1S0NG5AD0QGCMR77B2004-2d5493ba-d553-4829-8c0f-73078f689356-oywJqgX" alt="Consejo 5">
            <div class="card-content">
                <h3>Gastos impulsivos</h3>
                <p>Cómo evitar las compras impulsivas.</p>
                <a href="consejo5.html">Leer más</a>
            </div>
        </div>
    </div>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menuItems = document.querySelector('.menu-items');

        menuItems.classList.add('open'); // Mostrar el menú por defecto

        menuToggle.addEventListener('click', () => {
            menuItems.classList.toggle('open');
        });
    </script>
</body>

</html>
