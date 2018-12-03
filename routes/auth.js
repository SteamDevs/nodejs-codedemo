const express = require('express')
const app = express()
const jwt = require('jsonwebtoken')

const modelAuth = require('../model/login') 

const SEED = 'misuperencripacionhackobo'

app.post('/', (req, res)=>{

    modelAuth.auth( req.body, (err, results)=>{
        if(Object.keys(results).length){

            const token = jwt.sign(
            { usuario: req.body }, 
                SEED, 
            { expiresIn:  14400  })

            res.status(200).json({
                ok: true,
                message: 'Te has logueado',
                results: results,
                token : token
            })

        }else{
            res.send({ message: 'Usuario/ Pass Incorrecto' })
        }
    })

})
module.exports = app