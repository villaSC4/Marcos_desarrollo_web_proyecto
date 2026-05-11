const datos = [
  {
    titulo: "BAÑO",
    img: "/img/baño.webp",
    html: `
            <div class="row text-start p-3">
                <div class="col-6 mb-3"><p class="fw-bold m-0">PLASTICO DURO</p><ul class="small"><li>Envase de Shampoo</li><li>Reacondicionador</li><li>Gel de baño</li></ul></div>
                <div class="col-6 mb-3"><p class="fw-bold m-0">CARTON</p><ul class="small"><li>Caja pasta dental</li><li>Cono papel</li><li>Caja protectores</li><li>Tinte de pelo</li></ul></div>
                <div class="col-6"><p class="fw-bold m-0">PLASTICO PET</p><ul class="small"><li>Limpia baños</li><li>Enjuague bucal</li></ul></div>
                <div class="col-6"><p class="fw-bold m-0">VIDRIO</p><ul class="small"><li>Envase de Serum</li></ul></div>
            </div>`,
  },
  {
    titulo: "DORMITORIO",
    img: "/img/cuarto.webp",
    html: `
            <div class="row text-start p-3">
                <div class="col-6 mb-3"><p class="fw-bold m-0">PLASTICO DURO</p><ul class="small"><li>Desodorante en aerosol (Tapa)</li></ul></div>
                <div class="col-6 mb-3"><p class="fw-bold m-0">CARTON</p><ul class="small"><li>Caja de pañuelos</li></ul></div>
                <div class="col-6"><p class="fw-bold m-0">PAPEL</p><ul class="small"><li>Revistas</li><li>Periódicos</li></ul></div>
                <div class="col-6"><p class="fw-bold m-0">LATA</p><ul class="small"><li>Desodorante en aerosol (Recipiente)</li></ul></div>
                <div class="col-6"><p class="fw-bold m-0">VIDRIO</p><ul class="small"><li>Bebida</li></ul></div>
                <div class="col-6"><p class="fw-bold m-0">RAEE</p><ul class="small"><li>Tablet rota</li><li>Celular roto</li></ul></div>
            </div>`,
  },
  {
    titulo: "COCINA",
    img: "/img/cocina.avif",
    html: `
            <div class="row text-start p-3">
                <div class="col-6 mb-3"><p class="fw-bold m-0">PLASTICO DURO</p><ul class="small"><li>Envase de producto de limpieza</li></ul></div>
                <div class="col-6 mb-3"><p class="fw-bold m-0">CARTON</p><ul class="small"><li>Caja de cereal</li></ul></div>
                <div class="col-6"><p class="fw-bold m-0">VIDRIO</p><ul class="small"><li>Botella de bebida alcoholica</li><li>Envase de cerveza</li><li>Envase de jugo</li><li>Envase de café</li></ul></div>
                <div class="col-6"><p class="fw-bold m-0">LATA</p><ul class="small"><li>Envase de formula para bebes</li><li>Envase de agua</li><li>Envase de jugo</li><li>Envase de bebida rehidratante</li></ul></div>
                <div class="col-6"><p class="fw-bold m-0">TETRA PAK</p><ul class="small"><li>Envase de jugo</li><li>Envase de leche</li></ul></div>
            </div>`,
  },
  {
    titulo: "LAVANDERIA",
    img: "/img/lavanderia.jpg",
    html: `
            <div class="row text-start p-3">
                <div class="col-6 mb-3"><p class="fw-bold m-0">PLASTICO PET</p><ul class="small"><li>Envasede limpiador de pisos</li><li>Limpiador de madera</li><li>Limpiador de metales</li></ul></div>
                <div class="col-6 mb-3"><p class="fw-bold m-0">PLASTICO DURO</p><ul class="small"><li>Envase de suavizante</li><li>Envase de Detergente Liquido</li><li>Envase de Lejia</li></ul></div>
                <div class="col-6"><p class="fw-bold m-0">PEAD</p><ul class="small"><li>Envase de quitamanchas</li></ul></div>
                <div class="col-6"><p class="fw-bold m-0">LATA</p><ul class="small"><li>Ambientador en aerosol</li></ul></div>
            </div>`,
  },
];

let indexActual = 0;

function abrirPopUp(i) {
  indexActual = i;
  renderizar();
  document.getElementById("overlay").style.display = "flex";
  document.body.style.overflow = "hidden"; 
}

function cerrarPopUp() {
  document.getElementById("overlay").style.display = "none";
  document.body.style.overflow = "auto";
}

function navegar(dir) {
  indexActual = (indexActual + dir + datos.length) % datos.length;
  renderizar();
}

function renderizar() {
  const item = datos[indexActual];
  document.getElementById("contenido-dinamico").innerHTML = `
            <div class="titulo-pop">${item.titulo}</div>
            <img src="${item.img}" class="img-pop">
            <div class="cuerpo-pop">${item.html}</div>
        `;
}
