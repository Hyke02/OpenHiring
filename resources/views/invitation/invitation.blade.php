<x-invitation>
<div>
    <form action="{{url(route('invitation.store'))}}" method="POST">
        @CSRF
        <label for="accept">Accepteer</label>
{{--        <input type="submit" name="accept" id="accept" placeholder="V">--}}
        <button type="submit" name="accept-button">V</button>

        <label for="deny">Afwijzen</label>
{{--        <input type="submit" name="deny" id="deny" placeholder="X">--}}
        <button type="submit" name="deny-button">X</button>

    </form>
</div>
</x-invitation>
