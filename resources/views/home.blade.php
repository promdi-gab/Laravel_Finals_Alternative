<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<header class="flex justify-between items-center px-10 py-6 text-white bg-gray-800">
    <div class="text-2xl">
        <h1>Pet Clinic</h1>
    </div>
    <nav>
        <ul class="tracking-widest text-2xl">
            <button> <a href="{{ URL('/') }}">
                    <h5>Home</h5>
                </a></button>
            <button> <a href="{{ URL('pet') }}">
                    <h5>Pets</h5>
                </a></button>
            <button><a href="{{ URL('owner') }}">
                    <h5>Owners</h5>
                </a></button>
            <button><a href="employee.php">
                    <h5>Employee</h5>
                </a></button>
            <button><a href="{{ URL('service') }}">
                    <h5>Service</h5>
                </a></button>
            <button><a href="consultationz.php">
                    <h5>Consultation</h5>
                </a></button>
        </ul>
    </nav>
    <button class="text-2xl">
        <h1>Log out</h1>
    </button>
</header>
<body style="background: url(https://wallpapercave.com/wp/B1sODrM.jpg); background-size:cover;">
    @yield('contents')
</body>
</html>