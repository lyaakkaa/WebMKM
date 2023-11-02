<table border="1">
    <?php
    $rows = 9;
    $cols = 9;
    ?>
    <?php for ($tr = 1; $tr <= $rows; $tr++) : ?>
        <tr>
            <?php for ($td = 1; $td <= $cols; $td++) : ?>
                <?php if ($tr == 1 || $td == 1) : ?>
                    <th style='background-color: yellow'>
                        <?= $tr * $td ?>
                    </th>
                <?php else : ?>
            
                    <td><?= $tr * $td ?></td>
                <?php endif; ?>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>
