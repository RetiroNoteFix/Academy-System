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
const popupficha = document.getElementById("popupficha");
const h4titulopgt = document.getElementById("h4titulopgt");
const loading = document.getElementById("loading");
const titulopopup = document.getElementById("titulopopup");
const optconfigicon = document.getElementById("optconfigicon");



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
  Object.assign(popupficha.style, { backgroundColor: bgColor });
  Object.assign(h4titulopgt.style, { color: textColor });
  Object.assign(loading.style, { color: textColor });
  Object.assign(titulopopup.style, { borderBottom: `1px solid ${textColor}` });
  Object.assign(optconfigicon.style, { color: textColor });


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



function applyNightTheme() {
  const textColor = "#fff";
  const bgColor = "#212529";
  const headerColor = "#a02c2c";
  const borderColor = "#414141";

  [optInicio, optAlunos, optPagamentos, optUsuarios].forEach(el => el.style.display = "none");
  [optInicioN, optAlunosN, optPagamentosN, optUsuariosN].forEach(el => el.style.display = "flex");

  [optInicio, optAlunos, optPagamentos, optUsuarios].forEach(el => el.classList.add("noite"));
  [optInicioN, optAlunosN, optPagamentosN, optUsuariosN].forEach(el => el.classList.add("night"));

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
  Object.assign(popupficha.style, { backgroundColor: bgColor });
  Object.assign(h4titulopgt.style, { color: textColor });
  Object.assign(loading.style, { color: textColor });
  Object.assign(titulopopup.style, { borderBottom: `1px solid ${textColor}` });
  Object.assign(optconfigicon.style, { color: textColor });

  optConfigN.style.display = "flex";
  optConfig.style.display = "none";
  opticons.forEach(icon => icon.style.color = textColor);
  paragraphs.forEach(p => p.style.color = textColor);
  footers.forEach(f => f.style.backgroundColor = bgColor);
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

function formatarTelefone(telefone) {
  let numeros = telefone.replace(/\D/g, '');
  return `55${numeros}`;
}

const modalcobranca = document.getElementById("popupconfig");
const optCobranca = document.getElementById("optCobranca");
const overlay = document.getElementById("overlay");
const nomealuno = "${nomealuno}";
const datavencimento = "${datavencimento}";
const valor = "${valor}";





optCobranca.addEventListener('click', function () {
  modalcobranca.style.display = "block";
  overlay.style.display = 'block';

  modalcobranca.innerHTML = `
    <div class="popup-content">
      <h2 id="h4confimar">NOVA MENSAGEM</h2>
      <h5 id="h4confimar2">${nomealuno} é o nome do aluno. <br> ${datavencimento} é a data de vencimento do pagamento. <br> ${valor} é o valor da cobrança.</h5>
      <div class="boxmsgcobranca">
        <textarea name="" id="msgcobranca" cols="50" rows="10">Olá {nomealuno}! Esperamos que esteja tudo bem com você. Verificamos que a sua mensalidade com vencimento em ${datavencimento}, e valor de ${valor} ainda está pendente. Caso já tenha feito o pagamento, por favor, desconsidere esta mensagem. Qualquer dúvida, estamos à disposição!</textarea>
      </div>
      <div class="boxbtn">
        <button class="save" id="savemsg">Salvar</button>
        <button class="msg" id="resetmmsg">Resetar</button>
        <button class="fechar" id="fecharcobranca">Cancelar</button>
      </div>
    </div>`;
    const msgcobranca = document.getElementById("msgcobranca");
    const savedTheme = localStorage.getItem('theme');
  if (savedTheme === 'night') {
    modalcobranca.style.color = "#fff";
    modalcobranca.style.backgroundColor = "#212529";
    msgcobranca.style.color = "#fff";
    msgcobranca.style.border = "1px solid #fff";
    msgcobranca.style.backgroundColor = "#212529";
  } else {
    modalcobranca.style.color = "#333";
    modalcobranca.style.backgroundColor = "#fff";
    msgcobranca.style.color = "#333";
    msgcobranca.style.border = "1px solid #000";
    msgcobranca.style.backgroundColor = "#fff";
  }

  document.getElementById("savemsg").addEventListener('click', function () {
    const mensagem = document.getElementById("msgcobranca").value;
    salvarMensagem(mensagem);
    modalcobranca.innerHTML = `<p>Mensagem atualizada com sucesso!</p>`;
    setTimeout(() => {
      overlay.style.display = 'none';
      modalcobranca.style.display = "none";
    }, 2000);
  });

  document.getElementById("resetmmsg").addEventListener('click', function () {
    document.getElementById("msgcobranca").value = localStorage.getItem("msgOriginal");
  });

  document.getElementById("fecharcobranca").addEventListener('click', function () {
    overlay.style.display = 'none';
    modalcobranca.style.display = "none";
  });

  if (!localStorage.getItem("msgOriginal")) {
    localStorage.setItem("msgOriginal", `Olá ${nomealuno}! Esperamos que esteja tudo bem com você. Verificamos que a sua mensalidade com vencimento em ${datavencimento}, e valor de ${valor} ainda está pendente. Caso já tenha feito o pagamento, por favor, desconsidere esta mensagem. Qualquer dúvida, estamos à disposição!`);
  }

  const msgSalva = localStorage.getItem("msg");
  if (msgSalva) {
    document.getElementById("msgcobranca").value = msgSalva;
  }
});

function salvarMensagem(mensagem) {
  localStorage.setItem("msg", mensagem);

}




function setupFichaButtons() {
  
  document.querySelectorAll('.ficha').forEach(button => {
    button.addEventListener('click', function() {
      handleFichaClick(this);
    });
  });

  document.querySelectorAll('.desativar').forEach(button => {
    button.addEventListener('click', function() {
      const idPagamento = button.getAttribute('data-id');
    
      document.getElementById('popup').style.display = 'block';
      document.getElementById('overlay').style.display = 'block';
      document.getElementById('fechar').style.display = 'none';
      document.getElementById('popupficha').setAttribute('data-id', idPagamento);
    
    });
  });
 
 document.getElementById("confirmarpagar").addEventListener('click', function(){
  const idPagamento =  document.getElementById('popupficha').getAttribute('data-id');
  fetch(`/inicio/ignorar/${idPagamento}`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
  })
  .then(response => response.json())
  .then(data => {
    if (data.error) {
      console.log(error);
    } else {
      document.getElementById('popup').innerHTML = `<h4 id="loading">Pagamento ignorado com sucesso!</h4>`;
      const button = document.querySelector(`.desativar[data-id="${idPagamento}"]`);
      if (button) {
        const row = button.closest('tr');
        if (row) row.remove();
      }

      const tableRows = document.querySelectorAll('table tbody tr');
      if (tableRows.length === 0) {
        const noPaymentsRow = document.createElement('tr');
        const noPaymentsCell = document.createElement('td');
        noPaymentsCell.id = "nolist";
        noPaymentsCell.setAttribute('colspan', '7');
        noPaymentsCell.textContent = 'Nenhum pagamento pendente encontrado.';
        noPaymentsRow.appendChild(noPaymentsCell);
        document.querySelector('table tbody').appendChild(noPaymentsRow);
      }
      setTimeout(() => {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('popup').style.display = 'none';
        document.getElementById('popup').innerHTML = `<div class="popup-content">
        <h4 id="h4confimar">Tem certeza?</h4>
        <div class="boxbtn">
        <button id="confirmarpagar">Sim</button>
        <button id="fecharpagar">Não</button>
        <button id="fechar" style="display: none;" >Cancelar</button>
        </div>
    </div>`;
    setupFichaButtons();
      }, 2000);
    }
  })
  .catch(error => {
    console.error('Erro ao buscar dados do aluno:', error);
    document.getElementById("conteudo-anamnese2").innerHTML = "Ocorreu um erro ao visualizar os dados.";
  });
 });

 document.getElementById("fecharpagar").addEventListener('click', function(){
  document.getElementById('popup').style.display = 'none';
  document.getElementById('overlay').style.display = 'none';
 });

  document.querySelectorAll('.msg').forEach(buttonmsg => {
   
    buttonmsg.addEventListener('click', function() {
      let msg = localStorage.getItem("msg");
      const telefone = buttonmsg.getAttribute('data-telefone');
      console.log(telefone);
      let telefoneFormatado = formatarTelefone(telefone);
      const nomealuno = buttonmsg.getAttribute('data-nomealuno');
      const valor = buttonmsg.getAttribute('data-valor');
      const datavencimentoRaw = buttonmsg.getAttribute('data-vencimento');
const apenasData = datavencimentoRaw.split(' ')[0];
const partes = apenasData.split('-'); 
const datavencimento = `${partes[2]}/${partes[1]}/${partes[0]}`; 

      const mensagem = msg
  .replace(/\${nomealuno}/g, nomealuno)
  .replace(/\${valor}/g, `R$${valor}`)
  .replace(/\${datavencimento}/g, datavencimento);
      window.location.href = `https://api.whatsapp.com/send/?phone=${telefoneFormatado}&text=${mensagem}`;
    });
  });
}

function handleFichaClick(button) {
  const alunoIdFicha = button.getAttribute('data-id');
  const idPagamento = button.getAttribute('data-idpgt');

  document.getElementById('popupficha').style.display = 'block';
  document.getElementById('overlay').style.display = 'block';
  document.getElementById('fechar').style.display = "block";
  document.getElementById('popupficha').setAttribute('data-id', alunoIdFicha);
  const savedTheme = localStorage.getItem('theme');
  document.getElementById("conteudo-anamnese2").innerHTML = `<h4 id="loading">CARREGANDO...</h4>`;
  const loading = document.getElementById("loading");
  if (savedTheme === 'night') {
    loading.style.color = "#fff";
  } else {
    loading.style.color = "#333";
  }

  fetch(`/inicio/pendentes/${idPagamento}/${alunoIdFicha}`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
  })
  .then(response => response.json())
  .then(data => {
    if (data.error) {
      document.getElementById("conteudo-anamnese2").innerHTML = `${data.error}`;
    } else {
      renderStudentForm(data, idPagamento);
      setupFormSubmit();
    }
  })
  .catch(error => {
    console.error('Erro ao buscar dados do aluno:', error);
    document.getElementById("conteudo-anamnese2").innerHTML = "Ocorreu um erro ao visualizar os dados.";
  });
}

function renderStudentForm(data, idPagamento) {

  function calcularIdade(dataNascStr) {
    const partes = dataNascStr.split('/');
    const dia = parseInt(partes[0], 10);
    const mes = parseInt(partes[1], 10) - 1;
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

  const hoje = new Date();
  const dia = String(hoje.getDate()).padStart(2, '0');
  const mes = String(hoje.getMonth() + 1).padStart(2, '0');
  const ano = hoje.getFullYear();

  document.getElementById("close").style.display = "block"; 
  document.getElementById("conteudo-anamnese2").innerHTML = `
    <div class="ladoesquerdoformpgt">
      <div class="compact">
        <h5 class="h5fichapgt"><strong>NOME COMPLETO: ${data.nome ?? 'Sem Dados'}</strong></h5>
      </div>
      <div class="compact">
        <h5 class="h5fichapgt"><strong>TELEFONE: ${data.telefone ?? 'Sem Dados'}</strong></h5>
        <h5 class="h5fichapgt">TELEFONE FAMILIAR: ${data.telefone_familiar ?? 'Sem Dados'}</h5>
      </div>
      <div class="barrinha"></div>
      <div class="compact">
        <h5 class="h5fichapgt"><strong>RUA: ${data.rua ?? 'Sem Dados'}</strong></h5>
        <h5 class="h5fichapgt">NÚMERO: ${data.numero ?? 'Sem Dados'}</h5>
      </div>
      <div class="compact">
        <h5 class="h5fichapgt">COMPLEMENTO: ${data.complemento ?? 'Sem Dados'}</h5>
        <h5 class="h5fichapgt">BAIRRO: ${data.bairro ?? 'Sem Dados'}</h5>
      </div>
      <div class="compact">
        <h5 class="h5fichapgt">CIDADE: ${data.cidade ?? 'Sem Dados'}</h5>
        <h5 class="h5fichapgt">CEP: ${data.cep ?? 'Sem Dados'}</h5>
      </div>
      <div class="barrinha"></div>
      <div class="compact">
        <h5 class="h5fichapgt"><strong>DIA DE PAGAMENTO: ${data.data_pagamento ?? 'Sem Dados'}</strong></h5>
        <h5 class="h5fichapgt"><strong>PLANO ALUNO: ${data.plano_aluno ?? 'Sem Dados'}</strong></h5>
      </div>
      <div class="barrinha"></div>

      <div class="boxpgt">
        <form id="formpgt" method="post">
          <table id="tablepgt">
            <thead>
              <tr>
                <th>DATA DE VENCIMENTO</th>
                <th>VALOR COBRADO</th>
                <th>SITUAÇÃO DO PAGAMENTO</th>
                <th>AÇÕES</th>
              </tr>
            </thead>
            <tbody class="tbodypagamentos">
              <tr>
                <td>${data.data_vencimento ?? 'Sem Dados'}</td>
                <td id="valor">R$${data.valor ?? 'Sem Dados'}</td>
                <td class="tdstatus"><span class="status">${data.situacao ?? 'Sem Dados'}</span></td>
                <td class="actions" ><button type="submit" class="atualizarpgt" id="save">Atualizar</button></td>
              </tr>
            </tbody>
          </table>
          <input type="hidden" name="id_pgt" value="${idPagamento}">
          <input type="hidden" name="data_pagamento" value="${dia}/${mes}/${ano}">
          <input type="hidden" name="plano_aluno" value="${data.plano_aluno}">
          <input type="hidden" name="valor" value="${data.valor}">
        </form>
      </div>
    </div>
  `;
  const h5 = document.querySelectorAll(".h5fichapgt");
  const th = document.querySelectorAll("th");
  const td = document.querySelectorAll("td");
 console.log(th);
const savedTheme = localStorage.getItem('theme');

th.forEach(td => {
  if (savedTheme === 'night') {
    td.style.backgroundColor = "#212529";
    td.style.color = "#fff";
    td.style.border = "1px solid #414141"
    th[0].style.backgroundColor = "#a02c2c";
    th[1].style.backgroundColor = "#a02c2c";
    th[2].style.backgroundColor = "#a02c2c";
    th[3].style.backgroundColor = "#a02c2c";
    th[4].style.backgroundColor = "#a02c2c";
    th[5].style.backgroundColor = "#a02c2c";
    th[6].style.backgroundColor = "#a02c2c";
    th[7].style.backgroundColor = "#a02c2c";
    th[8].style.backgroundColor = "#a02c2c";
    th[9].style.backgroundColor = "#a02c2c";
    th[10].style.backgroundColor = "#a02c2c";
  } else {
  }
});

h5.forEach(element => {
  if (savedTheme === 'night') {
    element.style.color = "#fff";
  } else {
  }
});
td.forEach(td => {
  if (savedTheme === 'night') {
    td.style.backgroundColor = "#212529";
    td.style.color = "#fff";
    td.style.border = "1px solid #414141"
  } else {
  }
});


}

function setupFormSubmit() {
  const form = document.getElementById('formpgt');
  if (!form) return;

  form.removeEventListener('submit', handleFormSubmit);
  
  form.addEventListener('submit', handleFormSubmit);
}

function handleFormSubmit(e) {
  e.preventDefault();
  const form = e.target;
  const formData = new FormData(form);
  const dados = {};

  formData.forEach((value, key) => {
    dados[key] = value;
  });

  console.log('Dados do formulário:', dados);

  document.getElementById("popupficha").style.display = 'none';
  document.getElementById("fechar").style.display = 'none';
  document.getElementById("overlay").style.display = 'block';
  const popup = document.getElementById('popup');
  popup.style.display = 'block';
  const savedTheme = localStorage.getItem('theme');
  if (savedTheme === 'night') {
    popup.style.backgroundColor = '#212529';
    popup.style.color= "#fff";
  }
  else{
    popup.style.backgroundColor = '#fff';
    popup.style.color= "#333";
  }

  const confirmarBtn = document.getElementById('confirmarpagar');
  const fecharBtn = document.getElementById('fecharpagar');

  confirmarBtn.onclick = null;
  fecharBtn.onclick = null; 

  confirmarBtn.onclick = function() {
    popup.innerHTML = 'Atualizando...';

    fetch('/inicio/pendentes/atualizar/', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify(dados)
    })
    .then(response => response.json())
    .then(data => {
      console.log('Resposta do servidor:', data);

      if (data.error) {
        document.getElementById("close").style.display = "none"; 
        document.getElementById("conteudo-anamnese2").innerHTML = `Erro.`;
      } else {
        document.getElementById("close").style.display = "none"; 
        document.getElementById("popup").innerHTML = `<h4 id="loading">Pagamento atualizado com sucesso!</h4>`;
       
        const loading = document.getElementById("loading");
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'night') {
          loading.style.color = "#fff";
        }

        setTimeout(() => {
          document.getElementById('overlay').style.display = 'none';
          document.getElementById('popup').style.display = 'none';
          popup.innerHTML = `<div class="popup-content">
          <h4 id="h4confimar">Tem certeza?</h4>
          <div class="boxbtn">
          <button id="confirmarpagar">Sim</button>
          <button id="fecharpagar">Não</button>
          <button id="fechar" style="display: none;" >Cancelar</button>
          </div>
      </div>`;
        }, 2000);

        const alunoIdFicha = dados.id_pgt;
        const button = document.querySelector(`.ficha[data-idpgt="${alunoIdFicha}"]`);
        if (button) {
          const row = button.closest('tr');
          if (row) row.remove();
        }

        const tableRows = document.querySelectorAll('table tbody tr');
        if (tableRows.length === 1) {
          const noPaymentsRow = document.createElement('tr');
          const noPaymentsCell = document.createElement('td');
          noPaymentsCell.id = "nolist";
          noPaymentsCell.setAttribute('colspan', '7');
          noPaymentsCell.textContent = 'Nenhum pagamento pendente encontrado.';
          noPaymentsRow.appendChild(noPaymentsCell);
          document.querySelector('table tbody').appendChild(noPaymentsRow);
        
          const nolist = document.getElementById("nolist");
          if (savedTheme === 'night') {
            popup.style.backgroundColor = '#212529';
            nolist.style.backgroundColor = "#212529";
            nolist.style.color = "#fff";
            nolist.style.borderLeft = "none";
            nolist.style.borderBottom = "1px solid #414141";
          }
        }
      }
    })
    .catch(error => {
      console.error('Erro ao atualizar:', error);
      alert('Erro ao enviar dados. Por favor, tente novamente.');
    });
  };

  fecharBtn.onclick = function() {
    popup.style.display = 'none'; 
    document.getElementById('overlay').style.display = 'none'; 
  };
}

document.addEventListener('DOMContentLoaded', function() {
  setupFichaButtons();
  
  document.getElementById('fechar')?.addEventListener('click', function() {
    document.getElementById('popupficha').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
  });
});

window.fecharAnamnese = function() {
  document.getElementById('popupficha').style.display = 'none';
  document.getElementById('overlay').style.display = 'none';
};



function fechar(){
  document.getElementById('popupficha').style.display = 'none';
  document.getElementById('overlay').style.display = 'none';
}

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