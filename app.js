const express = require('express')
let app = express()

app.get('/', (req, res)=>{

    res.send({message: 'hola a todos los de kinal' })

})

const PORT = 3000

/*investigar
    - Que es un callback como funciona
    - Diferencias entre function y =>
    - let y var
    - Jest https://jestjs.io/docs/en/getting-started (solo leer)
    - Instalar nodejs https://nodejs.org/es/         
    - https://www.npmjs.com/package/express
    - Estructura de un JSON
*/

//Esto escucha el puerto
app.listen(PORT, ()=>{
    console.log(`
        Estoy escuchando en el puerto ${PORT}
    `)
});
