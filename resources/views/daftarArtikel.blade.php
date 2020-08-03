@extends('layout')

@section('formContent')
    <!-- Header-->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Daftar Artikel</h1>
                </div>
            </div>
        </div>

    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">


            <div class="col-lg-12">
                <div class="card">
                <div class="card-header">
                    <strong>Basic Form</strong> Elements
                </div>



                <div class="card-body card-block">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered" id="tabelArtikel">
                        <thead>
                            <tr style="text-align: center">
                                <th scope="col">Kode</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Isi</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftarArtikel as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->excerpt }}</td>
                                <td>
                                    @if ($data->thumbnail)
                                        <img src="{{ asset('storage/' .$data->thumbnail) }}" width="150px" alt=""></td>

                                    @else
                                        Tidak ada gambar
                                    @endif

                                    <td>{{ $data->user->name }}</td>

                                <td>{{ $data->status }}</td>
                                <td><a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ url('artikel/delete/'.$data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus artikel ini?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



                </div>
        </div>
        </div><!-- .animated -->
    </div><!-- .content -->

@endsection

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabelArtikel').DataTable();
    } );
</script>
