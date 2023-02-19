class Typer {
    constructor() {
        this.minSpeed = 20;
        this.maxSpeed = 50;
        this.fadeSpeed = 300;

        this.typers = document.querySelectorAll('.js-typer');

        this.initTypers();
    }

    async initTypers() {
        for (const typer of this.typers) {
            await this.initTyper(typer);
        };
    }

    async initTyper(typer) {
        return new Promise((resolve) => {
            const texts = typer.querySelectorAll('.js-typer-text');
            
            setTimeout(async () => {
                typer.classList.add('active');
                for (const elem of texts) {
                    await this.setChars(elem);
                };
                resolve();
            }, this.fadeSpeed);
        });

    }

    async setChars (elem) {
        let text = elem.dataset.text;

        if (elem.dataset.type && elem.dataset.type == 'string') {
            text = '"' + text + '"';
        }

        for (let i = 0; i < text.length; i++) {
            const promise = new Promise((resolve) => {
                setTimeout(() => {
                    elem.textContent += text.charAt(i);
                    resolve();
                }, getRandom(this.minSpeed, this.maxSpeed));
            });
            await promise;
        }
    }
}