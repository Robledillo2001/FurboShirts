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
        defense: 59, // ✅ Corrección de "deffense" -> "defense"
        speed: 45
    },
    moves: ["Growl", "Tackle", "Vine Whip", "Razor Leaf"],
    modifiers: {
        weakness: ["fire", "ice", "flying", "psychic"], // ✅ Separación de "fire" y "ice"
        resistances: ["water", "grass", "electric", "fighting"] // ✅ "fighter" -> "fighting"
    }
}

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
        defense: 43, // ✅ Corrección de "deffense" -> "defense"
        speed: 65
    },
    moves: ["Growl", "Scratch", "Flamethrower", "Dragon Breath"],
    modifiers: {
        weakness: ["water", "ground", "rock"],
        resistances: ["fire", "ice", "grass", "steel"] // ✅ Corrección de "steal" -> "steel"
    }
}

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
        defense: 50, // ✅ Corrección de "deffense" -> "defense"
        speed: 43
    },
    moves: ["Tackle", "Tail Whip", "Water Gun", "Hydro Pump"],
    modifiers: {
        weakness: ["electric", "grass"],
        resistances: ["water", "fire", "ice", "steel"]
    }
}

const pikachu = {
    name: "Pikachu",
    type: "electric",
    ability: {
        primary: "Static",
        hidden: "Lightning Rod" // ✅ Capitalización corregida
    },
    stats: {
        hp: 35,
        attack: 55,
        defense: 40, // ✅ Corrección de "deffense" -> "defense"
        speed: 90
    },
    moves: ["Quick Attack", "Volt Tackle", "Iron Tail", "Thunderbolt"],
    modifiers: {
        weakness: ["ground"],
        resistances: ["electric", "flying", "water", "steel"]
    }
}


function getMoves({name,moves}){
    return`Movimientos de ${name}->${moves.join(" ,")}`
}
console.log(getMoves(pikachu));

function getPrimaryAbility({name, ability:{primary}}){
    return `Habilidad primaria de ${name}: ${primary}`
}
console.log(getPrimaryAbility(pikachu));

function getWeaknesses({name, modifiers:{weakness}}){
    return `Debilidades de ${name}: ${weakness}`
}
console.log(getWeaknesses(squirtle))

function getResistances({name, modifiers:{resistances}}){
    return `Resistencias de ${name}: ${resistances}`
}
console.log(getResistances(pikachu))

function resistsType({name, modifiers:{weakness}},{type}){
    if(weakness.includes(type)){
        return `${name} soporta el tipo ${type}`
    }else{
        return `${name} no soporta el tipo ${type}`
    }
}
console.log(resistsType(pikachu,charmander))

function resistMove({name,modifiers:{resistances}},move){
    const {type}=move;
    if(resistances.includes(type)){
        return`El ataque ${type} a ${name} lo resiste`
    }else{
        return`El atatque ${type} a ${name} no lo resiste`
    }
}
let move={name: "Surf", type: "water" }
console.log(resistMove(pikachu,move))

function isWeakAgainst({ name: pokemon1, modifiers: { weakness } }, { name: pokemon2, type }) {
    if (weakness.includes(type)) {
        return `${pokemon1} es débil contra ${pokemon2}`;
    } else {
        return `${pokemon1} no es débil contra ${pokemon2}`;
    }
}

console.log(isWeakAgainst(pikachu, squirtle));

function isStrongAgainst({ name: pokemon1, modifiers: { resistances } }, { name: pokemon2, type }) {
    if (resistances.includes(type)) {
        return `${pokemon1} es fuerte contra ${pokemon2}`;
    } else {
        return `${pokemon1} no es fuerte contra ${pokemon2}`;
    }
}

console.log(isStrongAgainst(pikachu, squirtle));

function addAbility({ name, ability }, newAbility) {
    // Si la nueva habilidad ya existe, no se agrega
    if (ability.primary === newAbility || ability.hidden === newAbility) {
        return `No se puede agregar la habilidad "${newAbility}" porque ya existe en ${name}`;
    } else {
        ability.extra=newAbility;
        return `Habilidad añadida: ${ability.extra} a ${name}`;
    }
}

// Prueba con Pikachu
const habilidad = "Destello"; 
console.log(addAbility(pikachu, habilidad));

function addMove({name,moves},newmove){
    if(moves.includes(newmove)){
        return`El movimiento ya existe`
    }else{
        moves.push(newmove)
        return `${newmove} anadido a ${name}
        ${moves.join(", ")}`
    }
}

console.log(addMove(pikachu,"Doble apariencia"))

function removeMove({name,moves},move){
    if(moves.includes(move)){
        let index=moves.indexOf(move)
        if(index!==-1){
            moves.splice(index,1)
        }
    }
    return `Elemento ${move} eliminado de ${name}
    ${moves.join(", ")}`
}
console.log(removeMove(pikachu,"Quick Attack"))

function getAttackModifier(attacker, attacked) {
    if (attacked.modifiers.weakness.includes(attacker.type)) {
        return `El Pokémon ${attacked.name} es débil frente a ${attacker.name}`;
    } else if (attacked.modifiers.resistances.includes(attacker.type)) {
        return `El Pokémon ${attacked.name} es resistente frente a ${attacker.name}`;
    } else {
        return `El Pokémon ${attacked.name} no es ni débil ni resistente frente a ${attacker.name}`;
    }
}

console.log(getAttackModifier(pikachu,bulbasaur))

function getAttackLog(attacker, attacked) {
    const { name: atacante, type: tipo, moves, stats: { attack } } = attacker;
    const { name: atacado, stats: { defense, hp }, modifiers } = attacked;

    const move = moves[Math.floor(Math.random() * moves.length)]; // Movimiento aleatorio

    let modifier = 1; // Modificador base
    if (modifiers.weakness.includes(tipo)) {
        modifier = 2; // Súper efectivo
    } else if (modifiers.resistances.includes(tipo)) {
        modifier = 0.5; // Poco efectivo
    }

    // Calcular daño con la fórmula correcta
    let damage = calculateDamage(attack, defense, modifier);
    attacked.stats.hp -= damage; // Reducimos la vida del Pokémon atacado

    // Construcción del mensaje
    let log = `${atacante} used ${move}! ${atacado} lost ${damage} HP!`;

    if (modifier === 2) {
        log += " It's super effective!";
    } else if (modifier === 0.5) {
        log += " It's not very effective!";
    }

    return log;
}

// Función para calcular el daño correctamente
function calculateDamage(attack, defense, modifier) {
    return Math.round(0.5 * attack * (attack / defense) * modifier);
}

// Ejemplo de uso
console.log(getAttackLog(pikachu, squirtle));
console.log(getAttackLog(charmander, bulbasaur));
console.log(getAttackLog(bulbasaur, charmander));

function battle(pokemon1, pokemon2) {
    let rounds = 0;
    let history = [];

    // Clonar los Pokémon para evitar modificar los objetos originales
    let p1 = JSON.parse(JSON.stringify(pokemon1));
    let p2 = JSON.parse(JSON.stringify(pokemon2));

    // Determinar quién ataca primero según la velocidad
    let [attacker, defender] = p1.stats.speed >= p2.stats.speed ? [p1, p2] : [p2, p1];

    while (attacker.stats.hp > 0 && defender.stats.hp > 0) {
        rounds++;

        // Turno del atacante
        history.push(getAttackLog(attacker, defender));

        // Verificar si el defensor ha sido derrotado
        if (defender.stats.hp <= 0) break;

        // Intercambiar roles: el defensor ahora ataca
        [attacker, defender] = [defender, attacker];
    }

    // Determinar el ganador y el perdedor
    const winner = attacker.stats.hp > 0 ? attacker : defender;
    const loser = attacker.stats.hp <= 0 ? attacker : defender;

    return `🏆 Batalla Pokémon Finalizada 🏆\n` +
           `--------------------------------\n` +
           `📜 Historial de batalla:\n${history.join(", ")}\n\n` +
           `🎉 Ganador: ${winner.name} 🏅\n` +
           `💖 HP restante: ${winner.stats.hp}\n\n` +
           `💀 Perdedor: ${loser.name} 😢\n`;
}

// Simulación de batalla
console.log(battle(pikachu, squirtle));

