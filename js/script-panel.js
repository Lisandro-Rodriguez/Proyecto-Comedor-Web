let botones = document.querySelectorAll(".btn-accion"); 


let inicializar =() =>{
    botones.forEach(boton=>{
    let fila =boton.parentElement;
    let span = fila.querySelector(".estado");
    if(span.textContent==="Reservado"){
         boton.textContent="Cancelar Solicitud";
    }else if(span.textContent ==="Sin Reservar"){
        boton.textContent="Solicitar Reserva";
    }else if(span.textContent==="En cola..."){
        boton.textContent="Cancelar Solicitud";
    }else{
         boton.style.display="none";
         span.textContent="Consumido";
     }
    });
}
inicializar();






botones.forEach(boton=>{
    boton.addEventListener("click",(evento)=>{
        let fila =boton.parentElement;
        let span = fila.querySelector(".estado");
        if(span.textContent==="Reservado"){
            span.textContent="Sin Reservar";
            boton.textContent="Solicitar Reserva";
        }else if(span.textContent ==="Sin Reservar"){
            span.textContent="En cola...";
            boton.textContent="Cancelar Solicitud";
        }else if(span.textContent==="En cola..."){
            span.textContent="Sin Reservar";
            boton.textContent="Reservar";
        }else{
            boton.style.display="none";
            span.textContent="Consumido";
        }
    });
});

