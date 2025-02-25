<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Localized Question Posting')</title>
    <!-- Add CSS and JS links here -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-white shadow">
        <nav class="container mx-auto p-4 flex justify-between items-center">
            <!-- Navbar with links to pages -->
            <div class="flex space-x-4">
                <a href="{{ route('home') }}" class="text-lg font-semibold text-gray-700 hover:text-gray-900">Home</a>
                <a href="{{ route('questions.index') }}" class="text-lg font-semibold text-gray-700 hover:text-gray-900">Questions</a>
                <a href="{{ route('questions.create') }}" class="text-lg font-semibold text-gray-700 hover:text-gray-900">Ask a Question</a>
            </div>
            <div class="flex space-x-4">
                @auth
                    <a href="{{ route('profile.show') }}" class="text-lg font-semibold text-gray-700 hover:text-gray-900">My Profile</a>
                    <a href="{{ route('logout') }}" class="text-lg font-semibold text-gray-700 hover:text-gray-900"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-lg font-semibold text-gray-700 hover:text-gray-900">Login</a>
                    <a href="{{ route('register') }}" class="text-lg font-semibold text-gray-700 hover:text-gray-900">Register</a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="container mx-auto p-4">
        @yield('content')
    </main>

    <footer class="bg-white shadow mt-8 p-4 text-center">
        <p>&copy; {{ date('Y') }} Localized Question Posting. All rights reserved.</p>
    </footer>
</body>
</html>
