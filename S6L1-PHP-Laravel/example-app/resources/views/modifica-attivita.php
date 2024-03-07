<?php
require_once 'header.php';
?>

<div class="container my-5">

    <form>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Description</label>
            <input type="text" class="form-control" id="body">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

</div>

<?php
require_once 'footer.php';
?>