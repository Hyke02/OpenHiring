<div class=" mb-5 p-3  @if(Route::currentRouteName() == 'vacancy.index') border-4 border-solid border-[#AA0061] rounded-lg @endif">
    <h3 class="text-3xl font-bold mb-4">Stap 1: Kies een vacature</h3>
    <x-info-content-item class="text-3xl">Gebruik de zoekbalk en filters om een baan te vinden die bij jou past.</x-info-content-item>
    <x-info-content-item class="text-3xl">Klik op de vacature die je interessant vindt.</x-info-content-item>
</div>

<div class=" mb-5 p-3 @if(Route::currentRouteName() == 'vacancy.show') border-4 border-solid border-[#AA0061] rounded-lg @endif">
    <h3 class="text-3xl font-bold mb-4">Stap 2: Controleer de details en solliciteer</h3>
    <x-info-content-item class="text-3xl">Lees de details van de vacature zorgvuldig door</x-info-content-item>
    <x-info-content-item class="text-3xl">Als alles goed lijkt, klik op de knop Solliciteren.</x-info-content-item>
</div>

<div class=" mb-5 p-3 @if(Route::currentRouteName() == 'my-vacancy.index') border-4 border-solid border-[#AA0061] rounded-lg @endif">
    <h3 class="text-3xl font-bold mb-4">Stap 3: Wacht op een uitnodiging</h3>
    <x-info-content-item class="text-3xl">Zodra je op plek 0 op de wachtlijst staat, ontvang je een uitnodiging voor de baan.</x-info-content-item>
</div>

<div class=" mb-5 p-3 @if(Route::currentRouteName() == 'invitation.index') border-4 border-solid border-[#AA0061] rounded-lg @endif">
    <h3 class="text-3xl font-bold mb-4">Stap 4: Start met werken</h3>
    <x-info-content-item class="text-3xl">Zodra je bent uitgenodigd, zie je een datum onderaan de uitnodiging. Dit is de dag waarop je mag beginnen met werken.</x-info-content-item>
    <x-info-content-item class="text-3xl">Als de datum niet uitkomt, kun je een alternatieve datum naar de werkgever sturen.</x-info-content-item>
    <strong>Let op: De werkgever kan ervoor kiezen om jouw verzoek af te wijzen. Je word dan niet aangenomen.</strong>
</div>
