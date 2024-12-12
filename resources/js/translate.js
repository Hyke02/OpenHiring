const apiKey = 'AIzaSyDwysuHNeSGLCsqbdKxnjN2sbRTpPxe_0E';

document.getElementById('language-selector').addEventListener('change', function () {
    console.log('harhar')
    translatePageContent(this.value);
});

function translatePageContent(targetLanguage) {
    const elements = [
        ...document.querySelectorAll('.vacancy-title, .vacancy-company, p'),
        ...document.querySelectorAll('select option'),
        ...document.querySelectorAll('button'),
        ...document.querySelectorAll('input[placeholder]')
    ];

    // Verzamel alle teksten van de elementen die vertaald moeten worden
    const texts = elements.map(el => el.tagName === 'INPUT' ? el.placeholder : el.innerText);

    // Verstuur de vertaalverzoeken naar de Google Translate API
    fetch(`https://translation.googleapis.com/language/translate/v2?key=${apiKey}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ q: texts, target: targetLanguage, format: 'text' })
    })
        .then(response => response.json())
        .then(data => {
            if (data.data && data.data.translations) {
                const translations = data.data.translations;
                elements.forEach((el, i) => {
                    // Controleer of de vertaling beschikbaar is
                    if (translations[i] && translations[i].translatedText) {
                        const translation = translations[i].translatedText;
                        if (el.tagName === 'INPUT') {
                            el.placeholder = translation;
                        } else {
                            el.innerText = translation;
                        }
                    }
                });
            }
        })
        .catch(error => console.error('Translation error:', error));
}
