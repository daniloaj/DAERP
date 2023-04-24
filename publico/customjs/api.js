//declaramos el nombre del sistema que será la base en la cual se llama automaticamente el login
const BASE_API="/DAERP/";

//declaramos un api que hace que el "post" sea asincrono y si hay un fallo hará esperar el sistema hasta que los datos sean correctos
class Api {
    async post(data,url){
        const query=await fetch(`${BASE_API}${url}`,{
            method:"POST",
            body:data
        });
        const json = await query.json();
        return json;
    }
    async get(url){
        const query =await fetch(`${BASE_API}${url}`);
        const json = await query.json();
        return json;
    }
}