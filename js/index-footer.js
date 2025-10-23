"use strict";

(function () {

    let item = document.querySelectorAll(".js-collapse");
    let content = document.querySelectorAll(".js-content");
    let popup = document.querySelectorAll(".js-popup");
    let popupContent = document.querySelectorAll(".js-popup-content");


    let state = {
        active: "is-active",
        close: "is-closed",
        open: "is-open",
        animationIn: "a-fadeIn"
    }

    function contentHidden() {

        for (let i = 0; i < content.length; i++) {

            content[i].classList.add(state.close);
        }
    }

    function toggleHandler() {

        for (let i = 0; i < item.length; i++) {
            item[i].addEventListener('click', toggle, false);

        }

    }

    function toggle(e) {

        e.preventDefault();

        let contentClass = this.nextElementSibling.className;
        let itemClass = this.previousSibling.nextSibling.className;

        for (let j = 0; j < item.length; j++) {


            item[j].className = 'c-uteis__lnk js-collapse';
            item[j].setAttribute('aria-expanded', 'false');

            for (let i = 0; i < content.length; i++) {

                content[i].className = 'c-uteis__content js-content is-closed';

            }
            if (contentClass == 'c-uteis__content js-content is-closed' && itemClass == 'c-uteis__lnk js-collapse') {

                this.nextElementSibling.className = 'c-uteis__content js-content is-open';

                this.previousSibling.nextSibling.className = 'c-uteis__lnk js-collapse is-active';
                this.previousSibling.nextSibling.setAttribute('aria-expanded', 'true');

                this.nextElementSibling.classList.add(state.animationIn);
            }
        }
    }

    function popupHandler() {

        for (let i = 0; i < popup.length; i++) {

            popup[i].addEventListener('click', popUpOpen, false);
        }


    }

    function popUpOpen(e) {
        e.preventDefault();

        let visible = false;

        if (!visible) {

            for (let i = 0; i < popupContent.length; i++) {

                let content = popupContent[i];

                content.classList.toggle(state.open);
                content.classList.toggle(state.animationIn);

            }
        } else {
            console.log("Error");
        }

    }

    function init() {
        contentHidden()
        toggleHandler()
        popupHandler()

    }

        init();

})()