var optInicioN = document.getElementById("optInicioNOFF");
var optAlunosN = document.getElementById("optAlunosNON");
var optPagamentosN = document.getElementById("optPagamentosN");
var optUsuariosN = document.getElementById("optUsuariosN");
 var optInicio = document.getElementById("optInicioOFF");
var optAlunos = document.getElementById("optAlunosON");
var optPagamento = document.getElementById("optPagamentos");
var optUsuario = document.getElementById("optUsuarios");
var optConfig = document.getElementById("optConfig");
var temaDia = document.getElementById("themeday");
var temaNoite = document.getElementById("nighttheme");
var h1alert = document.getElementById("h1alert");
var usericon = document.getElementById("usericon");
var userout = document.getElementById("userout");
var mainheader = document.getElementById("mainheader");
var linhamenu = document.getElementById("linhamenu");
var config1 = document.getElementById("optconfigicon1");
var config1on = document.getElementById("optconfigicon1on");
var configsection = document.getElementById("sectionconfig");
var optconfigs = document.querySelector(".optconfigs");
var h1config= document.getElementById("h1config");
var appname = document.getElementById("appname");
var opticons = document.querySelectorAll("[data-opticon]");
var paragraphs = document.querySelectorAll("p");
const linetop = document.getElementById("linetop");
const linetopconfig = document.getElementById("linetopconfig");
const menu = document.querySelector(".menu");
const mainContent = document.querySelector("#maincontentform");
const pagetitle = document.querySelector("#pagetitle");
const copy = document.querySelector("#copy");
const footers = document.querySelectorAll('footer');
var thElements = document.querySelectorAll("table th");
var tdElements = document.querySelectorAll("table td");
var trElements = document.querySelectorAll("table tr");
var boxbuttons = document.querySelectorAll(".boxbuttons");
var fichabtn = document.querySelectorAll(".ficha");
var ignorarbtn = document.querySelectorAll(".desativar");
var anamnesebtn = document.getElementById("anamnesebtn");
var apagarbtn = document.querySelectorAll(".apagar");
var optConfigN = document.getElementById("optConfigN");
var cep = document.getElementById("cep")
const rgInput = document.getElementById('rg');
const cpfInput = document.getElementById('cpf');
const telefoneInput = document.getElementById('telefone');
const telefoneFamiliaInput = document.getElementById('telefone_familia');
var idade = document.getElementById("idade")
const inputValor = document.getElementById('valor');
var btnback = document.getElementById("btnback");

btnback.addEventListener('click', function (){
window.history.back();
});



inputValor.addEventListener('input', function (event) {
  let value = inputValor.value;

  value = value.replace(/\D/g, '');

  value = (value / 100).toFixed(2);

  value = value.replace('.', ',');

  inputValor.value = `R$ ${value}`;
});

idade.addEventListener('input', function (event) {
    const input = event.target;
    let valor = input.value.replace(/\D/g, ''); 
    if (valor) {
        input.value = `${valor} Anos`;
    } else {
        input.value = '';
    }

    const posicaoCursor = valor.length;
    input.setSelectionRange(posicaoCursor, posicaoCursor);
});

    telefoneFamiliaInput.addEventListener('input', function(event) {
        let value = this.value.replace(/\D/g, '');

   
        if (value.length <= 2) {
            value = value.replace(/^(\d{2})/, '($1)');
        }
        if (value.length > 2 && value.length <= 6) {
            value = value.replace(/^(\d{2})(\d{5})(\d{1,4})/, '($1) $2-$3');
        }
        if (value.length > 6) {
            value = value.replace(/^(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
        }

        this.value = value; 
    });

   
        telefoneInput.addEventListener('input', function(event) {
            let value = this.value.replace(/\D/g, ''); 

            
            if (value.length <= 2) {
                value = value.replace(/^(\d{2})/, '($1)');
            }
            if (value.length > 2 && value.length <= 6) {
                value = value.replace(/^(\d{2})(\d{5})(\d{1,4})/, '($1) $2-$3');
            }
            if (value.length > 6) {
                value = value.replace(/^(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            }

            this.value = value;
        });




rgInput.addEventListener('input', function(event) {
            let value = this.value.replace(/\D/g, ''); 
            if (value.length <= 2) {
                value = value.replace(/^(\d{2})/, '$1');
            }
            if (value.length > 2 && value.length <= 5) {
                value = value.replace(/^(\d{2})(\d{1,3})/, '$1.$2');
            }
            if (value.length > 5 && value.length <= 8) {
                value = value.replace(/^(\d{2})(\d{3})(\d{1,3})/, '$1.$2.$3');
            }
            if (value.length > 8 && value.length <= 12) {
                value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3-$4');
            }
            if (value.length > 12) {
                value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            }

            this.value = value; 
        });

            cpfInput.addEventListener('input', function(event) {
                let value = this.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    
                // Aplica a máscara corretamente para o formato 000.000.000-00
                if (value.length <= 3) {
                    value = value.replace(/^(\d{3})/, '$1');
                }
                if (value.length > 3 && value.length <= 6) {
                    value = value.replace(/^(\d{3})(\d{1,3})/, '$1.$2');
                }
                if (value.length > 6 && value.length <= 9) {
                    value = value.replace(/^(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3');
                }
                if (value.length > 9) {
                    value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{1,2})/, '$1.$2.$3-$4');
                }
    
                this.value = value; // Atualiza o valor do campo de entrada
            });
cep.addEventListener('input', function() {
    let cepValue = this.value;
    cepValue = cepValue.replace(/\D/g, '');
    if (cepValue.length <= 5) {
      this.value = cepValue;  
    } else {
      this.value = cepValue.replace(/(\d{5})(\d{3})/, '$1-$2');
    }
  });

optInicio.addEventListener("mouseover", function() {
    optAlunos.style.backgroundColor = "#fff";
    optAlunos.style.border = "none";
    });
    optPagamento.addEventListener("mouseover", function() {
    optAlunos.style.backgroundColor = "#fff";
    optAlunos.style.border = "none";
    });
    optUsuario.addEventListener("mouseover", function() {
    optAlunos.style.backgroundColor = "#fff";
    optAlunos.style.border = "none";
    });
    optConfig.addEventListener("mouseover", function() {
    optAlunos.style.backgroundColor = "#fff";
    optAlunos.style.border = "none";
    });
    optInicio.addEventListener("mouseout", function() {
    optAlunos.style.backgroundColor = "#e0dfdf";
    optAlunos.style.borderLeft = "2px solid #616161"
    });
    optPagamento.addEventListener("mouseout", function() {
    optAlunos.style.backgroundColor = "#e0dfdf";
    optAlunos.style.borderLeft = "2px solid #616161";
    });
    optUsuario.addEventListener("mouseout", function() {
    optAlunos.style.backgroundColor = "#e0dfdf";
    optAlunos.style.borderLeft = "2px solid #616161";
    });
    optConfig.addEventListener("mouseout", function() {
    optAlunos.style.backgroundColor = "#e0dfdf";
    optAlunos.style.borderLeft = "2px solid #616161";
    });
optConfig.addEventListener('click', function() {
configsection.classList.toggle("exibir");
});
optConfigN.addEventListener('click', function() {
configsection.classList.toggle("exibir");
});
let autoCollapseEnabled = false;

function applyCompactMargins() {
menu.style.width = "40px";
mainContent.style.marginLeft = "40px";
configsection.style.marginLeft = "40px";
copy.style.marginLeft = "0px";
pagetitle.style.marginLeft = "40px";
userout.style.marginLeft = "8px";
setTimeout(() => {
boxbuttons.forEach(button => {
    button.classList.remove('short');
});
}, 100);
}

function restoreExpandedMargins() {
setTimeout(() => {
boxbuttons.forEach(button => {
    button.classList.add('short');
});
}, 100);
menu.style.width = "250px";
mainContent.style.marginLeft = "250px";
configsection.style.marginLeft = "250px";
copy.style.marginLeft = "250px";
pagetitle.style.marginLeft = "255px";
userout.style.marginLeft = "105px";

}

function toggleAutoCollapse() {
if (autoCollapseEnabled) {
menu.removeEventListener('mouseover', restoreExpandedMargins);
menu.removeEventListener('mouseout', applyCompactMargins);
} else {
menu.addEventListener('mouseover', restoreExpandedMargins);
menu.addEventListener('mouseout', applyCompactMargins);
}
autoCollapseEnabled = !autoCollapseEnabled;

localStorage.setItem('autoCollapseEnabled', autoCollapseEnabled);
}

function loadSavedState() {
const savedState = localStorage.getItem('autoCollapseEnabled');
if (savedState !== null) {
autoCollapseEnabled = savedState === 'true';

if (autoCollapseEnabled) {
    config1.style.display = "none";
    config1on.style.display = "block";
    applyCompactMargins(); 
} else {
    config1.style.display = "block";
    config1on.style.display = "none";
    restoreExpandedMargins(); 
}

toggleAutoCollapse();
toggleAutoCollapse();
}
}

config1.addEventListener('click', function() {
config1.style.display = "none";
config1on.style.display = "block";
applyCompactMargins(); 
if (!autoCollapseEnabled) {
toggleAutoCollapse(); 
}
});

config1on.addEventListener('click', function() {
config1.style.display = "block";
config1on.style.display = "none";
restoreExpandedMargins();
if (autoCollapseEnabled) {
toggleAutoCollapse(); 
}
});
loadSavedState();

function applyDayTheme() {
config1.style.color = "#333";
config1on.style.color = "#333";
optconfigs.style.backgroundColor = "#fff";
optconfigs.style.border = "none";
h1config.style.color = "#333";
linetopconfig.style.backgroundColor = "#fff";
configsection.style.backgroundColor = "#fff";
optConfigN.style.display = "none";
optConfig.style.display = "flex";
copy.style.color = "#333";
optInicio.classList.remove("noite");
optAlunos.classList.remove("noite");
optPagamentos.classList.remove("noite");
optUsuarios.classList.remove("noite");
optInicioN.classList.remove("night");
optAlunosN.classList.remove("night");
optPagamentosN.classList.remove("night");
optUsuariosN.classList.remove("night");
optInicio.style.display = "flex"; 
optAlunos.style.display = "flex"; 
optPagamentos.style.display = "flex"; 
optUsuarios.style.display = "flex"; 
optInicioN.style.display = "none";
optAlunosN.style.display = "none"; 
optPagamentosN.style.display = "none"; 
optUsuariosN.style.display = "none"; 
linhamenu.style.backgroundColor = "#d6d5d5";
menu.style.borderRight = "1px solid #e0e0e0";
mainheader.style.backgroundColor = "#e9e9e9";
mainContent.style.backgroundColor = "#ffffff";
menu.style.backgroundColor = "#ffffff";
linetop.style.backgroundColor = "#ffffff";
temaDia.style.display = "none";
temaDia.style.color = "#333";
temaNoite.style.display = "block";
appname.style.color = "#333";
opticon.style.color = "#333";
h1alert.style.color = "#333";
usericon.style.color = "#333";
userout.style.color = "#333";

opticons.forEach(function(icon) {
icon.style.color = "#333";
});

paragraphs.forEach(function(p) {
p.style.color = "#333";
});

footers.forEach(function(footer) {
footer.style.backgroundColor = "#ffffff";
footer.style.borderTop = "1px solid #e0e0e0";
});

const tableHeaders = document.querySelectorAll('th');
const tableCells = document.querySelectorAll('td');
const tableRows = document.querySelectorAll('tr');

tableHeaders.forEach(function(header) {
header.style.backgroundColor = "#e9e9e9";
header.style.border = "1px solid #e0e0e0";
header.style.color = "#333";
});

tableCells.forEach(function(cell) {
cell.style.backgroundColor = "#ffffff";
cell.style.border = "1px solid #e0e0e0";
cell.style.color = "#333";
});

tableRows.forEach(function(row) {
row.style.color = "#333";
row.style.border = "1px solid #e0e0e0";
row.style.backgroundColor = "#ffffff";
row.removeEventListener("mouseover", function() {});
row.removeEventListener("mouseout", function() {});
row.addEventListener("mouseover", function() {
    this.style.backgroundColor = "#f1f1f1";
    const cells = this.querySelectorAll('td');
    cells.forEach(cell => cell.style.backgroundColor = "#f1f1f1");
});
row.addEventListener("mouseout", function() {
    this.style.backgroundColor = "#ffffff";
    const cells = this.querySelectorAll('td');
    cells.forEach(cell => cell.style.backgroundColor = "#ffffff");
});
});
}

// Função para aplicar o tema noite
function applyNightTheme() {
config1.style.color = "#fff";
config1on.style.color = "#fff";
optconfigs.style.backgroundColor = "#212529";
optconfigs.style.border = "none";
h1config.style.color = "#fff";
linetopconfig.style.backgroundColor = "#212529";
configsection.style.backgroundColor = "#212529";
optConfigN.style.display = "flex";
optConfig.style.display = "none";
copy.style.color = "#fff";
optInicio.classList.add("noite");
optAlunos.classList.add("noite");
optPagamentos.classList.add("noite");
optUsuarios.classList.add("noite");
optInicioN.classList.add("night");
optAlunosN.classList.add("night");
optPagamentosN.classList.add("night");
optUsuariosN.classList.add("night");
optInicio.style.display = "none";
optAlunos.style.display = "none";
optPagamentos.style.display = "none";
optUsuarios.style.display = "none";
optInicioN.style.display = "flex";
optAlunosN.style.display = "flex";
optPagamentosN.style.display = "flex";
optUsuariosN.style.display = "flex";
linhamenu.style.backgroundColor = "#972020";
menu.style.borderRight = "2px solid #8b8b8b";
mainheader.style.backgroundColor = "#a02c2c";
mainContent.style.backgroundColor = "#212529";
menu.style.backgroundColor = "#212529";
linetop.style.backgroundColor = "#212529";
temaDia.style.display = "block";
temaDia.style.color = "#fff";
temaNoite.style.display = "none";
appname.style.color = "white";
opticon.style.color = "white";
h1alert.style.color = "white";
usericon.style.color = "white";
userout.style.color = "#fff";
opticons.forEach(function(icon) {
icon.style.color = "white";
});
paragraphs.forEach(function(p) {
p.style.color = "#ffffff";
});
footers.forEach(function(footer) {
footer.style.backgroundColor = "#212529";
});
thElements.forEach(function(th) {
th.style.backgroundColor = "#a02c2c"; 
th.style.border = "0.1px solid #414141";
th.style.color = "white";
});
tdElements.forEach(function(td) {
td.style.backgroundColor = "#212529"; 
td.style.border = "0.1px solid #414141";
td.style.color = "white";
});
trElements.forEach(function(tr) {
tr.style.color = "white"; 
tr.style.border = "0.1px solid #414141";
tr.style.backgroundColor = "#212529"; 
tr.addEventListener("mouseover", function() {
    this.style.backgroundColor = "#3a3a3a !important"; 
    const cells = this.querySelectorAll('td');
    cells.forEach(cell => cell.style.backgroundColor = "#3a3a3a");
});
tr.addEventListener("mouseout", function() {
    this.style.backgroundColor = "#212529";
    const cells = this.querySelectorAll('td');
    cells.forEach(cell => cell.style.backgroundColor = "#212529");
});
});
}

function saveTheme(theme) {
localStorage.setItem('theme', theme);
}

function loadTheme() {
const savedTheme = localStorage.getItem('theme');
console.log(savedTheme);
if (savedTheme === 'night') {
applyNightTheme();
} else {
applyDayTheme();
}
}

temaDia.addEventListener('click', function() {
applyDayTheme();
saveTheme('day'); 
});

temaNoite.addEventListener('click', function() {
applyNightTheme();
saveTheme('night'); 

optAlunosN.addEventListener("mouseover", function() {
optInicioN.style.backgroundColor = "#212529";
optInicioN.style.border = "none";
});
optPagamentosN.addEventListener("mouseover", function() {
optInicioN.style.backgroundColor = "#212529";
optInicioN.style.border = "none";
});
optConfigN.addEventListener("mouseover", function() {
optInicioN.style.backgroundColor = "#212529";
optInicioN.style.border = "none";
});
optUsuariosN.addEventListener("mouseover", function() {
optInicioN.style.backgroundColor = "#212529";
optInicioN.style.border = "none";
});
optAlunosN.addEventListener("mouseout", function() {
optInicioN.style.backgroundColor = "#535151";
optInicioN.style.borderLeft = "2px solid #a02c2c";
});
optPagamentosN.addEventListener("mouseout", function() {
optInicioN.style.backgroundColor = "#535151";
optInicioN.style.borderLeft = "2px solid #a02c2c";
});
optUsuariosN.addEventListener("mouseout", function() {
optInicioN.style.backgroundColor = "#535151";
optInicioN.style.borderLeft = "2px solid #a02c2c";
});
optConfigN.addEventListener("mouseout", function() {
optInicioN.style.backgroundColor = "#535151";
optInicioN.style.borderLeft = "2px solid #a02c2c";
});
});
menu.addEventListener("mouseover", () => {
mainContent.classList.add("expanded");
pagetitle.classList.add("expanded");
copy.classList.add("expanded");
userout.classList.add("expanded");
configsection.classList.add("expanded");
});
menu.addEventListener("mouseout", () => {
configsection.classList.remove("expanded");
mainContent.classList.remove("expanded");
pagetitle.classList.remove("expanded");
copy.classList.remove("expanded");
userout.classList.remove("expanded");
});
ignorarbtn.forEach(ignorar => {
ignorar.addEventListener('click', () => {
document.getElementById('popup').style.display = 'block';
document.getElementById('overlay').style.display = 'block';
});


document.getElementById('fechar').addEventListener('click', () => {
document.getElementById('popup').style.display = 'none';
document.getElementById('overlay').style.display = 'none';
});

document.getElementById('confirmar').addEventListener('click', () => {
alert("Item ignorado com sucesso!");
document.getElementById('popup').style.display = 'none';
document.getElementById('overlay').style.display = 'none';
});
});
apagarbtn.forEach(apagar => {
    apagar.addEventListener('click', () => {
    document.getElementById('popupapagaraluno').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
    });
    
    
    document.getElementById('fecharapagar').addEventListener('click', () => {
    document.getElementById('popupapagaraluno').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
    });
    
    document.getElementById('confirmarapagar').addEventListener('click', () => {
    alert("Item ignorado com sucesso!");
    document.getElementById('popup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
    });
    });
fichabtn.forEach(ficha => {
    ficha.addEventListener('click', () => {
    document.getElementById('popupficha').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
    });
    
    
    document.getElementById('fechar').addEventListener('click', () => {
    document.getElementById('popupficha').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
    });
    
    
    document.getElementById('confirmar').addEventListener('click', () => {
    document.getElementById('popupficha').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
    });
    });



    anamnesebtn.addEventListener('click', () => {
        event.preventDefault();
        document.getElementById('popupanamnese').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
        });
        
function fecharAnamnese() {
    event.preventDefault();
    document.getElementById('popupanamnese').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

function toggleLesaoInput(select) {
    const lesaoDetalhesDiv = document.getElementById('lesao_detalhes');
    const lesaoDetalhesInput = document.getElementById('lesao_detalhes_input');
    
    if (select.value === "Sim - ") {
      lesaoDetalhesDiv.style.display = "block";
      lesaoDetalhesInput.required = true; 
    } else {
      lesaoDetalhesDiv.style.display = "none";
      lesaoDetalhesInput.required = false; 
      lesaoDetalhesInput.value = ""; 
    }
  }

  function toggledoencaInput(select) {
    const doencaDetalhesDiv = document.getElementById('doenca_detalhes');
    const doencaDetalhesInput = document.getElementById('doenca_detalhes_input');
    
    if (select.value === "Sim - ") {
      doencaDetalhesDiv.style.display = "block"; 
      doencaDetalhesInput.required = true; 
    } else {
      doencaDetalhesDiv.style.display = "none"; 
      doencaDetalhesInput.required = false; 
      doencaDetalhesInput.value = ""; 
    }
}

  function togglecolunaInput(select) {
    const colunaDetalhesDiv = document.getElementById('coluna_detalhes');
    const colunaDetalhesInput = document.getElementById('coluna_detalhes_input');
    
    if (select.value === "Sim - ") {
      colunaDetalhesDiv.style.display = "block"; 
      colunaDetalhesInput.required = true; 
    } else {
      colunaDetalhesDiv.style.display = "none"; 
      colunaDetalhesInput.required = false; 
      colunaDetalhesInput.value = ""; 
    }
  }

  document.getElementById('peso').addEventListener('input', function (event) {
    const input = event.target;
    let valor = input.value.replace(/[^0-9,\.]/g, '');
    valor = valor.replace(',', '.'); 
    
    if (valor) {
        input.value = `${valor} Kg`;
    } else {
        input.value = ''; 
    }

  
    const posicaoCursor = valor.length; 
    input.setSelectionRange(posicaoCursor, posicaoCursor);
});

const ids = [
    'input-torax',
    'input-cintura',
    'input-abdome',
    'input-quadril',
    'input-bracos',
    'input-antebracos',
    'input-panturrilha',
    'input-pernas'
];


function aplicarMascara(id) {
    document.getElementById(id).addEventListener('input', function (event) {
    const input = event.target;
    let valor = input.value;

   
    valor = valor.replace(',', '.');

   
    valor = valor.replace(/[^0-9\/\.]/g, '');

  
    if (valor.includes('/')) {
        const partes = valor.split('/');
        if (partes.length > 2) {
            valor = partes[0] + '/' + partes[1].slice(0, 1); 
        }
    }

  
    if (valor) {
        input.value = `${valor} CM`; 
    } else {
        input.value = ''; 
    }

  
    if (input.selectionStart === input.value.length - 3) { 
        input.setSelectionRange(input.value.length - 3, input.value.length - 3);
    } else if (input.selectionStart === input.value.length) { 
        input.setSelectionRange(input.value.length - 3, input.value.length - 3);
    }
});
}
ids.forEach(aplicarMascara);

document.getElementById('input-altura').addEventListener('input', function (event) {
    const input = event.target;
    let valor = input.value;

    valor = valor.replace(',', '.');
    valor = valor.replace(/[^0-9.]/g, '');

    const partes = valor.split('.');
    if (partes.length > 2) {
        valor = partes[0] + '.' + partes[1].slice(0, 2);
    }

    if (valor.length > 4) {
        valor = valor.slice(0, 4);
    }

    input.value = valor ? `${valor} m` : '';

    if (input.selectionStart === input.value.length - 2) { 
        input.setSelectionRange(input.value.length - 2, input.value.length - 2);
    } else if (input.selectionStart === input.value.length) { 
        input.setSelectionRange(input.value.length - 2, input.value.length - 2);
    }
});

const userIcon = document.getElementById('usericon');
    const contextMenu = document.getElementById('contextMenu');
    const removePhoto = document.getElementById('removePhoto');

    
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*';
    fileInput.style.display = 'none';
    document.body.appendChild(fileInput);

    userIcon.addEventListener('click', () => {
      fileInput.click();
    });

  
    userIcon.addEventListener('contextmenu', (e) => {
      e.preventDefault();
      contextMenu.style.display = 'block';
      contextMenu.style.top = `${e.pageY}px`;
      contextMenu.style.left = `${e.pageX}px`;
    });

  
    window.addEventListener('click', () => {
      contextMenu.style.display = 'none';
    });

   
    fileInput.addEventListener('change', (event) => {
      const file = event.target.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = () => {
        const imageData = reader.result;
        userIcon.style.backgroundImage = `url('${imageData}')`;
        userIcon.textContent = "";
        localStorage.setItem('profileImage', imageData);
        fileInput.value = "";
      };
      reader.readAsDataURL(file);
    });

    removePhoto.addEventListener('click', () => {
      userIcon.style.backgroundImage = "";
      userIcon.textContent = "";
      localStorage.removeItem('profileImage');
      contextMenu.style.display = 'none';
    });

    window.addEventListener('DOMContentLoaded', () => {
      const savedImage = localStorage.getItem('profileImage');
      if (savedImage) {
        userIcon.style.backgroundImage = `url('${savedImage}')`;
        userIcon.textContent = "";
      }
    });

loadTheme();