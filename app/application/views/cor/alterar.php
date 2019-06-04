<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Alteração de Cor</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-8 offset-md-2 col-xs-12">
            <!---Card--->
            <div class="card">
                <h3 class="card-header bg-transparent"> <i class="fas fa-edit"></i>Alteração de Cor</h3>
                <div class="card-body">
                    <?php echo validation_errors(); ?>
                    <form method="POST" action="">
                        <?php
                        //Mensagem
                        echo ($this->session->flashdata('mensagem')) ? $this->session->flashdata('mensagem') : '';
                        ?>
                        <input type="hidden" name="id" id="id" value="<?= isset($cor) ? $cor->id : ''; ?>">
                        <!--Cor-->
                        <div>
                            <label for="descricao">Cor</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="descricao" name="descricao" value="<?= isset($cor) ? $cor->descricao : ''; ?>">
                            </div>
                        </div>
                        <!--Button-->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>