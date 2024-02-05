<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mca12.css">
    <title>MCA</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <header id="ham">
        <nav>
            <img class="mcalogo" src="./img/logo.gif" alt="">
            <img id="bt-fechar" src="./img/bt-fechar.png" alt="">
            <img id="bt-hamburguer" src="./img/bt-hamburguer.png" alt="">
            <ul class="menu-principal">
                <lu>Home</lu>
                <lu>Sobre</lu>
                <lu><a href="">Celulas</a></lu>
                <lu><a href="form.php">Cadastro</a></lu>
            </ul>
        </nav>
    </header>

    <div>
        <select id="localSelect" name="opcoes">
            <option value="">Escolha um bairro</option>
            <option value="silveira">Jardim Silveira</option>
            <option value="imperial">Parque Imperial</option>
            <option value="reginalice">Reginalice</option>
            <option value="tupanci">Tupanci</option>

        </select>
    </div>

    <div id="conteudoPlaceholder"></div>

    <script>
   
document.getElementById('localSelect').addEventListener('change', async function() {
    var valor = this.value;
    var divConteudo = document.getElementById('conteudoPlaceholder');

    // Limpar conteúdo anterior
    divConteudo.innerHTML = '';

    // Verificar se um valor foi selecionado
    if (valor) {
        // URL da página da qual você quer extrair o conteúdo
        var urlDaPagina = 'celulas2.php'; // Não precisa adicionar valor se você vai buscar o documento inteiro

        try {
            // Fazendo a requisição para a página
            const resposta = await fetch(urlDaPagina);
            const texto = await resposta.text();
            
            // Convertendo o texto para um elemento HTML
            const html = new DOMParser().parseFromString(texto, 'text/html');
            
            // Selecionando o conteúdo específico que você quer da página
            const conteudoEspecifico = html.getElementById(valor); // Ex: silveira, imperial, reginalice
            
            // Verificando se o conteúdo foi encontrado
            if(conteudoEspecifico) {
                // Adicionando o conteúdo ao divConteudo
                divConteudo.innerHTML = conteudoEspecifico.outerHTML;
            } else {
                divConteudo.innerHTML = 'Conteúdo não encontrado.';
            }
        } catch (erro) {
            console.error('Houve um erro ao buscar a página:', erro);
            divConteudo.innerHTML = 'Não foi possível carregar o conteúdo.';
        }
    }
});
</script>

    

    <script src="./JS/menu-hamburguer.js"></script>
</body>
</html>
