function numero_aleatorio()
{
    return Math.floor((Math.random() * 2000));
}

function rango_envio(kilometros) {
    return kilometros < 100 ? 1 : parseInt(kilometros / 100) + 1
}

// rango: cantidad de dias
const dias = {
    1:0,
    2:1,
    3:1,
    4:2,
    5:3,
}

function calcular_dias(rango) {
    if(dias[rango]) return dias[rango]
    const resultado = calcular_dias(rango - 1) + calcular_dias(rango - 2)
    dias[rango] = resultado
    return resultado
}

function dias_envio(rango) {
    const resultado = dias[rango]
    // El 0 se considera falso así que se asegura que entre como entero
    if(typeof resultado === "number")
    {
        return resultado
    }
    return calcular_dias(rango)
}

const kilometros = numero_aleatorio()
const rango = rango_envio(kilometros)
const envio = dias_envio(rango)

console.log({kilometros, dias: envio})