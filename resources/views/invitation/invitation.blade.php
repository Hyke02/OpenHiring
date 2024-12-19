<x-navigation></x-navigation>
<x-info-icon></x-info-icon>
<x-invitation>
    <h2 class="font-radikal text-[30px] font-bold my-[20px] flex justify-center">U bent uitgenodigd!</h2>
    <div class="flex justify-center">
        <div class="border-black border bg-[#FFFFFF]/80 w-4/5 flex justify-center flex-col rounded-lg">
            <div>
                <h3 class="font-radikal text-[30px]  my-[20px] flex justify-center">Vacature: {{ $invitation->vacancy->job_title }}</h3>
            </div>
            <div>
                <p class="font-radikal text-[30px] my-[20px] flex justify-center">Bedrijf: {{ $invitation->vacancy->company_name }}</p>
            </div>
            <div>
                <p class="font-radikal ml-7 text-lg">datum: {{$invitation->date}}</p>
            </div>
        </div>
    </div>
<div>
    <form action="{{ route('invitation.store', $invitation) }}" method="POST">
{{--        @dd($invitation)--}}
        @csrf

        <div class="flex-col space-x-4">
            <div>
                <div class="flex justify-center gap-5 m-10">
                    <label for="date">Datum wijzigen</label>
                    <input type="date" name="date" id="date"  placeholder="{{ $invitation->date }}" value="{{ $invitation->date }}">
                </div>
            </div>
            <div>
                <div>
                    <input type="hidden" name="users" value="{{$invitation->user->number}}">
                </div>
                <div>
                    <input type="hidden" name="body" value="{{$invitation->message}}">
                </div>
            </div>
            <div class="flex justify-around space-x-4 ">
                <div class="flex justify-between gap-10">
                    <div>
                        <label for="accept" class="block text-lg font-medium">Accepteer</label>
                        <button type="submit" name="action" value="1" class="px-16 py-4 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">V</button>
                    </div>
                    <div>
                        <label for="deny" class="block text-lg font-medium">Afwijzen</label>
                        <button type="submit" name="action" value="2" class="px-16 py-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">X</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</x-invitation>
