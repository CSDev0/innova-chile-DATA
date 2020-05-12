<nav class="navbar sticky-top navbar-expand-sm">
    <ul class="navbar-nav">
        <div class="container menu-bar"> 
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url ?>web/inicio">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url ?>web/todos-subsidios">Todos los subsidios</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#3">Data</a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="move-drop">
                            <a class="dropdown-item" id="dropdown-item-hover" href="#"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow"></i> Portafolio</a>
                            <a class="dropdown-item"  id="dropdown-item-hover2" href="#"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow2"></i> Ley I+D</a>
                            <div class="dropdown">
                                <a class="dropdown-item" id="dropdown-item-hover3"href="#"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow3"></i> Subsidios</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" id="dropdown-item-hover4" href="<?= base_url ?>web/data"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow4"></i> Convocatoria</a>
                                    <a class="dropdown-item" id="dropdown-item-hover5" href="<?= base_url ?>web/apptest"><i class="fa fa-angle-double-right" id="nav-bar-dropdown-arrow5"></i> Historico</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url ?>web/ley-i+d">Ley I+D</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url ?>web/estudios">Estudios</a>
            </li>
        </div>
    </ul>
</nav>
