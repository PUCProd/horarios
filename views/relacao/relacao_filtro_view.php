<?php 
require_once 'controllers/Professor.php';
require_once 'controllers/Disciplina.php';
require_once 'controllers/Relacao.php';
?>
<!-- Main component for a primary marketing message or call to action -->

      <div class="jumbotron">          
        <div class="tabelaSimples"> <!-- Div do filtro e botão cadastrar -->
            <form method="get" action="filtrar_professor_relacao.php">
            <h2><a class="btn btn-lg btn-primary" href="<?php echo HOME;?>relacao/pageView/prof" role="button">Por Professor</a>
                <a class="btn btn-lg btn-primary" href="<?php echo HOME;?>relacao/pageView/disc" role="button">Por Disciplina</a>
                <input type="text" size="30" name="filtrar" value="&nbsp;Pesquisar" id="bSite" onfocus="EmptyField(this.id)">
            </h2>
            </form>
        </div>
        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
            <tr>
                <td>
                    <h4>Professor</h4>
                </td>
                <td>
                    <h4>Disciplina</h4>
                </td>
            </tr>

            <?php
            $i = 0;
            $relaa = Professor::getListaNome();
            
            
            var_dump($rel[]);
            
            while($resultado_prof = mysql_fetch_array($rel))
            {
                
                $disciplina = Disciplina::getListaNome();
                
                $i++;
            ?>
               <tr>
                   <td>
                       <h5>
                           <?php echo $resultado_prof['nome']; ?>
                       </h5>

                           <form action="<?php echo HOME;?>relacao/relacionar" method="post" name="form">
                               <select name="select" id="select">
                                   <?php
                                   if($i != 0){ 
                                       
                                       while($resultado_disc = mysql_fetch_array($disciplina)){
                                           ?>
                                   <option value="<?php echo $resultado_disc['id']; ?>"><?php echo $resultado_disc['nome'];?></option>
                                       <?php
                                       }
                                    }
                                    ?>
                               </select>
                               <input class="btn botao-confirmar-config  botao-confirmar" type="submit" value="✔">
                               <input class="btn botao-confirmar-config  botao-confirmar" type="hidden" name="id_prof" value="<?php echo $resultado_prof['id_professor'];?>">
                           </form>
    
                   </td>
                   <td>
                       <?php
                        
                        
                        $relacao = Relacao::getRelacao();
                        while($resultado_rel = mysql_fetch_array($relacao)){
                            
                        if($resultado_prof['id_professor'] == 
                                $resultado_rel['id_professor']){
                            if($resultado_rel['status'] == 1){
                    ?>
                                               
                       <form method="post" action="<?php echo HOME;?>relacao/excluir">
                        <?php 
                            echo $resultado_rel['nome']; 
                        ?>
                            <input class="btn botao-excluir-config  botao-excluir" type="submit" value="✘">
                            <input type="hidden" name="id_prof" value="<?php echo $resultado_rel['id_professor'];?>">
                            <input type="hidden" name="id_disc" value="<?php echo $resultado_rel['id'];?>">
                        </form>

                    <?php
                            }
                        }
                    }
                    
                       ?>
                   </td>
                </tr>
            <?php
            }
            ?>
        </table>
      </div>