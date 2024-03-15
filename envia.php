<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $mensagem = $_POST["mensagem"];

    // Construa a mensagem de e-mail
    $assunto = "Novo formulário de contato";
    $corpo = "Nome: $nome\n";
    $corpo .= "E-mail: $email\n";
    $corpo .= "Celular: $celular\n";
    $corpo .= "Mensagem:\n$mensagem";

    // Endereço de e-mail para receber a mensagem
    $destinatario = "allan.anes.louzada@gmail.com";

    // Cabeçalhos do e-mail
    $cabecalhos = "From: $email" . "\r\n" .
                  "Reply-To: $email" . "\r\n" .
                  "X-Mailer: PHP/" . phpversion();

    // Envie o e-mail
    if (mail($destinatario, $assunto, $corpo, $cabecalhos)) {
        echo "Obrigado por entrar em contato, $nome! Seu formulário foi enviado com sucesso.";
    } else {
        echo "Desculpe, houve um erro ao enviar o formulário.";
    }
} else {
    header("Location: formulario.html");
    exit();
}
?>