<?php
    session_start();
    printf($_SESSION['id'])
?>


<!DOCTYPE html>
<html lang="en">

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
            <div class="user-foto">
                <i class="fas fa-user-circle"></i>
            </div>
        </nav>
    </header>


    <main id="blur">
        <!-- ========================= MEUS CARTÕES ============== -->
        <section class="container-1">
            <div class="div-meus-cartoes">
                <div class="title">
                    <strong>Meus cartões</strong>
                </div>
                <div class="cartao">
                    <img src="../../assets/img/Card1.png" alt="">
                    <p> R$ 1000</p>
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
                <div class="transacao-1">
                    <div><i class="fa-solid fa-burger"></i></div>
                    <div>
                        <p>Comida</p>
                    </div>
                    <div>
                        <p class="gasto">- R$ 57,70</p>
                    </div>
                </div>
                <div class="transacao-2">
                    <div><i class="fa-brands fa-pix"></i></div>
                    <div>
                        <p>Pix recebido</p>
                    </div>
                    <div>
                        <p class="recebido"> + R$ 100,00</p>
                    </div>
                </div>
                <div class="transacao-3">
                    <div><i class="fa-brands fa-amazon"></i></div>
                    <div>
                        <p>Amazon</p>
                    </div>
                    <div>
                        <p class="gasto">- R$ 400,00</p>
                    </div>
                </div>
                <div class="transacao-4">
                    <div><i class="fa-brands fa-pix"></i></div>
                    <div>
                        <p>Pix enviado</p>
                    </div>
                    <div>
                        <p class="gasto">- R$ 50,00</p>
                    </div>
                </div>
            </div>
        </section>


    </main>

    <div id="popup">
        <!-- <button class="button">
            <span class="text-button">ENVIAR</span>
            <i class="ri-check-line icon"></i>
        </button> -->
        <div class="container-popup">
            <div><i class="fa-brands fa-pix icon-pix"></i></div>

            <!-- =================== FOMULÁRIO ==================== -->

            <form id="form" class="form-pix" method="POST">

                <!-- ================= INPUT CHAVE DO PIX =============== -->

                <div class="single-input">
                    <input type="text" name="senha" class="input" required>
                    <label for="nome">Chave</label>
                </div>

                <!-- ================= INPUT VALOR =============== -->

                <div class="single-input">
                    <input type="text" name="senha" class="input" required>
                    <label for="nome">Valor</label>
                </div>
                <input name="submit" id="submit" type="submit" class="btn-enviar" />
            </form>
            <button class="btn-fechar" onclick="toggle()">Fechar</button>
            <!-- =================== FOMULÁRIO ==================== -->
        </div>
    </div>

    <script>

    </script>
    <script src="app.js"></script>
</body>

</html>