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

            <form action="/register" method="post" class="rounded-lg w-full p-4 *:mb-4">
                @csrf

                <h1 class="text-xl">Vytvořte si účet</h1>

                <x-input type="text" name="name" placeholder="Jméno" />
                <x-input type="email" name="email" placeholder="Email" />
                <x-input type="password" name="password" placeholder="Heslo" />

                <div class="flex flex-col">
                    <a href="/login" class="text-blue-700 text-center hover:underline text-sm mb-2">Již máte účet?
                        Přihlaste se</a>

                    <button type="submit"
                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-neutral-950 hover:bg-neutral-900 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none">
                        Zaregistrovat se
                    </button>

                </div>
            </form>



        </div>



        <div class="h-screen bg-zinc-100 w-2/3">
            //rigth side
        </div>

    </main>


</body>

</html>
