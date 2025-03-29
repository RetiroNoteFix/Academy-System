<?php
include '../models/Usuario.php';
include '../models/Pagamento.php';
include_once __DIR__ . '/../config/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['usuario'])) {
        try {
            $database = new Database();
            $conexao = $database->getConnection();
            $alunos = Usuario::listarTodos();
            $contador = 1;
            echo "<table border='1' cellpadding='10'>";
            echo "<thead>";
            echo "<tr >";
            echo "<th style='display:none;'>ID</th>";
            ECHO "<th>Nº</th>";
            echo "<th>Nome</th>";
            echo "<th>Tipo</th>";
            echo "<th style='width:200px;'>Ações</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($alunos as $aluno) {
                echo "<tr class='linha-aluno' data-id='" . $aluno['idPessoa'] . "' data-nome='" . $aluno['nome'] . "'>";
                echo "<td style='display:none;' >". $aluno['idPessoa'] . "</td>";
                ECHO "<td>{$contador}</td> <!-- Exibe o número da linha -->";
                echo "<td>" . $aluno['nome'] . "</td>";
                echo "<td>" . $aluno['tipo_usuario'] . "</td>";
                echo "<td style='width:200px;'>";
                echo "<div class='actions' alt='Ver Detalhes'><button class='apagar'id='acticonsapagar' title='Desativar Usuário'> <svg id='svgiconsact' fill='#ffffff' viewBox='0 0 32 32' enable-background='new 0 0 32 32' id='Glyph' version='1.1' xml:space='preserve' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'><path d='M20.722,24.964c0.096,0.096,0.057,0.264-0.073,0.306c-7.7,2.466-16.032-1.503-18.594-8.942 c-0.072-0.21-0.072-0.444,0-0.655c0.743-2.157,1.99-4.047,3.588-5.573c0.061-0.058,0.158-0.056,0.217,0.003l4.302,4.302 c0.03,0.03,0.041,0.072,0.031,0.113c-1.116,4.345,2.948,8.395,7.276,7.294c0.049-0.013,0.095-0.004,0.131,0.032 C17.958,22.201,20.045,24.287,20.722,24.964z' id='XMLID_323_'></path><path d='M24.68,23.266c2.406-1.692,4.281-4.079,5.266-6.941c0.072-0.21,0.072-0.44,0-0.65 C27.954,9.888,22.35,6,16,6c-2.479,0-4.841,0.597-6.921,1.665L3.707,2.293c-0.391-0.391-1.023-0.391-1.414,0s-0.391,1.023,0,1.414 l26,26c0.391,0.391,1.023,0.391,1.414,0c0.391-0.391,0.391-1.023,0-1.414L24.68,23.266z M16,10c3.309,0,6,2.691,6,6 c0,1.294-0.416,2.49-1.115,3.471l-8.356-8.356C13.51,10.416,14.706,10,16,10z' id='XMLID_325_'></path></g></svg>
                            </button>
                            </div>";
                echo "</td>";
                echo "</tr>";
                $contador++; 
            }
            if (empty($alunos)) {
                echo "<tr><td colspan='7'>Nenhum aluno encontrado.</td></tr>";
            }
        } catch (Exception $e) {
            echo "Erro ao listar os alunos: " . $e->getMessage();
        }
} elseif (isset($_POST['id'])) {
            $idDesativarPessoa = $_POST['id'];
            $nomeusuarioexcluido = $_POST['nome'];
            try {
                $database = new Database();
                $conn = $database->getConnection();
    
                // Exibir erros para depuração
                ini_set('display_errors', 1);
                error_reporting(E_ALL);
    
                if ($nomeusuarioexcluido == "SUPORTE") { // Comparação corrigida
                    echo "ERRO: Não é possível remover o administrador.";
                } else {
                    $query = "DELETE FROM usuarios WHERE idPessoa = :idPessoa";
                
                    // Preparar e executar a query
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(':idPessoa', $idDesativarPessoa, PDO::PARAM_INT);
                
                    if ($stmt->execute()) { // Execução dentro do bloco correto
                        echo "Usuário(a) " . htmlspecialchars($nomeusuarioexcluido, ENT_QUOTES, 'UTF-8') . " removido(a) com sucesso!";
                    } else {
                        echo "Erro ao remover usuário(a). Chame o suporte.";
                    }
                }
                
            } catch (Exception $e) {
                // Retornar mensagem de erro em texto simples
                echo "Erro: " . $e->getMessage();
            }
        } else {
            // Retornar erro caso o método não seja POST
            echo "Método inválido. Use POST.";
        }
    }



?>
