<x-guest-layout>
    <x-slot name="slot1">
        <h1>{{ $vacancy->name }}</h1>
        <p>Wachtende: {{ $vacancy->awaiting }} in de wacht</p>

        <form action="{{ route('employer.job.invite', $vacancy) }}" method="POST">
            @csrf
            <label for="num_invitations">Aantal uit te nodigen werknemers:</label>
            <input type="number" name="num_invitations" min="1" max="{{ $vacancy->awaiting }}" required>

            <label for="message">Bericht voor uitgenodigden:</label>
            <textarea name="message" required></textarea>

            <label for="date">Datum:</label>
            <input type="date" name="date" required>

            <button type="submit">Verstuur Uitnodigingen</button>
        </form>

        <h3>Wachtrij van werknemers</h3>
        @foreach($waitingEmployees as $employee)
            <div>{{ $employee->name }}</div>
        @endforeach
    </x-slot>

</x-guest-layout>
