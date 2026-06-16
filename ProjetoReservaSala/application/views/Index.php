<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Home - Sistema de Mapa de Sala</title>
        <Link rel="icon" href="../../ProjetoReservaSala/assets/img/icone_fatecSR.ico" type="image/x-icon">

        <link rel="stylesheet" href="../../ProjetoReservaSala/assets/css/reset.css">
        <link rel="stylesheet" href="../../ProjetoReservaSala/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../ProjetoReservaSala/assets/css/style.css">

        <script src="../../ProjetoReservaSala/assets/js/jquery-3.6.0.min.js"></script>
        <script src="../../ProjetoReservaSala/assets/js/bootstrap.min.js" defer></script>
        <script src="../../ProjetoReservaSala/assets/js/sweetalert2.all.min.js" defer></script>  


        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    </head>
    <body>
        <a id="linkHome" href="#">
            <header>
                <h1 id="headerTitle">Mapeamento de Salas</h1>
            </header>
        </a>
        <main>
            <!-- Seção com cards -->
            <section class="secao4" id="sobre">
                <div class="secao4-div">
                    <!-- Card 1 -->
                     <a href="../funcoes/abreSala" class="secao4-div-card card">
                        <img decoding="async" src="../assets/img/sala-de-aula.png" alt="imagem do card 1 sala">
                        <h3>Sala de Aula</h3>
                        <p>Clique para Cadastrar, Editar, Consultar ou excluir uma nova sala de aula.</p>
                     </a>

                     <!-- Card 2 -->
                     <a href="../funcoes/abreProfessor" class="secao4-div-card card">
                        <img decoding="async" src="../assets/img/professores.png" alt="imagem do card 2 sala">
                        <h3>Docente</h3>
                        <p>Clique para Cadastrar, Editar, Consultar ou excluir um(a) novo(a) docente.</p>
                     </a>

                     <!-- Card 3 -->
                     <a href="../funcoes/abreTurma" class="secao4-div-card card">
                        <img decoding="async" src="../assets/img/turma.png" alt="imagem do card 3 sala">
                        <h3>Turma</h3>
                        <p>Clique para Cadastrar, Editar, Consultar ou excluir uma nova turma</p>
                     </a>

                     <!-- Card 4 -->
                     <a href="../funcoes/abrePeriodo" class="secao4-div-card card">
                        <img decoding="async" src="../assets/img/periodo.png" alt="imagem do card 3 sala">
                        <h3>Período</h3>
                        <p>Clique para Cadastrar, Editar, Consultar ou excluir um novo periodo</p>
                     </a>

                     <!-- Card 5 -->
                     <a href="../funcoes/abreMapa" class="secao4-div-card card">
                        <img decoding="async" src="../assets/img/mapeamento.png" alt="imagem do card 3 sala">
                        <h3>Reservas</h3>
                        <p>Clique para Cadastrar, Editar, Consultar ou excluir uma reserva de sala</p>
                     </a>

                     <!-- Card 6 -->
                     <a href="../funcoes/abreRelatorio" class="secao4-div-card card">
                        <img decoding="async" src="../assets/img/relatorio.png" alt="imagem do card 3 sala">
                        <h3>Relatório</h3>
                        <p>Clique para gerar Relatório de Mapeamento de Sala.</p>
                     </a>

                     <!-- Card 7 -->
                     <a href="../funcoes/encerraSistema" class="secao4-div-card card">
                        <img decoding="async" src="../assets/img/sair.png" alt="imagem do card 7 sala">
                        <h3>Sair do Sistema</h3>
                        <p>Encerrar</p>
                     </a>
                </div>
            </section>
        </main>
    </body>
</html>
