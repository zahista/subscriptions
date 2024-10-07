<x-layouts.app>

    <div class="flex items-center w-full justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-700">{{ $price }} Kč / měsíc</h1>
            <h3 class="text-sm text-gray-500">Celkový počet plateb {{ $subscriptions->count() }}</h3>
        </div>
    </div>

    <div class="flex gap-4">

        <div class="w-2/3">
            <div class="grid grid-cols-3 gap-2">
                @foreach ($subscriptions as $subscription)
                    <x-tile title="{{ $subscription->platform }}" description="{{ $subscription->price }}">
                        <x-modal title="Jste si jistý touto akcí?" action="Smazat">
                            
                            <form action="/subscription_delete" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $subscription->id }}" name="id">

                                <button type="submit" class="bg-red-500 rounded-lg px-4 py-2 text-white font-semibold">
                                    Opravdu smazat
                                </button>
                            </form>

                        </x-modal>
                    </x-tile>
                @endforeach
            </div>

            <x-modal title="Vyvtořit nový záznám" action="Vytvořit nový záznam">
                <form action="/dashboard" method="POST" class="rounded-lg w-full *:mb-4">
                    @csrf
                    <x-input type="text" name="platform" placeholder="Platforma" />

                    <x-input type="number" name="price" placeholder="Cena za měsíc" />

                    <x-input type="date" name="billing_at" placeholder="Kdy se účtuje?" />

                    <x-buttons.primary type="submit">Vytvořit</x-buttons.primary>
                </form>
            </x-modal>
        </div>
    </div>

</x-layouts.app>
