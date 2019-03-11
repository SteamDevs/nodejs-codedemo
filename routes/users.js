const express = require('express')
let app = express()

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
        
        res.status(200).json(userDB)
    })
})


app.get('/merge/joins/',  (req, res)=>{

    
    var users = [
        {
            id_user: 1,
            name: "foo",
            last_name: "bar",
            id_rol : {
                id_rol: 1,
                rol_name: 'admin'
            }
        },
        {
            id_user: 2,
            name: "foo2",
            last_name: "bar2",
            id_rol : {
                id_rol: 2,
                rol_name: 'reporter'
            }
        }
    ]


    var devrols = [
        {
            id_rol: 1,
            rol_name: "foo",
        }
    ]

    res.status(200).json(devrols)
    

    /*model_user.mergeTables( (err, rolsAndusers)=>{
        if(err){
            res.status(400).json({
                ok: false,
                message: 'Error de base de datos',
                errors: err
            })             
        }



        res.status(200).json(rolsAndusers)
    })*/

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

        res.status(200).json(userDbId)
    })
})


app.post('/', (req, res)=>{
    
    model_user.insertData( req.body, (newUser)=>{
        res.status(201).json({ message: 'Creado exitosamente !' })
    })
})

app.delete('/:id', (req, res)=>{
    
    let id = req.params.id
    
    model_user.deleteUsers( id, (deletData)=>{
        if(!deletData){
            return  res.send({ message: 'No pasaste nada en la url' })
        }

        res.status(200).json({
            ok: true,
            message: 'Consulta exitosa',
            results: deletData
        })
    })
})

app.put('/:id', (req, res)=>{
    
    req.body.id = req.params.id
    
    model_user.updateUsers(req.body, (updateUser)=>{
        res.status(200).json({
            ok: true,
            message: 'Consulta Exitosa',
            results: updateUser 
        })
    })    
})



module.exports = app;