<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Kosan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 24px; }
        nav a { margin-right: 12px; }
        table { border-collapse: collapse; width: 100%; margin-top: 12px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        .alert-success { background: #d4edda; padding: 10px; margin: 12px 0; }
        .alert-error { background: #f8d7da; padding: 10px; margin: 12px 0; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input, select, textarea { width: 100%; max-width: 420px; padding: 6px; }
        button, .btn { padding: 6px 12px; cursor: pointer; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('kos.index') }}">Data Kos</a>
        <a href="{{ route('kamar.index') }}">Data Kamar</a>
    </nav>
    <hr>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</body>
</html>