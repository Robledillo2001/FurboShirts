// Definición del objeto Pikachu
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
};

// Definición del objeto Bulbasaur
const bulbasaur = {
    name: "Bulbasaur",
    type: "grass",
    ability: {
        primary: "Overgrow",
        hidden: "Chlorophyll"
    },
    stats: {
        hp: 45,
        attack: 49,
        defense: 59,
        speed: 45
    },
    moves: [
        "Growl", "Tackle", "Vine Whip", "Razor Leaf"
    ],
    modifiers: {
        weakness: ["fire", "ice", "flying", "psychic"],
        resistances: ["water", "grass", "electric", "fighting"]
    }
};

// Definición del objeto Charmander
const charmander = {
    name: "Charmander",
    type: "fire",
    ability: {
        primary: "Blaze",
        hidden: "Solar Power"
    },
    stats: {
        hp: 39,
        attack: 52,
        defense: 43,
        speed: 65
    },
    moves: [
        "Growl", "Scratch", "Flamethrower", "Dragon Breath"
    ],
    modifiers: {
        weakness: ["water", "ground", "rock"],
        resistances: ["fire", "ice", "grass", "steel"]
    }
};

// Definición del objeto Squirtle
const squirtle = {
    name: "Squirtle",
    type: "water",
    ability: {
        primary: "Torrent",
        hidden: "Rain Dish"
    },
    stats: {
        hp: 44,
        attack: 48,
        defense: 50,
        speed: 43
    },
    moves: [
        "Tackle", "Tail Whip", "Water Gun", "Hydro Pump"
    ],
    modifiers: {
        weakness: ["electric", "grass"],
        resistances: ["water", "fire", "ice", "steel"]
    }
};

// Función para obtener los movimientos de un Pokémon
function getMoves({ name, moves }) {
    return `Movimientos de ${name}:\n ${moves.join(",")}`;
}
console.log(getMoves(pikachu));

// Función para obtener la habilidad primaria
function getPrimaryAbility({ name, ability: { primary } }) {
    return `La habilidad primaria de ${name} es:\n ${primary}`;
}
console.log(getPrimaryAbility(pikachu));

// Función para obtener las debilidades
function getWeeknesses({ name, modifiers: { weakness } }) {
    return `Las debilidades de ${name} son:\n ${weakness}`;
}
console.log(getWeeknesses(pikachu));

// Función para obtener las resistencias
function getResistances({ name, modifiers: { resistances } }) {
    return `Las resistencias de ${name} son:\n ${resistances}`;
}
console.log(getResistances(pikachu));

// Función para verificar si resiste un tipo
function resistsType({ name, modifiers: { resistances } }, { type }) {
    return resistances.includes(type) ? "Soporta el tipo" : "No soporta el tipo";
}
const waterMove1 = { name: "Surf", type: "water" };
console.log(resistsType(pikachu, waterMove1));

// Función para verificar si resiste un movimiento
function resistsMove({ name, modifiers: { resistances } }, move) {
    const { type } = move;
    return resistances.includes(type);
}
console.log(resistsMove(pikachu, waterMove1));

// Función para verificar debilidades entre Pokémon
function isWeakAgainst(pokemon1, pokemon2) {
    const { name: name1, type: type1 } = pokemon1;
    const { name: name2, modifiers: { weakness } } = pokemon2;
    return weakness.includes(type1) ? `${name1} es débil contra ${name2}` : `${name1} no es débil contra ${name2}`;
}
console.log(isWeakAgainst(pikachu, charmander));

// Función para verificar fortalezas entre Pokémon
function isStrongAgainst(pokemon1, pokemon2) {
    const { name: name1, type: type1 } = pokemon1;
    const { name: name2, modifiers: { resistances } } = pokemon2;
    return resistances.includes(type1) ? `${name1} es fuerte contra ${name2}` : `${name1} no es fuerte contra ${name2}`;
}
console.log(isStrongAgainst(pikachu, bulbasaur));

// Función para añadir una habilidad (pendiente de implementación)
function addAbility(pokemon, ability) {
    const { newAbility } = ability; // Extrae la nueva habilidad del objeto recibido

    // Verifica si la habilidad ya existe
    if (pokemon.ability.primary === newAbility || pokemon.ability.hidden === newAbility) {
        return `La habilidad "${newAbility}" ya existe en ${pokemon.name}`;
    }

    // Agrega la nueva habilidad como una propiedad adicional
    pokemon.ability.extra = newAbility;
    return `Se ha añadido la habilidad "${newAbility}" a ${pokemon.name}`;
}

const abilidad = { newAbility: "Defensa ferrea" };
console.log(addAbility(pikachu, abilidad));
//Funcion para añadir un movimiento
function addMove(pokemon,move){
    //Verificar que existe el movimiento
    if(pokemon.moves.includes(move)){
        return `El movimiento "${move}" ya existe en ${pokemon.name}.`;
    }

    pokemon.moves.push(move);
    return `Se ha añadido ${move} a ${pokemon.name}`;
}
const movimiento="Electro Ball";
console.log(addMove(pikachu,movimiento),pikachu.moves);
//Funcion para remover Movimientos
function removeMove(pokemon,move){
    //Verificar que existe el movimiento
    let index=pokemon.moves.indexOf(move);
    if(index!==-1){
        pokemon.moves.splice(index,1);
        return `Se ha eliminado ${move} a ${pokemon.name}`;
    }

    return `El movimiento "${move}" no existe en ${pokemon.name}.`;
}
console.log(removeMove(pikachu,movimiento),pikachu.moves);
//Funcion ataque modificado
function getAttackModifier({ attacker, attacked }) {
    const { type: attackerType } = attacker;
    const { modifiers: { weakness, resistances } } = attacked;

    // Verificar si el pokémon atacado es débil contra el tipo del atacante
    if (weakness.includes(attackerType)) {
        return 2;
    }

    // Verificar si el pokémon atacado es resistente contra el tipo del atacante
    if (resistances.includes(attackerType)) {
        return 0.5;
    }

    // Si no es débil ni resistente, devolver 1
    return 1;
}

// Pruebas
console.log(getAttackModifier({ attacker: pikachu, attacked: charmander })); // 1
console.log(getAttackModifier({ attacker: pikachu, attacked: squirtle }));   // 0.5
console.log(getAttackModifier({ attacker: charmander, attacked: bulbasaur })); // 2
//Funcion attack log
function getAttackLog({ attacker, attacked, move, damage, modifier }) {
    // Mensaje base
    let log = `${attacker} used ${move}! ${attacked} lost ${damage} HP!`;

    // Añadir el mensaje adicional dependiendo del modificador
    if (modifier === "weak") {
        log += " It's super effective!";
    } else if (modifier === "resistant") {
        log += " It's not very effective!";
    }

    return log;
}

// Pruebas
console.log(getAttackLog({
    attacker: "Squirtle",
    attacked: "Pikachu",
    move: "Water Gun",
    damage: 12,
    modifier: "normal"
}));
// "Squirtle used Water Gun! Pikachu lost 12 HP!"

console.log(getAttackLog({
    attacker: "Pikachu",
    attacked: "Squirtle",
    move: "Thunderbolt",
    damage: 24,
    modifier: "weak"
}));
// "Pikachu used Thunderbolt! Squirtle lost 24 HP! It's super effective!"

console.log(getAttackLog({
    attacker: "Charmander",
    attacked: "Squirtle",
    move: "Flamethrower",
    damage: 5,
    modifier: "resistant"
}));
// "Charmander used Flamethrower! Squirtle lost 5 HP! It's not very effective!"
//Funcion para calcular daño
function calculateDamage({ attack, defense, modifier }) {
    // Fórmula de cálculo de daño
    const damage = 0.5 * attack * (attack / defense) * modifier;

    // Redondear a un número entero (opcional)
    return Math.round(damage);
}

// Pruebas
console.log(calculateDamage({ attack: 50, defense: 30, modifier: 2 })); // Daño mayor (super efectivo)
console.log(calculateDamage({ attack: 50, defense: 30, modifier: 0.5 })); // Daño reducido (resistente)
console.log(calculateDamage({ attack: 50, defense: 30, modifier: 1 })); // Daño normal
//Funcion para batallas pokemonas
function battle(pokemon1, pokemon2) {
    // Determinar el orden de ataque según la velocidad
    let attacker = pokemon1.stats.speed >= pokemon2.stats.speed ? pokemon1 : pokemon2;
    let defender = attacker === pokemon1 ? pokemon2 : pokemon1;

    // Inicializar variables
    let rounds = 0;
    let history = [];

    while (attacker.stats.hp > 0 && defender.stats.hp > 0) {
        // Elegir un movimiento aleatorio para el atacante
        const move = attacker.moves[Math.floor(Math.random() * attacker.moves.length)];

        // Calcular el modificador
        const modifier = getAttackModifier({ attacker, attacked: defender });

        // Calcular el daño
        const damage = calculateDamage({
            attack: attacker.stats.attack,
            defense: defender.stats.defense,
            modifier,
        });

        // Reducir HP del defensor
        defender.stats.hp -= damage;

        // Guardar el log del ataque
        const modifierType = modifier === 2 ? "weak" : modifier === 0.5 ? "resistant" : "normal";
        history.push(
            getAttackLog({
                attacker: attacker.name,
                attacked: defender.name,
                move,
                damage,
                modifier: modifierType,
            })
        );

        // Incrementar el número de rondas
        rounds++;

        // Si el defensor quedó sin HP, termina la batalla
        if (defender.stats.hp <= 0) break;

        // Intercambiar roles: el defensor se convierte en el atacante y viceversa
        [attacker, defender] = [defender, attacker];
    }

    // Determinar el resultado
    const winner = attacker.stats.hp > 0 ? attacker : defender;
    const losser = winner === attacker ? defender : attacker;

    return {
        rounds,
        results: {
            winner: { name: winner.name, hp: Math.max(winner.stats.hp, 0) },
            losser: { name: losser.name, hp: Math.max(losser.stats.hp, 0) },
        },
        history,
    };
}console.log(battle(pikachu, squirtle));
