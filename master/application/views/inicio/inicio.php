<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio | RTSERVICES</title>
  <meta name="description" content="" />
  <meta name="author" content="templatemo">
  <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">  
  <link href="<?= base_url() ?>assets/css/templatemo_style.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/img/icon/apple-touch-icon-144x144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144">
  <link href="<?= base_url() ?>assets/img/icon/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
  <link href="<?= base_url() ?>assets/img/icon/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
  <link href="<?= base_url() ?>assets/img/icon/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon-precomposed">
  <link href="<?= base_url() ?>assets/img/icon/apple-touch-icon.png" rel="shortcut icon">
  <link href="<?= base_url() ?>assets/datatable/css/datatables.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/nprogress/nprogress.css" rel="stylesheet">
  <style type="text/css">
    /* Esto es para el loader */

    .precarga {
      background:transparent url(<?= base_url() ?>assets/img/ajax-loader.gif) center no-repeat;
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <div class="banner" id="templatemo_banner_slide">
    <ul>
      <li class="templatemo_banner_slide_01"></li>
      <li class="templatemo_banner_slide_02"></li>
      <li class="templatemo_banner_slide_03"></li>
    </ul>
  </div>
  <div class="container_wapper">
    <div id="templatemo_banner_menu">
      <div class="container-fluid">
        <div class="col-xs-4 templatemo_logo">
          <a href="#">
           <img src="<?= base_url() ?>assets/images/logo.png" id="logo_img" alt="dragonfruit website template" title="Dragonfruit Template" />
         </a>
       </div>
       <div class="col-sm-8 hidden-xs">
        <ul class="nav nav-justified">
          <li><a href="#templatemo_banner_slide">Inicio</a></li>
          <li><a href="#templatemo_about">¿Nosotros?</a></li><!---->
          <li><a href="#templatemo_events">Servicios</a></li>
          <li><a href="#templatemo_timeline">Reglas</a></li>
          <li><a onclick="InfoClase();">Clases</a></li>
          <li><a rel="nofollow" href="login" class="external-link">Login</a></li>
        </ul>
      </div>
      <div class="col-xs-8 visible-xs">
        <a href="#" id="mobile_menu"><span class="glyphicon glyphicon-th-list"></span></a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg" id="modalClaseInfo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="z-index: 999999">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div style="width: 300px; height: 300px;" class="precarga" id="loadingCI"></div>
      <div id="listoCI">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><center>CLASES DISPONIBLES</center></h4>
        </div>
        <div class="panel-body no-padding" style="margin: 20px; font-size: 15px" >
          <div class="table-responsive"><br>
            <table id="tablaClaseInfo" class="table table-hover">
              <thead>
                <tr>
                  <td>Información de clase</td>
                  <td>Horario clase</td>
                  <td>Cupos disponibles</td>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="templatemo_about" class="container_wapper">
  <div class="container-fluid">
    <h1>¿Quiénes somos?</h1>
    <div class="col-sm-6 col-md-3 about_icon">
      <div class="imgwap mission"><i class="fa fa-rocket"></i></div>
      <h2>Historia</h2>
      
    </div>
    <div class="col-sm-6 col-md-3 about_icon">
      <div class="imgwap product"><i class="fa fa-cubes"></i></div>
      <h2>Misión</h2>
      
    </div>
    <div class="col-sm-6 col-md-3 about_icon">
      <div class="imgwap testimonial"><i class="fa fa-bar-chart-o"></i></div>
      <h2>Visión</h2>
      
    </div>
    <div class="col-sm-6 col-md-3 about_icon">
      <div class="imgwap statistic"><i class="fa fa-comments"></i></div>
      <h2>Valores</h2>
      
    </div>
    <div class="clearfix testimonial_top_bottom_spacer"></div>
    <div class="col-xs-1 pre_next_wap" id="prev_testimonial">
      <a href="#"><span class="glyphicon glyphicon-chevron-left pre_next"></span></a>
    </div>
    <div id="testimonial_text_wap" class="col-xs-9 col-sm-10">
      <div class="testimonial_text">
        <div class="col-sm-3"><br>
          <img src="<?= base_url() ?>assets/images/historia.jpg" class="img-responsive" alt="Historia" />
          <div>


          </div>
          
        </div>
        <!--recarga -->
        <div class="col-sm-9">
          <h2><B>Historia</B></h2>
          <h3>Robledo Tenis Club</h3>
          <p>En el año 2006 en una cancha abandonada la cual la comunidad utilizaba para promover y desarrollar eventos de carácter social, un grupo de personas que no tenían acceso de forma libre y digna al tenis de campo decidieron recuperarla y comenzar allí un trabajo de cambio social, fueron ganando espacio y deportistas para la práctica del tenis, implementaron programa de formación e iniciación y desarrollaron pequeños torneos, de esta forma tomaron fuerza y han llegado hasta ahora a lo que es Robledo Tenis Club.
            Por años nuestras comunidades han tenido  poco acceso a deportes elites, solo podemos acceder a deporte populares por motivos de tipo económico y social, entendiendo el ser humano como individuo nos damos cuenta que todas las personas hacemos elecciones de distintos tipos desde  diferentes niveles, por esta razón queremos conformar un club que ofrezca la posibilidad de practicar un deporte distinto que por años fue elitista.
            Robledo tenis club lo transforma de diversas formas para que todas las personas puedan practicar y disfrutar de este deporte en diferentes espacios.
            En la actualidad el tenis de campo es un deporte que viene ganando cada vez más adeptos, existen programas de tipo masivo con carácter social como el programa de EPD que como resultado arrojan deportistas con ganas de especializar sus conocimientos, allí es donde robledo tenis club con sus costo intenta vincular más deportistas a sus procesos..</p>
          </div>
        </div><!--.testimonial_text-->
        <div class="testimonial_text">
          <div class="col-sm-3">
            <img src="<?= base_url() ?>assets/images/mision.jpg" class="img-responsive" alt="Public Relation Officer" />
          </div>
          <div class="col-sm-9">
            <h2><B>Misión</B></h2>
            <p>Robledo tenis club tiene como misión construir herramientas que contribuyan en una transformación del tenis de campo elitista a un tenis de campo incluyente donde las personas de cualquier estrato social lo puedan vivenciar y disfrutar.</p>
          </div>
        </div><!--.testimonial_text-->
        <div class="testimonial_text">
          <div class="col-sm-3">
            <img src="<?= base_url() ?>assets/images/vision.jpg" class="img-responsive" alt="Marketing Executive" />
          </div>
          <div class="col-sm-9">
            <h2><B>Visión</B></h2>
            <p>Robledo tenis club se proyecta como una de las escuelas de tenis de campo que más incida en la transformación y creación  de herramientas que permitan el desarrollo sostenible  del tenis de campo en la ciudad de Medellín, aportado elementos que permitan el acceso a un gran número de personas a esta práctica deportiva.</p>
          </div>
        </div><!--.testimonial_text-->
        <div class="testimonial_text">
          <div class="col-sm-3">
            <img src="<?= base_url() ?>assets/images/valores.jpg" class="img-responsive" alt="Chief Executive Officer" />
          </div>
          <div class="col-sm-9">
            <h2><B>Valores</B></h2>
            <p><B>Constancia:</B> Es un club deportivo que a través de los años y a pesar de los inciertos  a permanecido en el tiempo  formando y aportando al desarrollo de sus deportistas.<br>

              <B>Entrega:</B> El grupo de personas que trabajan con el club son personas con ganas de demostrar sus capacidades para obtener como resultado un cambio en este deporte.<br>

              <B>Renovación:</B> Robledo tenis es un club abierto al cambio con fortaleza para demostrar la capacidad que tiene para formar deportistas y aportar a su desarrollo personal.</p><br>
            </div>
          </div>
        </div>
        <div class="col-xs-1 pre_next_wap" id="next_testimonial">
          <a href="#"><span class="glyphicon glyphicon-chevron-right pre_next"></span></a>
        </div>
        <div class="clearfix testimonial_top_bottom_spacer"></div>
      </div>
    </div>

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/cssClaseInfo/cssClase.css">
    <div id="templatemo_events" class="container_wapper">
      <div class="container-fluid">
        <h1>Nuestros servicios</h1>
        <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
          <div class="event_box_wap event_animate_left">
            <div class="event_box_img">
              <img src="<?= base_url() ?>assets/images/Claseindividual.jpg" class="img-responsive" alt="Web Design Trends" />
            </div>
            <div class="event_box_caption">
              <h1><a href="#">Clases individuales</a></h1>
              <p><span class="glyphicon glyphicon-map-marker"></span> Robledo, Medellín, Antioquia &nbsp;&nbsp; <span class="glyphicon glyphicon-time"></span>  Lunes a viernes de 4:30 PM a 9:30 PM</p>
              <p>.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
          <div class="event_box_wap event_animate_right">
            <div class="event_box_img">
              <img src="<?= base_url() ?>assets/images/Clasegrupal.jpg" class="img-responsive" alt="" />
            </div>

            <div class="event_box_caption" >

              <h1><a  >Clases grupales</a></h1>
              <p><span class="glyphicon glyphicon-map-marker"></span> Robledo, Medellín, Antioquia &nbsp;&nbsp; <span class="glyphicon glyphicon-time"></span>  Lunes a viernes de 4:30 PM a 9:30 PM</p>
              <p>Las clases grupales solo tienen 15 cupos disponibles cada una.</p>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
          <div class="event_box_wap event_animate_left">
            <div class="event_box_img">
              <img src="<?= base_url() ?>assets/images/festival.jpg" class="img-responsive" alt="" />
            </div>
            <div class="event_box_caption">
              <h1>Festivales</h1>
              <p><span class="glyphicon glyphicon-map-marker"></span> Medellín, Antioquia &nbsp;&nbsp; <span class="glyphicon glyphicon-time"></span> Fines de semana </p>
              <p>El festival representa un entretenido evento que ofrece Robledo Tenis Club donde los jugadores pueden integrarse y practicar su deporte durante varias horas tan solo pagando el costo del juzgamiento por partido disputado (no hay que pagar inscripción). Con esto buscamos mayor inclusión de la poblacion tenística brindando un espacio más económico. Al igual que en el Circuito de Torneos RTC se utiliza el formato de primera ronda de grupos de 3 o 4 jugadores y luego se clasifica a cuadro principal. La diferencia es que  cambia el sistema de juego pues los partidos son a 7 games sin ventaja (no ad), por esta razón los festivales son habitualmente torneos relámpagos que se realizan en un solo día o un fin de semana.</p>
              </div>
            </div>
          </div>
          <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
            <div class="event_box_wap event_animate_right">
              <div class="event_box_img">
                <img src="<?= base_url() ?>assets/images/cancha.jpg" class="img-responsive" alt="" />
              </div>
              <div class="event_box_caption">
                <h1>Torneos</h1>
                <p><span class="glyphicon glyphicon-map-marker"></span> Medellín, Antioquia &nbsp;&nbsp; <span class="glyphicon glyphicon-time"></span>  Fines de semana </p>
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="templatemo_timeline" class="container_wapper">
        <h1><B>Reglas basicas del tenis de campo</B></h1>
        <div class="container-fluid">
          <div class="time_line_wap">
            <div class="time_line_caption">Juego</div>
            <div class="time_line_paragraph">
              <p>• El partido de tenis comienza con el saque de uno de los jugadores. Este debe golpear la bola de tal forma que bote dentro del cuadro diagonal respecto del lado del que saca. Es decir, el jugador siempre debe servir o sacar de forma cruzada.
                <br>
                • El jugador tiene 2 oportunidades de saque. Si falla la primera, tiene otra oportunidad de meter la bola. Si no mete la pelota en esas dos oportunidades el punto es para el otro. En caso de que en el primer saque roce la red y caiga en el cuadrado correspondiente, tiene dos intentos más. Eso solo si ocurre en el primer saque. Si ocurre en el segundo, el jugador dispondrá únicamente de un saque más.
                <br>
                • Cuando el jugador saca y mete la bola de campo a campo, el contrincante deberá golpear la bola después de un bote o antes del bote, pero nunca podrán dejar que la bola bote dos veces. En ese caso el jugador contrario se llevará el punto.
                <br>
                • Ganando 4 puntos se consigue un juego, si no se llega al 40-40 que habrá que disputar otros dos puntos (ventaja-juego) y ganando 6 juegos se consigue un set.
                <br>
                • El partido se gana con 2 sets (mejor de 3), ó con 3 sets (mejor de 5), si al llegar al final de un set los jugadores están empatados a puntos se juega un tie break. Consiste en llegar a 7 puntos con una diferencia de 2.</p>
              </div>
            </div>
            <div class="time_line_wap">
              <div class="time_line_caption">Medidas de la cancha</div>
              <div class="time_line_paragraph">
                <p>El tenis se juega en una cancha (llamada «pista» en España) de forma rectangular, de 23,77 metros de longitud por 8,23 m de ancho. Para los partidos de dobles la cancha será de 10,97 m (36 pies) de anchura.
                  Las líneas que limitan los extremos de la pista se denominan líneas de fondo y las líneas que limitan los costados de la pista se denominan líneas laterales. A cada lado de la red y paralela a ella, se trazan dos líneas entre las líneas laterales a una distancia de 6,40 m a partir de la red.
                  Estas líneas se llaman líneas de saque o de servicio. A cada lado de la red, el área entre la línea de servicio y la red queda dividida por una línea central de servicio en dos partes iguales llamadas cuadros de servicio. La línea central de servicio se traza paralelamente a las líneas laterales de individuales y equidistante a ellas.
                  Cada línea de fondo se divide en dos por una marca central de 10 cm de longitud, que se traza dentro de la pista y es paralela a las líneas laterales de individuales. La línea central de servicio y la marca central son de 5 cm de anchura. Las otras líneas de la pista son de entre 2,5 y 5 cm de anchura, excepto las líneas de fondo que pueden ser de hasta 10 cm de anchura. Todas las medidas de la pista se toman por la parte exterior de las líneas. Todas las líneas de la pista tienen que ser del mismo color para que contrasten claramente con el color de la superficie.</p>
                </div>
              </div>
              <div class="time_line_wap">
                <div class="time_line_caption">Puntuación</div>
                <div class="time_line_paragraph">
                  <p>Un partido de tenis está compuesto por parciales (sets en inglés). El primero en ganar un número determinado de parciales es el ganador. Cada parcial está integrado por juegos. En cada juego hay un jugador que saca, el cual se va alternando. A su vez, los juegos están compuestos de puntos, que son 15,30,40.
                    El primero en ganar 6 juegos con una diferencia mínima de 2 con respecto a su rival es el ganador del set; en caso de que ninguno de los dos jugadores o equipos tenga una ventaja de dos juegos al llegar a seis, gana el set el primero que logre una diferencia de 2 juegos o más. La cuenta de los puntos es bastante particular: cuando un jugador gana su primer punto, su tanteador es 15, cuando gana 2 puntos, 30, y cuando gana 3 puntos, 40. Por ejemplo, si el sacador de ese juego lleva ganados 3 puntos y el receptor 1 punto, el marcador es de 40-15. Siempre se nombra en primer lugar la puntuación del sacador.
                    Cuando ambos jugadores empatan a 40 se dice que hay deuce o «iguales». El primer jugador o equipo que gane un punto después del deuce logra una «ventaja», y, en caso de ganar el siguiente punto, se lleva el juego, de lo contrario se vuelve a estar en deuce hasta que se logre la diferencia de dos puntos.
                    El jugador que se lleva el parcial es el que consigue hacer 6 juegos, con una diferencia de 2, o 7 si ha habido un empate a 5 juegos. En caso de que un jugador llegue a 6 juegos, pero con diferencia de 1 (6-5) habrá que seguir hasta que alguno consiga la diferencia apropiada.</p>
                  </div>
                </div>
                <div class="time_line_wap">
                  <div class="time_line_caption">Tie break</div>
                  <div class="time_line_paragraph">
                    <p>Si el reglamento del torneo establece un tope de juego, o sea si hay un empate entre dos jugadores en un set entonces habría que jugar un juego especial denominado tie-break, «juego decisivo» o «desempate». En el cual el resultado se decide mediante puntos correlativos (uno-cero, dos-cero, tres-cero, etc.) hasta llegar a 7 tantos, con diferencia de 2. Si se llega a 7 puntos sin diferencia de 2 (por ejemplo: 7-6), el juego se prolongará hasta que uno de los dos jugadores obtenga dicha diferencia y consiga la victoria. La anotación de un set que se ha decidido en el tie break será 7-6. Acompañada abreviadamente por el número de puntos obtenidos por el perdedor del mismo entre paréntesis. P. e. si el jugador perdió el juego decisivo por 7-3 la anotación del set será: 7-6 (3).</p>
                  </div>
                </div>
              </div>
            </div>

            <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/cssClaseInfo/cssClase.css">
            <div id="templatemo_events" class="container_wapper">
              <div class="container-fluid">
                <h1>Nuestros servicios</h1>
                <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
                  <div class="event_box_wap event_animate_left">
                    <div class="event_box_img">
                      <img src="<?= base_url() ?>assets/images/Claseindividual.jpg" class="img-responsive" alt="Web Design Trends" />
                    </div>
                    <div class="event_box_caption">
                      <h1><a href="#">Clases individuales</a></h1>
                      <p><span class="glyphicon glyphicon-map-marker"></span> Robledo, Medellín, Antioquia &nbsp;&nbsp; <span class="glyphicon glyphicon-time"></span>  Lunes a viernes de 4:30 PM a 9:30 PM</p>
                      <p>.</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
                  <div class="event_box_wap event_animate_right">
                    <div class="event_box_img">
                      <img src="<?= base_url() ?>assets/images/Clasegrupal.jpg" class="img-responsive" alt="" />
                    </div>

                    <div class="event_box_caption" >

                      <h1><a  >Clases grupales</a></h1>

                      <div class="panel-heading btn btn-info btn-push" id="ClaseInfo" name="ClaseInfo" onclick="InfoClase()">
                        <h3 class="panel-title glyphicon glyphicon-info-sign"><a> Información de clases</a> </h3>
                      </div>
                      <p><span class="glyphicon glyphicon-map-marker"></span> Robledo, Medellín, Antioquia &nbsp;&nbsp; <span class="glyphicon glyphicon-time"></span>  Lunes a viernes de 4:30 PM a 9:30 PM</p>
                      <p>Las clases grupales solo tienen 15 cupos disponibles cada una.</p>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
                  <div class="event_box_wap event_animate_left">
                    <div class="event_box_img">
                      <img src="<?= base_url() ?>assets/images/festival.jpg" class="img-responsive" alt="" />
                    </div>
                    <div class="event_box_caption">
                      <h1>Festivales</h1>
                      <p><span class="glyphicon glyphicon-map-marker"></span> Medellín, Antioquia &nbsp;&nbsp; <span class="glyphicon glyphicon-time"></span> Fines de semana </p>
                      <p>El festival representa un entretenido evento que ofrece Robledo Tenis Club donde los jugadores pueden integrarse y practicar su deporte durante varias horas tan solo pagando el costo del juzgamiento por partido disputado (no hay que pagar inscripción). Con esto buscamos mayor inclusión de la poblacion tenística brindando un espacio más económico.

                        Al igual que en el Circuito de Torneos RTC se utiliza el formato de primera ronda de grupos de 3 o 4 jugadores y luego se clasifica a cuadro principal. La diferencia es que  cambia el sistema de juego pues los partidos son a 7 games sin ventaja (no ad), por esta razón los festivales son habitualmente torneos relámpagos que se realizan en un solo día o un fin de semana.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
                    <div class="event_box_wap event_animate_right">
                      <div class="event_box_img">
                        <img src="<?= base_url() ?>assets/images/cancha.jpg" class="img-responsive" alt="" />
                      </div>
                      <div class="event_box_caption">
                        <h1>Torneos</h1>
                        <p><span class="glyphicon glyphicon-map-marker"></span> Medellín, Antioquia &nbsp;&nbsp; <span class="glyphicon glyphicon-time"></span>  Fines de semana </p>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4"></div>
              <div id="templatemo_footer">
                <div>
                  <p id="footer">Copyright &copy; RTServices - 2016</p>
                </div>
              </div>

              <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
              <script src="<?= base_url() ?>assets/js/jquery-ui.min.js"></script>
              <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
              <script src="<?= base_url() ?>assets/js/jquery.singlePageNav.min.js"></script>
              <script src="<?= base_url() ?>assets/js/unslider.min.js"></script>
              <script src="<?= base_url() ?>assets/js/templatemo_script.js"></script>
              <script src="<?= base_url() ?>assets/datatable/js/datatables.min.js"></script>
              <script src="<?= base_url() ?>assets/nprogress/nprogress.js"></script>

              <script src="<?= base_url() ?>assets/js/jquery.cookie.js"></script>
              <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
              <script src="<?= base_url() ?>assets/js/jquery.easing.1.3.min.js"></script>
              <script src="<?= base_url() ?>assets/js/retina.min.js"></script>
              <script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
              <script src="<?= base_url() ?>assets/js/blankon.sign.js"></script>
              <script src="<?= base_url() ?>assets/swal/sweetalert2.min.js"></script>
              <script src="<?= base_url() ?>ajax/ajxLogin.js"></script>
              <script src="<?= base_url() ?>assets/nprogress/nprogress.js"></script>
              <script type="text/javascript">
                function InfoClase()
                {
                  $('#modalClaseInfo').modal('show');
                  $('#loadingCI').show();
                  $('#listoCI').hide();


                  setTimeout(function() {
                    $('#loadingCI').hide();
                    $('#listoCI').show();
                    $('#tablaClaseInfo').DataTable({ "ajax": "<?= base_url() ?>clase/cargarClaseInfo", "destroy": true });
                  }, 2000);
                };
              </script>

            </body>
            </html>