class Carrinho {


    constructor() {
        this.body = document.body;
        this.arquivoJson = '';
    }

    mostrarCarrinho = () => {
        const style = document.createElement('style');
        style.innerHTML = this.estiloCarrinho();
        document.head.appendChild(style);

        const escurecerTela = document.createElement('div');
        escurecerTela.setAttribute('id', 'escurecerTela');
        this.body.prepend(escurecerTela);

        const divConteudo = document.createElement('div');
        divConteudo.setAttribute('id', 'divConteudo');
        divConteudo.innerHTML = "";
        this.pegaDadosEmJSON()
            .then(res => {
                res.itens.forEach(element => {
                    divConteudo.innerHTML += `<div>${(JSON.stringify(element))}</div><br>`;
                });
            });

        escurecerTela.prepend(divConteudo);



        const divBotoes = document.createElement('div');
        divBotoes.setAttribute('id', 'divBotoes');
        escurecerTela.appendChild(divBotoes);

        const btn = document.createElement('button');
        btn.setAttribute('class', 'btn btn-primary');
        btn.innerHTML = `OK`;
        btn.addEventListener('click', () => { this.ocultarCarrinho() });
        divBotoes.appendChild(btn);
    }


    ocultarCarrinho = () => {
        document.getElementById('escurecerTela').remove();
    }

    estiloCarrinho = () => {
        const estilo = `
    #escurecerTela {display: flex;justify-content: center;align-items: center;flex-direction: column;position: absolute;top: 0;left: 0; width: 100%;height: 100vh;background-color: rgba(0, 0, 0, 0.7);}
    #divConteudo { color:white; padding: 20px; width: 50%; height: 40%; display: flex; justify-content: center; align-items: center; background-color: #1b1e23; border-radius: 10px 15px 0px 0px; overflow-y: scroll; overflow-x: hidden; flex-flow: column; }
    #divBotoes {width: 50%;height: 10%;display: flex;justify-content: center;align-items: center;background-color: #ccc;border-radius: 0px 0px 10px 10px;}
    `;

        return estilo;
    }


    pegaDadosEmJSON = async () => {
        const $res = (await fetch(`../pessoa/config_carrinho.php`)).json();
        return await $res;
    }
}

export { Carrinho };

















// .addEventListener('click', mostrarCarrinho)