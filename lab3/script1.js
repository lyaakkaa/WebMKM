
document.addEventListener("DOMContentLoaded", function () {
    const episodeList = document.getElementById("episode-list");
    const episodePlayer = document.getElementById("episode-player");


    fetch("https://rickandmortyapi.com/api/episode")
        .then((response) => response.json())
        .then((data) => {
            const episodes = data.results;

    
            episodes.forEach((episode) => {
                const episodeLink = document.createElement("a");
                episodeLink.href = "#";
                episodeLink.textContent = `${episode.episode} - ${episode.name}, `;
                episodeLink.addEventListener("click", () => {
                    playEpisode(episode);
                });
                episodeList.appendChild(episodeLink);
            });
        })
        .catch((error) => console.error("Error fetching episode data: ", error));


    function playEpisode(episode) {
        episodePlayer.innerHTML = `
            <h2>${episode.name}</h2>
            <p>Episode: ${episode.episode}</p>
            <p>Air Date: ${episode.air_date}</p>
            <video controls width="320">
                <source src="${episode.url}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        `;
    }
});
