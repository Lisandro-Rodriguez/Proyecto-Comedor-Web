const form = document.getElementById('form-registro');
const mensaje = document.getElementById('txt-problema');
const nombre= document.getElementById('nombre');
const correo = document.getElementById('email');
const c1= document.getElementById('pass');
const c2= document.getElementById('pass-confirm');

form.addEventListener("submit", function(event){
    event.preventDefault();
    if(nombre.value.trim()!=="" && correo.value.trim()!=="" && c1.value.trim()!== "" && c2.value.trim()!==""){
        if(c1.value.length >=6 && c2.value.length>=6){
            if(c1.value!==c2.value){
                mensaje.textContent="Error, contraseñas distintas";
                mensaje.style.color="red";
            }else{
                form.submit();
            }
        }else{
            mensaje.textContent="Error, contraseñas menores a 6 carácteres";
            mensaje.style.color="red";
        }
    }else{  
        mensaje.textContent="Error, campos incompletos";
        mensaje.style.color="red";
    }
});