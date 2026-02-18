// UI-hoz kapcsolódó segédfüggvények.

export function initUi() {
    // Jelöljük az oldalon, hogy a JS már betöltött.
    const root = document.documentElement;
    root.classList.add('js-ready');

    // Debug információ: mikor indult el az UI.
    const now = new Date();
    const stamp = now.toLocaleTimeString();
    console.info(`[ui] initialized at ${stamp}`);
}

export function onReady(callback) {
    // Ha a DOM még nem kész, várunk a DOMContentLoaded eseményre.
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', callback, { once: true });
        return;
    }

    // Ha már kész a DOM, azonnal futtatjuk a callbacket.
    callback();
}
