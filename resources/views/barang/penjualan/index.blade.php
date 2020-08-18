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
        </div>
        
        <br>

        <div class="row">
            <div class="col-sm-6 col-md-3">
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <h4 class="card-title">Penjualan</h4>
                                </div>
                            </div>
                            <div class="col-5">
                                <a style="text-decoration: none;" href="{{ url('barang/penjualan') }}">
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
                                    <h4 class="card-title">Detail Penjualan</h4>
                                </div>
                            </div>
                            <div class="col-5">
                                <a style="text-decoration:none;" href="{{ url('barang/detailPenjualan') }}">
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
                            <h4 class="card-title">Penjualan</h4>
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
                                    <th>No Faktur</th>
                                    <th>Petugas</th>
                                    <th>Tanggal Penjualan</th>
                                    <th>Bayar</th>
                                    <th>Sisa</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @include('___Tanggal.tanggal-indo')
                                    @foreach($penjualans as $res)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><span class="badge badge-info"><b>{{ $res->no_faktur }}</b></span></td>
                                        <td>{{ $res->petugas->nama }}</td>
                                        <td>{{ tgl_indo($res->tanggal_penjualan) }}</td>
                                        <td>Rp{{ number_format($res->bayar,0,",",".") }}</td>
                                        <td>Rp{{ number_format($res->sisa,0,",",".") }}</td>
                                        <td>{{ $res->total }}</td>
                                        <td>
                                            <a id="{{ $res->id }}" href="#" class="edit btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                            <a data-toggle="modal" data-target="#konfirmasi_hapus" data-href="{{ route('penjualanDelete', $res->id) }}" class="btn btn-danger btn-sm"><span style="color:#fff;"><i class="far fa-trash-alt"></i></span></a>
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
                    Penjualan
                    </span>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('penjualanSave') }}" enctype="multipart/form-data">
                @csrf
                    <div class="row">
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
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Penjualan</label>
                                <input type="date" class="form-control datepicker" name="tanggal_penjualan" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label>Bayar</label>
                                <input onkeypress="return isNumberKey(event)" type="text" class="form-control" name="bayar" required="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label>Sisa</label>
                                <input onkeypress="return isNumberKey(event)" type="text" class="form-control" name="sisa" required="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="form-group">
                                <label>Total</label>
                                <input onkeypress="return isNumberKey(event)" type="text" class="form-control" name="total" required="">
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
                    Penjualan
                    </span>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FormEditPenjualan" method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="row">
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
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Tanggal Penjualan</label>
                            <input type="date" class="form-control datepicker" name="tanggal_penjualan" required="" id="tanggal_penjualan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <label>Bayar</label>
                            <input onkeypress="return isNumberKey(event)" type="text" class="form-control" name="bayar" required="" id="bayar">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <label>Sisa</label>
                            <input onkeypress="return isNumberKey(event)" type="text" class="form-control" name="sisa" required="" id="sisa">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <label>Total</label>
                            <input onkeypress="return isNumberKey(event)" type="text" class="form-control" name="total" required="" id="total">
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
				url: "{{ url('barang/penjualan/getDataEdit') }}/"+id,
				dataType: "JSON",
				success:function(data){
					if(data != ""){
						$('#id_petugas').val(data.id_petugas);
						$('#tanggal_penjualan').val(data.tanggal_penjualan);
						$('#bayar').val(data.bayar);
						$('#sisa').val(data.sisa);
                        $('#total').val(data.total);
						$('#openModalEdit').click();
						$('#FormEditPenjualan').attr("action", "{{ url('barang/penjualan/prosesEdit') }}/"+id);
					}
				}
			})
		})
        </script>
        <script>
            $('#penjualan').addClass('active');
        </script>
@endsection