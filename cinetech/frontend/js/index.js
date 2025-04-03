document.addEventListener("DOMContentLoaded", function () {
    fetchFilmes();
    fetchGeneros();

    document.getElementById("search").addEventListener("input", filterMovies);
    document.getElementById("genreFilter").addEventListener("change", filterMovies);
});

async function fetchFilmes() {
    const response = await fetch("backend/controllers/FilmeController.php");
    const filmes = await response.json();
    displayMovies(filmes);
}

async function fetchGeneros() {
    const response = await fetch("backend/controllers/GeneroController.php");
    const generos = await response.json();
    const genreFilter = document.getElementById("genreFilter");

    generos.forEach(genero => {
        let option = document.createElement("option");
        option.value = genero.id;
        option.textContent = genero.nome;
        genreFilter.appendChild(option);
    });
}

function displayMovies(filmes) {
    const movieSection = document.getElementById("movies");
    movieSection.innerHTML = "";
    
    filmes.forEach(filme => {
        const movieCard = document.createElement("div");
        movieCard.classList.add("movie-card");
        movieCard.innerHTML = `
            <img src="${filme.capa}" alt="${filme.titulo}">
            <h3>${filme.titulo}</h3>
            <p>${filme.descricao}</p>
            <a href="${filme.trailer}" target="_blank">Ver Trailer</a>
        `;
        movieSection.appendChild(movieCard);
    });
}

function filterMovies() {
    const searchTerm = document.getElementById("search").value.toLowerCase();
    const selectedGenre = document.getElementById("genreFilter").value;
    
    fetch("backend/controllers/FilmeController.php")
        .then(response => response.json())
        .then(filmes => {
            let filteredMovies = filmes.filter(filme =>
                filme.titulo.toLowerCase().includes(searchTerm) &&
                (selectedGenre === "" || filme.genero_id == selectedGenre)
            );
            displayMovies(filteredMovies);
        });
}