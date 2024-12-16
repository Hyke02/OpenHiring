@php
    $progressAmount = [
        'vacancy.index' => 'w-[25%]',
        'vacancy.show' => 'w-[50%]',
        'my-vacancy.index' => 'w-[75%]',
        'invitation.index' => 'w-[100%]',
    ];
    $currentProgress = $progressAmount[Route::currentRouteName()] ?? 'w-0';
@endphp

<div class="relative w-full h-4 bg-gray-200 rounded-lg overflow-hidden mb-4">
    <div class="h-full bg-[#AA0061] transition-all duration-300 {{ $currentProgress }}"></div>
</div>

@if(Route::currentRouteName() == "vacancy.index")
    <div class=" mb-5 p-3  @if(Route::currentRouteName() == 'vacancy.index') border-4 border-solid border-[#AA0061] rounded-lg @endif">
        <h3 class="text-2xl font-bold mb-4">Stap 1: Kies een vacature</h3>
        <x-info-content-item>Gebruik de zoekbalk en filters om een baan te vinden die bij jou past.</x-info-content-item>
        <x-info-content-item>Klik op de vacature die je interessant vindt.</x-info-content-item>
    </div>
@endif

@if(Route::currentRouteName() == "vacancy.show")
    <div class=" mb-5 p-3 @if(Route::currentRouteName() == 'vacancy.show') border-4 border-solid border-[#AA0061] rounded-lg @endif">
        <h3 class="text-2xl font-bold mb-4">Stap 2: Controleer de details en solliciteer</h3>
        <x-info-content-item>Lees de details van de vacature zorgvuldig door</x-info-content-item>
        <x-info-content-item>Als alles goed lijkt, klik op de knop Solliciteren.</x-info-content-item>
    </div>
@endif

@if(Route::currentRouteName() == 'my-vacancy.index')
    <div class=" mb-5 p-3 @if(Route::currentRouteName() == 'my-vacancy.index') border-4 border-solid border-[#AA0061] rounded-lg @endif">
        <h3 class="text-2xl font-bold mb-4">Stap 3: Wacht op een uitnodiging</h3>
        <x-info-content-item>Zodra je op plek 0 op de wachtlijst staat, ontvang je een uitnodiging voor de baan.</x-info-content-item>
    </div>
@endif

@if(Route::currentRouteName() == "invitation.index")
    <div class=" mb-5 p-3 @if(Route::currentRouteName() == 'invitation.index') border-4 border-solid border-[#AA0061] rounded-lg @endif">
        <h3 class="text-2xl font-bold mb-4">Stap 4: Start met werken</h3>
        <x-info-content-item>Zodra je bent uitgenodigd, zie je een datum onderaan de uitnodiging. Dit is de dag waarop je mag beginnen met werken.</x-info-content-item>
        <x-info-content-item>Als de datum niet uitkomt, kun je een alternatieve datum naar de werkgever sturen.</x-info-content-item>
        <strong>Let op: De werkgever kan ervoor kiezen om jouw verzoek af te wijzen. Je word dan niet aangenomen.</strong>
    </div>
@endif

<script>

</script>
