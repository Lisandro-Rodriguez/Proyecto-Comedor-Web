# 🍽️ Web Comedor Universitario

Aplicación web desarrollada como proyecto final del curso de extensión **“Introducción al Desarrollo de Aplicaciones Web”**.

El proyecto propone una interfaz para que los estudiantes puedan consultar el menú semanal del comedor universitario, gestionar sus reservas, consultar su historial de asistencia y utilizar formularios de registro y asistencia.

---

##Descripción

**Web Comedor Universitario** centraliza distintas funciones relacionadas con el servicio del comedor:

- Consulta del menú semanal.
- Visualización de opciones normales y vegetarianas.
- Inicio de sesión y registro de usuarios.
- Gestión visual de reservas.
- Consulta del historial de asistencia.
- Formulario de ayuda para problemas como recuperación de contraseña o alta de usuario.
- Envío del formulario de ayuda mediante **EmailJS**.
- Diseño adaptable a PC, tablet y celular.

> **Nota:** El proyecto se encuentra planteado principalmente como un prototipo de interfaz y comportamiento del lado del cliente. En los archivos analizados aparece una referencia a `login.php`,
> pero no se incluye una implementación completa del backend PHP en el material del proyecto.

---

## 🛠️ Tecnologías utilizadas

### HTML5

Se utiliza para estructurar las diferentes páginas y componentes de la aplicación, incluyendo etiquetas semánticas como:

- `<header>`
- `<nav>`
- `<main>`
- `<section>`
- `<form>`
- `<label>`
- `<input>`
- `<button>`
- `<details>`
- `<summary>`
- `<table>`

### CSS3

Se utiliza para el diseño visual y la adaptación responsive de la aplicación.

Entre los recursos utilizados se encuentran:

- `display: flex`
- `display: grid`
- `position: fixed`
- `position: sticky`
- `@media`
- `box-shadow`
- `border-radius`
- `transition`
- `background-image`

### JavaScript

Se utiliza para agregar interacción y validaciones en el navegador:

- Mostrar y ocultar contraseñas.
- Validar el DNI.
- Mostrar automáticamente el menú correspondiente al día.
- Cambiar dinámicamente los estados de las reservas.
- Mostrar u ocultar campos del formulario según el asunto seleccionado.
- Validar el registro de usuarios.
- Enviar formularios mediante EmailJS.

### EmailJS

Se utiliza para enviar el formulario de ayuda desde el frontend mediante diferentes plantillas según el tipo de solicitud.

---

## Estructura del proyecto

Una estructura general del proyecto es:

```text
Web-Comedor-Universitario/
│
├── html/
│   ├── index.html
│   ├── registro.html
│   └── panel.html
│
├── css/
│   ├── style.css
│   ├── style-panel.css
│   └── style-registro.css
│
├── js/
│   ├── script.js
│   ├── script-panel.js
│   └── validacion.js
│
├── imgs/
│   ├── logoUNSa.jpeg
│   ├── comida-buffet.png
│   ├── alumno.jpg
│   ├── facebook-png.ng.png
│   └── instagram.webp
│
└── README.md
```

> Los nombres y archivos pueden variar según la organización final del repositorio.

---

## 💻 Funcionalidades principales

### 📅 Menú semanal

La página principal muestra el servicio de lunes a viernes.

Cada día contiene:

- Entrada.
- Plato principal.
- Alternativa.
- Postre.

La información está organizada mediante `<details>` y `<summary>`, permitiendo desplegar cada día.

Además, JavaScript detecta el día actual y abre automáticamente el menú correspondiente.

---

### Gestión de reservas

Desde el panel del usuario se muestra la reserva correspondiente a cada día.

Los estados contemplados incluyen:

- **Reservado**
- **Disponible**
- **Consumido**
- **Vencido**
- **En cola**

Los botones cambian dinámicamente según el estado de cada reserva.

---

### Validación de formularios

El proyecto incorpora validaciones del lado del cliente.

Por ejemplo:

- El DNI debe contener solamente números y tener una longitud válida.
- Los campos obligatorios del registro deben estar completos.
- Las contraseñas deben tener al menos 6 caracteres.
- Las dos contraseñas deben coincidir.

---

### Formulario de ayuda

El usuario puede seleccionar distintos tipos de solicitud:

- Olvidé mi contraseña.
- Nuevo usuario.
- Otro.

Cuando selecciona **“Otro”**, aparece dinámicamente un campo de texto para escribir la consulta.

El formulario utiliza **EmailJS** para realizar el envío.

---

## Diseño responsive

El sitio fue pensado para adaptarse a distintos tamaños de pantalla.

### Escritorio

En pantallas de **768 px o más**, el menú semanal utiliza:

```css
display: grid;
grid-template-columns: repeat(5, minmax(0, 1fr));
```

Esto permite mostrar los cinco días en columnas.

### Celular y tablet

En pantallas menores a **768 px**, el contenido cambia a una distribución vertical:

```css
display: flex;
flex-direction: column;
```

De esta forma, los días aparecen uno debajo del otro y se mejora la lectura en pantallas pequeñas.

---

## Conceptos de CSS aplicados

### Flexbox

Se utiliza principalmente para organizar elementos en una dimensión.

Ejemplo:

```css
form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}
```

Esto permite organizar los campos del formulario verticalmente.

### Grid

Se utiliza cuando se necesita una distribución bidimensional.

Ejemplo:

```css
.fila-dias {
    display: grid;
    grid-template-columns: repeat(5, minmax(0, 1fr));
}
```

Esto permite organizar los cinco días de la semana en columnas.

### Position

También se utilizaron diferentes tipos de posicionamiento:

```css
position: fixed;
```

para elementos que deben permanecer en una posición determinada de la pantalla.

```css
position: sticky;
```

para elementos que permanecen visibles mientras se realiza scroll.

---

## JavaScript

Algunas de las interacciones implementadas son:

### Mostrar/Ocultar contraseña

```javascript
function alternarPassword(){
    let aux = document.getElementById("contrasena").type;

    if(aux == "password"){
        document.getElementById("contrasena").type = "text";
    }else{
        document.getElementById("contrasena").type = "password";
    }
}
```

### Detectar el día actual

```javascript
let fecha = new Date();
let dia = fecha.getDay();
```

A partir del día obtenido, se abre automáticamente el menú correspondiente.

### Manipulación del DOM

Se utilizan métodos como:

```javascript
document.getElementById()
document.querySelectorAll()
addEventListener()
```

para acceder a elementos HTML y modificar su comportamiento.

---

## Posibles mejoras futuras

Algunas mejoras que podrían incorporarse en una siguiente versión:

- Conectar la aplicación con una base de datos real.
- Implementar autenticación real de usuarios.
- Crear un backend.
- Guardar reservas de forma persistente.
- Crear un panel administrativo para gestionar menús.
- Administrar cupos disponibles.
- Generar estadísticas de reservas y asistencia.
- Mejorar la seguridad de autenticación y almacenamiento de datos.

---

## Autor

**Lisandro Rodriguez**

Proyecto final — Curso de extensión  
**Introducción al Desarrollo de Aplicaciones Web**

---

## Objetivo académico

El proyecto fue realizado con el objetivo de aplicar los conocimientos adquiridos durante el curso en una aplicación web concreta, trabajando principalmente sobre:

**HTML → estructura**

**CSS → diseño y responsive**

**JavaScript → interacción y validación**

**EmailJS → comunicación desde formularios**

---
Proyecto desarrollado con fines académicos.
