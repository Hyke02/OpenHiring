<x-invitation>
    <h2>U bent uitgenodigd!</h2>
<div>
    <form action="{{ route('invitation.store') }}" method="POST">
        @CSRF

        <div class="flex space-x-4">
            <div>
                <label for="accept" class="block text-lg font-medium">Accepteer</label>
                <button type="submit" name="action" value="1" class="px-6 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">V</button>
            </div>
            <div class="flex space-x-4">
{{--                <x-button>Datum wijzigen</x-button>--}}
                <label for="date">Datum wijzigen</label>
                <input type="date" name="date" id="date"  placeholder="Datum wijzigen" value="{{ now()->format('d-m-Y') }}">
            </div>
            <div>
                <label for="deny" class="block text-lg font-medium">Afwijzen</label>
                <button type="submit" name="action" value="2" class="px-6 py-2 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">X</button>
            </div>
        </div>
    </form>
</div>
</x-invitation>
