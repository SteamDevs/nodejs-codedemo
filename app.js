const express = require('express')
let app = express()

//Aqui van todos los routes
let userRoute = require('./routes/users')

app.get('/', (req, res)=>{

    res.send({message: 'hola a todos los de kinal' })

})

//Moddleware de rutas o indexando las rutas
app.use('/api/v1/users', userRoute )

const PORT = 3000

/*Ver
    - https://github.com/mysqljs/mysql
    - Middleware
    - Bootstrap
    - End-Point
    - 'use_strict'
*/

/*
TABLE DEMO

CREATE TABLE users(
	id_users INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(25) NOT NULL,
    PRIMARY KEY(id_users)
);

*/

//Esto escucha el puerto
app.listen(PORT, ()=>{
    console.log(`
        Estoy escuchando en el puerto ${PORT}
    `)
});
