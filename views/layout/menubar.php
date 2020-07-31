<nav id="menubar" class="navbar sticky-top navbar-expand-sm bg-gradient seccion" data-section-name="menubar">
    <div class="navbar-collapse justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url ?>web/inicio"><i class="fad fa-home icono-celeste"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <?php require_once ('views/layout/navbar/data-bar.php'); ?>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url ?>web/ley-i+d"><i class="fad fa-microscope icono-celeste"></i> Ley I+D</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                <a class="nav-link dropdown-toggle landing-page-nav-link" href="#estudios"><i class="fad fa-bookmark icono-celeste"></i> Estudios</a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="move-drop">
                        <a class="dropdown-item" id="dropdown-item-hover" href="<?= base_url ?>estudio/nuestrosEstudios"><i class="fal fa-angle-double-right" id="nav-bar-dropdown-arrow"></i> Nuestros estudios</a>
                        <a class="dropdown-item" id="dropdown-item-hover" href="<?= base_url ?>estudio/lecturasRecomendadas"><i class="fal fa-angle-double-right" id="nav-bar-dropdown-arrow"></i> Lecturas recomendadas</a>
                    </div>
                </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
