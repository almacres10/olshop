<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider1.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider2.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider3.jpg">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<div class="card card-solid">
  <div class="card-body pb-0">
    <div class="row d-flex align-items-stretch">
      <?php foreach ($barang as $key => $value) { ?>
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
          <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
              <h2 class="lead"><b><?= $value->nama_barang ?></b></h2>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-12 text-center">
                  <img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" alt="user-avatar" width="300px" height="220px">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-6">
                  <div class="text-left">
                    <h4> <span class="badge bg-primary">
                        <i class="fa fa-money-bill fa-lg"></i>
                        <?= number_format($value->harga, 0) ?>
                      </span></h4>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm btn-success">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-cart-plus"> Add </i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      <?php } ?>
    </div>
  </div>
</div>