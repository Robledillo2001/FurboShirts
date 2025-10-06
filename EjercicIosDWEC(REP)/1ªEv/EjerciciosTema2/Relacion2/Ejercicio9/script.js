let kg = parseFloat(prompt("Elige una cantidad de peso en KG"));

if (isNaN(kg)) {
    alert("Por favor, ingrese un número válido para el peso.");
} else {
    let unidad = prompt("Elige una unidad (miligramos, decigramos, gramos, decagramos, hectogramos, toneladas)").toLowerCase();
    let resultado;

    switch (unidad) {
        case "miligramos":
            resultado = kg * 1e6; // 1 Kg = 1,000,000 mg
            break;
        case "decigramos":
            resultado = kg * 1e4; // 1 Kg = 10,000 dg
            break;
        case "gramos":
            resultado = kg * 1000; // 1 Kg = 1,000 g
            break;
        case "decagramos":
            resultado = kg * 100; // 1 Kg = 100 dag
            break;
        case "hectogramos":
            resultado = kg * 10; // 1 Kg = 10 hg
            break;
        case "toneladas":
            resultado = kg / 1000; // 1 Kg = 0.001 t
            break;
        default:
            alert("Unidad no válida.");
            resultado = null; // Establecer resultado a null si la unidad no es válida
    }

    if (resultado !== null) { // Verificar si resultado es válido antes de escribirlo
        document.write(`Resultado: ${resultado} ${unidad}`);
    }
}
