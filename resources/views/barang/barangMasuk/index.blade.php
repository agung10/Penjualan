@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">DataTables</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{url('/')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a>Tables</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a>Barang</a>
                </li>
            </ul>
        </div><br>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <h4 class="card-title">Jenis Barang</h4>
                                </div>
                            </div>
                            <div class="col-5">
                                <a style="text-decoration: none;" href="{{ url('barang/jenisBarang') }}">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-right-arrow-2 text-primary"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <h4 class="card-title">Barang</h4>
                                </div>
                            </div>
                            <div class="col-5">
                                <a style="text-decoration:none;" href="{{ url('barang/barang') }}">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-right-arrow-2 text-primary"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <h4 class="card-title">Barang Masuk</h4>
                                </div>
                            </div>
                            <div class="col-5">
                                <a style="text-decoration:none;" href="{{ url('barang/barangMasuk') }}">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-right-arrow-2 text-primary"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <h4 class="card-title">Detail Barang</h4>
                                </div>
                            </div>
                            <div class="col-5">
                                <a style="text-decoration:none;" href="{{ url('barang/detailBarang') }}">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-right-arrow-2 text-primary"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Barang Masuk</h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </button>
                        </div>      
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                <tr style="text-align: center;">                   
                                    <th>No</th>
                                    <th>No Nota</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Distributor</th>
                                    <th>Petugas</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @include('___Tanggal.tanggal-indo')
                                    @foreach($barang_masuks as $res)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><span class="badge badge-primary"><b>{{ $res->no_nota }}</b></span></td>
                                        <td>{{ tgl_indo($res->tanggal_masuk) }}</td>
                                        <td>{{ $res->distributor->nama }}</td>
                                        <td>{{ $res->petugas->nama }}</td>
                                        <td>{{ $res->total }}</td>
                                        <td>
                                            <a id="{{ $res->id }}" href="#" class="edit btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                            <a data-toggle="modal" data-target="#konfirmasi_hapus" data-href="{{ route('barangMasukDelete', $res->id) }}" class="btn btn-danger btn-sm"><span style="color:#fff;"><i class="far fa-trash-alt"></i></span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                <h3 class="modal-title">
                    <span class="fw-mediumbold">
                    Tambah</span> 
                    <span class="fw-light">
                    Barang Masuk
                    </span>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('barangMasukSave') }}" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="date" class="form-control datepicker" name="tanggal_masuk" required="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label>Total</label>
                                <input onkeypress="return isNumberKey(event)" type="text" class="form-control" name="total" required="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label>Distributor</label>
                                <select name="id_distributor" class="form-control select2" required="">
                                    <option readonly></option>
                                    @foreach($distributors as $res)
                                    <option value="{{ $res->id }}">{{ $res->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label>Petugas</label>
                                <select name="id_petugas" class="form-control select2" required="">
                                    <option readonly></option>
                                    @foreach($petugas as $res)
                                    <option value="{{ $res->id }}">{{ $res->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<button id="openModalEdit" data-toggle="modal" data-target="#addRowModal2" style="display:none;"></button>
<div class="modal fade" id="addRowModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h3 class="modal-title">
                    <span class="fw-mediumbold">
                    Edit</span> 
                    <span class="fw-light">
                    Barang Masuk
                    </span>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FormEditBarangMasuk" method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="text" class="form-control datepicker" name="tanggal_masuk" required="" id="tanggal_masuk">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label>Total</label>
                                <input onkeypress="return isNumberKey(event)" type="text" class="form-control" name="total" required="" id="total">
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label>Distributor</label>
                                <select name="id_distributor" id="id_distributor" class="form-control select2" required="">
                                    <option readonly></option>
                                    @foreach($distributors as $res)
                                    <option value="{{ $res->id }}">{{ $res->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label>Petugas</label>
                                <select name="id_petugas" id="id_petugas" class="form-control select2" required="">
                                    <option readonly></option>
                                    @foreach($petugas as $res)
                                    <option value="{{ $res->id }}">{{ $res->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
                    
        @if(session('alertHapus'))
            <script>
                swal({
                      title: "Berhasil Menghapus Data",
                      text: "{{ session('alertHapus') }}",
                      icon: "success",
                      button: "Konfirmasi",
                    });
            </script>
        
        @elseif(session('alertEdit'))
            <script>
                swal({
                      title: "Berhasil Mengubah Data",
                      text: "{{ session('alertEdit') }}",
                      icon: "success",
                      button: "Konfirmasi",
                    });
            </script>
        
        @elseif(session('alertTambah'))
            <script>
                swal({
                      title: "Berhasil Menambah Data",
                      text: "{{ session('alertTambah') }}",
                      icon: "success",
                      button: "Konfirmasi",
                    });
            </script>
        @endif

        <script>
        // ModalEdit
		$(document).on('click', '.edit', function(e){
			e.preventDefault();
			var id = $(this).attr('id');
			$.ajax({
				url: "{{ url('barang/barangMasuk/getDataEdit') }}/"+id,
				dataType: "JSON",
				success:function(data){
					if(data != ""){
						$('#nota').val(data.nota);
						$('#tanggal_masuk').val(data.tanggal_masuk);
						$('#id_petugas').val(data.id_petugas);
						$('#id_distributor').val(data.id_distributor);
                        $('#total').val(data.total);
						$('#openModalEdit').click();
						$('#FormEditBarangMasuk').attr("action", "{{ url('barang/barangMasuk/prosesEdit') }}/"+id);
					}
				}
			})
		})
        </script>
        <script>
            $('#barang').addClass('active');
        </script>
@endsection