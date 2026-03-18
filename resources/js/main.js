// Behúzzuk a külön modulból az induláshoz szükséges függvényeket.
import { initUi, onReady } from './ui.js';
import { validator } from './validator.js';
import { cookie } from './cookie.js';

// Egyszerű app objektum: itt van a belépési pont és az események kötése.
const app = {
    boot() {
        // Alap UI inicializálás.
        initUi();
        // Form validáció inicializálás.
        validator();
        // Cookie kezelés inicializálás.
        cookie();
        // Globális event listener-ek regisztrálása.
        this.bindEvents();
    },

    bindEvents() {
        // Eseménydelegálás: egy helyen figyeljük a kattintásokat.
        document.addEventListener('click', (event) => {
            // Csak akkor reagálunk, ha a cél vagy őse tartalmaz data-action attribútumot.
            const trigger = event.target.closest('[data-action]');
            if (!trigger) {
                return;
            }

            // Itt lehet később action alapú logikát bővíteni.
            console.log(`[app] action: ${trigger.dataset.action}`);
        });
    },
};

// Biztonságos indulás: csak akkor bootolunk, ha a DOM már használható.
onReady(() => {
    try {
        app.boot();
    } catch (error) {
        // Ha induláskor hiba van, legyen látható a konzolban.
        console.error('[app] boot failed', error);
    }
});
