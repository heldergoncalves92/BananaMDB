  <link rel="stylesheet" type="text/css" href="css/block.css">

  <div id="feed-block" class="well">
    <div class="block">
      <h2 class="title">Pesquisa</h2>
      <hr>
      <div id="log">
        <div id="log-table">
          <div id="log-cell-1">

            <div class="panel panel-default">
              <div class="panel-heading">Filmes</div>
              
              <?php if($data=='0 Resultados')
              echo $data;
              else{
              foreach ($data as $linha) {
              $this->table->add_row( '<a href=' .   base_url() . 'title/filme/' . $linha->ID_FILME . '><img src="' . base_url() . 'uploads/posters/' . $linha->POSTER . '" width="50px" height="auto""></a>',
              '<a href=' .   base_url() . 'title/filme/' . $linha->ID_FILME . '>' . $linha->TITULO . '</a> (' . $linha->ANO . ') <br> ');

              }
              echo $this->table->generate();}
              ?>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">Séries</div>
              <table>
                <td></td>
                <td>0 Resultados porque não fiz search</td>
              </table>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">Realizadores</div>
              <table>
                <td></td>
                <td>0 Resultados porque não fiz search</td>
              </table>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">Actores</div>
              <table>
                <td></td>
                <td>0 Resultados porque não fiz search</td>
              </table>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">Géneros</div>
              <table>
                <td></td>
                <td>0 Resultados porque não fiz search</td>
              </table>
            </div>
          </div>
          <div id="log-cell-2">
            <h4>Pesquisa Avançada</h4>
          </div>
      </div>
    </div>




