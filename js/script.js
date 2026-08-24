function alternarPassword(){
   let aux = document.getElementById("contrasena").type
    
   if(aux == "password"){
       document.getElementById("contrasena").type = "text"
   }else{
       document.getElementById("contrasena").type = "password"
   }
}

//Validación Campo DNI, falta completar lenght 

let campoDni = document.getElementById("usuario");
let msjError = document.getElementById("msj-error");
let botonIngreso = document.getElementById("boton-ingreso");


campoDni.addEventListener("input", function() {
    let valorEscrito = campoDni.value;
    if(isNaN(valorEscrito) || valorEscrito.length > 8 || valorEscrito.length<7) {
        msjError.textContent = "El DNI debe ser un número válido de hasta 8 dígitos.";
        msjError.style.color = "red";
        botonIngreso.disabled = true;
    } else {
        msjError.textContent = "";
        botonIngreso.disabled = false;
    }
});



//Para mostrar el menú del día correspondiente al día de la semana en que se accede a la página.
let fecha = new Date();
let dia = fecha.getDay();

let listaMenu = document.querySelectorAll(".dia");
if(dia >=1 && dia <=5){
    let posicionLista = dia -1;
    listaMenu[posicionLista].open=true;
}else{
    listaMenu[0].open=true; //En caso de ser fin de semana, se mostrará el menú del lunes.
}


//Formulario
let asunto = document.getElementById("asunto");
const contenedorOtro = document.getElementById("contenedor-otro");

asunto.addEventListener("change", (evento) =>{
    const valorElegido = evento.target.value;
    if(valorElegido==="Otro"){
        contenedorOtro.style.display = 'flex';
    }else{
        contenedorOtro.style.display = 'none';
    }
}); 


document.getElementById('form-solicitud').addEventListener('submit', function(event) {
    event.preventDefault(); 
    
    // 1. Capturamos la selección del usuario
    const asuntoSeleccionado = document.getElementById('asunto').value;
    
    // 2. Variable para almacenar el ID correcto
    let templateID = '';

    // 3. Evaluamos qué plantilla corresponde
    if (asuntoSeleccionado === 'Nuevo Usuario') {
        templateID = 'template_wkc5w4s'; // Reemplaza con tu ID real
    } else if (asuntoSeleccionado === 'Reinicio de Clave') {
        templateID = 'template_wcf8iig'; // Reemplaza con tu ID real
    } else {
        templateID = 'template_wkc5w4s'; // Reemplaza con tu ID real
    }

    // 4. Enviamos el formulario usando la variable templateID
    emailjs.sendForm('service_o0wim9b', templateID, this)
        .then(() => {
            console.log('¡Éxito! Mensaje enviado con la plantilla correcta.');
            this.reset(); // Limpia el formulario
        }, (error) => {
            console.log('Falló...', error);
        });
});