<nav id="menubar" class="navbar sticky-top navbar-expand-sm bg-gradient">
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
                    <a class="nav-link dropdown-toggle landing-page-nav-link" href="<?= base_url . "web/politicas_publicas" ?>"><i class="fad fa-bookmark icono-celeste"></i> Políticas públicas</a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="move-drop" id='lista_politicas'>
                            <script>
                                $(document).ready(function () {
                                    if (window.location.href.indexOf("politicas_publicas") > -1) {
                                        $('#politicas_scrollify').show();
                                        $('#politicas_links').hide();
                                    } else {
                                        $('#politicas_links').show();
                                        $('#politicas_scrollify').hide();
                                    }
                                });</script>
                            <div id='politicas_links' style="display: none;">
                                <a class="dropdown-item" id="dropdown-item-hover6" href="<?=base_url.'web/politicas_publicas#nuestros_estudios'?>"><i class="fal fa-angle-double-right" id="nav-bar-dropdown-arrow6"></i> Nuestros estudios</a>
                                <a class="dropdown-item"  id="dropdown-item-hover7" href="<?=base_url.'web/politicas_publicas#lecturas_recomendadas'?>"><i class="fal fa-angle-double-right" id="nav-bar-dropdown-arrow7"></i> Lecturas recomendadas</a>
                                <a class="dropdown-item"  id="dropdown-item-hover7" href="<?=base_url.'web/politicas_publicas#programas'?>"><i class="fal fa-angle-double-right" id="nav-bar-dropdown-arrow7"></i> Programas</a>
                            </div>
                            <div id='politicas_scrollify' style="display: none;">
                                <a class="dropdown-item" id="dropdown-item-hover6" href="#nuestros_estudios"><i class="fal fa-angle-double-right" id="nav-bar-dropdown-arrow6"></i> Nuestros estudios</a>
                                <a class="dropdown-item"  id="dropdown-item-hover7" href="#lecturas_recomendadas"><i class="fal fa-angle-double-right" id="nav-bar-dropdown-arrow7"></i> Lecturas recomendadas</a>
                                <a class="dropdown-item"  id="dropdown-item-hover7" href="#programas"><i class="fal fa-angle-double-right" id="nav-bar-dropdown-arrow7"></i> Programas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
