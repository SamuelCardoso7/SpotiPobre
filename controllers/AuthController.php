<?php

require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nome  = trim($_POST['nome']);
            $email = trim($_POST['email']);
            $senha = trim($_POST['senha']);

            $usuarioExistente = $this->userModel->findByEmail($email);

            if ($usuarioExistente) {
                $_SESSION['erro'] = "Este email já está cadastrado.";
                header("Location: register.php");
                exit();
            }

            if ($this->userModel->create($nome, $email, $senha)) {
                $_SESSION['sucesso'] = "Conta criada com sucesso!";
                header("Location: login.php");
                exit();
            } else {
                $_SESSION['erro'] = "Erro ao criar conta.";
                header("Location: register.php");
                exit();
            }
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = trim($_POST['email']);
            $senha = trim($_POST['senha']);

            $usuario = $this->userModel->findByEmail($email);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                $_SESSION['id']   = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: ../index.php");
                exit();
            } else {
                $_SESSION['erro'] = "Email ou senha incorretos.";
                header("Location: login.php");
                exit();
            }
        }
    }
}