<div class="alert alert-success alert-dismissible fade show text-center" style="position: absolute; top:0; left:0;right: 0;z-index: 999" role="alert">
    <?php
    echo isset($message) ? "Лид {$message} создан" : "";
    ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>