const loadingContainer = document.getElementById('loading-container');
const loadingSpinner = document.getElementById('loading-spinner');

loadingContainer.style.display = 'flex';

const totalRotation = 360;
let currentRotation = 0;

const rotateSpinner = () => {
    currentRotation += 10;

    if (currentRotation < totalRotation) {
        loadingSpinner.style.transform = `rotate(${currentRotation}deg)`;
        requestAnimationFrame(rotateSpinner);
    } else {
        loadingSpinner.style.transform = `rotate(${totalRotation}deg)`;
        loadingContainer.innerHTML = '<p>Loaded!</p>';
    }
};

requestAnimationFrame(rotateSpinner);
