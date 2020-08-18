@extends('layouts.admin')

@section('content')
<div class="panel-header bg-info-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                <h5 class="text-white op-7 mb-2">Web Penjualan (Shooping Yuk)</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <a data-toggle="modal" data-target="#addRowModal" class="btn btn-info btn-round" style="color:#fff;">Tentang</a>
            </div>
        </div>
    </div>
</div>

<div class="page-inner mt--5">
  <div class="row">
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body ">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-primary bubble-shadow-small">
                <i class="far fa-user"></i>
              </div>
            </div>
            <div class="col col-stats ml-3 ml-sm-0">
              <div class="numbers">
                <p class="card-category">Total Petugas</p>
                <h4 class="card-title">{{ $petugas }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-primary bubble-shadow-small">
                <i class="mdi mdi-truck-fast"></i>
              </div>
            </div>
            <div class="col col-stats ml-3 ml-sm-0">
              <div class="numbers">
                <p class="card-category">Total Distributor</p>
                <h4 class="card-title">{{ $distributors }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-primary bubble-shadow-small">
                <i class="mdi mdi-cube"></i>
              </div>
            </div>
            <div class="col col-stats ml-3 ml-sm-0">
              <div class="numbers">
                <p class="card-category">Data Barang</p>
                <h4 class="card-title">{{ $barangs }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-3">
      <div class="card card-stats card-round">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-icon">
              <div class="icon-big text-center icon-primary bubble-shadow-small">
                <i class="mdi mdi-cash-multiple"></i>
              </div>
            </div>
            <div class="col col-stats ml-3 ml-sm-0">
              <div class="numbers">
                <p class="card-category">Data Penjualan</p>
                <h4 class="card-title">{{ $penjualans }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card card-dark bg-info-gradient">
        <div class="card-body skew-shadow">    
          <div class="col-1 text-right">
            <h1 class="fw-bold mb-1">{{ $barangMasuks }}</h1>
          </div>      

          <br>

          <div class="row">
            <div class="col-8 pr-0">
              <h3 class="fw-bold mb-1">Barang Masuk</h3>
              <div class="text-small text-uppercase fw-bold op-8">Jumlah Total</div>
            </div>
            <div class="col-4 pl-0 text-right">
              <img src="https://static1.squarespace.com/static/5af5e600b98a783bbfd76c43/t/5b9928bc6d2a73dd96cf6e5d/1528122887307/LB-icon-shopping-cart.png?format=300w" width="50px" alt="Barang Masuk">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card card-dark bg-info-gradient">
        <div class="card-body bubble-shadow">
        <div class="col-1 text-right">
          <h1 class="fw-bold mb-1">{{ $jenis_barangs }}</h1>
          </div>      

          <br>
          
          <div class="row">
            <div class="col-8 pr-0">
              <h3 class="fw-bold mb-1">Jenis Barang</h3>
              <div class="text-small text-uppercase fw-bold op-8">Jumlah Total</div>
            </div>
            <div class="col-4 pl-0 text-right">
              <img src="http://olimpiade.psma.kemdikbud.go.id/olimpiade/fiksi/assets/dist/img/icon/icon-rintisan-usaha.png" width="50px" alt="Jenis Barang">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card card-dark bg-info-gradient">
        <div class="card-body curves-shadow">
        <div class="col-1 text-right">
          <h1 class="fw-bold mb-1">{{ $detailPenjualans }}</h1>
          </div>      

          <br>
          
          <div class="row">
            <div class="col-8 pr-0">
              <h3 class="fw-bold mb-1">Detail Penjualan</h3>
              <div class="text-small text-uppercase fw-bold op-8">Jumlah Total</div>
            </div>
            <div class="col-4 pl-0 text-right">
              <img src="https://ohuihouse.com/wp-content/uploads/2017/04/dieu-khoan-su-dung-ohuihouse.png" width="50px" alt="Detail Penjualan">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">     
      <div class="card card-dark bg-info-gradient">
        <div class="card-body curves-shadow bubble-shadow">
        <div class="col-1 text-right">
          <h1 class="fw-bold mb-1">{{ $detailBarangMasuks }}</h1>
        </div> 

        <br>
        
          <div class="row">
            <div class="col-8 pr-0">
              <h3 class="fw-bold mb-1">Detail Barang Masuk</h3>
              <div class="text-small text-uppercase fw-bold op-8">Jumlah Total</div>
            </div>
            <div class="col-4 pl-0 text-right">
              <img src="http://images.pitchero.com/ui/419149/image_5a71c4ce47dfe.png" width="50px" alt="Detail Barang Masuk">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h3>Tentang Aplikasi</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <center><h4>Ini adalah aplikasi web penjualan versi Beta</h4></center>
              <center><h4 style="border-bottom:2px solid #007bff;width:90px;"></h4></center>
            </div>
        </div>
    </div>
</div>
@endsection
