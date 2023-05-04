<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Cadastre seu endereço</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <script src="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"></script>
</head>
<body>

<header class="bg-dark">
    <nav class="navbar shadow-sm rounded mb-4">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 text-white">Integra CEP</span>
    </div>
    </nav>
</header>

<main class="container">
    
    <div class="alert alert-<?php  
        if(isset($_SESSION['tipo_mensagem'])){
            echo $_SESSION['tipo_mensagem'];
        }; 
    ?>">
        <?php 
            if(isset($_SESSION['mensagem'])){
                echo $_SESSION['mensagem'];
            };
        ?>
    </div>
    
