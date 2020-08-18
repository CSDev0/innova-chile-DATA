<?php
$directory = 'uploads/repo/'.$repo->repositorio.'-master';
$files = glob($directory . '/*.{html}', GLOB_BRACE);

?>
<table class="table table-striped xs-text">
        <tr>
            <th>Fichero</th>
            <th>Directorio</th>
        </tr>
        <?php
foreach ($files as $file1) {
    $info1 = pathinfo($file1);
    $name = $info1['filename']; //index
                ?>
                <tr>
                    <td><a target="_blank" href="<?=base_url.$file1?>"><?=$name.'.html'?></a></th>
                    <td><?=$file1?></td>
                </tr>
                <?php
        }
        ?>
</table>
