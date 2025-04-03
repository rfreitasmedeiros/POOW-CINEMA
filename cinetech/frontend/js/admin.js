async function cadastrarFilme() {
    const titulo = document.getElementById("titulo").value;
    const descricao = document.getElementById("descricao").value;
    const capa = document.getElementById("capa").value;
    const trailer = document.getElementById("trailer").value;
    const data_lancamento = document.getElementById("data_lancamento").value;
    const duracao = document.getElementById("duracao").value;

    const filme = { titulo, descricao, capa, trailer, data_lancamento, duracao };
    
    await fetch("backend/controllers/FilmeController.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(filme)
    });
    
    alert("Filme cadastrado com sucesso!");
}

async function cadastrarGenero() {
    const nome = document.getElementById("nome-genero").value;
    const descricao = document.getElementById("descricao-genero").value;

    const genero = { nome, descricao };
    
    await fetch("backend/controllers/GeneroController.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(genero)
    });
    
    alert("Gênero cadastrado com sucesso!");
}
