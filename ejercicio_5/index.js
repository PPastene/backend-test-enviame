const divisors = require('@extra-number/divisors');
const fibonacci = require ('fibonacci');
const max_divisors = 100; // 1000 se queda congelado

fibonacci.on('result', num => {
    console.log(num.number)
    if(divisors(num.number).length >= max_divisors){
        console.log(num.number)
        fibonacci.kill()
    }
})

fibonacci.iterate();