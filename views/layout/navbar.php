<header>
    <nav class="navbar mobile navbar-default navbar-inverse fixed-top" id="mobile-nav" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#contenido-navbar-hamburguer">
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>				
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="contenido-navbar-hamburguer">
                <ul class="nav navbar-nav">
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#quienes_somos"><i class="fad fa-users icono-celeste"></i> Quiénes somos</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#datos_destacados"><i class="fad fa-star icono-celeste"></i> Datos destacados</a>
                    </li>
                    <!--Graficos destacados es el #4-->
                    <li class="nav-item d-flex justify-content-center mb-2">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#data"><i class="fad fa-chart-bar icono-celeste"></i> Data</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="move-drop">
                                    <a class="dropdown-item" id="dropdown-item-hover" href="<?= base_url ?>web/portafolio"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow"></i> Portafolio</a>
                                    <a class="dropdown-item"  id="dropdown-item-hover2" href="#"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow2"></i> Ley I+D</a>
                                    <div class="dropdown">
                                        <a class="dropdown-item" id="dropdown-item-hover3"href="#"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow3"></i> Subsidios</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" id="dropdown-item-hover4" href="<?= base_url ?>web/convocatorias"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow4"></i> Convocatorias</a>
                                            <a class="dropdown-item" id="dropdown-item-hover5" href="<?= base_url ?>web/apptest"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow5"></i> Historico desde 2010</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-flex justify-content-center mb-2">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#estudios"><i class="fad fa-bookmark icono-celeste"></i> Estudios</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" id="dropdown-item-hover6" href="#nuestros_estudios"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow6"></i> Nuestros estudios</a>
                                <a class="dropdown-item"  id="dropdown-item-hover7" href="#lecturas_recomendadas"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow7"></i> Lecturas recomendadas</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="#chile_en_el_mundo"><i class="fad fa-globe-americas icono-celeste"></i> Chile en el mundo</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <nav class="navbar full-nav fixed-top navbar-expand-sm landing-page-navbar bg-gradient">
        <div class="logo-corfo"></div>
        <div class="navbar-collapse justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link landing-page-nav-link bg-gradient" href="#quienes_somos"><i class="fad fa-users icono-celeste"></i> Quiénes somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link landing-page-nav-link bg-gradient" href="#datos_destacados"><i class="fad fa-star icono-celeste"></i> Datos destacados</a>
                </li>
                <!--Graficos destacados es el #4-->
                <li class="nav-item">
                    <div class="dropdown">
                        <!--Data es el #5-->
                        <?php require_once ('views/layout/navbar/data-bar.php'); ?>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle landing-page-nav-link " href="#estudios"><i class="fad fa-bookmark icono-celeste"></i> Estudios</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" id="dropdown-item-hover6" href="#nuestros_estudios"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow6"></i> Nuestros estudios</a>
                            <a class="dropdown-item"  id="dropdown-item-hover7" href="#lecturas_recomendadas"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow7"></i> Lecturas recomendadas</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link landing-page-nav-link bg-gradient" href="#chile_en_el_mundo"><i class="fad fa-globe-americas icono-celeste"></i> Chile en el mundo</a>
                </li>
            </ul>
        </div>

    </nav>
</header>