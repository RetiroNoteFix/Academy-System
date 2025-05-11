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
var apagarbtn = document.querySelectorAll(".apagar");
var optConfigN = document.getElementById("optConfigN");
var alunosOff = document.getElementById("alunosoff");
var optmenuname2 = document.getElementById("optmenutopname2");
let header = document.getElementById("mainheader");
let title = document.getElementById("pagetitle");

var tbodyalunosoff = document.getElementById("tbodyalunosoff");
var tbodyalunoson = document.getElementById("tbodyalunoson");
var btnback = document.getElementById("btnback");
const previouspagealunosoff = document.getElementById('previouspagealunosoff');
const nextpagealunosoff = document.getElementById('nextpagealunosoff');
const previouspagealunoson = document.getElementById('previouspagealunoson');
const nextpagealunoson = document.getElementById('nextpagealunoson');


let statusAtual = localStorage.getItem("status") || "ativos";
header.dataset.status = statusAtual;
title.textContent = statusAtual === "ativos" ? "Alunos - Ativos" : "Alunos - Desativados";
optmenuname2.textContent = statusAtual === "ativos" ? "Desativados" : "Ativos";

// Atualiza a visibilidade com base no status atual
function atualizarVisibilidade() {
    if (statusAtual === "desativados") {
        tbodyalunosoff.style.display = "table-row-group";
        tbodyalunoson.style.display = "none";
        previouspagealunoson.style.display = 'none';
        nextpagealunoson.style.display = 'none';
        previouspagealunosoff.style.display = 'block';
        nextpagealunosoff.style.display = 'block';
           alunosOff.classList.add("alunoson");
           document.getElementById('searchinput2').style.display = 'block';
           document.getElementById('searchinput').style.display = 'none';
            document.getElementById('tbodybuscaoff').style.display = 'none';
        document.getElementById('tbodybuscaon').style.display = 'none';
    } else {
           alunosOff.classList.remove("alunoson");
        tbodyalunosoff.style.display = "none";
       tbodyalunoson.style.display = "table-row-group";
        previouspagealunoson.style.display = 'block';
        nextpagealunoson.style.display = 'block';
        previouspagealunosoff.style.display = 'none';
        nextpagealunosoff.style.display = 'none';
        document.getElementById('searchinput').style.display = 'block';
        document.getElementById('searchinput2').style.display = 'none';
        document.getElementById('tbodybuscaoff').style.display = 'none';
        document.getElementById('tbodybuscaon').style.display = 'none';
    }
}

// Chama a função ao carregar a página para aplicar o status inicial
atualizarVisibilidade();

// Evento para alternar o status
alunosOff.addEventListener("click", function() {
    statusAtual = statusAtual === "ativos" ? "desativados" : "ativos";
    localStorage.setItem("status", statusAtual);
    title.textContent = statusAtual === "ativos" ? "Alunos - Ativos" : "Alunos - Desativados";
    optmenuname2.textContent = statusAtual === "ativos" ? "Desativados" : "Ativos";
    header.dataset.status = statusAtual;
    atualizarVisibilidade();
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
    menu.style.width = "50px";
    mainContent.style.marginLeft = "50px";
    configsection.style.marginLeft = "50px";
    copy.style.marginLeft = "0px";
    pagetitle.style.marginLeft = "50px";
    userout.style.marginLeft = "13px";
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

function activateAutoCollapse() {
  menu.addEventListener('mouseover', restoreExpandedMargins);
  menu.addEventListener('mouseout', applyCompactMargins);
  configsection.addEventListener('mouseover', restoreExpandedMargins);
  configsection.addEventListener('mouseout', applyCompactMargins);
  config1.style.display = "none";
  config1on.style.display = "block";
  applyCompactMargins();
}

function deactivateAutoCollapse() {
  menu.removeEventListener('mouseover', restoreExpandedMargins);
  menu.removeEventListener('mouseout', applyCompactMargins);
  configsection.removeEventListener('mouseover', restoreExpandedMargins);
  configsection.removeEventListener('mouseout', applyCompactMargins);
  config1.style.display = "block";
  config1on.style.display = "none";
  restoreExpandedMargins();
}

function toggleAutoCollapse() {
  autoCollapseEnabled = !autoCollapseEnabled;
  localStorage.setItem('autoCollapseEnabled', autoCollapseEnabled);

  if (autoCollapseEnabled) {
    activateAutoCollapse();
  } else {
    deactivateAutoCollapse();
  }
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
var boxconfirm = document.querySelector("boxconfirm");
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
optInicioN.addEventListener("mouseover", function() {
    optAlunosN.style.backgroundColor = "#212529";
    optAlunosN.style.border = "none";
    });
    optAlunosN.addEventListener("mouseover", function() {
        optAlunosN.style.backgroundColor = "#535151";
        optAlunosN.style.borderLeft = "2px solid #a02c2c";
        });
    optPagamentosN.addEventListener("mouseover", function() {
        optAlunosN.style.backgroundColor = "#212529";
    optAlunosN.style.border = "none";
    });
    optConfigN.addEventListener("mouseover", function() {
        optAlunosN.style.backgroundColor = "#212529";
    optAlunosN.style.border = "none";
    });
    optUsuariosN.addEventListener("mouseover", function() {
        optAlunosN.style.backgroundColor = "#212529";
    optAlunosN.style.border = "none";
    });
    optInicioN.addEventListener("mouseout", function() {
        optAlunosN.style.backgroundColor = "#535151";
    optAlunosN.style.borderLeft = "2px solid #a02c2c";
    });
    optPagamentosN.addEventListener("mouseout", function() {
        optAlunosN.style.backgroundColor = "#535151";
    optAlunosN.style.borderLeft = "2px solid #a02c2c";
    });
    optUsuariosN.addEventListener("mouseout", function() {
        optAlunosN.style.backgroundColor = "#535151";
    optAlunosN.style.borderLeft = "2px solid #a02c2c";
    });
    optConfigN.addEventListener("mouseout", function() {
        optAlunosN.style.backgroundColor = "#535151";
    optAlunosN.style.borderLeft = "2px solid #a02c2c";
    });
 function desativarAluno() {

    document.querySelectorAll('.desativar').forEach(button => {
        button.addEventListener('click', function() {
            const alunoId = this.getAttribute('data-id');
            console.log('ID do aluno:', alunoId);

            document.getElementById('popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('popup').innerHTML = `
                <div class="popup-content">
                    <p>Tem certeza de que deseja desativar?</p>
                    <div class="boxbtn">
                        <button id="confirmar">Sim</button>
                        <button id="fechar">Cancelar</button>
                    </div>
                </div>
            `;
            document.getElementById('confirmar').style.display = 'inline-block';
            document.getElementById('popup').setAttribute('data-id', alunoId); 
            
            document.getElementById('confirmar').addEventListener('click', confirmarDesativacao);
            document.getElementById('fechar').addEventListener('click', closePopup);
        });
    });

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }

    function confirmarDesativacao() {
        const popup = document.getElementById('popup');
        const alunoId = popup.getAttribute('data-id');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        if (!alunoId) {
            console.error('ID do aluno não encontrado');
            return;
        }

        document.getElementById('confirmar').disabled = true;
        document.getElementById('confirmar').style.display = 'none';
        document.getElementById('fechar').style.display = 'none';
        popup.querySelector('p').textContent = "Processando...";

        fetch(`/alunos/desativar/${alunoId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                popup.querySelector('p').textContent = data.error;
                document.getElementById('fechar').textContent = 'Fechar';
                document.getElementById('confirmar').style.display = 'none';
                document.getElementById('fechar').style.display = 'block';
                return;
            }

            popup.querySelector('p').textContent = "Desativado com sucesso!";
            document.getElementById('confirmar').style.display = 'none';
            document.getElementById('fechar').textContent = 'Fechar';

        
            const row = document.querySelector(`button[data-id="${alunoId}"]`)?.closest('tr');
            if (row) row.remove();


            const tableBody = document.getElementById('tbodyalunoson');
            if (tableBody && tableBody.querySelectorAll('tr').length === 0) {
                const noPaymentsRow = document.createElement('tr');
                const noPaymentsCell = document.createElement('td');
                const theme = localStorage.getItem('theme');

               
                noPaymentsCell.id = "nolist";
                noPaymentsCell.colSpan = document.querySelectorAll('table thead th').length;
                noPaymentsCell.textContent = 'Nenhum aluno encontrado.';

                if (theme === 'night') {
                    noPaymentsCell.style.color = "#fff";
                    noPaymentsCell.style.backgroundColor = "#212529";
                } else {
                    noPaymentsCell.style.color = "#333";
                    noPaymentsCell.style.backgroundColor = "#fff";
                }

                noPaymentsRow.appendChild(noPaymentsCell);
                tableBody.appendChild(noPaymentsRow);
            }

            setTimeout(closePopup, 1500);
        })
        .catch(error => {
            console.error('Erro ao desativar aluno:', error);
            popup.querySelector('p').textContent = "Ocorreu um erro ao desativar.";
            document.getElementById('fechar').textContent = 'Fechar';
            document.getElementById('confirmar').style.display = 'none';
        });
    }
}

document.getElementById('refresh')?.addEventListener('click', () => {
    window.location.reload();
});
    
function ativarAluno() {
    document.querySelectorAll('.ativar').forEach(button => {
        button.addEventListener('click', function() {
            const alunoIdOFF = this.getAttribute('data-id');
            const popup = document.getElementById('popup');
            const overlay = document.getElementById('overlay');
            
            popup.setAttribute('data-id', alunoIdOFF);
            popup.innerHTML = ` 
                <div class="popup-content">
                    <p>Tem certeza de que deseja ativar?</p>
                    <div class="boxbtn">
                        <button id="confirmarativar">Sim</button>
                        <button id="fechar">Cancelar</button>
                    </div>
                </div>
            `;
            
         
              document.getElementById('confirmarativar').style.display = 'inline-block';
        document.getElementById('fechar').textContent = 'Cancelar';
        document.getElementById('fechar').style.display = 'block';
            popup.style.display = 'block';
            overlay.style.display = 'block';
             document.getElementById('fechar').addEventListener('click', closePopup);
        });
    });
}

document.addEventListener('click', (event) => {
    if (event.target.id === 'confirmarativar') {
        const alunoIdOFF = document.getElementById('popup').getAttribute('data-id');
        const popup = document.getElementById('popup');
        const overlay = document.getElementById('overlay');
        
        if (alunoIdOFF) {
            fetch(`/alunos/ativar/${alunoIdOFF}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    popup.querySelector('p').textContent = data.error;  
                    document.getElementById('fechar').textContent = 'Fechar';  
                } else {
                    popup.innerHTML = "Ativado com sucesso!"; 
                    const row = document.querySelector(`button[data-id="${alunoIdOFF}"]`)?.closest('tr');
                    if (row) row.remove();
                    
                    ['tbodyalunoson', 'tbodyalunosoff'].forEach(tbodyId => {
                        const tableBody = document.getElementById(tbodyId);
                        const rows = tableBody.querySelectorAll('tr:not(#nolist)');
                        
                        if (rows.length === 0) {
                            const noDataRow = document.createElement('tr');
                            const noDataCell = document.createElement('td');
                            const theme = localStorage.getItem('theme');
            
                            noDataCell.id = "nolist";
                            noDataCell.colSpan = document.querySelectorAll('table thead th').length;
                            noDataCell.textContent = 'Nenhum aluno encontrado.';
            
                            if (theme === 'night') {
                                noDataCell.style.color = "#fff";
                                noDataCell.style.backgroundColor = "#212529";
                            } else {
                                noDataCell.style.color = "#333";
                                noDataCell.style.backgroundColor = "#fff";
                            }
            
                            noDataRow.appendChild(noDataCell);
                            tableBody.appendChild(noDataRow);
                        }
                    });

                    setTimeout(() => closePopup(), 1500);
                }
            })
            .catch(error => {
                console.error('Erro ao ativar aluno:', error);
                popup.querySelector('p').textContent = "Ocorreu um erro ao ativar."; 
                document.getElementById('fechar').textContent = 'Fechar'; 
            });
        }
    }
});

function excluirAluno() {
    // Adiciona evento aos botões de apagar
    document.querySelectorAll('.apagar').forEach(button => {
        button.addEventListener('click', function() {
            const alunoIdDelete = this.getAttribute('data-id');
            
            // Configura o popup de confirmação
            const popup = document.getElementById('popup');
            popup.style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
            
            popup.innerHTML = `
                <div class="popup-content">
                    <p>Tem certeza de que deseja remover?</p>
                    <div class="boxbtn">
                        <button id="confirmarapagar">Sim</button>
                        <button id="fechar">Cancelar</button>
                    </div>
                </div>
            `;
            
            // Armazena o ID no popup
            popup.setAttribute('data-id', alunoIdDelete);
            
            // Configura os eventos dos botões do popup
            document.getElementById('confirmarapagar').style.display = 'block';
            document.getElementById('confirmarapagar').addEventListener('click', confirmarExclusao);
            document.getElementById('fechar').addEventListener('click', closePopup);
        });
    });

    function confirmarExclusao() {
        document.getElementById('confirmarapagar').style.display = 'none';
        document.getElementById('fechar').style.display = 'none';
        var popup = document.getElementById('popup');
        const alunoIdDelete = popup.getAttribute('data-id');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const confirmButton = document.getElementById('confirmarapagar');
        confirmButton.disabled = true;
        popup.querySelector('p').textContent = "Excluindo...";
        
        fetch(`/alunos/apagar/${alunoIdDelete}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro na resposta do servidor');
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                throw new Error(data.error);
            }

            popup.innerHTML = "Removido com sucesso!";
     
            const row = document.querySelector(`button.apagar[data-id="${alunoIdDelete}"]`)?.closest('tr');
            if (row) row.remove();
            
            verificarTabelaVazia();
            
            setTimeout(closePopup, 1500);
        })
        .catch(error => {
            console.error('Erro ao excluir aluno:', error);
            popup.innerHTML = error.message || "Ocorreu um erro ao excluir.";
            confirmButton.disabled = false;
        });
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }

    verificarTabelaVazia();
}


function verificarTabelaVazia() {
    const tbodyIds = ['tbodyalunoson', 'tbodyalunosoff'];
    const totalColunas = document.querySelectorAll('table thead th').length;
    const theme = localStorage.getItem('theme');
    
    tbodyIds.forEach(tbodyId => {
        const tableBody = document.getElementById(tbodyId);
        const rows = tableBody.querySelectorAll('tr:not(#nolist)');
        
        if (rows.length === 0) {
            const noDataRow = document.createElement('tr');
            const noDataCell = document.createElement('td');

            noDataCell.id = "nolist";
            noDataCell.colSpan = totalColunas;
            noDataCell.textContent = 'Nenhum aluno encontrado.';

            if (theme === 'night') {
                noDataCell.style.color = "#fff";
                noDataCell.style.backgroundColor = "#212529";
            } else {
                noDataCell.style.color = "#333";
                noDataCell.style.backgroundColor = "#fff";
            }

            noDataRow.appendChild(noDataCell);
            tableBody.appendChild(noDataRow);
        }
    });
}

function calcularIdade(dataNascimento) {
    let idadeout = "Sem dados";  
    
    if (!dataNascimento || dataNascimento === "") {
        return idadeout;
    }

    const hoje = new Date();
    const nascimento = new Date(dataNascimento);

    if (isNaN(nascimento)) {
        return idadeout; 
    }

    let idade = hoje.getFullYear() - nascimento.getFullYear();
    const mes = hoje.getMonth() - nascimento.getMonth();

    if (mes < 0 || (mes === 0 && hoje.getDate() < nascimento.getDate())) {
        idade--;
    }

    idadeout = `${idade} Anos`;  
    return idadeout;
}


function exibirFicha(){
document.querySelectorAll('.ficha').forEach(button => {
    button.addEventListener('click', function() {
            
         
        const alunoIdFicha = this.getAttribute('data-id');  
        document.getElementById('popupficha').style.display = 'block';
          document.getElementById('popupficha').innerHTML = `Carregando...`;
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('popupficha').setAttribute('data-id', alunoIdFicha);  
        fetch(`/alunos/visualizar/${alunoIdFicha}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        })
        .then(response => response.json())
      
        .then(data => {
            if (data.error) {
                 document.getElementById('popupficha').innerHTML = `<div class="boxbtn" id="error">
           <h4 class="errormsg">Erro: Aluno não encontrado. Cód:100. Consulte o suporte. </h4>
           <button class="addaluno" id="close" onclick="fecharAnamnese()">
                        <i class="fa-solid fa-xmark"></i>Fechar</button></div>
             `;
                document.getElementById('overlay').style.display = 'block';
            } else {
                  document.getElementById('popupficha').innerHTML = ` <div class="conteudo-ficha">
            <div class="form-titulo" id="titulopopup">
                <h4 id="nomealunoficha">VISUALIZAR ALUNO:</h4>
                <div class="btnamnese">
                    <button class="addaluno" id="save" onclick="fecharAnamnese()">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Salvar
                    </button>
                    <button class="addaluno" id="close" onclick="fecharAnamnese()">
                        <i class="fa-solid fa-xmark"></i>Fechar</button>
                </div>
            </div>
            <div class="conteudo-anamnese" id="conteudoficha">
                <div class="ladoesquerdoform">
                    <div class="form-titulo">
                        <h1 id="h1tituloinfo">INFOMAÇÕES PESSOAIS</h1>
                    </div>
                    <div class="form-group">
                        <label for="nome">NOME COMPLETO:</label>
                        <input type="text" id="nome" name="nome" required maxlenght="255"
                            placeholder="Nome completo" readonly>
                    </div>
                    <div class="compact">
                        <div class="form-group" id="inputdata">
                            <label for="data_nascimento">DATA DE NASCIMENTO:</label>
                            <input type="date" id="data_nascimento" name="data_nascimento" maxlength="10"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="idade">IDADE:</label>
                            <input type="text" id="idade" name="idade" placeholder="Idade" readonly>
                        </div>
                    </div><!--compact-->
                    <div class="compact">
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" id="cpf" name="cpf" maxlength="14"
                                placeholder="000.000.000-00" readonly>
                        </div>
                        <div class="form-group">
                            <label for="rg">RG:</label>
                            <input type="text"id="rg" name="rg" placeholder="00.000.000-00" maxlength="13"
                                pattern="\d{2}\.\d{3}\.\d{3}-[\d{2}]" readonly>
                        </div>
                    </div><!--compact-->
                    <div class="compact">
                        <div class="form-group">
                            <label for="telefone">TELEFONE:</label>
                            <input class="smallinput" type="tel" id="telefone" name="telefone" maxlength="15"
                                placeholder="(00) 00000-0000" readonly>
                        </div>
                        <div class="form-group">
                            <label for="telefone_familia">TELEFONE FAMILIAR:</label>
                            <input type="tel" id="telefone_familia" maxlength="15" name="telefone_familia"
                                placeholder="(00) 00000-0000" readonly>
                        </div>
                    </div><!--compact-->
                    <div class="form-group">
                        <label for="email">EMAIL:</label>
                        <input type="email" id="email" name="email" placeholder="email@email.com" readonly>
                    </div>
                    <br><br><br><br>
                    <p id='space'></p>
                    <div class="form-titulo">
                        <h5>HISTÓRICO DE SAÚDE</h5>
                    </div>
                    <div class="compact">
                        <div class="form-group">
                            <label for="cirurgia">QUAL CIRURGIA JÁ FEZ:</label>
                            <input type="text" id="cirurgia" name="cirurgia" placeholder="Descreva a cirurgia"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="dorme_bem">QUANTAS HORAS DE SONO:</label>
                            <input type="text" id="dorme_bem" name="dorme_bem"
                                placeholder="Quantidade de horas de sono" readonly>
                        </div>
                    </div><!--compact-->
                    <div class="compact">
                        <div class="form-group">
                            <label for="lesao_detalhes">LESÃO ARTICULAR:</label>
                            <input type="text" id="lesao_detalhes_input2" readonly name="lesao_detalhes"
                                placeholder="Descreva a lesão">
                        </div>
                        <div class="form-group">
                            <label for="coluna_detalhes">PROBLEMA DE COLUNA:</label>
                            <input type="text" id="coluna_detalhes_input2" readonly name="coluna_detalhes"
                                placeholder="Descreva o problema">

                        </div>
                    </div><!--compact-->
                    <div class="form-group">
                        <label for="tempo_sem_medico">ÚLTIMA VEZ QUE FOI AO MÉDICO:</label>
                        <input type="text" id="tempo_sem_medico" readonly name="tempo_sem_medico"
                            placeholder="Ex: 6 meses, 1 ano">
                    </div>
                    <div class="form-group">
                        <label for="uso_medicamento">USA QUAL MEDICAMENTO:</label>
                        <input type="text" id="uso_medicamento" readonly name="uso_medicamento"
                            placeholder="Medicamento usado">
                    </div>

                    <div class="form-group">
                        <label for="problema_saude">TEM QUAL PROBLEMA DE SAÚDE</label>
                        <input type="text" id="problema_saude" readonly name="problema_saude"
                            placeholder="Descreva o problema de saúde">
                    </div>
                    <div class="compact">
                        <div class="form-group" id="infartoS">
                            <label for="varizes">TEM VARIZES:</label>
                            <input type="text" class="smallinput" readonly id="varizes" name="varizes">
                        </div>
                        <div class="form-group">
                            <label for="infarto">INFARTO:</label>
                            <input type="text "id="infarto" readonly name="infarto">
                        </div>
                    </div><!--compact-->
                    <div class="compact">
                        <div class="form-group">
                            <label for="doenca_detalhes">DOENÇA CARDÍACA:</label>
                            <input type="text" id="doenca_detalhes_input2" readonly name="doenca_detalhes"
                                placeholder="Descreva a doença">

                        </div>
                        <div class="form-group">
                            <label for="derrame">DERRAME:</label>
                            <input type="text" id="derrame" readonly name="derrame">
                        </div>
                    </div>
                    <div class="compact">
                        <div class="form-group">
                            <label for="diabetes">DIABETES:</label>
                            <input type="text" class="smallinput" id="diabetes" readonly name="diabetes">
                        </div>
                        <div class="form-group">
                            <label for="obesidade">OBESIDADE:</label>
                            <input type="text" id="obesidade" readonly name="obesidade">
                        </div>
                    </div><!--compact-->
                    <div class="form-group">
                        <label for="colesterol_elevado">COLESTEROL ALTO:</label>
                        <input type="text" id="colesterol_elevado" readonly name="colesterol_elevado">

                    </div>
                    <h2 id="titulo-parq">QUESTIONÁRIO PAR-Q</h2>
                    <table id="tabela-parq">
                        <tr id="cabecalho-tabela">
                            <th id="sim-header">SIM</th>
                            <th id="nao-header">NÃO</th>
                            <th id="questao-header">QUESTÕES</th>
                        </tr>
                        <tr id="linha-1">
                            <td class="sim" id="sim1"><label id="label-sim1"><input type="radio"
                                        name="par_q1" id="input-sim1"></label></td>
                            <td class="nao" id="nao1"><label id="label-nao1"><input type="radio"
                                        name="par_q1" id="input-nao1"></label></td>
                            <td class="questao" id="questao1">1- Seu médico alguma vez disse que você tem problema no
                                coração e que deve apenas praticar atividades físicas recomendadas por médico?</td>
                        </tr>
                        <tr id="linha-2">
                            <td class="sim" id="sim2"><label id="label-sim2"><input type="radio"
                                        name="par_q2" id="input-sim2"></label></td>
                            <td class="nao" id="nao2"><label id="label-nao2"><input type="radio"
                                        name="par_q2" id="input-nao2"></label></td>
                            <td class="questao" id="questao2">2- Você sente dor no peito quanto pratica atividade
                                física?</td>
                        </tr>
                        <tr id="linha-3">
                            <td class="sim" id="sim3"><label id="label-sim3"><input type="radio"
                                        name="par_q3" id="input-sim3"></label></td>
                            <td class="nao" id="nao3"><label id="label-nao3"><input type="radio"
                                        name="par_q3" id="input-nao3"></label></td>
                            <td class="questao" id="questao3">3- No mês passado, você teve dor no peito quanto não
                                estava praticando atividade física?</td>
                        </tr>
                        <tr id="linha-4">
                            <td class="sim" id="sim4"><label id="label-sim4"><input type="radio"
                                        name="par_q4" id="input-sim4"></label></td>
                            <td class="nao" id="nao4"><label id="label-nao4"><input type="radio"
                                        name="par_q4" id="input-nao4"></label></td>
                            <td class="questao" id="questao4">4- Você perde o equilíbrio devido a tonturas ou alguma
                                vez perdeu a consciência?</td>
                        </tr>
                        <tr id="linha-5">
                            <td class="sim" id="sim5"><label id="label-sim5"><input type="radio"
                                        name="par_q5" id="input-sim5"></label></td>
                            <td class="nao" id="nao5"><label id="label-nao5"><input type="radio"
                                        name="par_q5" id="input-nao5"></label></td>
                            <td class="questao" id="questao5">5- Você tem problema ósseo ou articular que poderia
                                ficar pior por alguma mudança em sua atividade física?</td>
                        </tr>
                        <tr id="linha-6">
                            <td class="sim" id="sim6"><label id="label-sim6"><input type="radio"
                                        name="par_q6" id="input-sim6"></label></td>
                            <td class="nao" id="nao6"><label id="label-nao6"><input type="radio"
                                        name="par_q6" id="input-nao6"></label></td>
                            <td class="questao" id="questao6">6- Seu médico está atualmente receitando algum remédio
                                (por exemplo, diuréticos) para pressão arterial ou problema cardíaco?</td>
                        </tr>
                        <tr id="linha-7">
                            <td class="sim" id="sim7"><label id="label-sim7"><input type="radio"
                                        name="par_q7" id="input-sim7"></label></td>
                            <td class="nao" id="nao7"><label id="label-nao7"><input type="radio"
                                        name="par_q7" id="input-nao7"></label></td>
                            <td class="questao" id="questao7">7- Você sabe de qualquer outra razão pela qual não deva
                                praticar atividade física?</td>
                        </tr>
                    </table>

                </div><!--ladoesquerdoform-->
                <div class="ladodireitoform">
                    <div class="form-titulo">
                        <h1>ENDEREÇO</h1>
                    </div>
                    <div class="compact">
                        <div class="form-group">
                            <label for="endereco[rua]">RUA:</label>
                            <input type="text" id="rua" name="endereco[rua]" placeholder="Digite sua rua"
                                value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="endereco[numero]">Nº:</label>
                            <input type="text" id="numero" name="endereco[numero]"
                                placeholder="Número da residência" value="" readonly>
                        </div>


                    </div><!--compact-->
                    <div class="compact">
                        <div class="form-group">
                            <label for="endereco[complemento]">COMPLEMENTO:</label>
                            <input type="text" id="complemento" name="endereco[complemento]"
                                placeholder="Apartamento, bloco, sala (opcional)" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="endereco[bairro]">BAIRRO:</label>
                            <input type="text" id="bairro" name="endereco[bairro]"
                                placeholder="Digite seu bairro" value="" readonly>
                        </div>

                    </div><!--compact-->
                    <div class="compact">
                        <div class="form-group">
                            <label for="endereco[cidade]">CIDADE:</label>
                            <input type="text" id="cidade" name="endereco[cidade]"
                                placeholder="Digite sua cidade" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="endereco[cep]">CEP:</label>
                            <input type="text" id="cep" name="endereco[cep]" placeholder="00000-000"
                                value="" maxlength="9" readonly>
                        </div>

                    </div><!--compact-->
                    <div class="form-titulo">
                        <h1>PAGAMENTO</h1>
                    </div>
                    <div class="form-group">
                        <label for="valor">VALOR:</label>
                        <input type="text" id="valor" name="valor" placeholder="R$0,00" maxlength="100"
                            required readonly>
                    </div>
                    <div class="compact">

                        <div class="form-group">
                            <label for="data_pagamento">DATA DE PAGAMENTO:</label>
                            <input type="date" id="data_pagamento" name="data_pagamento" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="plano">Plano:</label>
                            <input id="plano" name="plano" required value="" readonly>
                        </div>
                    </div><!--compact-->
                    <br><br>
                    <div class="form-titulo">
                        <h4 id="h5form">HISTÓRICO E OBJETIVO NA ACADEMIA</h4>
                    </div>
                    <div class="form-group">
                        <label for="modalidade_anterior">QUE MODALIDADE JÁ FEZ:</label>
                        <input type="text" readonly id="modalidade_anterior" name="modalidade_anterior"
                            placeholder="Descreva quais modalidades já realizou">
                    </div>
                    <div class="form-group">
                        <label for="modalidade_atual">QUE MODALIDADE PRATICA ATUALMENTE:</label>
                        <input type="text" id="modalidade_atual" readonly name="modalidade_atual"
                            placeholder="Descreva qual modalidade realiza atualmente">
                    </div>
                    <div class="form-group">
                        <label for="objetivo_atividade_fisica">QUAL O SEU OBJETIVO:</label>
                        <input type="text" id="objetivo_atividade_fisica" readonly
                            name="objetivo_atividade_fisica"
                            placeholder="Descreva qual seu objetivo com a atividade física">
                    </div>
                    <div class="form-group">
                        <label for="como_soube_da_academia">COMO SOUBE DA ACADEMIA:</label>
                        <input type="text" id="como_soube_da_academia" readonly name="como_soube_da_academia"
                            placeholder="Como conheceu nossa academia?">
                    </div>
                    <div class="form-titulo">
                        <h5>DADOS ANTROPOMÉTRICOS E DE SAÚDE</h5>
                    </div>
                    <div class="compact">
                        <div class="form-group">
                            <label for="peso">PESO:</label>
                            <input type="text" id="peso" name="peso" readonly placeholder="Peso">
                        </div>
                        <div class="form-group">
                            <label for="tipo_sanguineo">TIPO SANGUÍNEO:</label>
                            <input type="text" id="tipo_sanguineo" readonly name="tipo_sanguineo">
                        </div>
                        <div class="form-group">
                            <label id="labe" for="pressao_arterial">PRESSÃO:</label>
                            <input type="text" id="pressao_arterial" readonly name="pressao_arterial">
                        </div>
                    </div><!--compact-->
                    <div class="form-titulo">
                        <h5>ESTILO DE VIDA</h5>
                    </div>
                    <div class="compact">
                        <div class="form-group">
                            <label for="fuma">FUMA:</label>
                            <input type="text" class="smallinput" id="fumar" readonly name="fuma">
                        </div>
                        <div class="form-group">
                            <label for="faz_dieta">FAZ DIETA:</label>
                            <input id="faz_dieta" readonly name="faz_dieta">
                        </div>
                    </div><!--compact-->
                    <div class="compact">
                        <div class="form-group">
                            <label for="usa_bebida_alcoolica">CONSOME ÁLCOOL:</label>
                            <input id="bebida_alcoolica" readonly name="usa_bebida_alcoolica">
                        </div>
                        <div class="form-group">
                            <label for="sedentario">SEDENTÁRIO:</label>
                            <input id="sedentario" readonly name="sedentario">
                        </div>
                    </div><!--compact-->
                    <div class="form-titulo" id="titulomedida">
                        <h4 id="titilo-parq">MEDIDAS ANTROPOMÉTRICAS</h4>
                    </div>
                    <table id="tabela-medidas">
                        <tr id="linha-altura">
                            <th id="th-torax">ALTURA:</th>
                            <td class="input-coluna" id="td-altura"><input id="input-altura" type="text"
                                    name="medida[altura]" readonly placeholder="Metros"></td>
                        </tr>
                        <tr id="linha-torax">
                            <th id="th-torax">TÓRAX:</th>
                            <td class="input-coluna" id="td-torax"><input id="input-torax" type="text"
                                    name="medida[torax]" readonly placeholder="Centímetros"></td>
                        </tr>
                        <tr id="linha-cintura">
                            <th id="th-cintura">CINTURA:</th>
                            <td class="input-coluna" id="td-cintura"><input id="input-cintura" type="text"
                                    name="medida[cintura]" readonly placeholder="Centímetros"></td>
                        </tr>
                        <tr id="linha-abdome">
                            <th id="th-abdome">ABDOME:</th>
                            <td class="input-coluna" id="td-abdome"><input id="input-abdome" type="text"
                                    name="medida[abdome]" readonly placeholder="Centímetros"></td>
                        </tr>
                        <tr id="linha-quadril">
                            <th id="th-quadril">QUADRIL:</th>
                            <td class="input-coluna" id="td-quadril"><input id="input-quadril" type="text"
                                    name="medida[quadril]" readonly placeholder="Centímetros"></td>
                        </tr>
                        <tr id="linha-bracos">
                            <th id="th-bracos">BRAÇOS (direito e esquerdo):</th>
                            <td class="input-coluna" id="td-bracos"><input id="input-bracos" type="text"
                                    name="medida[bracos]" readonly placeholder="Centímetros"></td>
                        </tr>
                        <tr id="linha-antebracos">
                            <th id="th-antebracos">ANTEBRAÇOS (direito e esquerdo):</th>
                            <td class="input-coluna" id="td-antebracos"><input id="input-antebracos" type="text"
                                    name="medida[antebracos]" readonly placeholder="Centímetros"></td>
                        </tr>
                        <tr id="linha-pernas">
                            <th id="th-pernas">PERNA (direita e esquerda):</th>
                            <td class="input-coluna" id="td-pernas"><input id="input-pernas" type="text"
                                    name="medida[pernas]" readonly placeholder="Centímetros"></td>
                        </tr>
                        <tr id="linha-panturrilha">
                            <th id="th-panturrilha">PANTURRILHA (direita e esquerda):</th>
                            <td class="input-coluna" id="td-panturrilha"><input id="input-panturrilha"
                                    type="text" readonly name="medida[panturrilha]" placeholder="Centímetros">
                            </td>
                        </tr>
                        <tr id="linha-observacoes">
                            <th id="th-observacoes">OBSERVAÇÕES:</th>
                            <td class="input-coluna" id="td-observacoes"><input id="input-observacoes"
                                    type="text" readonly name="medida[obs]" placeholder="Observações"></td>
                        </tr>
                    </table>
                </div><!--ladodireitoform-->
            </div>
        </div>
    </div>`;
                const idadeout = calcularIdade(data.data_nascimento);

                //dados pessoa
                document.getElementById('nome').value = data.nome ?? "Sem Dados";
                document.getElementById('data_nascimento').value = data.data_nascimento ?? "";
                document.getElementById('idade').value = `${idadeout}`;
                document.getElementById('cpf').value = data.cpf ?? "Sem dados";
                document.getElementById('rg').value = data.rg ?? "Sem dados";
                document.getElementById('telefone').value = data.telefone ?? "Sem dados";
                document.getElementById('telefone_familia').value = data.telefone_familia ?? "Sem dados";
                document.getElementById('email').value = data.email ?? "Sem dados";
                document.getElementById('rua').value = data.rua ?? "Sem dados";
                document.getElementById('numero').value = data.numero ?? "Sem dados";
                document.getElementById('complemento').value = data.complemento ?? "Sem dados";
                document.getElementById('bairro').value = data.bairro ?? "Sem dados";
                document.getElementById('cidade').value = data.cidade ?? "Sem dados";
                document.getElementById('cep').value = data.cep ?? "Sem dados";

                // dados aluno
                document.getElementById('cirurgia').value = data.cirurgia ?? "Sem dados";
                document.getElementById('dorme_bem').value = data.dorme_bem ?? "Sem dados";
                document.getElementById('lesao_detalhes_input2').value = data.lesao_detalhes_input ?? "Sem dados";
                document.getElementById('coluna_detalhes_input2').value = data.coluna_detalhes_input ?? "Sem dados";
                document.getElementById('tempo_sem_medico').value = data.tempo_sem_medico ?? "Sem dados";
                document.getElementById('uso_medicamento').value = data.uso_medicamento ?? "Sem dados";
                document.getElementById('problema_saude').value = data.problema_saude ?? "Sem dados";
                document.getElementById('varizes').value = data.varizes ?? "Sem Dados";
                document.getElementById('infarto').value = data.infarto ?? "Sem dados";
                document.getElementById('doenca_detalhes_input2').value = data.doenca_detalhes_input ?? "Sem dados";
                document.getElementById('derrame').value = data.derrame ?? "Sem dados";
                document.getElementById('diabetes').value = data.diabetes ?? "Sem dados";
                document.getElementById('obesidade').value = data.obesidade ?? "Sem dados";
                document.getElementById('colesterol_elevado').value = data.colesterol_elevado ?? "Sem dados";
                const dataInput1 = data.input_sim1;
const dataInput2 = data.input_sim2;
const dataInput3 = data.input_sim3;
const dataInput4 = data.input_sim4;
const dataInput5 = data.input_sim5;
const dataInput6 = data.input_sim6;
const dataInput7 = data.input_sim7;
if (dataInput1 === "sim") {
    document.getElementById('input-sim1').checked = true;
    bloquearGrupo('par_q1');
} else {
    document.getElementById('input-nao1').checked = true;
    bloquearGrupo('par_q1');
}

if (dataInput2 === "sim") {
    document.getElementById('input-sim2').checked = true;
    bloquearGrupo('par_q2');
} else {
    document.getElementById('input-nao2').checked = true;
    bloquearGrupo('par_q2');
}

if (dataInput3 === "sim") {
    document.getElementById('input-sim3').checked = true;
    bloquearGrupo('par_q3');
} else {
    document.getElementById('input-nao3').checked = true;
    bloquearGrupo('par_q3');
}

if (dataInput4 === "sim") {
    document.getElementById('input-sim4').checked = true;
    bloquearGrupo('par_q4');
} else {
    document.getElementById('input-nao4').checked = true;
    bloquearGrupo('par_q4');
}

if (dataInput5 === "sim") {
    document.getElementById('input-sim5').checked = true;
    bloquearGrupo('par_q5');
} else {
    document.getElementById('input-nao5').checked = true;
    bloquearGrupo('par_q5');
}

if (dataInput6 === "sim") {
    document.getElementById('input-sim6').checked = true;
    bloquearGrupo('par_q6');
} else {
    document.getElementById('input-nao6').checked = true;
    bloquearGrupo('par_q6');
}

if (dataInput7 === "sim") {
    document.getElementById('input-sim7').checked = true;
    bloquearGrupo('par_q7');
} else {
    document.getElementById('input-nao7').checked = true;
    bloquearGrupo('par_q7');
}
document.querySelectorAll('input[type="radio"]').forEach((radio) => {
    radio.addEventListener('click', function (e) {
        if (this.dataset.locked === 'true') {
            e.preventDefault();
            return;
        }

        const groupRadios = document.querySelectorAll(`input[name="${this.name}"]`);
        groupRadios.forEach(r => r.dataset.locked = 'true');
    });
});
function bloquearGrupo(groupName) {
    const radios = document.querySelectorAll(`input[name="${groupName}"]`);
    radios.forEach(r => r.dataset.locked = 'true');
}

                document.getElementById('modalidade_anterior').value = data.modalidade_anterior ?? "Sem dados";
                document.getElementById('modalidade_atual').value = data.modalidade_atual ?? "Sem dados";
                document.getElementById('objetivo_atividade_fisica').value = data.objetivo_atividade_fisica ?? "Sem dados";
                document.getElementById('como_soube_da_academia').value = data.como_soube_da_academia ?? "Sem dados";
                document.getElementById('peso').value = data.peso ?? "Sem dados";
                document.getElementById('tipo_sanguineo').value = data.tipo_sanguineo ?? "Sem dados";
                document.getElementById('pressao_arterial').value = data.pressao_arterial ?? "Sem dados";
                document.getElementById('fumar').value = data.fumar ?? "Sem dados";
                document.getElementById('faz_dieta').value = data.faz_dieta ?? "Sem dados";
                document.getElementById('bebida_alcoolica').value = data.usa_bebida_alcoolica ?? "Sem dados";
                document.getElementById('sedentario').value = data.sedentario ?? "Sem dados";
                document.getElementById('input-altura').value = data.altura ?? "Sem dados";
                document.getElementById('input-torax').value = data.torax ?? "Sem dados";
                document.getElementById('input-cintura').value = data.cintura ?? "Sem dados";
                document.getElementById('input-abdome').value = data.abdome ?? "Sem dados";
                document.getElementById('input-quadril').value = data.quadril ?? "Sem dados";
                document.getElementById('input-bracos').value = data.bracos ?? "Sem dados";
                document.getElementById('input-antebracos').value = data.antebracos ?? "Sem dados";
                document.getElementById('input-pernas').value = data.pernas ?? "Sem dados";
                document.getElementById('input-panturrilha').value = data.panturrilha ?? "Sem dados";
                document.getElementById('input-observacoes').value = data.observacoes ?? "Sem dados";
                // dados pagamento
                document.getElementById('valor').value = `R$${data.valor ?? "Sem dados"}`;
                document.getElementById('data_pagamento').value = data.data_pagamento ?? "Sem dados";
                document.getElementById('plano').value = data.plano_aluno ?? "Sem dados";
                //desabilitação de itens do modal
                const confirmar = document.getElementById('confirmar');
                const confirmarativar = document.getElementById('confirmarativar');
                  const fechar = document.getElementById('fechar');
                if (confirmar || confirmarativar || fechar){
                    confirmar.style.display = 'none'; 
                    confirmarativar.style.display = 'none'; 
                    fechar.style.display = 'none';
                }
                
 
            }
        })
        .catch(error => {
            console.error('Erro ao buscar dados do aluno:', error);
        });
    
    });

});
}



function editarFicha(){
document.querySelectorAll('.editar').forEach(button => {
    button.addEventListener('click', function() {

        const alunoIdFicha = this.getAttribute('data-id');
        document.getElementById('popupeditar').setAttribute('data-id', alunoIdFicha);  
        document.getElementById('popupeditar').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('popupeditar').innerHTML = `Carregando...`
       
        fetch(`/alunos/visualizar/${alunoIdFicha}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        })
        .then(response => response.json())
      
        .then(data => {
            if (data.error) {
           document.getElementById('popupeditar').innerHTML = `<div class="boxbtn" id="error">
           <h4 class="errormsg">Erro: Aluno não encontrado. Cód:100. Consulte o suporte. </h4>
           <button class="addaluno" id="close" onclick="fecharAnamnese()">
                        <i class="fa-solid fa-xmark"></i>Fechar</button></div>
             `;
                document.getElementById('fechar').style.display = "block";
                document.getElementById('overlay').style.display = 'block';
            } else {
                const idadeout = calcularIdade(data.data_nascimento);
                document.getElementById('popupeditar').innerHTML = `  <div class="conteudo-ficha">
                <div class="form-titulo" id="titulopopup">
                        <div class="topinfoedit">
                            <div class="ladoesquerdoinfo">
                                <h4 id="nomealunoficha">EDITAR ALUNO:</h4>
                                <input type="text" name="idalunoedit" id="idalunoedit" style="opacity: 0;">
                            </div><!--ladoesquerdoinfo-->
                            <div class="btnamnese">
    
                                <button class="addaluno" id="save2">
                                    <i class="fa-solid fa-floppy-disk"></i>
                                    Salvar
                                </button>
                                <button class="addaluno" id="close2" onclick="fecharAnamnese()">
                                    <i class="fa-solid fa-xmark"></i>Fechar</button>
    
                            </div>
                        </div><!--topinfoedit-->
                </div>
                <div class="conteudo-anamnese" id="conteudoficha">
                  <form id="formedit" action="" method="post">
                    <div class="ladoesquerdoform">
                       <div class="form-titulo">
                            <h1 id="h1tituloinfo">INFOMAÇÕES PESSOAIS</h1>
                        </div>
                  
                        <div class="form-group">
                            <label for="nome">NOME COMPLETO:</label>
                            <input type="text" id="nome" name="nome" value="${data.nome ?? "Sem dados"}" required maxlenght="255"
                                placeholder="Nome completo" >
                        </div>
                        <div class="compact">
                            <div class="form-group" id="inputdata">
                                <label for="data_nascimento">DATA DE NASCIMENTO:</label>
                                <input type="date" id="data_nascimento" value="${data.data_nascimento ?? null}" name="data_nascimento" maxlength="10"
                                    >
                            </div>
                            <div class="form-group">
                                <label for="idade">IDADE:</label>
                                <input type="text" id="idade" value="${idadeout  ?? "Sem dados"}" name="idade" readonly placeholder="Idade" >
                            </div>
                        </div><!--compact-->
                        <div class="compact">
                            <div class="form-group">
                                <label for="cpf">CPF:</label>
                                <input type="text" id="cpf" value="${data.cpf ?? "Sem dados"}" name="cpf" maxlength="14"
                                    placeholder="000.000.000-00" >
                            </div>
                            <div class="form-group">
                                <label for="rg">RG:</label>
                                <input type="text"id="rg" value="${data.rg ?? "Sem dados"}" name="rg" placeholder="00.000.000-00" maxlength="13">
                            </div>
                        </div><!--compact-->
                        <div class="compact">
                            <div class="form-group">
                                <label for="telefone">TELEFONE:</label>
                                <input class="smallinput" value="${data.telefone ?? "Sem dados"}" type="tel" id="telefone" name="telefone" maxlength="15"
                                    placeholder="(00) 00000-0000" >
                            </div>
                            <div class="form-group">
                                <label for="telefone_familia">TELEFONE FAMILIAR:</label>
                                <input type="tel" id="telefone_familia" value="${data.telefone_familia ?? "Sem dados"}" maxlength="15" name="telefone_familia"
                                    placeholder="(00) 00000-0000" >
                            </div>
                        </div><!--compact-->
                        <div class="form-group">
                            <label for="email">EMAIL:</label>
                            <input type="email" id="email" value="${data.email ?? "Sem dados"}" name="email" placeholder="email@email.com" >
                        </div>
                        <br><br><br><br><p id='space'></p>
                        <div class="form-titulo">
                            <h5>HISTÓRICO DE SAÚDE</h5>
                        </div>
                        <div class="compact">
                            <div class="form-group">
                                <label for="cirurgia">QUAL CIRURGIA JÁ FEZ:</label>
                                <input type="text" id="cirurgia" value="${data.cirurgia ?? "Sem dados"}" name="cirurgia" placeholder="Descreva a cirurgia"
                                    >
                            </div>
                            <div class="form-group">
                                <label for="dorme_bem">QUANTAS HORAS DE SONO:</label>
                                <input type="text" id="dorme_bem" value="${data.dorme_bem ?? "Sem dados"}" name="dorme_bem"
                                    placeholder="Quantidade de horas de sono" >
                            </div>
                        </div><!--compact-->
                        <div class="compact">
                            <div class="form-group">
                                <label for="lesao_detalhes">LESÃO ARTICULAR:</label>
                                <input type="text" id="lesao_detalhes_input2" value="${data.lesao_detalhes_input ?? "Sem dados"}" name="lesao_detalhes"
                                    placeholder="Descreva a lesão">
                            </div>
                            <div class="form-group">
                                <label for="coluna_detalhes">PROBLEMA DE COLUNA:</label>
                                <input type="text" id="coluna_detalhes_input2" value="${data.coluna_detalhes_input ?? "Sem dados"}" name="coluna_detalhes"
                                    placeholder="Descreva o problema">
    
                            </div>
                        </div><!--compact-->
                        <div class="form-group">
                            <label for="tempo_sem_medico">ÚLTIMA VEZ QUE FOI AO MÉDICO:</label>
                            <input type="text" id="tempo_sem_medico" value="${data.tempo_sem_medico ?? "Sem dados"}" name="tempo_sem_medico"
                                placeholder="Ex: 6 meses, 1 ano">
                        </div>
                        <div class="form-group">
                            <label for="uso_medicamento">USA QUAL MEDICAMENTO:</label>
                            <input type="text" id="uso_medicamento" value="${data.uso_medicamento ?? "Sem dados"}" name="uso_medicamento"
                                placeholder="Medicamento usado">
                        </div>
    
                        <div class="form-group">
                            <label for="problema_saude">TEM QUAL PROBLEMA DE SAÚDE</label>
                            <input type="text" id="problema_saude" value="${data.problema_saude ?? "Sem dados"}"name="problema_saude"
                                placeholder="Descreva o problema de saúde">
                        </div>
                        <div class="compact">
                            <div class="form-group" id="infartoS">
                                <label for="varizes">TEM VARIZES:</label>
                                <select class="smallinput" id="varizes" name="varizes">
                                <option value="" disabled selected>${data.varizes ?? "Sem dados"}</option>
                                <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="infarto">INFARTO:</label>
                                <select "id="infarto" name="infarto">
                                 <option value="" disabled selected>${data.infarto ?? "Sem dados"}</option>
                                 <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                                </select>
                            </div>
                        </div><!--compact-->
                        <div class="compact">
                            <div class="form-group">
                                <label for="doenca_detalhes">DOENÇA CARDÍACA:</label>
                                <input type="text" id="doenca_detalhes_input2" value="${data.doenca_detalhes_input ?? "Sem dados"}" name="doenca_detalhes"
                                    placeholder="Descreva a doença">
    
                            </div>
                            <div class="form-group">
                                <label for="derrame">DERRAME:</label>
                                <select id="derrame"  name="derrame">
                                <option value="" disabled selected>${data.derrame ?? "Sem dados"}</option>
                                 <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                                </select>
                            </div>
                        </div>
                        <div class="compact">
                            <div class="form-group">
                                <label for="diabetes">DIABETES:</label>
                                <select  class="smallinput" id="diabetes" name="diabetes">
                                 <option value="" disabled selected>${data.diabetes ?? "Sem dados"}</option>
                                 <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="obesidade">OBESIDADE:</label>
                                <select id="obesidade" name="obesidade"> 
                                <option value="" disabled selected>${data.obesidade ?? "Sem dados"}</option>
                                 <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                                </select>
                            </div>
                        </div><!--compact-->
                        <div class="form-group">
                            <label for="colesterol_elevado">COLESTEROL ALTO:</label>
                            <select id="colesterol_elevado" value="${data.colesterol_elevado ?? "Sem dados"}" name="colesterol_elevado">
                                <option value="" disabled selected>${data.colesterol_elevado ?? "Sem dados"}</option>
                                 <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                                </select>
    
                        </div>
                        <h2 id="titulo-parq">QUESTIONÁRIO PAR-Q</h2>
                        <table id="tabela-parq">
                            <tr id="cabecalho-tabela">
                                <th id="sim-header">SIM</th>
                                <th id="nao-header">NÃO</th>
                                <th id="questao-header">QUESTÕES</th>
                            </tr>
                            <tr id="linha-1">
                                <td class="sim" id="sim1"><label id="label-sim1"><input type="radio"
                                            name="par_q1" value="sim" id="input-sim12"></label></td>
                                <td class="nao" id="nao1"><label id="label-nao1"><input type="radio"
                                            name="par_q1" value="não" id="input-nao12"></label></td>
                                <td class="questao" id="questao1">1- Seu médico alguma vez disse que você tem problema no
                                    coração e que deve apenas praticar atividades físicas recomendadas por médico?</td>
                            </tr>
                            <tr id="linha-2">
                                <td class="sim" id="sim2"><label id="label-sim2"><input type="radio"
                                            name="par_q2" value="sim" id="input-sim22"></label></td>
                                <td class="nao" id="nao2"><label id="label-nao2"><input type="radio"
                                            name="par_q2" value="não" id="input-nao22"></label></td>
                                <td class="questao" id="questao2">2- Você sente dor no peito quanto pratica atividade
                                    física?</td>
                            </tr>
                            <tr id="linha-3">
                                <td class="sim" id="sim3"><label id="label-sim3"><input type="radio"
                                            name="par_q3" value="sim" id="input-sim32"></label></td>
                                <td class="nao" id="nao3"><label id="label-nao3"><input type="radio"
                                            name="par_q3" value="não" id="input-nao32"></label></td>
                                <td class="questao" id="questao3">3- No mês passado, você teve dor no peito quanto não
                                    estava praticando atividade física?</td>
                            </tr>
                            <tr id="linha-4">
                                <td class="sim" id="sim4"><label id="label-sim4"><input value="sim" type="radio"
                                            name="par_q4" id="input-sim42"></label></td>
                                <td class="nao" id="nao4"><label id="label-nao4"><input type="radio"
                                            name="par_q4" value="não" id="input-nao42"></label></td>
                                <td class="questao" id="questao4">4- Você perde o equilíbrio devido a tonturas ou alguma
                                    vez perdeu a consciência?</td>
                            </tr>
                            <tr id="linha-5">
                                <td class="sim" id="sim5"><label id="label-sim5"><input value="sim" type="radio"
                                            name="par_q5" id="input-sim52"></label></td>
                                <td class="nao" id="nao5"><label id="label-nao5"><input type="radio"
                                            name="par_q5" value="não" id="input-nao52"></label></td>
                                <td class="questao" id="questao5">5- Você tem problema ósseo ou articular que poderia
                                    ficar pior por alguma mudança em sua atividade física?</td>
                            </tr>
                            <tr id="linha-6">
                                <td class="sim" id="sim6"><label id="label-sim6"><input  value="sim" type="radio"
                                            name="par_q6" id="input-sim62"></label></td>
                                <td class="nao" id="nao6"><label id="label-nao6"><input type="radio"
                                            name="par_q6" value="não" id="input-nao62"></label></td>
                                <td class="questao" id="questao6">6- Seu médico está atualmente receitando algum remédio
                                    (por exemplo, diuréticos) para pressão arterial ou problema cardíaco?</td>
                            </tr>
                            <tr id="linha-7">
                                <td class="sim" id="sim7"><label id="label-sim7"><input value="sim" type="radio"
                                            name="par_q7" id="input-sim72"></label></td>
                                <td class="nao" id="nao7"><label id="label-nao7"><input type="radio"
                                            name="par_q7" value="não" id="input-nao72"></label></td>
                                <td class="questao" id="questao7">7- Você sabe de qualquer outra razão pela qual não deva
                                    praticar atividade física?</td>
                            </tr>
                        </table>
    
                    </div><!--ladoesquerdoform-->
                    <div class="ladodireitoform">
                        <div class="form-titulo">
                            <h1>ENDEREÇO</h1>
                        </div>
                        <div class="compact">
                            <div class="form-group">
                                <label for="rua">RUA:</label>
                                <input type="text" id="rua" value="${data.rua ?? "Sem dados"}" name="rua" placeholder="Digite sua rua"
                                    >
                            </div>
                            <div class="form-group">
                                <label for="numero">Nº:</label>
                                <input type="text" id="numero" value="${data.numero ?? "Sem dados"}" name="numero"
                                    placeholder="Número da residência" >
                            </div>
    
    
                        </div><!--compact-->
                        <div class="compact">
                            <div class="form-group">
                                <label for="complemento">COMPLEMENTO:</label>
                                <input type="text" id="complemento" value="${data.complemento ?? "Sem dados"}" name="complemento"
                                    placeholder="Apartamento, bloco, sala (opcional)" >
                            </div>
                            <div class="form-group">
                                <label for="bairro">BAIRRO:</label>
                                <input type="text" id="bairro" value="${data.bairro ?? "Sem dados"}" name="bairro"
                                    placeholder="Digite seu bairro" >
                            </div>
    
                        </div><!--compact-->
                        <div class="compact">
                            <div class="form-group">
                                <label for="cidade">CIDADE:</label>
                                <input type="text" id="cidade" name="cidade"
                                    placeholder="Digite sua cidade" value="${data.cidade ?? "Sem dados"}" >
                            </div>
                            <div class="form-group">
                                <label for="cep">CEP:</label>
                                <input type="text" id="cep" value="${data.cep ?? "Sem dados"}" name="cep" placeholder="00000-000"
                                    maxlength="9" >
                            </div>
    
                        </div><!--compact-->
                        <div class="form-titulo">
                            <h1>PAGAMENTO</h1>
                        </div>
                        <div class="form-group">
                            <label for="valor">VALOR:</label>
                            <input type="text"value="R$${data.valor ?? "Sem dados"}"  id="valor" name="valor" placeholder="R$0,00" maxlength="100"
                                required >
                        </div>
                        <div class="compact">
    
                            <div class="form-group">
                                <label for="data_pagamento">DATA DE PAGAMENTO:</label>
                                <input type="date" value="${data.data_pagamento || ''}" id="data_pagamento" name="data_pagamento" required >
                            </div>
                            <div class="form-group">
                                <label for="plano">Plano:</label>
                                <select id="plano"  name="plano" required >
                                <option value="" disabled selected>${data.plano_aluno ?? "Sem dados"}</option>
                                <option value="MENSAL">MENSAL</option>
                                <option value="SEMESTRAL">SEMESTRAL</option>
                                <option value="ANUAL" >ANUAL</option>
                                </select>
                            </div>
                        </div><!--compact-->
                        <br><br>
                        <div class="form-titulo">
                            <h4 id="h5form">HISTÓRICO E OBJETIVO NA ACADEMIA</h4>
                        </div>
                        <div class="form-group">
                            <label for="modalidade_anterior">QUE MODALIDADE JÁ FEZ:</label>
                            <input type="text" value="${data.modalidade_anterior ?? "Sem dados"}" id="modalidade_anterior" name="modalidade_anterior"
                                placeholder="Descreva quais modalidades já realizou">
                        </div>
                        <div class="form-group">
                            <label for="modalidade_atual">QUE MODALIDADE PRATICA ATUALMENTE:</label>
                            <input type="text" value="${data.modalidade_atual ?? "Sem dados"}" id="modalidade_atual" name="modalidade_atual"
                                placeholder="Descreva qual modalidade realiza atualmente">
                        </div>
                        <div class="form-group">
                            <label for="objetivo_atividade_fisica">QUAL O SEU OBJETIVO:</label>
                            <input type="text" value="${data.objetivo_atividade_fisica ?? "Sem dados"}" id="objetivo_atividade_fisica" name="objetivo_atividade_fisica"
                                placeholder="Descreva qual seu objetivo com a atividade física">
                        </div>
                        <div class="form-group">
                            <label for="como_soube_da_academia">COMO SOUBE DA ACADEMIA:</label>
                            <input type="text" value="${data.como_soube_da_academia ?? "Sem dados"}" id="como_soube_da_academia" name="como_soube_da_academia"
                                placeholder="Como conheceu nossa academia?">
                        </div>
                        <div class="form-titulo">
            <h5>DADOS ANTROPOMÉTRICOS E DE SAÚDE</h5>
        </div>
        <div class="compact">
            <div class="form-group">
                <label for="peso">PESO:</label>
                <input type="text" id="peso" value="${data.peso ?? "Sem dados"}" name="peso" placeholder="Peso" >
            </div>
            <div class="form-group">
                <label for="tipo_sanguineo">TIPO SANGUÍNEO:</label>
                <select id="tipo_sanguineo" name="tipo_sanguineo" >
                    <option value="" disabled selected>${data.tipo_sanguineo ?? "Sem dados"}</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="form-group">
                <label id="labe" for="pressao_arterial">PRESSÃO:</label>
                <select id="pressao_arterial" name="pressao_arterial" >
                    <option value="" disabled selected>${data.pressao_arterial ?? "Sem dados"}</option>
                    <option value="Baixa">Baixa</option>
                    <option value="Normal">Normal</option>
                    <option value="Alta">Alta</option>
                    <option value="Pré Hipertensão">Pré-hipertensão</option>
                    <option value="Hipertensão Estágio 1">Hipertensão Estágio 1</option>
                    <option value="Hipertensão Estágio 2">Hipertensão Estágio 2</option>
                    <option value="Crise Hipertensiva">Crise Hipertensiva</option>
                </select>
            </div>
        </div><!--compact-->
        <div class="form-titulo">
            <h5>ESTILO DE VIDA</h5>
        </div>
        <div class="compact">
        <div class="form-group">
            <label for="fuma">FUMA:</label>
            <select class="smallinput" id="fumar" name="fuma" >
            <option value="" disabled selected>${data.fumar ?? "Sem dados"}</option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
            <option value="As Vezes">As Vezes</option>
            </select>
        </div>
        <div class="form-group">
            <label for="faz_dieta">FAZ DIETA:</label>
            <select id="faz_dieta" name="faz_dieta" >
            <option value="" disabled selected>${data.faz_dieta ?? "Sem dados"}</option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
            <option value="As Vezes">As Vezes</option>
            </select>
        </div>
    </div><!--compact-->
    <div class="compact">
        <div class="form-group">
            <label for="usa_bebida_alcoolica">CONSOME ÁLCOOL:</label>
            <select  id="bebida_alcoolica" name="usa_bebida_alcoolica" >
            <option value="" disabled selected>${data.usa_bebida_alcoolica ?? "Sem dados"}</option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
            <option value="As Vezes">As Vezes</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sedentario">SEDENTÁRIO:</label>
            <select id="sedentario" name="sedentario" >
            <option value="" disabled selected>${data.sedentario ?? "Sem dados"}</option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
            <option value="As Vezes">As Vezes</option>
            </select>
        </div>
    </div><!--compact-->
    <div class="form-titulo" id="titulomedida">
        <h4 id="titilo-parq">MEDIDAS ANTROPOMÉTRICAS (CM)</h4>
    </div>
                        <table id="tabela-medidas">
                            <tr id="linha-altura">
                                <th id="th-torax">ALTURA:</th>
                                <td class="input-coluna" id="td-altura"><input id="input-altura" value="${data.altura ?? "Sem dados"}" type="text"
                                        name="altura" placeholder="Metros"></td>
                            </tr>
                            <tr id="linha-torax">
                                <th id="th-torax">TÓRAX:</th>
                                <td class="input-coluna" id="td-torax"><input id="input-torax" value="${data.torax ?? "Sem dados"}" type="text"
                                        name="torax" placeholder="Centímetros"></td>
                            </tr>
                            <tr id="linha-cintura">
                                <th id="th-cintura">CINTURA:</th>
                                <td class="input-coluna" id="td-cintura"><input id="input-cintura" value="${data.cintura ?? "Sem dados"}" type="text"
                                        name="cintura" placeholder="Centímetros"></td>
                            </tr>
                            <tr id="linha-abdome">
                                <th id="th-abdome">ABDOME:</th>
                                <td class="input-coluna" id="td-abdome"><input id="input-abdome" value="${data.abdome ?? "Sem dados"}" type="text"
                                        name="abdome" placeholder="Centímetros"></td>
                            </tr>
                            <tr id="linha-quadril">
                                <th id="th-quadril">QUADRIL:</th>
                                <td class="input-coluna" id="td-quadril"><input id="input-quadril" value="${data.quadril ?? "Sem dados"}" type="text"
                                        name="quadril" placeholder="Centímetros"></td>
                            </tr>
                            <tr id="linha-bracos">
                                <th id="th-bracos">BRAÇOS (direito e esquerdo):</th>
                                <td class="input-coluna" id="td-bracos"><input id="input-bracos" value="${data.bracos ?? "Sem dados"}" type="text"
                                        name="bracos" placeholder="Centímetros"></td>
                            </tr>
                            <tr id="linha-antebracos">
                                <th id="th-antebracos">ANTEBRAÇOS (direito e esquerdo):</th>
                                <td class="input-coluna" id="td-antebracos"><input id="input-antebracos" value="${data.antebracos ?? "Sem dados"}" type="text"
                                        name="antebracos" placeholder="Centímetros"></td>
                            </tr>
                            <tr id="linha-pernas">
                                <th id="th-pernas">PERNA (direita e esquerda):</th>
                                <td class="input-coluna" id="td-pernas"><input id="input-pernas" value="${data.pernas ?? "Sem dados"}" type="text"
                                        name="pernas" placeholder="Centímetros"></td>
                            </tr>
                            <tr id="linha-panturrilha">
                                <th id="th-panturrilha">PANTURRILHA (direita e esquerda):</th>
                                <td class="input-coluna" id="td-panturrilha"><input id="input-panturrilha"
                                        type="text" name="panturrilha" value="${data.panturrilha ?? "Sem dados"}" placeholder="Centímetros"></td>
                            </tr>
                            <tr id="linha-observacoes">
                                <th id="th-observacoes">OBSERVAÇÕES:</th>
                                <td class="input-coluna" id="td-observacoes"><input id="input-observacoes"
                                        type="text" name="obs" placeholder="Observações" value="${data.observacoes ?? "Sem dados"}"></td>
                            </tr>
                        </table>
                        
                    </div><!--ladodireitoform-->
                    </form>
                </div>
               
            </div>
             
            
        </div>
        
        
    `;

    //máscaras

    const inputValor = document.getElementById('valor');

    inputValor.addEventListener('input', function (event) {
    let value = inputValor.value;


    value = value.replace(/\D/g, '');

    value = (value / 100).toFixed(2);

    value = value.replace('.', '.');

    inputValor.value = `R$ ${value}`;
});

    const cpfInput = document.getElementById('cpf');

    if (cpfInput) {
        cpfInput.addEventListener('input', function(event) {
            let value = this.value.replace(/\D/g, '');

       
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

            this.value = value;
        });
    }

     const telefoneInput = document.getElementById('telefone');

    if (telefoneInput) {
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
    }

     const telefoneFamiliaInput = document.getElementById('telefone_familia');

    if (telefoneFamiliaInput) {
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
    'input-pernas',
    'input-altura'
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

    const el = document.getElementById('conteudoficha');
    el.scrollTop = 0;
    const dataInput1 = data.input_sim1;
    const dataInput2 = data.input_sim2;
    const dataInput3 = data.input_sim3;
    const dataInput4 = data.input_sim4;
    const dataInput5 = data.input_sim5;
    const dataInput6 = data.input_sim6;
    const dataInput7 = data.input_sim7;
    if (dataInput1 === "sim"){
        document.getElementById('input-sim12').checked = true;
    } else {
        document.getElementById('input-nao12').checked = true;
    }
     if (dataInput2 === "sim"){
        document.getElementById('input-sim22').checked = true;
    } else {
        document.getElementById('input-nao22').checked = true;
    }
     if (dataInput3 === "sim"){
        document.getElementById('input-sim32').checked = true;
    } else {
        document.getElementById('input-nao32').checked = true;
    }
     if (dataInput4 === "sim"){
        document.getElementById('input-sim42').checked = true;
    } else {
        document.getElementById('input-nao42').checked = true;
    }
     if (dataInput5 === "sim"){
        document.getElementById('input-sim52').checked = true;
    } else {
        document.getElementById('input-nao52').checked = true;
    }
     if (dataInput6 === "sim"){
        document.getElementById('input-sim62').checked = true;
    } else {
        document.getElementById('input-nao62').checked = true;
    }
     if (dataInput7 === "sim"){
        document.getElementById('input-sim72').checked = true;
    } else {
        document.getElementById('input-nao72').checked = true;
    }

    document.getElementById('save2').addEventListener('click', function () {

    document.getElementById("popupeditar").style.display = "none";
    document.getElementById("popup").style.display = "block";
    document.getElementById("popup").innerHTML = ` <div class="popup-content">
            <h4 id="h4confimar">Tem certeza?</h4>
            <div class="boxbtn">
                <button id="confirmarpagar">Sim</button>
                <button id="fecharpagar">Não</button>
            </div>
        </div>`;
   
    document.getElementById("overlay").style.display = "block";


    const confirmarBtn = document.getElementById("confirmarpagar");
    const fecharBtn = document.getElementById("fecharpagar");

  
    confirmarBtn.onclick = function () {
         document.getElementById("popup").innerHTML = `Editando...`;
        const form = document.getElementById('formedit');
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const formData = new FormData(form);
        
        fetch(`/alunos/editar/${alunoIdFicha}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
          document.getElementById("popup").textContent = `${data.success}`;

            setTimeout(() => {
    document.getElementById("popup").style.display = "none";
    document.getElementById("overlay").style.display = "none";
    loadDefaultFunctions();
}, 2000);
        })
        .catch(error => {
            console.error('Erro ao enviar:', error);
        });
    };

   
    fecharBtn.onclick = function () {
      
        document.getElementById("popup").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    };
});

            }
        })
       
        .catch(error => {
            console.error('Erro ao buscar dados do aluno:', error);
            document.getElementById('popupeditar').querySelector('h4').textContent = "Ocorreu um erro ao visualizar os dados."; 
            document.getElementById('confirmar').style.display = 'none';  
            document.getElementById('fechar').textContent = 'Fechar'; 
       
        });
    
    });

});
}

function closePopup(){
    document.getElementById('popup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}
document.getElementById('fechar').addEventListener('click', () => {
    document.getElementById('popup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
});
    function fecharAnamnese() {
        event.preventDefault();
        document.getElementById('popupficha').style.display = 'none';
        document.getElementById('popupeditar').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }

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
const searchInput = document.getElementById('searchinput');
let timeoutId;

function buscarAlunos(searchTerm = '') {
  
    document.getElementById("tbodyalunoson").style.display = "none";
    
    const tbodyId = 'tbodybuscaon'; 
    const tbody = document.getElementById(tbodyId);
    tbody.style.display = 'table-row-group';
    tbody.innerHTML = '';

    if (searchTerm === '') {
        document.getElementById("tbodybuscaon").style.display = "none";
    document.getElementById("tbodyalunoson").style.display = "table-row-group";
        return;
    }

    fetch(`/alunos/buscar?termo=${searchTerm}&situacao=ativo`)
        .then(response => response.json())
        .then(alunos => {
           
            if (alunos.length === 0) {
                tbody.innerHTML = ` 
                    <tr>
                        <td colspan="5" id="nolist">Nenhum aluno encontrado.</td>
                    </tr>
                `;
                return;
            }

            const alunosSet = new Set();

            alunos.forEach(aluno => {

                const alunoKey = `${aluno.id}-${aluno.pessoa_nome ?? ""}`;

                if (!alunosSet.has(alunoKey)) {
                    alunosSet.add(alunoKey); 

                    tbody.innerHTML += `
                        <tr>
                            <td>${aluno.id}</td>
                            <td>${aluno.pessoa_nome ?? "Sem dados"}</td>
                            <td>${aluno.pessoa_endereco ?? "Sem dados"}</td>
                            <td>${aluno.pessoa_telefone ?? "Sem dados"}</td>
                            <td>
                                <div class="boxbuttons">
                                    <button class="ficha" title="VER FICHA" data-id="${aluno.id}">
                                        <i id="btnacticon" class="fa-solid fa-eye"></i>
                                    </button>
                                    <button class="editar" title="EDITAR ALUNO" data-id="${aluno.id}">
                                        <i id="btnacticon" class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="desativar" title="DESATIVAR ALUNO" data-id="${aluno.id}">
                                        <i id="btnacticon" class="fa-solid fa-circle-xmark"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                    exibirFicha();
                    editarFicha();
                    desativarAluno();
                }
            });
        })
        .catch(error => console.error('Erro ao buscar alunos:', error));
}

searchInput.addEventListener('input', function () {
    const searchTerm = this.value.toLowerCase();
    clearTimeout(timeoutId); 
    timeoutId = setTimeout(() => {
        buscarAlunos(searchTerm);
    }, 300);
});

const searchInput2 = document.getElementById('searchinput2');
let timeoutId2;

function buscarAlunos2(searchTerm = '') {
  
    document.getElementById("tbodyalunosoff").style.display = "none";
    
    const tbodyId = 'tbodybuscaoff'; 
    const tbody = document.getElementById(tbodyId);
    tbody.style.display = 'table-row-group';
    tbody.innerHTML = '';

    if (searchTerm === '') {
        document.getElementById("tbodybuscaoff").style.display = "none";
    document.getElementById("tbodyalunosoff").style.display = "table-row-group";
        return;
    }

    fetch(`/alunos/buscar_inativo?termo=${searchTerm}`)
        .then(response => response.json())
        .then(alunos => {
           
            if (alunos.length === 0) {
                tbody.innerHTML = ` 
                    <tr>
                        <td colspan="5" id="nolist">Nenhum aluno encontrado.</td>
                    </tr>
                `;
                return;
            }

            const alunosSet = new Set();
            var numero = 1;
            alunos.forEach(aluno => {

                const alunoKey = `${aluno.id}-${aluno.pessoa_nome ?? ""}`;

                if (!alunosSet.has(alunoKey)) {
                    alunosSet.add(alunoKey); 

                    tbody.innerHTML += `
                        <tr>
                            <td>${numero}</td>
                            <td>${aluno.pessoa_nome ?? "Sem dados"}</td>
                            <td>${aluno.pessoa_endereco ?? "Sem dados"}</td>
                            <td>${aluno.pessoa_telefone ?? "Sem dados"}</td>
                            <td>

                              <div class="boxbuttons">
                                        <button class="ficha" data-id="${aluno.id}" title="VER FICHA">
                                            <i id="btnacticon" class="fa-solid fa-eye"></i>
                                        </button>
                                        <button class="editar" data-id="${aluno.id}" title="EDITAR ALUNO">
                                            <i id="btnacticon" class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        <button class="ativar" title="ATIVAR ALUNO" data-id="${aluno.id}">
                                            <i id="btnacticon" class="fa-solid fa-user-check"></i>
                                        </button>
                                        <button class="apagar" title="EXCLUIR ALUNO" data-id="${aluno.id}">
                                            <i id="btnacticon" class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                            </td>
                        </tr>
                    `;
                    exibirFicha();
                    editarFicha();
                    ativarAluno();
                    excluirAluno();
                    numero++;
                }
            });
        })
        .catch(error => console.error('Erro ao buscar alunos:', error));
}
//máscaras



searchInput2.addEventListener('input', function () {
    const searchTerm2 = this.value.toLowerCase();
    clearTimeout(timeoutId2); 
    timeoutId2 = setTimeout(() => {
        buscarAlunos2(searchTerm2);
    }, 300);
});



function loadDefaultFunctions(){
loadTheme();
exibirFicha();
editarFicha();
desativarAluno();
ativarAluno();
excluirAluno();
}

loadDefaultFunctions();

window.fecharAnamnese = fecharAnamnese;