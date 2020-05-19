<?php ?>
<h2> Gestionar <b>Estudios</b></h2><input data-size="s"type="checkbox" id="estudios-toggle" checked data-toggle="toggle" data-on="Nuestros estudios" data-off="Lecturas recomendadas" data-onstyle="nuestros" data-offstyle="recomendadas">

<hr>

<div class="row">

    <div class="col-sm-10 estudios" id="contenedor-nuestros-estudios">
        <h4>Nuestros estudios</h4>
        <button class="btn btn-primary" href="#modal-agregar-estudio" data-toggle="modal">Agregar</button>
        <button class="btn btn-primary" href="#modal-buscar-estudio" data-toggle="modal">Buscar</button>
        <button class="btn btn-primary" href="#todos" data-toggle="modal">Ver todos</button>
        <br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Año</th>
                    <th scope="col">Archivo</th>
                    <th scope="col">Ultima edición</th>
                    <th scope="col">Gestión</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>
                        <a href="<?= base_url ?>estudio/modificarEstudio&id=" class="btn btn-success" >Modificar</a>
                        <a href="<?= base_url ?>estudio/eliminar&id=" class="btn btn-danger" >Eliminar</a>
                    </td>

                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>
                        <a href="<?= base_url ?>estudio/modificarEstudio&id=" class="btn btn-success" >Modificar</a>
                        <a href="<?= base_url ?>estudio/eliminar&id=" class="btn btn-danger" >Eliminar</a>
                    </td>

                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>
                        <a href="<?= base_url ?>estudio/modificarEstudio&id=" class="btn btn-success" >Modificar</a>
                        <a href="<?= base_url ?>estudio/eliminar&id=" class="btn btn-danger" >Eliminar</a>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-sm-10 lecturas" id="contenedor-lecturas-recomendadas">
        <h4>Lecturas recomendadas</h4>
        <button class="btn btn-primary" href="#modal-agregar-lectura" data-toggle="modal">Agregar</button>
        <button class="btn btn-primary" href="#modal-agregar-lectura" data-toggle="modal">Buscar</button>
        <button class="btn btn-primary" href="#modal-agregar-lectura" data-toggle="modal">Ver todos</button>
        <br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Año</th>
                    <th scope="col">Enlace</th>
                    <th scope="col">Ultima edición</th>
                    <th scope="col">Gestión</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>
                        <a href="<?= base_url ?>estudio/modificarEstudio&id=" class="btn btn-success" >Modificar</a>
                        <a href="<?= base_url ?>estudio/eliminar&id=" class="btn btn-danger" >Eliminar</a>
                    </td>

                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>
                        <a href="<?= base_url ?>estudio/modificarEstudio&id=" class="btn btn-success" >Modificar</a>
                        <a href="<?= base_url ?>estudio/eliminar&id=" class="btn btn-danger" >Eliminar</a>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>