let heroHealth = document.querySelector('#hero-health');
let heroHealthBar = document.querySelector('#hero-healthBar');

let monsterHealth = document.querySelector('#monster-health');
let monsterHealthBar = document.querySelector('#monster-healthBar');

let heroAttack = document.querySelector('#attack');

// console.log(heroHealth, heroHealtBar, monsterHealth, monsterHealthBar, heroAttack);
// console.log(heroHealth);
// console.log(heroHealthBar);
// console.log(monsterHealth);
// console.log(monsterHealthBar);
// console.log(heroAttack);

heroAttack.addEventListener('click', handleClickAttack);



function handleClickAttack(event) {
    fetch('/process/fight-process.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ action: 'attack' })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data.message);
        updateHealthBars(data.state);
    })
    .catch(error => console.error('Error:', error));
    
}

function updateHealthBars(state) {
    heroHealth.textContent = state.hero.health;
    heroHealthBar.style.width = `${state.hero.healthBar}%`;

    monsterHealth.textContent = state.monster.health;
    monsterHealthBar.style.width = `${state.monster.healthBar}%`;
}