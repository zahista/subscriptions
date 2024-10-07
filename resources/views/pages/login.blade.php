<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>

    <main class="flex h-screen">

        <div class="h-screen px-12 w-1/3 flex items-center">

            <form action="/login" method="POST" class="rounded-lg w-full p-4 *:mb-4">
                @csrf
                <h1 class="text-xl">Přihlásit se</h1>

                <x-input type="email" name="email" placeholder="Email" />
                <x-input type="password" name="password" placeholder="Heslo" />

                <div class="flex flex-col">
                    <a href="/register" class="text-blue-700 text-center hover:underline text-sm mb-2">Ještě nemáte
                        účet? Zaregistrujte se</a>
                    <x-buttons.primary type="submit">Přihlásit se</x-buttons.primary>
                </div>
            </form>


        </div>


        <div class="h-screen bg-zinc-100 w-2/3">


        </div>

    </main>


</body>

</html>
