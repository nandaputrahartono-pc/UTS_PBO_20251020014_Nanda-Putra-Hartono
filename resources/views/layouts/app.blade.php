<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal UKM/KSM</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="header">
        <div class="container">
            <h1>Portal UKM/KSM Kampus UCIC</h1>
            <nav>
                <a href="{{ route('ukm-ksm.index') }}">Daftar UKM/KSM</a>
                <a href="{{ route('ukm-ksm.create') }}">Tambah UKM/KSM</a>
            </nav>
        </div>
    </header>

    <main class="container content">
        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif

        @if (session('error'))
            <p class="alert alert-error">{{ session('error') }}</p>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        <p>UTS PBO - Nanda Putra Hartono - 20251020014</p>
    </footer>
</body>
</html>
