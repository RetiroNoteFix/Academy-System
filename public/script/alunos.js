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
const mainContent = document.querySelector("#maincontent");
const pagetitle = document.querySelector("#pagetitle");
const copy = document.querySelector("#copy");
const footers = document.querySelectorAll('footer');
var thElements = document.querySelectorAll("table th");
var tdElements = document.querySelectorAll("table td");
var trElements = document.querySelectorAll("table tr");
var boxbuttons = document.querySelectorAll(".boxbuttons");
var fichabtn = document.querySelectorAll(".ficha");

var apagarbtn = document.querySelectorAll(".apagar");
var optConfigN = document.getElementById("optConfigN");
var alunosOff = document.getElementById("alunosoff");
var optmenuname2 = document.getElementById("optmenutopname2");
let header = document.getElementById("mainheader");
let title = document.getElementById("pagetitle");

var tbodyalunosoff = document.getElementById("tbodyalunosoff");
var tbodyalunoson = document.getElementById("tbodyalunoson");
var btnback = document.getElementById("btnback");

btnback.addEventListener('click', function (){
window.history.back();
});

alunosOff.addEventListener("click", function() {
    tbodyalunosoff.classList.toggle("show");
    tbodyalunoson.classList.toggle("hidden");
    alunosOff.classList.toggle("alunoson");
    const statusAtual = header.dataset.status === "ativos" ? "desativados" : "ativos";

    header.dataset.status = statusAtual;
    
    title.textContent = statusAtual === "ativos" ? "Alunos - Ativos" : "Alunos - Desativados";

    alunosoff.dataset.status = statusAtual;
    optmenuname2.textContent = statusAtual === "ativos" ? "Desativados" : "Ativos";
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

let alunoId = null;

document.querySelectorAll('.desativar').forEach(button => {
    button.addEventListener('click', function() {
        alunoId = this.getAttribute('data-id');
        console.log(alunoId);

        document.getElementById('popup').style.display = 'block';
        document.getElementById('popup').querySelector('p').textContent = 'Tem certeza de que deseja desativar este aluno?';  
        document.getElementById('confirmar').style.display = 'inline-block';  
        document.getElementById('fechar').textContent = 'Cancelar';  
        document.getElementById('fechar').style.display = "none";
        document.getElementById('popup').setAttribute('data-id', alunoId); 
    });
});

document.getElementById('confirmar').addEventListener('click', () => {
    const alunoId = document.getElementById('popup').getAttribute('data-id');  
    if (alunoId) {
        fetch(`/alunos/desativar/${alunoId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        })
        .then(response => response.json())
        .then(data => {
            
            if (data.error) {
                document.getElementById('popup').querySelector('p').textContent = data.error;  
                document.getElementById('confirmar').style.display = 'none';  
                document.getElementById('fechar').textContent = 'Fechar';  
                document.getElementById('fechar').style.display = "block";
            } else {
                document.getElementById('popup').querySelector('p').textContent = "Aluno desativado com sucesso!"; 
                document.getElementById('confirmar').style.display = 'none'; 
                document.getElementById('fechar').style.display = "none";
                
                setInterval(function() {
                   closePopup();
                }, 1500);
                const row = document.querySelector(`button[data-id="${alunoId}"]`).closest('tr');
                row.remove(); 
            }
        })
        .catch(error => {
            console.error('Erro ao desativar aluno:', error);
            document.getElementById('popup').querySelector('p').textContent = "Ocorreu um erro ao desativar o aluno."; 
            document.getElementById('confirmar').style.display = 'none';  
            document.getElementById('fechar').textContent = 'Fechar'; 
        });
    }
});

function closePopup(){
    document.getElementById('popup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}
document.getElementById('fechar').addEventListener('click', () => {
    document.getElementById('popup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
});

document.getElementById('fechar').addEventListener('click', () => {
    document.getElementById('popup').style.display = 'none';
});

document.getElementById('fechar').addEventListener('click', () => {
document.getElementById('popup').style.display = 'none';
document.getElementById('overlay').style.display = 'none';
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

    function fecharAnamnese() {
        event.preventDefault();
        document.getElementById('popupficha').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }



loadTheme();