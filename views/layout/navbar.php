<nav class="navbar sticky-top navbar-expand-sm">
    <div class="navbar-collapse justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#quienes_somos"><i class="fas fa-users icono-celeste"></i> Quiénes somos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#datos_destacados"><i class="fas fa-star icono-celeste"></i> Datos destacados</a>
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
                    <a class="nav-link dropdown-toggle" href="#estudios"><i class="fas fa-bookmark icono-celeste"></i> Estudios</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" id="dropdown-item-hover6" href="#nuestros_estudios"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow6"></i> Nuestros estudios</a>
                        <a class="dropdown-item"  id="dropdown-item-hover7" href="#lecturas_recomendadas"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow7"></i> Lecturas recomendadas</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#chile_en_el_mundo"><i class="fas fa-globe-americas icono-celeste"></i> Chile en el mundo</a>
            </li>
        </ul>
    </div>

</nav>
