<x-invitation>
<div>
    <form action="{{ route('invitation.store') }}" method="POST">
        @CSRF
        <label for="accept">Accepteer</label>
        <button type="submit" name="action" value="1">V</button>

        <label for="deny">Afwijzen</label>
        <button type="submit" name="action" value="2">X</button>
    </form>
</div>
</x-invitation>
