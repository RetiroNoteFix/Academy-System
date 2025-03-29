<?php
include '../models/Aluno.php';
include '../models/Pagamento.php';
include __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     if (isset($_POST['mostrarDesativado'])) {
        try {
            $database = new Database();
        $conexao = $database->getConnection();
    
            // Chamada ao método listarTodos
            $alunos = Aluno::listarTodosDesativados($conexao);
            $contador = 1;
            echo "<table border='1' cellpadding='10'>";
            echo "<thead>";
            echo "<tr >";
            echo "<th style='display:none;'>ID</th>";
            ECHO "<th>Nº</th>";
            echo "<th>Nome</th>";
            echo "<th>Endereço</th>";
            echo "<th>Telefone</th>";
            echo "<th style='width:200px;'>Ações</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            // Iterar sobre os alunos para exibir o plano
            foreach ($alunos as $aluno) {
                echo "<tr class='linha-aluno' data-id='" . $aluno->getId() . "'>";
                echo "<td style='display:none;' >" . $aluno->getId() . "</td>"; // Exibe o ID
                ECHO "<td>{$contador}</td> <!-- Exibe o número da linha -->";
                echo "<td>" . $aluno->getNome() . "</td>"; // Exibe o nome
                echo "<td>" . $aluno->getEndereco() . "</td>"; // Exibe o endereço
                echo "<td>" . $aluno->getTelefone() . "</td>"; // Exibe o telefone
                echo "<td style='width:200px;'>";
                echo "<div class='actions' alt='Ver Detalhes'><button class='ver-detalhes 'id='acticons' title='Ver Detalhes'> <svg alt='Ver Detalhes' id='svgiconsact' fill='#ffffff' version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 442.04 442.04' xml:space='preserve' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <g> <g> <path d='M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203 c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219 c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367 c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021 c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212 c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071 c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z'></path> </g> <g> <path d='M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188 c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993 c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5 s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z'></path> </g> <g> <path d='M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z'></path> </g> </g> </g>
                            </svg>
                            </button>
                            <button class='medidas' id='acticonsmedir' title='Ver Medidas'>
                            <svg id='svgiconsact'  viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path fill-rule='evenodd' clip-rule='evenodd' d='M13.6882 4.14229L14.6516 5.10571C14.9445 5.3986 14.9445 5.87348 14.6516 6.16637C14.3588 6.45926 13.8839 6.45926 13.591 6.16637L12.6269 5.20228L11.5662 6.26294L13.2374 7.93414C13.5303 8.22703 13.5303 8.7019 13.2374 8.9948C12.9445 9.28769 12.4697 9.28769 12.1768 8.9948L10.5056 7.3236L9.44492 8.38426L10.409 9.34835C10.7019 9.64124 10.7019 10.1161 10.409 10.409C10.1161 10.7019 9.64124 10.7019 9.34835 10.409L8.38426 9.44492L7.3236 10.5056L8.9948 12.1768C9.28769 12.4697 9.28769 12.9445 8.9948 13.2374C8.7019 13.5303 8.22703 13.5303 7.93414 13.2374L6.26294 11.5662L5.20228 12.6269L6.16637 13.591C6.45926 13.8839 6.45926 14.3588 6.16637 14.6516C5.87348 14.9445 5.3986 14.9445 5.10571 14.6516L4.14229 13.6882C3.67802 14.1568 3.34308 14.5094 3.10761 14.818C2.81761 15.1981 2.75 15.422 2.75 15.6157C2.75 15.8094 2.81762 16.0334 3.10761 16.4135C3.41081 16.8109 3.87892 17.2812 4.5757 17.978L6.022 19.4243C6.71878 20.1211 7.18914 20.5892 7.58653 20.8924C7.96662 21.1824 8.19057 21.25 8.38426 21.25C8.57795 21.25 8.8019 21.1824 9.18198 20.8924C9.57938 20.5892 10.0497 20.1211 10.7465 19.4243L19.4243 10.7465C20.1211 10.0497 20.5892 9.57938 20.8924 9.18198C21.1824 8.8019 21.25 8.57795 21.25 8.38426C21.25 8.19057 21.1824 7.96662 20.8924 7.58653C20.5892 7.18914 20.1211 6.71878 19.4243 6.022L17.978 4.5757C17.2812 3.87892 16.8109 3.41081 16.4135 3.10761C16.0334 2.81762 15.8094 2.75 15.6157 2.75C15.422 2.75 15.1981 2.81761 14.818 3.10761C14.5094 3.34308 14.1568 3.67802 13.6882 4.14229ZM13.9081 1.91508C14.4217 1.52328 14.9622 1.25 15.6157 1.25C16.2693 1.25 16.8098 1.52328 17.3233 1.91508C17.8104 2.28666 18.3514 2.82777 19.0017 3.47812L20.5219 4.99824C21.1722 5.64856 21.7133 6.18964 22.0849 6.67666C22.4767 7.19017 22.75 7.73073 22.75 8.38426C22.75 9.03779 22.4767 9.57834 22.0849 10.0919C21.7133 10.5789 21.1722 11.12 20.5219 11.7703L11.7703 20.5219C11.12 21.1722 10.5789 21.7133 10.0919 22.0849C9.57834 22.4767 9.03779 22.75 8.38426 22.75C7.73073 22.75 7.19017 22.4767 6.67666 22.0849C6.18964 21.7133 5.64856 21.1722 4.99824 20.5219L3.47812 19.0017C2.82777 18.3514 2.28666 17.8104 1.91508 17.3233C1.52328 16.8098 1.25 16.2693 1.25 15.6157C1.25 14.9622 1.52328 14.4217 1.91508 13.9081C2.28667 13.4211 2.82779 12.88 3.47816 12.2297L12.2297 3.47815C12.88 2.82778 13.4211 2.28666 13.9081 1.91508Z' fill='#ffffff'></path> </g></svg>
                            </button>
                            <button class='editar' id='acticonsedit' title='Editar Aluno'>
                            <svg id='svgiconsact' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path d='M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path> <path d='M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path> </g>
                            </svg>
                            </button>
                            <button class='apagar' style='display:none;' id='acticonsativar' title='Ativar Aluno'><svg id='svgiconsact' fill='#ffffff' viewBox='0 0 32 32' version='1.1' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <title>eye</title> <path d='M0 16q0.064 0.128 0.16 0.352t0.48 0.928 0.832 1.344 1.248 1.536 1.664 1.696 2.144 1.568 2.624 1.344 3.136 0.896 3.712 0.352 3.712-0.352 3.168-0.928 2.592-1.312 2.144-1.6 1.664-1.632 1.248-1.6 0.832-1.312 0.48-0.928l0.16-0.352q-0.032-0.128-0.16-0.352t-0.48-0.896-0.832-1.344-1.248-1.568-1.664-1.664-2.144-1.568-2.624-1.344-3.136-0.896-3.712-0.352-3.712 0.352-3.168 0.896-2.592 1.344-2.144 1.568-1.664 1.664-1.248 1.568-0.832 1.344-0.48 0.928zM10.016 16q0-2.464 1.728-4.224t4.256-1.76 4.256 1.76 1.76 4.224-1.76 4.256-4.256 1.76-4.256-1.76-1.728-4.256zM12 16q0 1.664 1.184 2.848t2.816 1.152 2.816-1.152 1.184-2.848-1.184-2.816-2.816-1.184-2.816 1.184l2.816 2.816h-4z'></path> </g></svg></button>
                            <button class='ativar' id='acticonsativar' title='Ativar Aluno'><svg id='svgiconsact' fill='#ffffff' viewBox='0 0 32 32' version='1.1' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <title>eye</title> <path d='M0 16q0.064 0.128 0.16 0.352t0.48 0.928 0.832 1.344 1.248 1.536 1.664 1.696 2.144 1.568 2.624 1.344 3.136 0.896 3.712 0.352 3.712-0.352 3.168-0.928 2.592-1.312 2.144-1.6 1.664-1.632 1.248-1.6 0.832-1.312 0.48-0.928l0.16-0.352q-0.032-0.128-0.16-0.352t-0.48-0.896-0.832-1.344-1.248-1.568-1.664-1.664-2.144-1.568-2.624-1.344-3.136-0.896-3.712-0.352-3.712 0.352-3.168 0.896-2.592 1.344-2.144 1.568-1.664 1.664-1.248 1.568-0.832 1.344-0.48 0.928zM10.016 16q0-2.464 1.728-4.224t4.256-1.76 4.256 1.76 1.76 4.224-1.76 4.256-4.256 1.76-4.256-1.76-1.728-4.256zM12 16q0 1.664 1.184 2.848t2.816 1.152 2.816-1.152 1.184-2.848-1.184-2.816-2.816-1.184-2.816 1.184l2.816 2.816h-4z'></path> </g></svg></button>
                            </div>";
                echo "</td>";
                echo "</tr>";
                $contador++; 
            }
            if (empty($alunos)) {
                echo "<tr><td colspan='7'>Nenhum aluno desativado.</td></tr>";
            }
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        } 
    }  

    elseif (isset($_POST['pesquisa'])) {
        $nome = $_POST['pesquisa'];
        try {
            $database = new Database();
        $conexao = $database->getConnection();
    
            // Chamada ao método listarTodos
            $alunos = Aluno::pesquisaAluno($conexao, $nome);
            $contador = 1;
            echo "<table border='1' cellpadding='10'>";
            echo "<thead>";
            echo "<tr >";
            echo "<th style='display:none;'>ID</th>";
            ECHO "<th>Nº</th>";
            echo "<th>Nome</th>";
            echo "<th>Endereço</th>";
            echo "<th>Telefone</th>";
            echo "<th style='width:200px;'>Ações</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            // Iterar sobre os alunos para exibir o plano
            foreach ($alunos as $aluno) {
                echo "<tr class='linha-aluno' data-id='" . $aluno->getId() . "'>";
                echo "<td style='display:none;' >" . $aluno->getId() . "</td>"; // Exibe o ID
                ECHO "<td>{$contador}</td> <!-- Exibe o número da linha -->";
                echo "<td>" . $aluno->getNome() . "</td>"; // Exibe o nome
                echo "<td>" . $aluno->getEndereco() . "</td>"; // Exibe o endereço
                echo "<td>" . $aluno->getTelefone() . "</td>"; // Exibe o telefone
                echo "<td style='width:200px;'>";
                echo "<div class='actions' alt='Ver Detalhes'><button class='ver-detalhes 'id='acticons' title='Ver Detalhes'> <svg alt='Ver Detalhes' id='svgiconsact' fill='#ffffff' version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 442.04 442.04' xml:space='preserve' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <g> <g> <path d='M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203 c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219 c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367 c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021 c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212 c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071 c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z'></path> </g> <g> <path d='M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188 c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993 c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5 s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z'></path> </g> <g> <path d='M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z'></path> </g> </g> </g>
                            </svg>
                            </button>
                            <button class='medidas' id='acticonsmedir' title='Ver Medidas'>
                            <svg id='svgiconsact'  viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path fill-rule='evenodd' clip-rule='evenodd' d='M13.6882 4.14229L14.6516 5.10571C14.9445 5.3986 14.9445 5.87348 14.6516 6.16637C14.3588 6.45926 13.8839 6.45926 13.591 6.16637L12.6269 5.20228L11.5662 6.26294L13.2374 7.93414C13.5303 8.22703 13.5303 8.7019 13.2374 8.9948C12.9445 9.28769 12.4697 9.28769 12.1768 8.9948L10.5056 7.3236L9.44492 8.38426L10.409 9.34835C10.7019 9.64124 10.7019 10.1161 10.409 10.409C10.1161 10.7019 9.64124 10.7019 9.34835 10.409L8.38426 9.44492L7.3236 10.5056L8.9948 12.1768C9.28769 12.4697 9.28769 12.9445 8.9948 13.2374C8.7019 13.5303 8.22703 13.5303 7.93414 13.2374L6.26294 11.5662L5.20228 12.6269L6.16637 13.591C6.45926 13.8839 6.45926 14.3588 6.16637 14.6516C5.87348 14.9445 5.3986 14.9445 5.10571 14.6516L4.14229 13.6882C3.67802 14.1568 3.34308 14.5094 3.10761 14.818C2.81761 15.1981 2.75 15.422 2.75 15.6157C2.75 15.8094 2.81762 16.0334 3.10761 16.4135C3.41081 16.8109 3.87892 17.2812 4.5757 17.978L6.022 19.4243C6.71878 20.1211 7.18914 20.5892 7.58653 20.8924C7.96662 21.1824 8.19057 21.25 8.38426 21.25C8.57795 21.25 8.8019 21.1824 9.18198 20.8924C9.57938 20.5892 10.0497 20.1211 10.7465 19.4243L19.4243 10.7465C20.1211 10.0497 20.5892 9.57938 20.8924 9.18198C21.1824 8.8019 21.25 8.57795 21.25 8.38426C21.25 8.19057 21.1824 7.96662 20.8924 7.58653C20.5892 7.18914 20.1211 6.71878 19.4243 6.022L17.978 4.5757C17.2812 3.87892 16.8109 3.41081 16.4135 3.10761C16.0334 2.81762 15.8094 2.75 15.6157 2.75C15.422 2.75 15.1981 2.81761 14.818 3.10761C14.5094 3.34308 14.1568 3.67802 13.6882 4.14229ZM13.9081 1.91508C14.4217 1.52328 14.9622 1.25 15.6157 1.25C16.2693 1.25 16.8098 1.52328 17.3233 1.91508C17.8104 2.28666 18.3514 2.82777 19.0017 3.47812L20.5219 4.99824C21.1722 5.64856 21.7133 6.18964 22.0849 6.67666C22.4767 7.19017 22.75 7.73073 22.75 8.38426C22.75 9.03779 22.4767 9.57834 22.0849 10.0919C21.7133 10.5789 21.1722 11.12 20.5219 11.7703L11.7703 20.5219C11.12 21.1722 10.5789 21.7133 10.0919 22.0849C9.57834 22.4767 9.03779 22.75 8.38426 22.75C7.73073 22.75 7.19017 22.4767 6.67666 22.0849C6.18964 21.7133 5.64856 21.1722 4.99824 20.5219L3.47812 19.0017C2.82777 18.3514 2.28666 17.8104 1.91508 17.3233C1.52328 16.8098 1.25 16.2693 1.25 15.6157C1.25 14.9622 1.52328 14.4217 1.91508 13.9081C2.28667 13.4211 2.82779 12.88 3.47816 12.2297L12.2297 3.47815C12.88 2.82778 13.4211 2.28666 13.9081 1.91508Z' fill='#ffffff'></path> </g></svg>
                            </button>
                            <button class='editar' id='acticonsedit' title='Editar Aluno'>
                            <svg id='svgiconsact' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path d='M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path> <path d='M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path> </g>
                            </svg>
                            </button>
                            <b<button class='apagar' id='acticonsapagar' title='Desativar Aluno'><svg id='svgiconsact' fill='#ffffff' viewBox='0 0 32 32' enable-background='new 0 0 32 32' id='Glyph' version='1.1' xml:space='preserve' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'><path d='M20.722,24.964c0.096,0.096,0.057,0.264-0.073,0.306c-7.7,2.466-16.032-1.503-18.594-8.942 c-0.072-0.21-0.072-0.444,0-0.655c0.743-2.157,1.99-4.047,3.588-5.573c0.061-0.058,0.158-0.056,0.217,0.003l4.302,4.302 c0.03,0.03,0.041,0.072,0.031,0.113c-1.116,4.345,2.948,8.395,7.276,7.294c0.049-0.013,0.095-0.004,0.131,0.032 C17.958,22.201,20.045,24.287,20.722,24.964z' id='XMLID_323_'></path><path d='M24.68,23.266c2.406-1.692,4.281-4.079,5.266-6.941c0.072-0.21,0.072-0.44,0-0.65 C27.954,9.888,22.35,6,16,6c-2.479,0-4.841,0.597-6.921,1.665L3.707,2.293c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414 l26,26c0.391,0.391,1.023,0.391,1.414,0c0.391-0.391,0.391-1.023,0-1.414L24.68,23.266z M16,10c3.309,0,6,2.691,6,6 c0,1.294-0.416,2.49-1.115,3.471l-8.356-8.356C13.51,10.416,14.706,10,16,10z' id='XMLID_325_'></path></g></svg></button>
                            <button class='ativar' style='display:none;'id='acticonsativar' title='Ativar Aluno'><svg id='svgiconsact' fill='#ffffff' viewBox='0 0 32 32' version='1.1' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <title>eye</title> <path d='M0 16q0.064 0.128 0.16 0.352t0.48 0.928 0.832 1.344 1.248 1.536 1.664 1.696 2.144 1.568 2.624 1.344 3.136 0.896 3.712 0.352 3.712-0.352 3.168-0.928 2.592-1.312 2.144-1.6 1.664-1.632 1.248-1.6 0.832-1.312 0.48-0.928l0.16-0.352q-0.032-0.128-0.16-0.352t-0.48-0.896-0.832-1.344-1.248-1.568-1.664-1.664-2.144-1.568-2.624-1.344-3.136-0.896-3.712-0.352-3.712 0.352-3.168 0.896-2.592 1.344-2.144 1.568-1.664 1.664-1.248 1.568-0.832 1.344-0.48 0.928zM10.016 16q0-2.464 1.728-4.224t4.256-1.76 4.256 1.76 1.76 4.224-1.76 4.256-4.256 1.76-4.256-1.76-1.728-4.256zM12 16q0 1.664 1.184 2.848t2.816 1.152 2.816-1.152 1.184-2.848-1.184-2.816-2.816-1.184-2.816 1.184l2.816 2.816h-4z'></path> </g></svg></button>
                            </div>";
                echo "</td>";
                echo "</tr>";
                $contador++; 
            }
            
            if (empty($alunos)) {
                echo "<tr><td colspan='7'>Nenhum aluno encontrado.</td></tr>";
            }
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }

    }

    elseif (isset($_POST['pesquisadesativado'])) {
        $nome = $_POST['pesquisadesativado'];
        try {
            $database = new Database();
        $conexao = $database->getConnection();
    
            // Chamada ao método listarTodos
            $alunos = Aluno::pesquisaAlunoDesativado($conexao, $nome);
            $contador = 1;
            echo "<table border='1' cellpadding='10'>";
            echo "<thead>";
            echo "<tr >";
            echo "<th style='display:none;'>ID</th>";
            ECHO "<th>Nº</th>";
            echo "<th>Nome</th>";
            echo "<th>Endereço</th>";
            echo "<th>Telefone</th>";
            echo "<th style='width:200px;'>Ações</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            if (empty($alunos)) {
                
            } else {
            // Iterar sobre os alunos para exibir o plano
            foreach ($alunos as $aluno) {
                echo "<tr class='linha-aluno' data-id='" . $aluno->getId() . "'>";
                echo "<td style='display:none;' >" . $aluno->getId() . "</td>"; // Exibe o ID
                ECHO "<td>{$contador}</td> <!-- Exibe o número da linha -->";
                echo "<td>" . $aluno->getNome() . "</td>"; // Exibe o nome
                echo "<td>" . $aluno->getEndereco() . "</td>"; // Exibe o endereço
                echo "<td>" . $aluno->getTelefone() . "</td>"; // Exibe o telefone
                echo "<td style='width:200px;'>";
                echo "<div class='actions' alt='Ver Detalhes'><button class='ver-detalhes 'id='acticons' title='Ver Detalhes'> <svg alt='Ver Detalhes' id='svgiconsact' fill='#ffffff' version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 442.04 442.04' xml:space='preserve' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <g> <g> <path d='M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203 c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219 c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367 c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021 c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212 c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071 c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z'></path> </g> <g> <path d='M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188 c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993 c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5 s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z'></path> </g> <g> <path d='M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z'></path> </g> </g> </g>
                            </svg>
                            </button>
                            <button class='medidas' id='acticonsmedir' title='Ver Medidas'>
                            <svg id='svgiconsact'  viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path fill-rule='evenodd' clip-rule='evenodd' d='M13.6882 4.14229L14.6516 5.10571C14.9445 5.3986 14.9445 5.87348 14.6516 6.16637C14.3588 6.45926 13.8839 6.45926 13.591 6.16637L12.6269 5.20228L11.5662 6.26294L13.2374 7.93414C13.5303 8.22703 13.5303 8.7019 13.2374 8.9948C12.9445 9.28769 12.4697 9.28769 12.1768 8.9948L10.5056 7.3236L9.44492 8.38426L10.409 9.34835C10.7019 9.64124 10.7019 10.1161 10.409 10.409C10.1161 10.7019 9.64124 10.7019 9.34835 10.409L8.38426 9.44492L7.3236 10.5056L8.9948 12.1768C9.28769 12.4697 9.28769 12.9445 8.9948 13.2374C8.7019 13.5303 8.22703 13.5303 7.93414 13.2374L6.26294 11.5662L5.20228 12.6269L6.16637 13.591C6.45926 13.8839 6.45926 14.3588 6.16637 14.6516C5.87348 14.9445 5.3986 14.9445 5.10571 14.6516L4.14229 13.6882C3.67802 14.1568 3.34308 14.5094 3.10761 14.818C2.81761 15.1981 2.75 15.422 2.75 15.6157C2.75 15.8094 2.81762 16.0334 3.10761 16.4135C3.41081 16.8109 3.87892 17.2812 4.5757 17.978L6.022 19.4243C6.71878 20.1211 7.18914 20.5892 7.58653 20.8924C7.96662 21.1824 8.19057 21.25 8.38426 21.25C8.57795 21.25 8.8019 21.1824 9.18198 20.8924C9.57938 20.5892 10.0497 20.1211 10.7465 19.4243L19.4243 10.7465C20.1211 10.0497 20.5892 9.57938 20.8924 9.18198C21.1824 8.8019 21.25 8.57795 21.25 8.38426C21.25 8.19057 21.1824 7.96662 20.8924 7.58653C20.5892 7.18914 20.1211 6.71878 19.4243 6.022L17.978 4.5757C17.2812 3.87892 16.8109 3.41081 16.4135 3.10761C16.0334 2.81762 15.8094 2.75 15.6157 2.75C15.422 2.75 15.1981 2.81761 14.818 3.10761C14.5094 3.34308 14.1568 3.67802 13.6882 4.14229ZM13.9081 1.91508C14.4217 1.52328 14.9622 1.25 15.6157 1.25C16.2693 1.25 16.8098 1.52328 17.3233 1.91508C17.8104 2.28666 18.3514 2.82777 19.0017 3.47812L20.5219 4.99824C21.1722 5.64856 21.7133 6.18964 22.0849 6.67666C22.4767 7.19017 22.75 7.73073 22.75 8.38426C22.75 9.03779 22.4767 9.57834 22.0849 10.0919C21.7133 10.5789 21.1722 11.12 20.5219 11.7703L11.7703 20.5219C11.12 21.1722 10.5789 21.7133 10.0919 22.0849C9.57834 22.4767 9.03779 22.75 8.38426 22.75C7.73073 22.75 7.19017 22.4767 6.67666 22.0849C6.18964 21.7133 5.64856 21.1722 4.99824 20.5219L3.47812 19.0017C2.82777 18.3514 2.28666 17.8104 1.91508 17.3233C1.52328 16.8098 1.25 16.2693 1.25 15.6157C1.25 14.9622 1.52328 14.4217 1.91508 13.9081C2.28667 13.4211 2.82779 12.88 3.47816 12.2297L12.2297 3.47815C12.88 2.82778 13.4211 2.28666 13.9081 1.91508Z' fill='#ffffff'></path> </g></svg>
                            </button>
                            <button class='editar' id='acticonsedit' title='Editar Aluno'>
                            <svg id='svgiconsact' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path d='M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path> <path d='M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path> </g>
                            </svg>
                            </button>
                          <button class='apagar' style='display:none;' id='acticonsativar' title='Ativar Aluno'><svg id='svgiconsact' fill='#ffffff' viewBox='0 0 32 32' version='1.1' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <title>eye</title> <path d='M0 16q0.064 0.128 0.16 0.352t0.48 0.928 0.832 1.344 1.248 1.536 1.664 1.696 2.144 1.568 2.624 1.344 3.136 0.896 3.712 0.352 3.712-0.352 3.168-0.928 2.592-1.312 2.144-1.6 1.664-1.632 1.248-1.6 0.832-1.312 0.48-0.928l0.16-0.352q-0.032-0.128-0.16-0.352t-0.48-0.896-0.832-1.344-1.248-1.568-1.664-1.664-2.144-1.568-2.624-1.344-3.136-0.896-3.712-0.352-3.712 0.352-3.168 0.896-2.592 1.344-2.144 1.568-1.664 1.664-1.248 1.568-0.832 1.344-0.48 0.928zM10.016 16q0-2.464 1.728-4.224t4.256-1.76 4.256 1.76 1.76 4.224-1.76 4.256-4.256 1.76-4.256-1.76-1.728-4.256zM12 16q0 1.664 1.184 2.848t2.816 1.152 2.816-1.152 1.184-2.848-1.184-2.816-2.816-1.184-2.816 1.184l2.816 2.816h-4z'></path> </g></svg></button>
                            <button class='ativar' id='acticonsativar' title='Ativar Aluno'><svg id='svgiconsact' fill='#ffffff' viewBox='0 0 32 32' version='1.1' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <title>eye</title> <path d='M0 16q0.064 0.128 0.16 0.352t0.48 0.928 0.832 1.344 1.248 1.536 1.664 1.696 2.144 1.568 2.624 1.344 3.136 0.896 3.712 0.352 3.712-0.352 3.168-0.928 2.592-1.312 2.144-1.6 1.664-1.632 1.248-1.6 0.832-1.312 0.48-0.928l0.16-0.352q-0.032-0.128-0.16-0.352t-0.48-0.896-0.832-1.344-1.248-1.568-1.664-1.664-2.144-1.568-2.624-1.344-3.136-0.896-3.712-0.352-3.712 0.352-3.168 0.896-2.592 1.344-2.144 1.568-1.664 1.664-1.248 1.568-0.832 1.344-0.48 0.928zM10.016 16q0-2.464 1.728-4.224t4.256-1.76 4.256 1.76 1.76 4.224-1.76 4.256-4.256 1.76-4.256-1.76-1.728-4.256zM12 16q0 1.664 1.184 2.848t2.816 1.152 2.816-1.152 1.184-2.848-1.184-2.816-2.816-1.184-2.816 1.184l2.816 2.816h-4z'></path> </g></svg></button>
                            </div>";
                echo "</td>";
                echo "</tr>";
                $contador++; 
               
            }


            
        }

        
      
        if (empty($alunos)) {
            echo "<tr><td colspan='7'>Nenhum aluno encontrado.</td></tr>";
        }
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }

    }
    
   
    
    
    elseif (isset($_POST['pesquisadesativado'])) {
        $nome = $_POST['pesquisadesativado'];
        try {
            $database = new Database();
            $conexao = $database->getConnection();
    
            $alunos = Aluno::pesquisaAlunoDesativado($conexao, $nome);
    
            if (empty($alunos)) {
                echo "<table border='1' cellpadding='10'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th style='display:none;'>ID</th>";
                echo "<th>Nº</th>";
                echo "<th>Nome</th>";
                echo "<th>Endereço</th>";
                echo "<th>Telefone</th>";
                echo "<th style='width:200px;'>Ações</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                echo "<tr><td colspan='5'>Nenhum aluno desativado encontrado.</td></tr>";
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<table border='1' cellpadding='10'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th style='display:none;'>ID</th>";
                echo "<th>Nº</th>";
                echo "<th>Nome</th>";
                echo "<th>Endereço</th>";
                echo "<th>Telefone</th>";
                echo "<th style='width:200px;'>Ações</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $contador = 1;
                foreach ($alunos as $aluno) {
                    echo "<tr class='linha-aluno' data-id='" . $aluno->getId() . "'>";
                    echo "<td style='display:none;'>" . $aluno->getId() . "</td>";
                    echo "<td>{$contador}</td>";
                    echo "<td>" . htmlspecialchars($aluno->getNome()) . "</td>";
                    echo "<td>" . htmlspecialchars($aluno->getEndereco()) . "</td>";
                    echo "<td>" . htmlspecialchars($aluno->getTelefone()) . "</td>";
                    echo "<td style='width:200px;'>";
                    echo "<button class='ver-detalhes' title='Ver Detalhes'>Ver</button>";
                    echo "<button class='medidas' title='Ver Medidas'>Medidas</button>";
                    echo "</td>";
                    echo "</tr>";
                    $contador++;
                }
                echo "</tbody>";
                echo "</table>";
            }
        } catch (Exception $e) {
            echo "Erro ao buscar alunos desativados: " . $e->getMessage();
        }
    }
    elseif (isset($_POST['pesquisapago'])) {
        $nome = $_POST['pesquisapago'];
        try {
            $database = new Database();
            $conexao = $database->getConnection();
    
            $alunos = Pagamento::buscaPago($conexao, $nome);
    
            if (empty($alunos)) {
                echo "<table border='1' cellpadding='10' style='width: 100%; border-collapse: collapse;'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th style='display:none;'>ID</th>";
                echo "<th>Nº</th>";
                echo "<th id='nomealuno'>Nome</th>";
                echo "<th>Endereço</th>";
                echo "<th>Telefone</th>";
                echo "<th>SITUAÇÃO</th>";
                echo "<th>AÇÕES</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                echo "<tr><td colspan='7' style='text-align: center;'>Nenhum pagamento encontrado.</td></tr>";
                echo "</tbody>";
                echo "</table>";
            }
             else {
                echo "<table border='1' cellpadding='10'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th style='display:none;'>ID</th>";
                echo "<th>Nº</th>";
                echo "<th id='nomealuno'>Nome</th>";
                echo "<th>Endereço</th>";
                echo "<th>Telefone</th>";
                echo "<th>SITUAÇÃO</th>";
                echo "<th>AÇÕES</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $contador = 1;
                foreach ($alunos as $aluno) {
                    echo "<tr class='linha-aluno' data-id='" . $aluno['idAluno'] . "' data-nome='" . $aluno['telefone'] . "' data-nome='" . $aluno['telefone'] . "'>";
                    echo "<td style='display:none;'>" . $aluno['idAluno'] . "</td>";
                    echo "<td>{$contador}</td>";
                    echo "<td class='nomealuno' id='nomealuno'>" . $aluno['nome'] . "</td>";
                    echo "<td>" . $aluno['endereco'] . "</td>";
                    echo "<td>" . $aluno['telefone'] . "</td>";
                    echo "<td><i><strong><span style='color: green;'>POSSUI<br> PAGAMENTOS<BR> PAGOS</span></strong></i></td>";
                   echo " <td id='acoespainel'>
                            <div class='actionspainel'>
                                <a id='verdetalhes' class='verdetalhes'>Detalhes</a>
                            </div>
                        </td>";
                    echo "</tr>";
                    $contador++;
                }
                echo "</tbody>";
                echo "</table>";
            }
        } catch (Exception $e) {
            echo "Erro ao buscar alunos: " . $e->getMessage();
        }
    }
    elseif (isset($_POST['pesquisafuturo'])) {
        $nome = $_POST['pesquisafuturo'];
        try {
            $database = new Database();
            $conexao = $database->getConnection();
    
            $alunos = Pagamento::buscaPendente($conexao, $nome);
    
            if (empty($alunos)) {
                echo "<table border='1' cellpadding='10'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th style='display:none;'>ID</th>";
                echo "<th>Nº</th>";
                echo "<th id='nomealuno'>Nome</th>";
                echo "<th>Endereço</th>";
                echo "<th>Telefone</th>";
                echo "<th>Vencimento</th>";
                echo "<th>Situação</th>";
                echo "<th>AÇÕES</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                echo "<tr><td colspan='7'>Nenhum pagamento encontrado.</td></tr>";
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<table border='1' cellpadding='10'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th style='display:none;'>ID</th>";
                echo "<th>Nº</th>";
                echo "<th id='nomealuno'>Nome</th>";
                echo "<th>Endereço</th>";
                echo "<th>Telefone</th>";
                echo "<th>Vencimento</th>";
                echo "<th>SITUAÇÃO</th>";
                echo "<th>AÇÕES</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $contador = 1;
                foreach ($alunos as $aluno) {
                    $dataVencimento = $aluno['dataVencimento'];

                    // Formatar a data para o formato ddmmyyyy
                    $dataFormatada = date('d/m/Y', strtotime($dataVencimento));
                    echo "<tr class='linha-aluno' data-id='" . $aluno['idAluno'] . "' data-nome='" . $aluno['telefone'] . "' data-telefone='" . $aluno['telefone'] . "' data-vencimento='" . $aluno['dataVencimento'] . "'>";
                    echo "<td style='display:none;'>" . $aluno['idAluno'] . "</td>";
                    echo "<td>{$contador}</td>";
                    echo "<td class='nomealuno' id='nomealuno'>" . $aluno['nome'] . "</td>";
                    echo "<td>" . $aluno['endereco'] . "</td>";
                    echo "<td>" . $aluno['telefone'] . "</td>";
                    echo "<td>$dataFormatada</td>";
                    echo "<td><i><strong><span style='color: RED;'>PENDENTE</span></strong></i></td>";
                   echo " <td id='acoespainel'>
                            <div class='actionspainel'>
                            <a id='verdetalhes' style='cursor: pointer;' class='verdetalhesfuturos' onclick='adicionarEventosBotoesFuturos()'>Atualizar</a>
                            </div>
                        </td>";
                    echo "</tr>";
                    $contador++;
                }
                echo "</tbody>";
                echo "</table>";
            }
        } catch (Exception $e) {
            echo "Erro ao buscar alunos: " . $e->getMessage();
        }
    }
    elseif (isset($_POST['pesquisaignorado'])) {
        $nome = $_POST['pesquisaignorado'];
        try {
            $database = new Database();
            $conexao = $database->getConnection();
    
            $alunos = Pagamento::buscaIgnorado($conexao, $nome);
    
            if (empty($alunos)) {
                echo "<table border='1' cellpadding='10'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th style='display:none;'>ID</th>";
                echo "<th>Nº</th>";
                echo "<th id='nomealuno'>Nome</th>";
                echo "<th>Endereço</th>";
                echo "<th>Telefone</th>";
                echo "<th>Vencimento</th>";
                echo "<th>Situação</th>";
                echo "<th>AÇÕES</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                echo "<tr><td colspan='7'>Nenhum pagamento encontrado.</td></tr>";
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<table border='1' cellpadding='10'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th style='display:none;'>ID</th>";
                echo "<th>Nº</th>";
                echo "<th id='nomealuno'>Nome</th>";
                echo "<th>Endereço</th>";
                echo "<th>Telefone</th>";
                echo "<th>Vencimento</th>";
                echo "<th>SITUAÇÃO</th>";
                echo "<th>AÇÕES</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $contador = 1;
                foreach ($alunos as $aluno) {
                    $dataVencimento = $aluno['dataVencimento'];

                    // Formatar a data para o formato ddmmyyyy
                    $dataFormatada = date('d/m/Y', strtotime($dataVencimento));
                    echo "<tr class='linha-aluno' data-id='" . $aluno['idAluno'] . "' data-nome='" . $aluno['telefone'] . "' data-telefone='" . $aluno['telefone'] . "' data-vencimento='" . $aluno['dataVencimento'] . "'>";
                    echo "<td style='display:none;'>" . $aluno['idAluno'] . "</td>";
                    echo "<td>{$contador}</td>";
                    echo "<td class='nomealuno' id='nomealuno'>" . $aluno['nome'] . "</td>";
                    echo "<td>" . $aluno['endereco'] . "</td>";
                    echo "<td>" . $aluno['telefone'] . "</td>";
                    echo "<td>$dataFormatada</td>";
                    echo "<td><i><strong><span style='color: RED;'>IGNORADO</span></strong></i></td>";
                   echo " <td id='acoespainel'>
                            <div class='actionspainel'>
                            <a id='verdetalhes' style='cursor: pointer;' class='verdetalhesfuturos' onclick='adicionarEventosBotoesFuturos()'>Atualizar</a>
                            </div>
                        </td>";
                    echo "</tr>";
                    $contador++;
                }
                echo "</tbody>";
                echo "</table>";
            }
        } catch (Exception $e) {
            echo "Erro ao buscar alunos: " . $e->getMessage();
        }
    }
    elseif (isset($_POST['idalunodetalhes'])) {
        $id = $_POST['idalunodetalhes'];
        try {
            $database = new Database();
            $conexao = $database->getConnection();
    
            $clientes = new Pagamento();
            $usuarios = $clientes->listarPorId($id);

            if (empty($usuarios)) {
      
              
            } else {
                
                foreach ($usuarios as $aluno) {
                   
                }
                
        } 
    }
    catch (Exception $e) {
            echo "Erro ao buscar alunos desativados: " . $e->getMessage();
        }
    }
 else {
    echo "Este script aceita apenas requisições POST.";
}
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Definir o número de registros por página
    $limite = 100;

    // Capturar a página atual (se não for informada, assume 1)
    $pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
    
    // Evita números negativos
    $pagina = max($pagina, 1);
    
    // Calcula o deslocamento (offset)
    $offset = ($pagina - 1) * $limite;
    try {
        $database = new Database();
    $conexao = $database->getConnection();

       // Verifica qual lista deve ser carregada (ativados ou desativados)
       if (isset($_GET['mostrarAtivado'])) {
      // Chamada ao método listarTodos
      $alunos = Aluno::listarTodos($conexao, $pagina);
      $contador = 1;
      echo "<table border='1' cellpadding='10'>";
      echo "<thead>";
      echo "<tr >";
      echo "<th style='display:none;'>ID</th>";
      ECHO "<th>Nº</th>";
      echo "<th>Nome</th>";
      echo "<th>Endereço</th>";
      echo "<th>Telefone</th>";
      echo "<th style='width:200px;'>Ações</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";


      // Iterar sobre os alunos para exibir o plano
      foreach ($alunos as $aluno) {
          
          echo "<tr class='linha-aluno' data-id='" . $aluno->getId() . "'>";
          echo "<td style='display:none;' >" . $aluno->getId() . "</td>"; // Exibe o ID
          ECHO "<td>{$contador}</td> <!-- Exibe o número da linha -->";
          echo "<td>" . $aluno->getNome() . "</td>"; // Exibe o nome
          echo "<td>" . $aluno->getEndereco() . "</td>"; // Exibe o endereço
          echo "<td>" . $aluno->getTelefone() . "</td>"; // Exibe o telefone
          echo "<td style='width:200px;'>";
          echo "<div class='actions' alt='Ver Detalhes'><button class='ver-detalhes 'id='acticons' title='Ver Detalhes'> <svg alt='Ver Detalhes' id='svgiconsact' fill='#ffffff' version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 442.04 442.04' xml:space='preserve' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <g> <g> <path d='M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203 c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219 c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367 c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021 c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212 c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071 c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z'></path> </g> <g> <path d='M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188 c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993 c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5 s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z'></path> </g> <g> <path d='M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z'></path> </g> </g> </g>
                      </svg>
                      </button>
                      <button class='medidas' id='acticonsmedir' title='Ver Medidas'>
                      <svg id='svgiconsact'  viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path fill-rule='evenodd' clip-rule='evenodd' d='M13.6882 4.14229L14.6516 5.10571C14.9445 5.3986 14.9445 5.87348 14.6516 6.16637C14.3588 6.45926 13.8839 6.45926 13.591 6.16637L12.6269 5.20228L11.5662 6.26294L13.2374 7.93414C13.5303 8.22703 13.5303 8.7019 13.2374 8.9948C12.9445 9.28769 12.4697 9.28769 12.1768 8.9948L10.5056 7.3236L9.44492 8.38426L10.409 9.34835C10.7019 9.64124 10.7019 10.1161 10.409 10.409C10.1161 10.7019 9.64124 10.7019 9.34835 10.409L8.38426 9.44492L7.3236 10.5056L8.9948 12.1768C9.28769 12.4697 9.28769 12.9445 8.9948 13.2374C8.7019 13.5303 8.22703 13.5303 7.93414 13.2374L6.26294 11.5662L5.20228 12.6269L6.16637 13.591C6.45926 13.8839 6.45926 14.3588 6.16637 14.6516C5.87348 14.9445 5.3986 14.9445 5.10571 14.6516L4.14229 13.6882C3.67802 14.1568 3.34308 14.5094 3.10761 14.818C2.81761 15.1981 2.75 15.422 2.75 15.6157C2.75 15.8094 2.81762 16.0334 3.10761 16.4135C3.41081 16.8109 3.87892 17.2812 4.5757 17.978L6.022 19.4243C6.71878 20.1211 7.18914 20.5892 7.58653 20.8924C7.96662 21.1824 8.19057 21.25 8.38426 21.25C8.57795 21.25 8.8019 21.1824 9.18198 20.8924C9.57938 20.5892 10.0497 20.1211 10.7465 19.4243L19.4243 10.7465C20.1211 10.0497 20.5892 9.57938 20.8924 9.18198C21.1824 8.8019 21.25 8.57795 21.25 8.38426C21.25 8.19057 21.1824 7.96662 20.8924 7.58653C20.5892 7.18914 20.1211 6.71878 19.4243 6.022L17.978 4.5757C17.2812 3.87892 16.8109 3.41081 16.4135 3.10761C16.0334 2.81762 15.8094 2.75 15.6157 2.75C15.422 2.75 15.1981 2.81761 14.818 3.10761C14.5094 3.34308 14.1568 3.67802 13.6882 4.14229ZM13.9081 1.91508C14.4217 1.52328 14.9622 1.25 15.6157 1.25C16.2693 1.25 16.8098 1.52328 17.3233 1.91508C17.8104 2.28666 18.3514 2.82777 19.0017 3.47812L20.5219 4.99824C21.1722 5.64856 21.7133 6.18964 22.0849 6.67666C22.4767 7.19017 22.75 7.73073 22.75 8.38426C22.75 9.03779 22.4767 9.57834 22.0849 10.0919C21.7133 10.5789 21.1722 11.12 20.5219 11.7703L11.7703 20.5219C11.12 21.1722 10.5789 21.7133 10.0919 22.0849C9.57834 22.4767 9.03779 22.75 8.38426 22.75C7.73073 22.75 7.19017 22.4767 6.67666 22.0849C6.18964 21.7133 5.64856 21.1722 4.99824 20.5219L3.47812 19.0017C2.82777 18.3514 2.28666 17.8104 1.91508 17.3233C1.52328 16.8098 1.25 16.2693 1.25 15.6157C1.25 14.9622 1.52328 14.4217 1.91508 13.9081C2.28667 13.4211 2.82779 12.88 3.47816 12.2297L12.2297 3.47815C12.88 2.82778 13.4211 2.28666 13.9081 1.91508Z' fill='#ffffff'></path> </g></svg>
                      </button>
                      <button class='editar' id='acticonsedit' title='Editar Aluno'>
                      <svg id='svgiconsact' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path d='M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path> <path d='M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path> </g>
                      </svg>
                      </button>
                      <b<button class='apagar' id='acticonsapagar' title='Desativar Aluno'><svg id='svgiconsact' fill='#ffffff' viewBox='0 0 32 32' enable-background='new 0 0 32 32' id='Glyph' version='1.1' xml:space='preserve' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'><path d='M20.722,24.964c0.096,0.096,0.057,0.264-0.073,0.306c-7.7,2.466-16.032-1.503-18.594-8.942 c-0.072-0.21-0.072-0.444,0-0.655c0.743-2.157,1.99-4.047,3.588-5.573c0.061-0.058,0.158-0.056,0.217,0.003l4.302,4.302 c0.03,0.03,0.041,0.072,0.031,0.113c-1.116,4.345,2.948,8.395,7.276,7.294c0.049-0.013,0.095-0.004,0.131,0.032 C17.958,22.201,20.045,24.287,20.722,24.964z' id='XMLID_323_'></path><path d='M24.68,23.266c2.406-1.692,4.281-4.079,5.266-6.941c0.072-0.21,0.072-0.44,0-0.65 C27.954,9.888,22.35,6,16,6c-2.479,0-4.841,0.597-6.921,1.665L3.707,2.293c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414 l26,26c0.391,0.391,1.023,0.391,1.414,0c0.391-0.391,0.391-1.023,0-1.414L24.68,23.266z M16,10c3.309,0,6,2.691,6,6 c0,1.294-0.416,2.49-1.115,3.471l-8.356-8.356C13.51,10.416,14.706,10,16,10z' id='XMLID_325_'></path></g></svg></button>
                      <button class='ativar' style='display:none;'id='acticonsativar' title='Ativar Aluno'><svg id='svgiconsact' fill='#ffffff' viewBox='0 0 32 32' version='1.1' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <title>eye</title> <path d='M0 16q0.064 0.128 0.16 0.352t0.48 0.928 0.832 1.344 1.248 1.536 1.664 1.696 2.144 1.568 2.624 1.344 3.136 0.896 3.712 0.352 3.712-0.352 3.168-0.928 2.592-1.312 2.144-1.6 1.664-1.632 1.248-1.6 0.832-1.312 0.48-0.928l0.16-0.352q-0.032-0.128-0.16-0.352t-0.48-0.896-0.832-1.344-1.248-1.568-1.664-1.664-2.144-1.568-2.624-1.344-3.136-0.896-3.712-0.352-3.712 0.352-3.168 0.896-2.592 1.344-2.144 1.568-1.664 1.664-1.248 1.568-0.832 1.344-0.48 0.928zM10.016 16q0-2.464 1.728-4.224t4.256-1.76 4.256 1.76 1.76 4.224-1.76 4.256-4.256 1.76-4.256-1.76-1.728-4.256zM12 16q0 1.664 1.184 2.848t2.816 1.152 2.816-1.152 1.184-2.848-1.184-2.816-2.816-1.184-2.816 1.184l2.816 2.816h-4z'></path> </g></svg></button>
                      </div>";
          echo "</td>";
          echo "</tr>";
          
          $contador++; 
      }
      if (empty($alunos)) {
          echo "<tr><td colspan='7'>Nenhum aluno desativado.</td></tr>";
      }
    } elseif (isset($_GET['mostrarDesativado'])) {
       // Chamada ao método listarTodos
       $alunos = Aluno::listarTodosDesativados($conexao, $pagina);
       $contador = 1;
       echo "<table border='1' cellpadding='10'>";
       echo "<thead>";
       echo "<tr >";
       echo "<th style='display:none;'>ID</th>";
       ECHO "<th>Nº</th>";
       echo "<th>Nome</th>";
       echo "<th>Endereço</th>";
       echo "<th>Telefone</th>";
       echo "<th style='width:200px;'>Ações</th>";
       echo "</tr>";
       echo "</thead>";
       echo "<tbody>";


       // Iterar sobre os alunos para exibir o plano
       foreach ($alunos as $aluno) {
           
           echo "<tr class='linha-aluno' data-id='" . $aluno->getId() . "'>";
           echo "<td style='display:none;' >" . $aluno->getId() . "</td>"; // Exibe o ID
           ECHO "<td>{$contador}</td> <!-- Exibe o número da linha -->";
           echo "<td>" . $aluno->getNome() . "</td>"; // Exibe o nome
           echo "<td>" . $aluno->getEndereco() . "</td>"; // Exibe o endereço
           echo "<td>" . $aluno->getTelefone() . "</td>"; // Exibe o telefone
           echo "<td style='width:200px;'>";
           echo "<div class='actions' alt='Ver Detalhes'><button class='ver-detalhes 'id='acticons' title='Ver Detalhes'> <svg alt='Ver Detalhes' id='svgiconsact' fill='#ffffff' version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 442.04 442.04' xml:space='preserve' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <g> <g> <path d='M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203 c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219 c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367 c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021 c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212 c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071 c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z'></path> </g> <g> <path d='M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188 c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993 c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5 s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z'></path> </g> <g> <path d='M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z'></path> </g> </g> </g>
                       </svg>
                       </button>
                       <button class='medidas' id='acticonsmedir' title='Ver Medidas'>
                       <svg id='svgiconsact'  viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path fill-rule='evenodd' clip-rule='evenodd' d='M13.6882 4.14229L14.6516 5.10571C14.9445 5.3986 14.9445 5.87348 14.6516 6.16637C14.3588 6.45926 13.8839 6.45926 13.591 6.16637L12.6269 5.20228L11.5662 6.26294L13.2374 7.93414C13.5303 8.22703 13.5303 8.7019 13.2374 8.9948C12.9445 9.28769 12.4697 9.28769 12.1768 8.9948L10.5056 7.3236L9.44492 8.38426L10.409 9.34835C10.7019 9.64124 10.7019 10.1161 10.409 10.409C10.1161 10.7019 9.64124 10.7019 9.34835 10.409L8.38426 9.44492L7.3236 10.5056L8.9948 12.1768C9.28769 12.4697 9.28769 12.9445 8.9948 13.2374C8.7019 13.5303 8.22703 13.5303 7.93414 13.2374L6.26294 11.5662L5.20228 12.6269L6.16637 13.591C6.45926 13.8839 6.45926 14.3588 6.16637 14.6516C5.87348 14.9445 5.3986 14.9445 5.10571 14.6516L4.14229 13.6882C3.67802 14.1568 3.34308 14.5094 3.10761 14.818C2.81761 15.1981 2.75 15.422 2.75 15.6157C2.75 15.8094 2.81762 16.0334 3.10761 16.4135C3.41081 16.8109 3.87892 17.2812 4.5757 17.978L6.022 19.4243C6.71878 20.1211 7.18914 20.5892 7.58653 20.8924C7.96662 21.1824 8.19057 21.25 8.38426 21.25C8.57795 21.25 8.8019 21.1824 9.18198 20.8924C9.57938 20.5892 10.0497 20.1211 10.7465 19.4243L19.4243 10.7465C20.1211 10.0497 20.5892 9.57938 20.8924 9.18198C21.1824 8.8019 21.25 8.57795 21.25 8.38426C21.25 8.19057 21.1824 7.96662 20.8924 7.58653C20.5892 7.18914 20.1211 6.71878 19.4243 6.022L17.978 4.5757C17.2812 3.87892 16.8109 3.41081 16.4135 3.10761C16.0334 2.81762 15.8094 2.75 15.6157 2.75C15.422 2.75 15.1981 2.81761 14.818 3.10761C14.5094 3.34308 14.1568 3.67802 13.6882 4.14229ZM13.9081 1.91508C14.4217 1.52328 14.9622 1.25 15.6157 1.25C16.2693 1.25 16.8098 1.52328 17.3233 1.91508C17.8104 2.28666 18.3514 2.82777 19.0017 3.47812L20.5219 4.99824C21.1722 5.64856 21.7133 6.18964 22.0849 6.67666C22.4767 7.19017 22.75 7.73073 22.75 8.38426C22.75 9.03779 22.4767 9.57834 22.0849 10.0919C21.7133 10.5789 21.1722 11.12 20.5219 11.7703L11.7703 20.5219C11.12 21.1722 10.5789 21.7133 10.0919 22.0849C9.57834 22.4767 9.03779 22.75 8.38426 22.75C7.73073 22.75 7.19017 22.4767 6.67666 22.0849C6.18964 21.7133 5.64856 21.1722 4.99824 20.5219L3.47812 19.0017C2.82777 18.3514 2.28666 17.8104 1.91508 17.3233C1.52328 16.8098 1.25 16.2693 1.25 15.6157C1.25 14.9622 1.52328 14.4217 1.91508 13.9081C2.28667 13.4211 2.82779 12.88 3.47816 12.2297L12.2297 3.47815C12.88 2.82778 13.4211 2.28666 13.9081 1.91508Z' fill='#ffffff'></path> </g></svg>
                       </button>
                       <button class='editar' id='acticonsedit' title='Editar Aluno'>
                       <svg id='svgiconsact' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path d='M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path> <path d='M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13' stroke='#ffffff' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'></path> </g>
                       </svg>
                       </button>
                       <button class='apagar' style='display:none;' id='acticonsativar' title='Ativar Aluno'><svg id='svgiconsact' fill='#ffffff' viewBox='0 0 32 32' version='1.1' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <title>eye</title> <path d='M0 16q0.064 0.128 0.16 0.352t0.48 0.928 0.832 1.344 1.248 1.536 1.664 1.696 2.144 1.568 2.624 1.344 3.136 0.896 3.712 0.352 3.712-0.352 3.168-0.928 2.592-1.312 2.144-1.6 1.664-1.632 1.248-1.6 0.832-1.312 0.48-0.928l0.16-0.352q-0.032-0.128-0.16-0.352t-0.48-0.896-0.832-1.344-1.248-1.568-1.664-1.664-2.144-1.568-2.624-1.344-3.136-0.896-3.712-0.352-3.712 0.352-3.168 0.896-2.592 1.344-2.144 1.568-1.664 1.664-1.248 1.568-0.832 1.344-0.48 0.928zM10.016 16q0-2.464 1.728-4.224t4.256-1.76 4.256 1.76 1.76 4.224-1.76 4.256-4.256 1.76-4.256-1.76-1.728-4.256zM12 16q0 1.664 1.184 2.848t2.816 1.152 2.816-1.152 1.184-2.848-1.184-2.816-2.816-1.184-2.816 1.184l2.816 2.816h-4z'></path> </g></svg></button>
                       <button class='ativar' id='acticonsativar' title='Ativar Aluno'><svg id='svgiconsact' fill='#ffffff' viewBox='0 0 32 32' version='1.1' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <title>eye</title> <path d='M0 16q0.064 0.128 0.16 0.352t0.48 0.928 0.832 1.344 1.248 1.536 1.664 1.696 2.144 1.568 2.624 1.344 3.136 0.896 3.712 0.352 3.712-0.352 3.168-0.928 2.592-1.312 2.144-1.6 1.664-1.632 1.248-1.6 0.832-1.312 0.48-0.928l0.16-0.352q-0.032-0.128-0.16-0.352t-0.48-0.896-0.832-1.344-1.248-1.568-1.664-1.664-2.144-1.568-2.624-1.344-3.136-0.896-3.712-0.352-3.712 0.352-3.168 0.896-2.592 1.344-2.144 1.568-1.664 1.664-1.248 1.568-0.832 1.344-0.48 0.928zM10.016 16q0-2.464 1.728-4.224t4.256-1.76 4.256 1.76 1.76 4.224-1.76 4.256-4.256 1.76-4.256-1.76-1.728-4.256zM12 16q0 1.664 1.184 2.848t2.816 1.152 2.816-1.152 1.184-2.848-1.184-2.816-2.816-1.184-2.816 1.184l2.816 2.816h-4z'></path> </g></svg></button>
                       </div>";
           echo "</td>";
           echo "</tr>";
           
           $contador++; 
       }
       if (empty($alunos)) {
           echo "<tr><td colspan='7'>Nenhum aluno desativado.</td></tr>";
       }
    }
    elseif (isset($_GET['mostrarPago'])) {
        $database = new Database();
        $conexao = $database->getConnection();

        $clientes = new Pagamento();
        $usuarios = $clientes->listarTodos($pagina);
        $contador = 1;

        // Gerar a tabela antes do foreach
        echo '
        <table id="tabelaresultado" border="1" style="margin-bottom:10px;">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th id="nomealuno">Nome</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>SITUAÇÃO</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
        ';

        if (!empty($usuarios)) {
            foreach ($usuarios as $usuario) {
                echo "
                <tr class='linha-aluno' 
                    data-id='{$usuario['idAluno']}'
                    data-nome='{$usuario['nome']}'
                    data-telefone='{$usuario['telefone']}'>
                    <td style='display: none;'>{$usuario['idAluno']}</td>
                    <td>{$contador}</td>
                    <td class='nomealuno' id='nomealuno'>{$usuario['nome']}</td>
                    <td>{$usuario['endereco']}</td>
                    <td>{$usuario['telefone']}</td>
                    <td><i><strong><span style='color: green;'>POSSUI<br> PAGAMENTOS<BR> PAGOS</span></strong></i></td>
                    <td id='acoespainel'>
                        <div class='actionspainel'>
                            <a id='verdetalhes' class='verdetalhes'>Detalhes</a>
                        </div>
                    </td>
                </tr>";
                $contador++;
            }
        } else {
            // Exibe uma mensagem caso não haja registros
            echo "<tr><td colspan='6' style='text-align:center;'>Nenhum pagamento encontrado.</td></tr>";
        }

        // Fechar a tabela após o foreach
        echo '
            </tbody>
            <tbody id="resultadopagamentos2">
            </tbody>
        </table>
        ';
     }
     elseif (isset($_GET['mostrarProximo'])) {
        $database = new Database();
        $conexao = $database->getConnection();

        $clientes = new Pagamento();
        $usuarios = $clientes->listarTodosFuturos($pagina);
        $contador = 1;
        echo '
        <table id="tabelaresultado" border="1" style="margin-bottom:10px;">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th id="nomealuno">Nome</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Vencimento</th>
                    <th>Situação</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
        ';
        
        if (!empty($usuarios)) {
            foreach ($usuarios as $usuario) {
                $dataVencimento = $usuario['dataVencimento'];

                // Formatar a data para o formato dd/mm/yyyy
                $dataFormatada = date('d/m/Y', strtotime($dataVencimento));
                echo "<tr class='linha-aluno' 
                        data-id='{$usuario['idAluno']}'
                        data-nome='{$usuario['nome']}'
                        data-vencimento='{$usuario['dataVencimento']}'
                        data-telefone='{$usuario['telefone']}'>
                        <td style='display: none;'>{$usuario['idAluno']}</td>
                        <td>{$contador}</td>
                        <td class='nomealuno' id='nomealuno'>{$usuario['nome']}</td>
                        <td>{$usuario['endereco']}</td>
                        <td>{$usuario['telefone']}</td>
                        <td>{$dataFormatada}</td>
                        <td><i><strong><span style='color: red;'>PENDENTE</span></strong></i></td>
                        <td id='acoespainel'>
                            <div class='actionspainel'>
                               <a id='verdetalhes' style='cursor: pointer;' class='verdetalhesfuturos'>Atualizar</a>
                            </div>
                        </td>
                    </tr>";
                    $contador++;
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            // Exibe uma mensagem caso não haja registros
            echo "<td colspan='7'>Nenhum pagamento encontrado.</td>";
        }
     }
     elseif (isset($_GET['mostrarIgnorado'])) {
        $database = new Database();
        $conexao = $database->getConnection();

        $clientes = new Pagamento();
        $usuarios = $clientes->listarTodosIgnorados($pagina);
        $contador = 1;

        echo '
        <table id="tabelaresultado" border="1" style="margin-bottom:10px;">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th id="nomealuno">Nome</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Vencimento</th>
                    <th>Situação</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
        ';
        
        if (!empty($usuarios)) {
            foreach ($usuarios as $usuario) {
                $dataVencimento = $usuario['dataVencimento'];

                // Formatar a data para o formato dd/mm/yyyy
                $dataFormatada = date('d/m/Y', strtotime($dataVencimento));
                echo "<tr class='linha-aluno' 
                        data-id='{$usuario['idAluno']}'
                        data-nome='{$usuario['nome']}'
                        data-vencimento='{$usuario['dataVencimento']}'
                        data-telefone='{$usuario['telefone']}'>
                        <td style='display: none;'>{$usuario['idAluno']}</td>
                        <td>{$contador}</td>
                        <td class='nomealuno' id='nomealuno'>{$usuario['nome']}</td>
                        <td>{$usuario['endereco']}</td>
                        <td>{$usuario['telefone']}</td>
                        <td>{$dataFormatada}</td>
                        <td><i><strong><span style='color: red;'>IGNORADO</span></strong></i></td>
                        <td id='acoespainel'>
                            <div class='actionspainel'>
                               <a id='verdetalhes' style='cursor: pointer;' class='verdetalhesignorados'>Atualizar</a>
                            </div>
                        </td>
                    </tr>";
                    $contador++;
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            // Exibe uma mensagem caso não haja registros
            echo "<td colspan='7'>Nenhum pagamento encontrado.</td>";
        }
     }
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
    } 
}


?>
