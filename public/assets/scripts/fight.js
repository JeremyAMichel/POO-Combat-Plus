let heroHealth = document.querySelector("#hero-health");
let heroHealthBar = document.querySelector("#hero-healthBar");

let monsterHealth = document.querySelector("#monster-health");
let monsterHealthBar = document.querySelector("#monster-healthBar");

let heroAttack = document.querySelector("#attack");

// console.log(heroHealth, heroHealtBar, monsterHealth, monsterHealthBar, heroAttack);
// console.log(heroHealth);
// console.log(heroHealthBar);
// console.log(monsterHealth);
// console.log(monsterHealthBar);
// console.log(heroAttack);

heroAttack.addEventListener("click", handleClickAttack);

function handleClickAttack(event) {
  // Empeche d'attaquer si l'un des deux est déjà mort
  if (heroHealth.textContent <= 0 || monsterHealth.textContent <= 0) {
    heroAttack.removeEventListener("click", handleClickAttack);
    return;
  }

  fetch("/process/fight-process.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ action: "attack" }),
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data.message);

      updateHealthBars(data.state);

      if (data.action === "victory") {
        heroAttack.removeEventListener("click", handleClickAttack);
        displayVictory();
      }

      if (data.action === "defeat") {
        heroAttack.removeEventListener("click", handleClickAttack);
        displayDefeat();
      }
    })
    .catch((error) => console.error("Error:", error));
}

function updateHealthBars(state) {
  heroHealth.textContent = state.hero.health;
  heroHealthBar.style.width = `${state.hero.healthBar}%`;

  monsterHealth.textContent = state.monster.health;
  monsterHealthBar.style.width = `${state.monster.healthBar}%`;
}

function hideFightScreen() {
  let fightScreen = document.querySelector("#fight-screen");
  document.querySelector("h1").classList.add("hidden");
  fightScreen.classList.add("hidden");
  heroAttack.classList.add("hidden");
}

function displayVictory() {
  hideFightScreen();
  let fight = document.querySelector("#fight");

  let victoryDiv = document.createElement("div");
  victoryDiv.classList.add(
    "flex",
    "items-center",
    "justify-center",
    "flex-col",
    "relative"
  );

  let victoryImg = document.createElement("img");
  victoryImg.src = "./assets/imgs/victory.png";
  victoryImg.alt = "victory";
  victoryImg.classList.add("w-1/2");

  let continueButton = document.createElement("button");
  continueButton.classList.add(
    "bg-red-500",
    "text-white",
    "px-4",
    "py-2",
    "rounded",
    "hover:bg-red-700",
    "transition",
    "duration-300",
    "mt-4",
    "absolute",
    "bottom-32"
  );
  continueButton.textContent = "Continue";
  continueButton.onclick = function () {
    window.location.href = "/public/choice-hero.php";
  };

  victoryDiv.appendChild(victoryImg);
  victoryDiv.appendChild(continueButton);

  fight.appendChild(victoryDiv);
}

function displayDefeat() {
  hideFightScreen();
  let fight = document.querySelector("#fight");

  let defeatDiv = document.createElement("div");
  defeatDiv.classList.add(
    "flex",
    "items-center",
    "justify-center",
    "flex-col",
    "relative"
  );

  let defeatImg = document.createElement("img");
  defeatImg.src = "./assets/imgs/defeat.webp";
  defeatImg.alt = "defeat";
  defeatImg.classList.add("w-1/2");

  let continueButton = document.createElement("button");
  continueButton.classList.add(
    "bg-red-500",
    "text-white",
    "px-4",
    "py-2",
    "rounded",
    "hover:bg-red-700",
    "transition",
    "duration-300",
    "mt-4",
    "absolute",
    "bottom-56"
  );
  continueButton.textContent = "Continue";
  continueButton.onclick = function () {
    window.location.href = "/public/choice-hero.php";
  };

  defeatDiv.appendChild(defeatImg);
  defeatDiv.appendChild(continueButton);

  fight.appendChild(defeatDiv);
}
