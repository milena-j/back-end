<?php
require_once 'header.php';

/* print_r($posts); */

?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $posts->title ?>
                    </h5>
                    <p class="card-text">
                        <?= $posts->body ?>
                    </p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>