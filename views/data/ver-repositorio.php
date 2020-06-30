<?php
$directory = 'uploads/repo/'.$repo->repositorio.'-master';
$files = glob($directory . '/*.{html}', GLOB_BRACE);

?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Fichero</th>
            <th scope="col">Directorio</th>
        </tr>
    </thead>
    <tbody>
        <?php
foreach ($files as $file1) {
    $info1 = pathinfo($file1);
    $name = $info1['filename']; //index
                ?>
                <tr>
                    <th scope="row"><a target="_blank" href="<?=base_url.$file1?>"><?=$name.'.html'?></a></th>
                    <td><?=$file1?></td>
                </tr>
                <?php
        }
        ?>
    </tbody>
</table>
