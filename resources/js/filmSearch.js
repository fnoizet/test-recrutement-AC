class FilmSearch {
    field;
    resultZone;
    timeout;

    constructor() {
        this.field = document.querySelector("#searchField");
        this.resultZone = document.querySelector("#result");

        this.displayMessage('En attente de recherche');

        this.init();
    }

    init() {
        this.field.addEventListener("keyup", (e) => this.search(e));
        this.field.focus();
    }

    search(e) {
        window.clearTimeout(this.timeout);
        this.timeout = window.setTimeout(() => {
            this.bufferedSearch(e.target.value);
        }, 200)
    }

    bufferedSearch(search) {
        this.displayMessage('...');

        if (search !== '') {
            fetch("/api/films/"+search)
                .then((response) => {
                    return response.json();
                }).then((json) => {this.handleSearchResponse(json)})
                .catch((err) => {
                    console.error(err);
                });
        } else {
            this.displayMessage('En attente de recherche');
        }
    }

    handleSearchResponse(response) {
        const films = response.data;
        this.displayResults(films);
    }

    displayMessage(str) {
        this.resultZone.innerHTML = '';
        let noRes = document.createElement('div');
        noRes.innerHTML = str;
        noRes.classList.add('message');
        this.resultZone.appendChild(noRes);
    }

    displayResults(results) {
        let itemLine;
        if (results.length === 0) {
            this.displayMessage("Aucun résultat");
        } else {
            this.resultZone.innerHTML = '';
            results.forEach(item => {
                itemLine = document.createElement('div');
                itemLine.innerHTML = item.title;
                itemLine.classList.add('itemLine');
                itemLine.onclick = () => {
                    document.location.href="/films/"+item.id+"/show"
                };
                this.resultZone.appendChild(itemLine);
            });
        }
    }
}

window.FilmSearch = FilmSearch;