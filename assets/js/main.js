(function () {

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
            if (all) {
                selectEl.forEach(e => e.addEventListener(type, listener))
            } else {
                selectEl.addEventListener(type, listener)
            }
        }
    }

    /**
    * Sticky hotel bar: shadow once the page has been scrolled
    *
    * The bar is already glued to the top of the screen by the stylesheet. The only
    * thing CSS cannot do on its own is tell "at the top of the page" apart from
    * "scrolled down", which is what the shadow is for.
    */
    const hotelTopbar = select('#hotel-topbar')

    if (hotelTopbar) {
        const toggleTopbarShadow = () => {
            hotelTopbar.classList.toggle('is-scrolled', window.scrollY > 8)
        }

        toggleTopbarShadow()
        window.addEventListener('scroll', toggleTopbarShadow, { passive: true })
    }

    /**
    * Settings sheet: close it as soon as one of its links is followed
    *
    * Every entry opens the dialler, the mail client or the maps. The sheet would
    * otherwise be left open behind the application the guest has just switched to,
    * and they would come back to it instead of to the directory.
    */
    const settingsSheet = select('#settings-sheet')

    if (settingsSheet) {
        on('click', '#settings-sheet .settings-link', () => {
            const offcanvas = bootstrap.Offcanvas.getInstance(settingsSheet)

            if (offcanvas) {
                offcanvas.hide()
            }
        }, true)
    }

    /**
    * In-page anchors: scroll smoothly, unless the guest asked for less motion
    */
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches

    on('click', 'a[href^="#"]', function (e) {
        const target = select(this.hash)

        if (!target) {
            return
        }

        e.preventDefault()
        target.scrollIntoView({
            behavior: prefersReducedMotion ? 'auto' : 'smooth',
            block: 'start'
        })
    }, true)

})()
