const express = require('express')
var bodyParser = require('body-parser')
let app = express()
const mysql = require('mysql');


//Aqui van todos los routes
let userRoute = require('./routes/users')
let rolRoute = require('./routes/rol')

app.get('/', (req, res)=>{

    res.send({message: 'hola a todos los de kinal' })
})

//BODY PARSER CONFIG
// parse application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: false }))
app.use(bodyParser.json())


//Moddleware de rutas o indexando las rutas
app.use('/api/v1/users', userRoute )
app.use('/api/v1/rol', rolRoute )


const PORT = 3000

//Esto escucha el puerto
app.listen(PORT, ()=>{
    console.log(`
        Estoy escuchando en el puerto ${PORT}
    `)
});
