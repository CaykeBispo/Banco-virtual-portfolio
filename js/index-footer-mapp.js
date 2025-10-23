"use strict";

(function () {
    let maisBradescoAPI = 'js/sitemap.json';
    $.getJSON(maisBradescoAPI, {
            tags: "Mais Bradesco",
            tagMode: "any",
            format: "json"
        })
        .done(function (data) {

            let nav = document.querySelector(".js-acc-map");

            data.forEach(function (letters) {

                let div = document.createElement("div");
                div.setAttribute("class", "c-map__item");

                let h3 = document.createElement("h3");

                let ul = document.createElement("ul");
                h3.innerHTML = letters.letters;

                let links = letters.links;
                links.forEach(function (links) {

                    let li = document.createElement("li");
                    let a = document.createElement("a");

                    a.innerHTML = links.text;
                    a.setAttribute("href", links.url);
                    a.setAttribute("title", links.title);
                    a.setAttribute("onclick", links.track)
                    a.setAttribute("target", "_blank");
                    a.setAttribute("rel", "noopener");

                    ul.appendChild(li);
                    li.appendChild(a);
                })

                div.appendChild(h3);
                div.appendChild(ul);

                if(nav !== null) {
                    nav.appendChild(div);
                }

            })

        })
        .fail(function () {
            console.log("error");
        })
        .always(function () {
            console.log("map complete");
        })
})();