<nav class="navbar sticky-top navbar-expand-sm">
    <div class="navbar-collapse justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#2"><i class="fas fa-users icono-celeste"></i> Quiénes somos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#3"><i class="fas fa-star icono-celeste"></i> Datos destacados</a>
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
                    <a class="nav-link dropdown-toggle" href="#6"><i class="fas fa-bookmark icono-celeste"></i> Estudios</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" id="dropdown-item-hover6" href="#7"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow6"></i> Nuestros estudios</a>
                        <a class="dropdown-item"  id="dropdown-item-hover7" href="#8"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow7"></i> Lecturas recomendadas</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#9"><i class="fas fa-globe-americas icono-celeste"></i> Chile en el mundo</a>
            </li>
        </ul>
    </div>

</nav>
