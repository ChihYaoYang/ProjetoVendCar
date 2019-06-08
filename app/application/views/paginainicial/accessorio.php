<div class="row">
    <div class="col-md-12">
        <h2 class="text-center text-info">Accesorios</h2>
        <hr>
    </div>
    <?php
    foreach ($acess as $ac) {
        echo ' <div class="col-md-4">';
        echo '<div class="card mb-4">';
        echo '<img src="' . base_url('public/uploads/' . $ac->imagem) . '" class="card-img-top" height="250px">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $ac->descricao . '</h5>';
        echo '<p class="card-text">R$: ' . number_format($ac->preco, 2, ',', '.') . '</p>';
        if ($this->session->userdata('status') == 1 || $this->session->userdata('status') == 2) {
            echo '<a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Comprar</a>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>

</div>