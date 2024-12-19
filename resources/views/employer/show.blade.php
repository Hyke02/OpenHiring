<x-guest-layout>
    <x-slot name="slot1">
        <x-navigation></x-navigation>
        <h1 class="font-radikal text-5xl text-center mt-4">Uitnodiging maken</h1>
        <div class="justify-center flex mb-3 mt-5">
            <div class="flex flex-col border-black border rounded bg-[#FFFFFF]/80 m-3 px-3 py-4 w-3/5 justify-center shadow-lg">
                <h2 class="font-radikal text-2xl">Vacature: {{ $vacancy->job_title }}</h2>
                <p>Wachtende: {{ $vacancy->awaiting }} in de wacht</p>
            </div>
        </div>

        <form action="{{ route('employer.job.invite', $vacancy) }}" method="POST" class="flex flex-col justify-center gap-6">
            @csrf
{{--            <div class="flex flex-col justify-center flex-wrap">--}}
                <div class="flex justify-center">
                    <div class="flex flex-col justify-center w-2/5">
                        <label for="num_invitations" class="font-radikal text-lg">Aantal uit te nodigen werknemers:</label>
                        <input type="number" name="num_invitations" min="1" max="{{ $vacancy->awaiting }}" required>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="flex flex-col justify-center w-2/5">
                        <label for="message" class="font-radikal text-lg">Bericht voor bevestiging SMS :</label>
                        <textarea name="message" rows="3"></textarea>
                    </div>
                </div>
{{--                <div class="flex justify-center">--}}
{{--                    <div class="flex flex-col justify-center w-2/5">--}}
{{--                        <label for="users" class="font-radikal text-lg">Bericht voor bevestiging SMS :</label>--}}
{{--                        <input type="text" name="users" value="{{$vacancy->users->number}}">--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="flex justify-center">
                    <div class="flex flex-col justify-center w-2/5">
                        <label for="date" class="font-radikal text-lg">Datum:</label>
                        <input type="date" name="date" required class=" flex justify-center align-middle">
                    </div>
                </div>
            <div class="flex justify-center">
                <div class="flex flex-col justify-center w-1/5">
                    <x-button type="submit">Verstuur Uitnodigingen</x-button>
                </div>
            </div>
        </form>

{{--        <h3>Wachtrij van werknemers</h3>--}}
{{--        @foreach($waitingEmployees as $employee)--}}
{{--            <div>{{ $employee->name }}</div>--}}
{{--        @endforeach--}}
    </x-slot>

</x-guest-layout>
