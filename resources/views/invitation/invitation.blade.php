<x-invitation>
    <h2 class="text-[30px] font-bold my-[20px] flex justify-center">U bent uitgenodigd!</h2>
<div>
    <form action="{{ route('invitation.store') }}" method="POST">
        @CSRF

        <div class="flex-col space-x-4">
            <div>
                <div class="flex justify-center gap-5 m-10">
                    <label for="date">Datum wijzigen</label>
                    <input type="date" name="date" id="date"  placeholder="Datum wijzigen" value="{{ now()->format('d-m-Y') }}">
                </div>
            </div>
            <div class="flex justify-around space-x-4 ">
                <div>
                    <label for="accept" class="block text-lg font-medium">Accepteer</label>
                    <button type="submit" name="action" value="1" class="px-16 py-4 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">V</button>
                </div>
                <div>
                    <label for="deny" class="block text-lg font-medium">Afwijzen</label>
                    <button type="submit" name="action" value="2" class="px-16 py-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">X</button>
                </div>
            </div>
            <x-button>Datum wijzigen</x-button>
        </div>
    </form>
</div>
</x-invitation>
