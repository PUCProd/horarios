<?php 
require_once 'controllers/Professor.php';
?>
<!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">                       
          <div><!--Div das informações do banco de dados-->                     
            <table id="informacoes" class="table table-bordered table-condensed table-hover table-responsive table-striped">
                <div class="tabelaSimples"> <!-- Div do filtro e botão cadastrar -->                     
                    <form method="post" action="<?php echo HOME;?>professor/filtrar">
                        <h2>
                            <input type="text" size="30" name="filtrar" 
                                       placeholder="&nbsp;Pesquisar" id="bSite" 
                                       onfocus="EmptyField(this.id)"> 
                        </h2>                            
                    </form>                        
                </div>                                 
                  <tr>
                      <td>
                          <h4> Nome </h4>
                      </td>
                      
                      <td>
                          <h4> Carga Horária </h4>
                      </td>
                      <td>
                          <h4> Excluir </h4>
                      </td>
                  </tr>
                  
                    <?php
                     
                     
                        $prof = Professor::getListaNome();
                     
                    
                    while($row = mysql_fetch_array($prof))
                    {   
                    ?>
                  <tr>
                      <td>
                          <h5>
                              <a href='<?php echo HOME;?>professor/getPreferenciaNome/<?php echo $row["id_professor"];?>' title=".<?php echo $row["nome"];?>.">
                                  <?php echo $row["nome"]; ?>
                              </a>
                          </h5>
                      </td>
                      <td>
                          <h5>
                              <?php echo $row["carga_horaria"]; ?> aula(s)
                          </h5>
                      </td>
                      <td>
                          <a href="<?php echo HOME . "professor/excluir/" .$row["id_professor"]; ?>" class="btn btn-outline-inverse btn-lg">
                              ✘
                          </a>
                      </td>
                  </tr>
                  <?php
                    }
                  ?>
              </table>                          
          </div>          
      </div>
