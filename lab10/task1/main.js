const loadingContainer = document.getElementById('loading-container');
loadingContainer.style.display = 'flex';

const updateInterval = 100; 
let rotation = 0;

setInterval(() => {
    rotation += 10;
    document.getElementById('loading-spinner').style.transform = `rotate(${rotation}deg)`;
}, updateInterval);