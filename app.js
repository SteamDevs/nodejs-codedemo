const express = require('express')
var bodyParser = require('body-parser')
let app = express()

//Aqui van todos los routes
let userRoute = require('./routes/users')
let rolRoute = require('./routes/rol')
let authRoute = require('./routes/auth')

app.get('/', (req, res)=>{

    res.send({message: 'hola a todos los de kinal' })
})

//BODY PARSER CONFIG
// parse application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: false }))
app.use(bodyParser.json())

app.use(function(req, res, next) {
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
    next();
  });

//Moddleware de rutas o indexando las rutas
app.use('/api/v1/users', userRoute )
app.use('/api/v1/rol', rolRoute )
app.use('/api/v1/auth', authRoute )

const PORT = 3000

//Esto escucha el puerto
app.listen(PORT, ()=>{
    console.log(`
        Estoy escuchando en el puerto ${PORT}
    `)
})
