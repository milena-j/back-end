<?php
require_once 'header.php';

/* print_r($posts); */

?>

<div class="container my-5">
    <table class="table">
        <thead>
            <tr>
                <th>
                    userId
                </th>
                <th>
                    id
                </th>
                <th>
                    title
                </th>
                <th>
                    body
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $key => $value): ?>
                <tr>
                    <td>
                        <?= $value->userId ?>
                    </td>
                    <td>
                        <?= $value->id ?>
                    </td>
                    <td>
                        <?= $value->title ?>
                    </td>
                    <td>
                        <?= $value->body ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php
require_once 'footer.php';
?>