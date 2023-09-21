
document.addEventListener("DOMContentLoaded", function () {
    const characterLinks = document.getElementById("character-links");
    const characterInfo = document.getElementById("character-info");

  
    fetch("https://rickandmortyapi.com/api/character")
        .then((response) => response.json())
        .then((data) => {
            const characters = data.results;


            characters.forEach((character) => {
                const characterCard = document.createElement("div");
                characterCard.className = "card";
                characterCard.style = "width: 18rem;";

                characterCard.innerHTML = `
                    <img src="${character.image}" class="card-img-top" alt="${character.name}">
                    <div class="card-body">
                        <h5 class="card-title">${character.name}</h5>
                        <p class="card-text">Status: ${character.status}</p>
                        <p class="card-text">Species: ${character.species}</p>
                        <p class="card-text">Origin: ${character.origin.name}</p>
                        <p class="card-text">Location: ${character.location.name}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                `;

                characterInfo.appendChild(characterCard);
            });
        })
        .catch((error) => console.error("Error fetching character data: ", error));
});
