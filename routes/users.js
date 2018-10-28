const express = require('express')
let app = express();

let model_user = require('../model/users')

app.get('/', (req, res)=>{

    model_user.getInfo( (err, userDB)=>{
        if(err){
            res.status(400).json({
                ok: false,
                message: 'Error de base de datos',
                errors: err
            })            
        }
        res.send({ message: 'Consulta exitosa', results: userDB })
    })
})

app.get('/:id', (req, res)=>{

    let id = req.params.id;

    model_user.getId( id, (err, userDbId )=>{
        if(err){
            res.status(400).json({
                ok: false,
                message: 'Error de base de datos',
                errors: err
            })             
        }

        res.status(200).json({
            ok: true,
            message: 'Consulta exitosa',
            results:  userDbId 
        })

    })
})


app.post('/', (req, res)=>{
    
    let data = [ req.body.nombre, req.body.apellido ];
        
    model_user.insertData( data, newUser =>{
        if(!newUser){
            return res.status(400).json({
                ok: false,
                message: 'error de serv',
                errors: err
            })
        }

        res.status(200).json({
            ok: true,
            message: 'Consulta exitosa',
            result: newUser
        })
    })
})

app.put('/:id' , (req, res)=>{

    const { nombre, apellido } = req.body

    req.body.id = req.params.id
    console.log(req.body)
    model_user.updateData(req.body, (results)=>{
        res.send({ message: 'Se actuaizo algo'})
    })
})



module.exports = app;