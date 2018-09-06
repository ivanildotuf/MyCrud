<?php
include("conexao.php");
session_start();
if($_SESSION['usuario']!="adm" && $_SESSION['senha']!="adm"){
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  echo "<script type='javascript'>alert('Favor efetuar o login!')";
  header('location:../erro.html');
}
?>
<html>
    <head>
        <title>
            Minha Agenda
        </title>
        <link rel="stylesheet" id="current-theme" href="../css/style.css" type="text/css" />
        <script type="text/javascript" charset="utf-8" src="../js/agenda.js"></script>
    </head>
   <body id="bg">
        <form id="f1">
            <h1 align="center"><bv>Minha Agenda</bv></h1>
            <br>
            <br>
            <menu>
                <h2 align="center">
                    <a href="../index.html">Inicio</a>
                    <a href="agenda.php">Agenda</a>
                    <a href="../login.html">Login</a>
                </h2>
            </menu>
            <h3 align="center">Visualizar Agenda</h3>
            <div align="center">
                <input type="button" value="Adicionar" id="btInserir" onclick="modalInsereContato()">
                <input type="button" value="Importar" id="btImportar" onclick="window.location='importa.php'">
            </div>
            <br>
            <div align="center">
                
                <table align="center" border="1" width="50%" >
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Telefone</td>
                        <td>Op&ccedil;&otilde;es</td>    
                    </tr>
                    
                        <?php
                            $sql = "SELECT * from cliente";
                            $result = mysqli_query($conn,$sql);

                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {

                                    echo"<tr><td>" , $row["codCliente"] , "</td><td>" , $row["Nome"] , "</td><td>" , 
                                    $row["Telefone"] , "</td>","<td><input type='button' onclick='modalEditaContato(",$row["codCliente"],
                                    ")' value='editar'>  <input type='button' onclick='apagarContato(",$row["codCliente"],
                                    ")' value='Apagar'></td></tr>";
                                }
                            } else {
                                echo "no results";
                            }
                        ?>
                </table>
            </div>

            <!-- Modal inserindo contato -->
            <div id="insereModal" class="modal">
              <!-- Modal content -->
              <div class="modal-content">
                
                    <span onclick="document.getElementById('insereModal').style.display='none'" class="close">&times;</span>
                    Nome:
                    <br><input type="text" id="nome">
                    <br>
                    Telefone:
                    <br><input type="text" onkeypress="mascara(this,mnum)" maxlength="11" id="telefone">
                    <br>
                    <br>
                    <input type="button" value="Inserir" onclick="insereContato('ins')">
                    <input type="button" value="Limpar"  onclick="limparContato()">
                
              </div>
            </div>

            <!-- Modal editando contato -->
            <div id="editaModal" class="modal">
              <!-- Modal content -->
              <div class="modal-content">
                
                    <span onclick="document.getElementById('editaModal').style.display='none'" class="close">&times;</span>
                    ID:
                    <br><input type="text" id="editaID" disabled>
                    <br>
                    Nome:
                    <br><input type="text" id="editaNome">
                    <br>
                    Telefone:
                    <br><input type="text" id="editaTelefone" onkeypress="mascara(this,mnum)" maxlength="11">
                    <br>
                    <br>
                    <input type="button" value="Inserir" onclick="insereContato('upd')">
                    <input type="button" value="Limpar"  onclick="limparContato()">
                
              </div>
            </div>
        </form>
    </body>
</html>



