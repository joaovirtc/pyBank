<?php
    session_start();
    require_once("../../assets/conexao.php");
    if(!isset($_SESSION['id'])){
        header("location: ../login/");
    };
    $id = $_SESSION['id'];
    $nome = mysqli_fetch_array($conexao->query( "SELECT nome FROM user where id_user = $id"));
    $nome = $nome[0];
    $dinheiro = mysqli_fetch_array($conexao->query( "SELECT dinheiro FROM user where id_user = '$id'"));
    $dinheiro = $dinheiro[0];
    $dinheiro = number_format($dinheiro, 2, ',', '.');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User accout</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a74e3185bb.js" crossorigin="anonymous"></script>
    <script src="iziToast.min.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!-- ======================== HEADER ===================== -->
    <header>
        <nav>
            <div>
                <a href="../../index.html">
                    <img src="../../assets/img/logo.png" alt="">
                </a>
            </div>

            <div class="user">
                <p class="nome_user">Bem vindo de volta, <strong>
                        <?php echo ( $nome)?>!
                    </strong></p>
                <i class="ri-account-circle-fill Iuser"></i>
                <a href="logout.php" class="logout"><i class="ri-logout-circle-line Ilogout"></i></a>
            </div>
        </nav>
    </header>


    <main id="blur" <?php if(isset($_GET['href'])) { if($_GET['href']==$_SESSION['token']){ echo ("class=\"active\"");};
        $_SESSION['token']=mt_rand(1111,9999); } ?>>
        <!-- ========================= MEUS CARTÕES ============== -->
        <section class="container-1">
            <div class="div-meus-cartoes">
                <div class="title">
                    <strong>Meus cartões</strong>
                </div>
                <div class="cartao">
                    <img src="../../assets/img/Card1.png" alt="">
                    <p> R$
                        <?php echo($dinheiro)?>
                    </p>
                </div>
                <div class="cartao">
                    <img src="../../assets/img/card2.png" alt="">
                    <p> R$ 13.000</p>
                </div>
                <div class="gerenciar">
                    <button>Gerenciar cartões <i class="ri-arrow-right-s-line"></i></button>
                </div>
            </div>
        </section>
        <!-- ========================= SERVIÇOS ============== -->
        <section class="container-2">
            <div class="div-serviços">
                <div class="title">
                    <strong>Serviços</strong>
                </div>
                <div class="box-serviços">
                    <div class="box" onclick="toggle()">
                        <i class="fa-brands fa-pix"></i>
                        <p>PIX</p>
                    </div>
                    <div class="box">
                        <i class="ri-exchange-dollar-line"></i>
                        <p>TRANSFERIR</p>
                    </div>
                    <div class="box">
                        <i class="ri-line-chart-line"></i>
                        <p>INVESTIR</p>
                    </div>
                    <div class="box">
                        <i class="ri-question-line"></i>
                        <p>AJUDA</p>
                    </div>
                </div>
                <div class="grafico">
                    <p>EM BREVE</p>
                </div>
            </div>



        </section>
        <!-- ========================= TRANSAÇÔES ============== -->
        <section class="container-3">
            <div class="title">
                <div>
                    <strong>Transações</strong>
                </div>
                <div class="ver-tudo">
                    <p>Ver todas</p>
                    <i class="ri-arrow-right-s-line"></i>
                </div>
            </div>
            <div class="div-transacoes">
                <?php 
                    $historico =  $conexao->query("SELECT * FROM pix WHERE remetente = '$id' or destinatario = '$id' ORDER BY id_pix DESC");
                    foreach ($historico as $row) {
                        $valor = $row["valor"];
                        if($row["remetente"] === $id){
                            $id_para = $row["destinatario"];
                            $para = mysqli_fetch_array( $conexao->query("SELECT * FROM user where id_user = '$id_para'"));
                            $para = $para[1];
                            echo("
                                <div class=\"transacao-1\">
                                    <div><i class=\"fa-brands fa-pix\"></i></div>
                                    <div>
                                        <p>Pix enviado para {$para}</p>
                                    </div>
                                    <div>
                                        <p class=\"enviado\"> R$ {$valor}</p>
                                    </div>
                                </div>
                                
                            ");
                        };
                        if($row["destinatario"] === $id){
                            $id_rmt = $row["remetente"];
                            $nome_rmt =  mysqli_fetch_array($conexao->query("SELECT * FROM user where id_user = '$id_rmt' "));
                            $nome_rmt = $nome_rmt["nome"];
                            echo("
                                <div class=\"transacao-1\">
                                    <div><i class=\"fa-brands fa-pix\"></i></div>
                                    <div>
                                        <p>Pix recebido de $nome_rmt</p>
                                    </div>
                                    <div>
                                        <p class=\"recebido\"> R$ {$valor}</p>
                                    </div>
                                </div>
                                
                            ");
                        };
                    };
                
                
                ?>
                <!-- $row["id_pix"] -->
                <div class="transacao-1">
                    <div><i class="fa-brands fa-pix"></i></div>
                    <div>
                        <p>Pix recebido</p>
                    </div>
                    <div>
                        <p class="recebido"> R$ 1.800,00</p>
                    </div>
                </div>
        </section>


    </main>

    <div id="popup">
        <div class="container-popup">
            <div><i class="fa-brands fa-pix icon-pix"></i></div>

            <!-- =================== FOMULÁRIO ==================== -->

            <form id="form" action="pix.php" class="form-pix" method="POST">

                <!-- ================= INPUT CHAVE DO PIX =============== -->

                <div class="single-input">
                    <input type="text" name="chave" class="input" required>
                    <label for="nome">Chave</label>
                </div>

                <!-- ================= INPUT VALOR =============== -->

                <div class="single-input">
                    <input type="text" name="valor" class="input" required>
                    <label for="nome">Valor</label>
                </div>
                <input name="submit" id="submit" type="submit" class="btn-enviar" />
            </form>


            <button class="btn-fechar" onclick="toggle()">Fechar</button>

            <!-- ================= FOMULÁRIO ==================== -->
        </div>
    </div>


    <?php 
        if($_SESSION['enviado'] === true){
            echo (" 
                
                <div id=\"popup2\" class=\"active\">
                    <img src=\"../../assets/img/gifCheck.gif\" class=\"gifCheck\">
                    <div>
                        <p>Seu pix foi enviado com sucesso !</p>
                    </div>
                    <button class=\"fecharCheck\" onclick=\"toggle2()\">Fechar</button>
                </div>
                
            ");
            $_SESSION['enviado'] = false;
            
        };
    ?>






    <script src="app.js"></script>
</body>

</html>