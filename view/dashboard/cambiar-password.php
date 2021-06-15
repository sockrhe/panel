<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Cambiar contraseña</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Cambiar contraseña</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!--<div class="card-header">
                        <h5>Nuevo Reporte</h5>
                    </div>-->
                    <form role="form" id="cambiar-password" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="nueva_pass">Nueva contraseña</label>
                                        <input type="password" class="form-control" name="nueva_pass" id="nueva_pass" placeholder="Nueva Contraseña">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="con_pass">Confirmar contraseña</label>
                                        <input type="password" min="0" class="form-control" name="con_pass" id="con_pass" placeholder="Confirmar Contraseña">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" id="submit-fuente" name="submit-fuente" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>