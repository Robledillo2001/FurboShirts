
const bulbasaur = {
    name: "Bulbasaur",
    type: "grass",
    ability: {
        "primary": "Overgrow",
        "hidden": "Chlorophyll"
},
stats: {
    hp: 45,
    attack: 49,
    deffense: 59,
    speed: 45
},
moves: [
    "Growl", "Tackle", "Vine Whip", "Razor Leaf"
],
modifiers: {
    "weakness": ["fire", "ice", "flying", "psychic"],
    "resistances": ["water", "grass", "electric", "fighter"]
}
}
const charmander = {
name: "Charmander",
type: "fire",
ability: {
    "primary": "Blaze",
    "hidden": "Solar Power"
},
stats: {
    hp: 39,
    attack: 52,
    deffense: 43,
    speed: 65
},
moves: [
    "Growl", "Scratch", "Flamethrower", "Dragon Breath"
],
modifiers: {
    "weakness": ["water", "ground", "rock"],
    "resistances": ["fire", "ice", "grass", "steal"]
}
}
const squirtle = {
name: "Squirtle",
type: "water",
ability: {
    "primary": "Torrent",
    "hidden": "Rain Dish"
},
stats: {
    hp: 44,
    attack: 48,
    deffense: 50,
    speed: 43
},
moves: [
    "Tackle", "Tail Whip", "Water Gun", "Hydro Pump"
],
modifiers: {
    "weakness": ["electric", "grass"],
    "resistances": ["water", "fire", "ice", "steel"]
}
}
const pikachu = {
name: "Pikachu",
type: "electric",
ability: {
    "primary": "Static",
    "hidden": "Lightning rod"
},
stats: {
    hp: 35,
    attack: 55,
    deffense: 40,
    speed: 90
},
moves: [
    "Quick Attack", "Volt Tackle", "Iron Tail", "Thunderbolt"
],
modifiers: {
    "weakness": ["ground"],
    "resistances": ["electric", "flying", "water", "steel"]
}
}

const getMoves=({moves})=>{
    return moves;
}
console.log(getMoves(pikachu));

const getPrimaryAbility=({ability:{primary}})=>{
return primary;
}
console.log(getPrimaryAbility(pikachu));

const getResistances=({modifiers:{resistances}})=>{
    return resistances;
}
console.log(getResistances(bulbasaur));

const resistsType=({modifiers:{resistances}} , tipo)=>{
    if(resistances.includes(tipo)){
        return true;
    }else{
        return false;
    }
}
const waterMove1 = { name: "Surf", type: "water" };
console.log(resistsType(bulbasaur),waterMove1);

const resistsMove = (pokemon, movimiento) => {
    const { modifiers } = pokemon;
    const { resistances } = modifiers;
    
    const { type } = movimiento;
    return resistances.includes(type);
  };
  const waterMove = { name: "Surf", type: "water" };
  
  console.log(resistsMove(bulbasaur, waterMove));

  const isWeakAgainst=({attacker,attacked})=>{
    const{modifiers}=attacked;
    const{weakness}=modifiers;

    const{type}=attacker;

    return weakness.includes(type);
  }
  const resultado=isWeakAgainst({attacker:pikachu,attacked:squirtle})
  console.log(resultado);

const isStrongAgainst=({attacker,attacked})=>{
    const{modifiers}=attacked;
    const{resistances}=modifiers;

    const{type}=attacker;

    return resistances.includes(type);
}
console.log(isStrongAgainst({attacker:squirtle,attacked:bulbasaur}))

const addAbility=(pokemon,ability)=>{
    const updatedPokemon={...pokemon};
    updatedPokemon.ability={...updatedPokemon.ability, ...ability};
    return updatedPokemon;
}

const newAbility = { secondary: "Discharge" };
const pikachuWithNewAbility = addAbility(pikachu, newAbility);

console.log(pikachuWithNewAbility);

const addMove=(pokemon,move)=>{
    const updatedPokemon = { ...pokemon };
    updatedPokemon.moves = [...updatedPokemon.moves, move];

  return updatedPokemon;
}

const newMove = "Thunder Wave";
const pikachuWithNewMove = addMove(pikachu, newMove);

console.log(pikachuWithNewMove);

const removeMove=(pokemon,moveToRemove)=>{
    const updatedPokemon = { ...pokemon };
    updatedPokemon.moves = updatedPokemon.moves.filter(move => move !== moveToRemove);
    return updatedPokemon;
}

const moveToRemove = "Iron Tail";
const pikachuWithoutMove = removeMove(pikachu, moveToRemove);
console.log(pikachuWithoutMove);


const getAttackModifier = ({ attacker, attacked }) => {
    const { type: attackerType } = attacker;
    const { modifiers: attackedModifiers } = attacked;
  
    if (attackedModifiers.weakness.includes(attackerType)) {
      return 2;
    } else if (attackedModifiers.resistances.includes(attackerType)) {
      return 0.5;
    } else {
      return 1;
    }
  }
  const attackModifier = getAttackModifier({ attacker: pikachu, attacked: squirtle });
  console.log(attackModifier);

  const getAttackLog = ({ attacker, attacked, move, damage, modifier }) => {
    let message = `${attacker} used ${move}! ${attacked} lost ${damage} HP!`;
  
    if (modifier == "weak") {
      message += " It's super effective!";
    } else if (modifier == "resistant") {
      message += " It's not very effective!";
    }
  
    return message;
  }
  
  // Ejemplo de uso:
  const attackLog = {
    attacker: "Squirtle",
    attacked: "Pikachu",
    move: "Water Gun",
    damage: 5,
    modifier: "resistant"
  };
  
  const logMessage = getAttackLog(attackLog);
  console.log(logMessage);
  
  
  const calculateDamage = ({ attack, defense, modifier }) => {
    const damage = 0.5 * (attack / defense) * modifier;
    return damage;
  }
  
  // Ejemplo de uso:
  const damageInfo = {
    attack: 60,
    defense: 30,
    modifier: 2
  };
  
  const calculatedDamage = calculateDamage(damageInfo);
  console.log(`Daño causado: ${calculatedDamage}`);
  
  const getRandomMove = (moves) => {
    const randomIndex = Math.floor(Math.random() * moves.length);
    return moves[randomIndex];
  };
  
  const battle = (pokemon1, pokemon2) => {
    const result = {
      rounds: 0,
      results: {
        winner: null,
        loser: null,
      },
      history: [],
    };
  
    while (pokemon1.stats.hp > 0 && pokemon2.stats.hp > 0) {
      result.rounds++;
  
      // Determinar cuál Pokémon ataca primero según su velocidad
      const firstAttacker = pokemon1.stats.speed > pokemon2.stats.speed ? pokemon1 : pokemon2;
      const secondAttacker = firstAttacker === pokemon1 ? pokemon2 : pokemon1;
  
      // Seleccionar un movimiento aleatorio para cada Pokémon
      const move1 = getRandomMove(firstAttacker.moves);
      const move2 = getRandomMove(secondAttacker.moves);
  
      // Calcular el daño para cada ataque
      const damage1 = calculateDamage({
        attack: firstAttacker.stats.attack,
        defense: secondAttacker.stats.deffense,
        modifier: getAttackModifier({ attacker: firstAttacker, attacked: secondAttacker }),
      });
  
      const damage2 = calculateDamage({
        attack: secondAttacker.stats.attack,
        defense: firstAttacker.stats.deffense,
        modifier: getAttackModifier({ attacker: secondAttacker, attacked: firstAttacker }),
      });
  
      // Restar el daño a los puntos de vida (hp) de los Pokémon atacados
      secondAttacker.stats.hp -= damage1;
      firstAttacker.stats.hp -= damage2;
  
      // Registrar el ataque en el historial
      result.history.push(getAttackLog({
        attacker: firstAttacker.name,
        attacked: secondAttacker.name,
        move: move1,
        damage: damage1,
        modifier: damage1 > 1 ? "weak" : damage1 < 1 ? "resistant" : "normal",
      }));
  
      result.history.push(getAttackLog({
        attacker: secondAttacker.name,
        attacked: firstAttacker.name,
        move: move2,
        damage: damage2,
        modifier: damage2 > 1 ? "weak" : damage2 < 1 ? "resistant" : "normal",
      }));
    }
  
    // Determinar al ganador y perdedor
    if (pokemon1.stats.hp <= 0) {
      result.results.winner = pokemon2;
      result.results.loser = pokemon1;
    } else {
      result.results.winner = pokemon1;
      result.results.loser = pokemon2;
    }
  
    return result;
  }

  const battleResult = battle(squirtle, pikachu);
  console.log(battleResult);

