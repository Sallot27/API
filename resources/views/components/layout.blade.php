<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Portfolio</title>

    {{-- Tailwind CSS CDN (you can replace with compiled CSS if using Laravel Mix/Vite) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Dark Mode Support --}}
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100 font-sans leading-normal tracking-wide">

    {{-- Slot content goes here --}}
    {{ $slot }}

    {{-- Footer (optional) --}}
    <footer class="text-center py-4 border-t mt-10 text-sm text-gray-500 dark:text-gray-400">
        © {{ now()->year }} My Portfolio - Laravel & Tailwind
    </footer>

</body>
</html>
