<?php
include '../models/Pagamento.php';
include __DIR__ . '/../config/database.php';
$clientes = new Pagamento();
$usuarios = $clientes->buscarPagamentosAtrasados();

if (!empty($usuarios)) {
    foreach ($usuarios as $usuario) {
        $dataVencimento = date('d/m/Y', strtotime($usuario['dataVencimento'])); 
        
        echo "<tr class='linha-aluno' 
                data-id='{$usuario['idAluno']}'
                data-nome='{$usuario['nome']}'
                data-vencimento='{$dataVencimento}'
                data-telefone='{$usuario['telefone']}'>  <!-- Incluindo o data-telefone -->
                
                <td>{$usuario['idAluno']}</td>
                <td class='nomealuno' id='nomealuno'>{$usuario['nome']}</td>
                <td>{$usuario['endereco']}</td>
                <td>{$usuario['telefone']}</td>
                <td>{$dataVencimento}</td>  <!-- Exibindo a data formatada -->
                <td><span>PAGAMENTO <br> PENDENTE</span></td>
                <td id='acoespainel'>
                    <div class='actionspainel'>
                        <button class='finalizarpagamento' id='acticonsfinalizar'>
                           <svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='#ffffff'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path fill-rule='evenodd' clip-rule='evenodd' d='M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z' fill='#00a832'></path> </g></svg>
                        </button>
                        <button class='medidas' id='acticonszap'>
                            <svg id='svgiconsact'viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg' stroke='#f7f7f7'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <path d='M7 9H17M7 13H17M21 20L17.6757 18.3378C17.4237 18.2118 17.2977 18.1488 17.1656 18.1044C17.0484 18.065 16.9277 18.0365 16.8052 18.0193C16.6672 18 16.5263 18 16.2446 18H6.2C5.07989 18 4.51984 18 4.09202 17.782C3.71569 17.5903 3.40973 17.2843 3.21799 16.908C3 16.4802 3 15.9201 3 14.8V7.2C3 6.07989 3 5.51984 3.21799 5.09202C3.40973 4.71569 3.71569 4.40973 4.09202 4.21799C4.51984 4 5.0799 4 6.2 4H17.8C18.9201 4 19.4802 4 19.908 4.21799C20.2843 4.40973 20.5903 4.71569 20.782 5.09202C21 5.51984 21 6.0799 21 7.2V20Z' stroke='#ffffff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'></path> </g></svg>
                        </button>
                        <button class='editar' id='acticonsignorar'>
                           <svg viewBox='0 0 512 512' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' fill='#000000'><g id='SVGRepo_bgCarrier' stroke-width='0'></g><g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g><g id='SVGRepo_iconCarrier'> <title>error-filled</title> <g id='Page-1' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'> <g id='add' fill='#d60000' transform='translate(42.666667, 42.666667)'> <path d='M213.333333,3.55271368e-14 C331.136,3.55271368e-14 426.666667,95.5306667 426.666667,213.333333 C426.666667,331.136 331.136,426.666667 213.333333,426.666667 C95.5306667,426.666667 3.55271368e-14,331.136 3.55271368e-14,213.333333 C3.55271368e-14,95.5306667 95.5306667,3.55271368e-14 213.333333,3.55271368e-14 Z M262.250667,134.250667 L213.333333,183.168 L164.416,134.250667 L134.250667,164.416 L183.168,213.333333 L134.250667,262.250667 L164.416,292.416 L213.333333,243.498667 L262.250667,292.416 L292.416,262.250667 L243.498667,213.333333 L292.416,164.416 L262.250667,134.250667 Z' id='Combined-Shape'> </path> </g> </g> </g></svg>
                        </button>
                    </div>
                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='7'>Nenhum pagamento pendente.</td></tr>";
}
?>
