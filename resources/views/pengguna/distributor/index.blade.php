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
                    <a>Distributor</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Distributor</h4>
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
                                    <th>Nama Lengkap</th>
                                    <th>Kota Asal</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($distributors as $res)
                                <tr>
                                    <td style="text-align:center;">{{ $loop->iteration }}</td>
                                    <td>{{ $res->nama }}</td>
                                    <td>{{ $res->kota_asal }}</td>
                                    <td>{{ $res->alamat }}</td>
                                    <td>{{ $res->email }}</td>
                                    <td>{{ $res->telp }}</td>
                                    <td>
                                        <a id="{{ $res->id }}" href="#" class="edit btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                        <a data-toggle="modal" data-target="#konfirmasi_hapus" data-href="{{ route('distributorDelete', $res->id) }}" class="btn btn-danger btn-sm"><span style="color:#fff;"><i class="far fa-trash-alt"></i></span></a>
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
                    Distributor
                    </span>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('distributorSave') }}" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" required="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label>Kota Asal</label>
                                <input type="text" class="form-control" name="kota_asal" required="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input onkeypress="return isNumberKey(event)" type="text" class="form-control" name="telp" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea rows="3" name="alamat" class="form-control" style="height: 220px;" required></textarea>
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
                    Distributor
                    </span>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FormEditPetugas" method="POST" action="" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" required="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label>Kota Asal</label>
                                <input type="text" class="form-control" id="kota_asal" name="kota_asal" required="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email" name="email" required="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input onkeypress="return isNumberKey(event)" type="text" class="form-control" id="telp" name="telp" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea rows="3" name="alamat" class="form-control" id="alamat" style="height: 220px;" required></textarea>
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
				url: "{{ url('pengguna/distributor/getDataEdit') }}/"+id,
				dataType: "JSON",
				success:function(data){
					if(data != ""){
						$('#nama').val(data.nama);
						$('#kota_asal').val(data.kota_asal);
                        $('#email').val(data.email);
                        $('#telp').val(data.telp);
						$('#alamat').val(data.alamat);
						$('#openModalEdit').click();
						$('#FormEditPetugas').attr("action", "{{ url('pengguna/distributor/prosesEdit') }}/"+id);
					}
				}
			})
		})
        </script>

        <script>
            $('#distributor').addClass('active');
        </script>
@endsection