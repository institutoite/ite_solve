<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ite solve</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ite_solve.css') }}">
    
    
    
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}"> 

    {{-- pie de pagina  --}}
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="{{ asset('css/pie/ionicons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/pie/style.css') }}">
		<link rel="stylesheet" href="{{ asset('css/pie/bootstrap.min.css') }}">

    {{--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% encabezado --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/header/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/header/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet"> --}}
    <!-- owl stylesheets --> 
    <link rel="stylesheet" href="{{ asset('css/header/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <style>
        .navbar-nav .nav-link {
            pointer-events: auto;
            position: relative;
            z-index: 10;
        }
        .telefono {
            pointer-events: auto;
            position: relative;
            z-index: 10;
        }
    </style>
</head>
<body>
    


    <div class="container">

        <div class="header_section">
            <div class="container-fluid">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <a class="navbar-brand" href="#"><img src="images/logo.png"></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="https://propuestos.ite.com.bo">Propuestos</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="https://tools.ite.com.bo">Primos</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="https://services.ite.com.bo">Servicios</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="https://redes.ite.com.bo">Redes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://wa.me/59171039910"><i class="fa-brands fa-whatsapp fa-beat fa-2x" style="color: #2ba81a;"></i></a>
                         </li>
                     </ul>
                     <a class="telefono" href="https://wa.me/59160902299" target="_blank">
                        <i class="fa fa-whatsapp"></i>
                        <span class="padding_left10">60902299</span>
                    </a>
                  </div>
               </nav>
            </div>
         </div>



        <h1>ITE SOLVE</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('division.dividir') }}" class="formulario">
            @csrf
           
            <div class="grupo">
                <label for="dividendo"></label>
                <input type="number" id="dividendo" name="dividendo" value="" required placeholder="Dividendo">
            </div>
            <div class="grupo">
                <label for="divisor"></label>
                <input type="number" id="divisor" name="divisor" value="" required placeholder="Divisor">
            </div>
            <div class="grupo boton">
                <button id="dividir" type="submit">Dividir</button>
            </div>
        </form>
        @isset($cuadricula)
            <div class="">
                <div class="mt-3">
                    <form method="POST" action="{{ route('division.navegar') }}">
                        @csrf
                        <button type="submit" name="accion" value="reiniciar">
                            <i class="fas fa-sync-alt"></i> <span>Reiniciar</span>
                        </button>
                        <button type="submit" name="accion" value="atras">
                            <i class="fas fa-arrow-left"></i> <span>Atrás</span>
                        </button>
                        <button type="submit" name="accion" value="siguiente">
                            <i class="fas fa-arrow-right"></i> <span>Siguiente</span>
                        </button>
                        <button type="submit" name="accion" value="resolver">
                            <i class="fas fa-fast-forward"></i> <span>Resolver Todo</span>
                        </button>
                    </form>
                </div>
    
                <div class="mt-3">
                    <p>Paso {{ $pasoActual + 1 }} de {{ $totalPasos }}</p>
                </div>
                

                <table id="cuadriculas">
                    @php
                    $i = 0; // Contador de filas
                @endphp
                @foreach($cuadricula as $fila)
                    <tr>
                        @php
                            $j = 0; // Contador de columnas
                        @endphp
                        @foreach($fila as $celda)
                            @if($i == 0) <!-- Solo aplicamos estilos a la primera fila -->
                                @if($j == $count_digitos_divisor) <!-- Primera celda del divisor -->
                                    <td class="izquierda-abajo">
                                        <span>{{ $celda }}</span>
                                    </td>
                                @elseif($j > $count_digitos_divisor) <!-- Celdas restantes del divisor -->
                                    <td class="abajo">
                                        <span>{{ $celda }}</span>
                                    </td>
                                @else <!-- Celdas del dividendo -->
                                    <td>
                                        <span>{{ $celda }}</span>
                                    </td>
                                @endif
                            @else <!-- Otras filas -->
                                <td>
                                    <span>{{ $celda }}</span>
                                </td>
                            @endif
                            @php
                                $j++; // Incrementar contador de columnas
                            @endphp
                        @endforeach
                    </tr>
                    @php
                        $i++; // Incrementar contador de filas
                    @endphp
                @endforeach
                </table>
            </div>
        @endisset
    </div>
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  CEO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="card card-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header azul">
          <h3 class="widget-user-username">David Flores</h3>
          <h5 class="widget-user-desc">Fundador & CEO ite</h5>
        </div>
        <div class="widget-user-image">
          <img class="img-circle elevation-2" src="{{ asset('images/foto1.jpg') }}" alt="User Avatar">
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-4 border-right">
              <div class="description-block">
                <h5 class="description-header">16500</h5>
                <span class="description-text">ESTUDIANTES</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 border-right">
              <div class="description-block">
                <h5 class="description-header">TODAS LAS</h5>
                <span class="description-text">MATERIAS</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4">
              <div class="description-block">
                <h5 class="description-header">15 AÑOS</h5>
                <span class="description-text">EXPERIENCIA</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>

    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  FIN PIE DE PAGINA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <footer class="footer-10">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-4 mb-md-0 mb-4">
                            <h2 class="footer-heading">Acerca de ITE</h2>
                            <ul class="list-unstyled">
                                <li><a href="https://ite.com.bo/" class="d-block">Página web</a></li>
                                <li><a href="https://services.ite.com.bo/" class="d-block">Servicios</a></li>
                                <li><a href="https://redes.ite.com.bo" class="d-block">Redes</a></li>
                                <li><a href="https://www.facebook.com/ite.educabol" class="d-block">Facebook</a></li>
                                <li><a href="https://www.tiktok.com/@ite_educabol" class="d-block">Tik Tok</a></li>
                                <li><a href="https://www.instagram.com/ite.educabol/" class="d-block">Instagram</a></li>
                                <li><a href="https://api.whatsapp.com/send/?phone=59171039910" class="d-block">Whatsapp</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 mb-md-0 mb-4">
                            <h2 class="footer-heading">Servicios</h2>
                            <ul class="list-unstyled">
                                <li><a href="https://services.ite.com.bo/modalidades/1" class="d-block">Inicial</a></li>
                                <li><a href="https://services.ite.com.bo/modalidades/2" class="d-block">Primaria</a></li>
                                <li><a href="https://services.ite.com.bo/modalidades/3" class="d-block">Secundaria</a></li>
                                <li><a href="https://services.ite.com.bo/modalidades/4" class="d-block">Pre universitario</a></li>
                                <li><a href="https://services.ite.com.bo/modalidades/5" class="d-block">Institutos</a></li>
                                <li><a href="https://ite.com.bo/universitario" class="d-block">Universitario</a></li>
                                <li><a href="https://ite.com.bo/programacion" class="d-block">Programación</a></li>
                                <li><a href="https://services.ite.com.bo/modalidades/7" class="d-block">Computación</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 mb-md-0 mb-4">
                            <h2 class="footer-heading">services</h2>
                            <ul class="list-unstyled">
                                <li><a href="https://services.ite.com.bo/modalidades/8" class="d-block">Cubo Rubik</a></li>
                                <li><a href="https://services.ite.com.bo/modalidades/9" class="d-block">Ajedrez</a></li>
                                <li><a href="https://services.ite.com.bo/modalidades/11" class="d-block">Dactilografía</a></li>
                                <li><a href="https://services.ite.com.bo/modalidades/12" class="d-block">Oratoria</a></li>
                                <li><a href="https://services.ite.com.bo/modalidades/13" class="d-block">Lectura Escritura</a></li>
                                <li><a href="https://services.ite.com.bo/modalidades/14" class="d-block">Súper Memoria</a></li>
                                <li><a href="https://services.ite.com.bo/modalidades/15" class="d-block">Robótica</a></li>
                                <li><a href="https://services.ite.com.bo/modalidades/16" class="d-block">Programación</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mb-md-0 mb-4">
                    <h2 class="footer-heading">Suscríbete</h2>
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <ul class="list-unstyled">
                                <li><a href="https://redes.ite.com.bo" class="d-block">Redes</a></li>
                                <li><a href="https://www.facebook.com/ite.educabol" class="d-block">Facebook</a></li>
                                <li><a href="https://www.tiktok.com/@ite_educabol" class="d-block">Tik Tok</a></li>
                                <li><a href="https://www.instagram.com/ite.educabol/" class="d-block">Instagram</a></li>
                                <li><a href="https://api.whatsapp.com/send/?phone=59171039910" class="d-block">Whatsapp</a></li>
                            </ul>
                        </div>
                        <span class="subheading"><a class="nav-link" href="https://wa.me/59171039910"><i class="fa-brands fa-whatsapp fa-beat fa-3x" style="color: #2ba81a;"></i></a></span>
                    </form>
                </div>
            </div>
            <div class="row mt-5 pt-4 border-top">
                <div class="col-md-6 col-lg-8 mb-md-0 mb-4">
                    <p class="copyright mb-0 fa-1x">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados. | Desarrollado por David Flores
                    </p>
                </div>
                <div class="col-md-6 col-lg-4 text-md-right">
                    <ul class="ftco-footer-social p-0">
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="{{ asset('js/pie/jquery.min.js') }}"></script>
    <script src="{{ asset('js/pie/popper.js') }}"></script>
    <script src="{{ asset('js/pie/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/pie/main.js') }}"></script>

    <script src="{{ asset('js/header/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/header/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/header/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('js/header/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/header/custom.js') }}"></script>
    <!-- javascript --> 
    <script src="{{ asset('js/header/owl.carousel.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Función para dibujar el símbolo de división
        function dibujarSimboloDivision(indiceDivisor) {
            // Obtener la tabla por su ID
            const tabla = document.getElementById("cuadriculas");
    
            // Verificar que la tabla existe
            if (!tabla) {
                console.error("No se encontró la tabla con id='cuadriculas'");
                return;
            }
    
            // Obtener la primera fila de la tabla (fila 0)
            const fila = tabla.rows[0];
    
            // Verificar que el índice del divisor es válido
            if (indiceDivisor < 0 || indiceDivisor >= fila.cells.length) {
                console.error("Índice del divisor fuera de rango");
                return;
            }
    
            // Aplicar estilos a las celdas para dibujar el símbolo de división
            for (let i = indiceDivisor; i < fila.cells.length; i++) {
                const celda = fila.cells[i];
    
                // Aplicar borde inferior a todas las celdas
                celda.style.borderBottom = "2px solid rgb(55, 95, 122)";
    
                // Aplicar borde izquierdo solo a la primera celda
                if (i === indiceDivisor) {
                    celda.style.borderLeft = "2px solid rgb(55, 95, 122)";
                }
            }
        }
    
        // Obtener el índice del divisor desde PHP
        const countDigitosDivisor = <?php echo json_encode($count_digitos_divisor ?? null); ?>;
    
        // Dibujar el símbolo de división si el índice es válido
        if (countDigitosDivisor !== null) {
            dibujarSimboloDivision(countDigitosDivisor);
        }
    </script>
</body>
</html>
