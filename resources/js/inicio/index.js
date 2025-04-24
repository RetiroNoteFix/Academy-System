// 🌗 Temas
const temaDia = document.getElementById("themeday");
const temaNoite = document.getElementById("nighttheme");

// 🧭 Navegação - Ícones de navegação normal
const optInicio = document.getElementById("optInicio");
const optAlunos = document.getElementById("optAlunos");
const optPagamento = document.getElementById("optPagamentos");
const optUsuario = document.getElementById("optUsuarios");
const optConfig = document.getElementById("optConfig");

// 🧭 Navegação - Ícones de navegação escurecidos/desativados
const optInicioN = document.getElementById("optInicioN");
const optAlunosN = document.getElementById("optAlunosN");
const optPagamentosN = document.getElementById("optPagamentosN");
const optUsuariosN = document.getElementById("optUsuariosN");
const optConfigN = document.getElementById("optConfigN");
const pagBtn = document.getElementById("pages");
const previousPage = document.getElementById("previouspage");
const nextPage = document.getElementById("nextpage");

// 👤 Informações de usuário
const usericon = document.getElementById("usericon");
const userout = document.getElementById("userout");

// 🛠️ Configurações
const config1 = document.getElementById("optconfigicon1");
const config1on = document.getElementById("optconfigicon1on");
const configsection = document.getElementById("sectionconfig");
const optconfigs = document.querySelector(".optconfigs");
const h1config = document.getElementById("h1config");

// 🧱 Estrutura principal
const mainheader = document.getElementById("mainheader");
const linhamenu = document.getElementById("linhamenu");
const linetop = document.getElementById("linetop");
const linetopconfig = document.getElementById("linetopconfig");
const menu = document.querySelector(".menu");
const mainContent = document.querySelector("#maincontent");
const pagetitle = document.querySelector("#pagetitle");
const appname = document.getElementById("appname");
const pesquisa = document.getElementById("search");
const iconePesquisa = document.getElementById("searchicon");
const inputPesquisa = document.getElementById("searchinput");
const body = document.getElementById("body");
const pendente = document.querySelector(".pendente");




// 📢 Alertas e mensagens
const h1alert = document.getElementById("h1alert");

// 📋 Elementos de conteúdo genéricos
const opticons = document.querySelectorAll("[data-opticon]");
const paragraphs = document.querySelectorAll("p");
const copy = document.querySelector("#copy");
const footers = document.querySelectorAll("footer");

// 📊 Tabelas
const thElements = document.querySelectorAll("table th");
const tdElements = document.querySelectorAll("table td");
const trElements = document.querySelectorAll("table tr");

// 🔘 Botões
const boxbuttons = document.querySelectorAll(".boxbuttons");
const fichabtn = document.querySelectorAll(".ficha");
const ignorarbtn = document.querySelectorAll(".ignorar");
  
// Alvos que afetam o estilo do botão "Início"
const menuItems = [optAlunos, optPagamento, optUsuario, optConfig];

function removerDestaqueInicio() {
  optInicio.style.backgroundColor = "#fff";
  optInicio.style.border = "none";
}

function aplicarDestaqueInicio() {
  optInicio.style.backgroundColor = "#e0dfdf";
  optInicio.style.borderLeft = "2px solid #616161";
}

menuItems.forEach(item => {
  item.addEventListener("mouseover", removerDestaqueInicio);
  item.addEventListener("mouseout", aplicarDestaqueInicio);
});

[optConfig, optConfigN].forEach(btn => {
  btn.addEventListener('click', () => {
    configsection.classList.toggle("exibir");
  });
});

// Alvos que afetam o estilo do botão "Início" no modo noite
const menuItemsNoite = [optAlunosN, optPagamentosN, optUsuariosN, optConfigN];

function removerDestaqueInicioNoite() {
  optInicioN.style.backgroundColor = "#212529";
  optInicioN.style.border = "none";
}

function aplicarDestaqueInicioNoite() {
  optInicioN.style.backgroundColor = "#535151";
  optInicioN.style.borderLeft = "2px solid red";
}

menuItemsNoite.forEach(item => {
  item.addEventListener("mouseover", removerDestaqueInicioNoite);
  item.addEventListener("mouseout", aplicarDestaqueInicioNoite);
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
    boxbuttons.forEach(button => button.classList.remove('short'));
  }, 100);
}

function restoreExpandedMargins() {
  setTimeout(() => {
    boxbuttons.forEach(button => button.classList.add('short'));
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
      activateAutoCollapse();
    } else {
      deactivateAutoCollapse();
    }
  }
}

config1.addEventListener('click', () => {
  if (!autoCollapseEnabled) toggleAutoCollapse();
});

config1on.addEventListener('click', () => {
  if (autoCollapseEnabled) toggleAutoCollapse();
});

loadSavedState();

function applyDayTheme() {
  // Cores principais
  const textColor = "#333";
  const bgColor = "#ffffff";
  const borderColor = "#e0e0e0";

  // Elementos que devem exibir
  [optInicio, optAlunos, optPagamentos, optUsuarios].forEach(el => el.style.display = "flex");
  [optInicioN, optAlunosN, optPagamentosN, optUsuariosN].forEach(el => el.style.display = "none");

  // Estilização de componentes principais
  Object.assign(config1.style, { color: textColor });
  Object.assign(config1on.style, { color: textColor });
  Object.assign(copy.style, { color: textColor });
  Object.assign(h1config.style, { color: textColor });
  Object.assign(appname.style, { color: textColor });
  Object.assign(opticon.style, { color: textColor });
  Object.assign(h1alert.style, { color: textColor });
  Object.assign(usericon.style, { color: textColor });
  Object.assign(userout.style, { color: textColor });
  Object.assign(pagBtn.style, { backgroundColor: bgColor });
  Object.assign(previousPage.style, { color: textColor });
  Object.assign(nextPage.style, { color: textColor });
  Object.assign(pesquisa.style, { border: `1px solid ${borderColor}` });
  Object.assign(iconePesquisa.style, { color: textColor, backgroundColor: bgColor});
  // Tema claro em áreas grandes
  Object.assign(menu.style, { backgroundColor: bgColor, borderRight: `1px solid ${borderColor}` });
  Object.assign(mainContent.style, { backgroundColor: bgColor });
  Object.assign(mainheader.style, { backgroundColor: "#e9e9e9" });
  Object.assign(linhamenu.style, { backgroundColor: "#d6d5d5" });
  Object.assign(linetop.style, { backgroundColor: bgColor });
  Object.assign(linetopconfig.style, { backgroundColor: bgColor });
  Object.assign(configsection.style, { backgroundColor: bgColor });
  Object.assign(optconfigs.style, { backgroundColor: bgColor, border: "none" });
  Object.assign(inputPesquisa.style, { backgroundColor: bgColor, color: textColor });
  Object.assign(iconePesquisa.style, { color: textColor });
  Object.assign(body.style, { backgroundColor: bgColor });
  Object.assign(pendente.style, { color: "red" });
  

  // Ícones
  opticons.forEach(icon => icon.style.color = textColor);
  paragraphs.forEach(p => p.style.color = textColor);
  footers.forEach(f => {
    f.style.backgroundColor = bgColor;
    f.style.borderTop = `1px solid ${borderColor}`;
  });

  // Botões de tema
  temaDia.style.display = "none";
  temaNoite.style.display = "block";
  temaDia.style.color = textColor;

  // Ocultar/mostrar opções de tema
  optConfigN.style.display = "none";
  optConfig.style.display = "flex";

  // Remover classes noturnas
  [optInicio, optAlunos, optPagamentos, optUsuarios].forEach(el => el.classList.remove("noite"));
  [optInicioN, optAlunosN, optPagamentosN, optUsuariosN].forEach(el => el.classList.remove("night"));

  // Tabelas
  const styleTable = (el, bg, border, color) => {
    el.style.backgroundColor = bg;
    el.style.border = border;
    el.style.color = color;
  };

  document.querySelectorAll("th").forEach(th => styleTable(th, "#e9e9e9", `1px solid ${borderColor}`, textColor));
  document.querySelectorAll("td").forEach(td => styleTable(td, bgColor, `1px solid ${borderColor}`, textColor));
  document.querySelectorAll("tr").forEach(tr => {
    styleTable(tr, bgColor, `1px solid ${borderColor}`, textColor);
    tr.onmouseover = () => {
      tr.style.backgroundColor = "#f1f1f1";
      tr.querySelectorAll("td").forEach(td => td.style.backgroundColor = "#f1f1f1");
    };
    tr.onmouseout = () => {
      tr.style.backgroundColor = bgColor;
      tr.querySelectorAll("td").forEach(td => td.style.backgroundColor = bgColor);
    };
  });
}



// Função para aplicar o tema noite
function applyNightTheme() {
  const textColor = "#fff";
  const bgColor = "#212529";
  const headerColor = "#a02c2c";
  const borderColor = "#414141";

  // Exibir/ocultar menus noite e dia
  [optInicio, optAlunos, optPagamentos, optUsuarios].forEach(el => el.style.display = "none");
  [optInicioN, optAlunosN, optPagamentosN, optUsuariosN].forEach(el => el.style.display = "flex");

  // Ativar classes de tema
  [optInicio, optAlunos, optPagamentos, optUsuarios].forEach(el => el.classList.add("noite"));
  [optInicioN, optAlunosN, optPagamentosN, optUsuariosN].forEach(el => el.classList.add("night"));

  // Estilização básica
  Object.assign(config1.style, { color: textColor });
  Object.assign(config1on.style, { color: textColor });
  Object.assign(copy.style, { color: textColor });
  Object.assign(h1config.style, { color: textColor });
  Object.assign(appname.style, { color: textColor });
  Object.assign(opticon.style, { color: textColor });
  Object.assign(h1alert.style, { color: textColor });
  Object.assign(usericon.style, { color: textColor });
  Object.assign(userout.style, { color: textColor });
  Object.assign(temaDia.style, { display: "block", color: textColor });
  temaNoite.style.display = "none";

  // Containers e seções
  Object.assign(optconfigs.style, { backgroundColor: bgColor, border: "none" });
  Object.assign(linetopconfig.style, { backgroundColor: bgColor });
  Object.assign(configsection.style, { backgroundColor: bgColor });
  Object.assign(menu.style, { backgroundColor: bgColor, borderRight: "2px solid #8b8b8b" });
  Object.assign(mainContent.style, { backgroundColor: bgColor });
  Object.assign(mainheader.style, { backgroundColor: headerColor });
  Object.assign(linhamenu.style, { backgroundColor: "#972020" });
  Object.assign(linetop.style, { backgroundColor: bgColor });
  Object.assign(pagBtn.style, { backgroundColor: bgColor });
  Object.assign(previousPage.style, { color: textColor });
  Object.assign(nextPage.style, { color: textColor });
  Object.assign(pesquisa.style, { border: `1px solid ${textColor}` });
  Object.assign(iconePesquisa.style, { color: textColor, backgroundColor: bgColor});
  Object.assign(inputPesquisa.style, { backgroundColor: bgColor, color: textColor });
  Object.assign(body.style, { backgroundColor: bgColor });

  // Mostrar botões corretos
  optConfigN.style.display = "flex";
  optConfig.style.display = "none";

  // Ícones e textos
  opticons.forEach(icon => icon.style.color = textColor);
  paragraphs.forEach(p => p.style.color = textColor);
  footers.forEach(f => f.style.backgroundColor = bgColor);

  // Tabelas
  thElements.forEach(th => {
    Object.assign(th.style, {
      backgroundColor: headerColor,
      border: `0.1px solid ${borderColor}`,
      color: textColor
    });
  });

  tdElements.forEach(td => {
    Object.assign(td.style, {
      backgroundColor: bgColor,
      border: `0.1px solid ${borderColor}`,
      color: textColor
    });
  });

  trElements.forEach(tr => {
    Object.assign(tr.style, {
      backgroundColor: bgColor,
      border: `0.1px solid ${borderColor}`,
      color: textColor
    });

    tr.onmouseover = function () {
      this.style.backgroundColor = "#3a3a3a";
      this.querySelectorAll("td").forEach(td => td.style.backgroundColor = "#3a3a3a");
    };

    tr.onmouseout = function () {
      this.style.backgroundColor = bgColor;
      this.querySelectorAll("td").forEach(td => td.style.backgroundColor = bgColor);
    };
  });
}

function saveTheme(theme) {
  localStorage.setItem('theme', theme);
}

function loadTheme() {
  const savedTheme = localStorage.getItem('theme');
  console.log("Tema salvo:", savedTheme);
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
document.querySelectorAll('.ficha').forEach(button => {
  button.addEventListener('click', function() {
      const el = document.getElementById('conteudofichapgt');
     
      el.scrollTop = 0;
          
       
      const alunoIdFicha = this.getAttribute('data-id');  // Pega o ID do aluno do botão clicado
      console.log(alunoIdFicha);
     
      document.getElementById('popupficha').style.display = 'block';
      document.getElementById('overlay').style.display = 'block';
      document.getElementById('fechar').style.display = "block";
      document.getElementById('popupficha').setAttribute('data-id', alunoIdFicha);  // Armazena o ID no popup
 

      // Realiza a requisição para buscar os dados do aluno
      fetch(`/inicio/pendentes/${alunoIdFicha}`, {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
      })
      .then(response => response.json())
    
      .then(data => {
          console.log(data);
          if (data.error) {
              document.getElementById('popupficha').querySelector('p').textContent = data.error;
              document.getElementById('fechar').style.display = "block";
              document.getElementById('overlay').style.display = 'block';
          } else {
              const el = document.getElementById('conteudofichapgt');
   
    
    function calcularIdade(dataNascStr) {
      const partes = dataNascStr.split('/'); // ["21", "04", "1998"]
      const dia = parseInt(partes[0], 10);
      const mes = parseInt(partes[1], 10) - 1; // mês começa do 0 (jan = 0)
      const ano = parseInt(partes[2], 10);
  
      const dataNasc = new Date(ano, mes, dia);
      const hoje = new Date();
  
      let idade = hoje.getFullYear() - dataNasc.getFullYear();
      const m = hoje.getMonth() - dataNasc.getMonth();
  
      if (m < 0 || (m === 0 && hoje.getDate() < dataNasc.getDate())) {
          idade--;
      }
  
      return idade;
  }

  const idade = calcularIdade(data.data_nascimento);

              document.getElementById('nomepgt').textContent = `NOME COMPLETO: ${data.nome ?? 'Sem dados'}`;
              document.getElementById('ruapgt').textContent = `RUA: ${data.rua ?? 'Sem dados'}`;
              document.getElementById('complementopgt').textContent = `COMPLEMENTO: ${data.complemento ?? 'Sem dados'}`;
              document.getElementById('cidadepgt').textContent = `CIDADE: ${data.cidade ?? 'Sem dados'}`;
              document.getElementById('numeropgt').textContent = `NUMERO: ${data.numero ?? 'Sem dados'}`;
              document.getElementById('bairropgt').textContent = `BAIRRO: ${data.bairro ?? 'Sem dados'}`;
              document.getElementById('ceppgt').textContent = `CEP: ${data.cep ?? 'Sem dados'}`;
              document.getElementById('telefonepgt').textContent = `TELEFONE: ${data.telefone ?? 'Sem dados'}`;
              document.getElementById('telefone_familiarpgt').textContent = `TELEFONE FAMILIAR: ${data.telefone_familiar ?? 'Sem dados'}`;
              document.getElementById('data_vencimento').textContent = `${data.data_vencimento ?? 'Sem dados'}`;
              document.getElementById('valor').textContent = `R$${data.valor ?? 'Sem dados'}`;
              document.getElementById('planopgt').textContent = `PLANO: ${data.plano_aluno ?? 'Sem dados'}`;
              document.getElementById('diapgt').textContent = `DIA DE PAGAMENTO: ${data.data_pagamento ?? 'Sem dados'}`;
              document.getElementById('situacao').value = `${data.situacao ?? 'Sem dados'}`;
              // estilos
              document.getElementById('nomepgt').style.fontWeight = 'bold';
              document.getElementById('ruapgt').style.fontWeight = 'bold';
              document.getElementById('telefonepgt').style.fontWeight = 'bold';
              document.getElementById('planopgt').style.fontWeight = 'bold';
              document.getElementById('situacao').style.color = 'red';
              document.getElementById('diapgt').style.fontWeight = "bold";
            
          }
      })
      .catch(error => {
          console.error('Erro ao buscar dados do aluno:', error);
          document.getElementById('popupficha').querySelector('p').textContent = "Ocorreu um erro ao visualizar os dados."; 
          document.getElementById('confirmar').style.display = 'none';  
          document.getElementById('fechar').textContent = 'Fechar'; 
     
      });
  
  });

});






const atualizar = document.getElementById("save");

atualizar.addEventListener('click', function (e) {
    e.preventDefault(); // Impede que o botão envie o formulário de forma tradicional

    // Aqui você coleta os dados do formulário
    const form = document.getElementById('formpgt');

    // Opcional: se você tiver inputs, pode usar isso
    const formData = new FormData(form);
    const dados = {};
    formData.forEach((value, key) => {
        dados[key] = value;
    });

    console.log(formData);

    fetch(`/inicio/pendentes/${alunoIdFicha}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(dados) // envia os dados como JSON
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);

        if (data.error) {
            document.getElementById('popupficha').querySelector('p').textContent = data.error;
        } else {
            // sucesso - exiba algo se quiser
            document.getElementById('popupficha').querySelector('p').textContent = 'Pagamento atualizado com sucesso.';
        }

        document.getElementById('fechar').style.display = "block";
        document.getElementById('overlay').style.display = 'block';
    })
    .catch(error => {
        console.error('Erro ao atualizar:', error);
        document.getElementById('popupficha').querySelector('p').textContent = "Erro ao enviar dados."; 
        document.getElementById('fechar').textContent = 'Fechar'; 
    });
});




















































    // foto de perfil

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

    const userjoin = document.getElementById('userjoin');
    const hour = new Date().getHours();
  
    if (hour >= 5 && hour < 12) {
      userjoin.textContent = 'Bom dia!';
    } else if (hour >= 12 && hour < 18) {
      userjoin.textContent = 'Boa tarde!';
    } else {
      userjoin.textContent = 'Boa noite!';
    }
    function fecharAnamnese() {
      event.preventDefault();
      document.getElementById('popupficha').style.display = 'none';
      document.getElementById('overlay').style.display = 'none';
  }
loadTheme();
window.fecharAnamnese = fecharAnamnese;