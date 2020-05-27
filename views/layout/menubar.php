<nav id="menubar" class="navbar sticky-top navbar-expand-sm">
    <div class="navbar-collapse justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url ?>web/inicio"><i class="fas fa-home icono-celeste"></i> Inicio</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                   <?php require_once ('views/layout/navbar/data-bar.php'); ?>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url ?>web/ley-i+d"><i class="fas fa-microscope icono-celeste"></i> Ley I+D</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url ?>web/estudios"><i class="fas fa-bookmark icono-celeste"></i> Estudios</a>
            </li>
        </ul>
    </div>
</nav>
