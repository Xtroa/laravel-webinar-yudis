@extends('layout')

@section('formContent')
    <!-- Header-->


    <div class="content mt-3">
        <div class="animated fadeIn">


            <div class="col-lg-12">

                <div class="card">
                <div class="card-header" style="text-align: center">
                    <strong>DAFTAR ARTIKEL</strong>
                </div>

                <div class="card-body card-block">

                    <a class="btn btn-primary" href="{{ url('tambahArtikel') }}" role="button" style="margin-bottom: 20px;"> + Tambah Artikel </a>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="tabelArtikel" class="table bordered" style="margin-top: 20px;">
                        <thead>
                            <tr style="text-align: center">
                                <th scope="col">Kode</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Kutipan</th>
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
                                <td><a href="/news/{{ $data->slug }}">{{ $data->title }}</a></td>
                                <td>{{ $data->excerpt }}</td>
                                <td>
                                    @if ($data->thumbnail)
                                        <img src="{{ asset('storage/' .$data->thumbnail) }}" width="150px" alt=""></td>
                                    @else
                                        Tidak ada gambar
                                    @endif

                                    <td>{{ $data->user->name }}</td>

                                <td>{{ $data->status }}</td>
                                {{-- <td><a href="{{ route('artikel.edit' , ($data->id)) }}" class="btn btn-primary btn-sm"> --}}
                                <td style='white-space: nowrap'><a href="/artikel/edit/{{ $data->id }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a><form action="{{ url('artikel/delete/'.$data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus artikel ini?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form></a>
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

{{-- <script src="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> --}}

<script src="{{ asset('/js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#tabelArtikel').DataTable();
    });
</script>

