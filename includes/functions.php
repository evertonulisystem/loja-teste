<?php
// Validação de CPF (oficial)
function validar_cpf($cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    if (strlen($cpf) != 11) return false;
    if (preg_match('/(\d)\1{10}/', $cpf)) return false;

    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) return false;
    }
    return true;
}

// Formatar preço
function formatar_preco($valor) {
    return 'R$ ' . number_format($valor, 2, ',', '.');
}

// Iniciar sessão com segurança
function sessao_segura() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}
?>