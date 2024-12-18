<style>
    #language-selector {
        background-image: url('{{ asset('storage/images/taal_icon.png') }}');
        background-repeat: no-repeat;
        background-position: 10px center;
        background-size: 20px 20px;
        padding-left: 30px;
        padding-right: 10px;
        border: black 1px solid;
        margin: 5px;

    }
</style>

<div class="flex justify-center">
    <div>
        <select id="language-selector" class="block">
            <option value="nl">Nederlands</option>
            <option value="en">Engels</option>
            <option value="de">Duits</option>
            <option value="pt">Portugees</option>
            <option value="it">Italiaans</option>
            <option value="pl">Pools</option>
            <option value="ro">Roemeens</option>
            <option value="el">Grieks</option>
            <option value="hu">Hongaars</option>
        </select>
    </div>
</div>


<script>
    const apiKey = 'AIzaSyDwysuHNeSGLCsqbdKxnjN2sbRTpPxe_0E';

    const translationsCache = {};

    document.addEventListener('DOMContentLoaded', function () {
        // Probeer de taal uit localStorage op te halen, anders gebruik de standaardtaal
        const storedLanguage = localStorage.getItem('selectedLanguage') || 'nl';
        const languageSelector = document.getElementById('language-selector');

        translatePageContent(storedLanguage);
        languageSelector.value = storedLanguage;

        languageSelector.addEventListener('change', function () {
            const selectedLanguage = this.value;
            translatePageContent(selectedLanguage);

            // Sla de gekozen taal op in localStorage
            localStorage.setItem('selectedLanguage', selectedLanguage);
        });
    });

    function translatePageContent(targetLanguage) {
        const elements = [
            ...document.querySelectorAll('.vacancy-title, p, button:not(#info-icon), .button, select option, input[placeholder], strong, h3, li, span, a, h1, h2:not(.vacancy-company.no-translate.vacancy-location.no-translate), label, button.applybutton')
        ];

        const texts = elements.map(el => {
            if (el.tagName === 'INPUT') {
                return el.placeholder.trim();
            } else {
                // Alleen de tekst van het eerste tekstknooppunt pakken
                const textNode = Array.from(el.childNodes).find(node => node.nodeType === Node.TEXT_NODE);
                return textNode ? textNode.textContent.trim() : '';
            }
        });

        if (translationsCache[targetLanguage]) {
            updatePageContent(translationsCache[targetLanguage], elements);
            return;
        }

        fetch(`https://translation.googleapis.com/language/translate/v2?key=${apiKey}`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                q: texts,
                target: targetLanguage,
                format: 'text',
            })
        })
            .then(response => response.json())
            .then(data => {
                const translations = data.data.translations.map(t => t.translatedText);
                translationsCache[targetLanguage] = translations;
                updatePageContent(translations, elements);
            })
            .catch(error => console.error('Vertaalfout:', error));
    }

    const languageNames = {
        'nl': 'Nederlands',
        'en': 'English',
        'de': 'Deutsch',
        'pt': 'Português',
        'it': 'Italiano',
        'pl': 'Polski',
        'ro': 'Română',
        'el': 'Ελληνικά',
        'hu': 'Magyar'
    };

    function updatePageContent(translations, elements) {
        elements.forEach((el, i) => {
            if (el.tagName === 'OPTION') {
                const langCode = el.value;
                el.innerText = languageNames[langCode] || translations[i];
            } else if (el.tagName === 'INPUT') {
                el.placeholder = translations[i];
            } else {
                // Update alleen het eerste tekstknooppunt
                const textNode = Array.from(el.childNodes).find(node => node.nodeType === Node.TEXT_NODE);
                if (textNode) {
                    textNode.textContent = translations[i];
                }
            }
        });
    }
</script>


