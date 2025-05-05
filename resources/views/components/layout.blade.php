@vite(['resources/css/app.css', 'resources/js/app.js'])

<head>
    <title>{{ $title ?? "Blog" }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    {{ $slot }}
</body>