<?php
$page = $_REQUEST['page-table'];
$filt = $_REQUEST['filters'];
$json = json_decode(file_get_contents(load_file('contents/' . $page . '-table.json')), true);
?>

<table>
    <tr>
        <?php foreach ($json['frm'] as $col): ?>
            <th><?= $col['th'] ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($json['cls']::selectAllDB($filt) as $row): ?>
        <tr class="table-link" data-href="<?= create_link($json['act'] . '/' . $row['id']) ?>">
            <?php foreach ($json['frm'] as $column): ?>
                <td><?= $row[$column['td']] ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>