@extends('template.template')


@section('title')
    Data Tersangka
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('sweetalert::alert')

            <div class="box">
                <div class="box-header with-border">
                    @if (Auth::user()->level == 'admin')
                        <a href="{{route('pelaku.create')}}" class="btn btn-success"><i class="glyphicon glyphicon-plus"> Tambah</i></a>
                    @endif

                    <form action="{{route('pelaku.index')}}" method="get">
                        <div class="form-group">
                            <label for="keyword" class="col-sm-2">Search NIK</label>
                            <div class="col-sm-4">
                                <input placeholder="Search NIK" type="number" class="form-control" id="keyword" name="keyword" value="{{Request::get('keyword')}}">
                            </div>
                            <div class="col-sm-6 mt-2">
                                <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-search"> Search</i></button>
                            </div>
                        </div>
                    </form>

                    <h4 class="btn btn-info" style="margin-left: 300px;">Atau</h4>
                    <form action="{{route('pelaku.index')}}" method="get">
                        <div class="form-group">
                            <label for="sidik_jari" class="col-sm-2">Search Sidik Jari</label>
                            <div class="col-sm-4">
                                <input placeholder="Search Sidik Jari" type="text" class="form-control" id="sidik_jari" name="sidik_jari" value="{{Request::get('sidik_jari')}}">
                            </div>
                            <div class="col-sm-6 mt-2">
                                <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-search"> Search</i></button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nik</th>
                                <th>Nama Lengkap</th>
                                <th>Rumus Sidik Jari</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                                $no = 0;
                            @endphp --}}
                        @foreach ($pelaku as $item)
                            {{-- @php
                                $no++;
                            @endphp --}}
                            <tr>
                                {{-- <td>{{$no}}</td> --}}

                                <td>{{$loop->iteration + ($pelaku->perPage()) * ($pelaku->currentPage() - 1)}}</td>

                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->sidik_jari }}</td>
                                {{--  <td>{{ $item->photo_depan }}</td>
                                <td><img src="{{asset('public/uploads/'.$item->poto_depan)}}" class="img-thumbnail" width="100px;"></td>  --}}

                                <td>
                                    <a href="{{route('pelaku.show', $item->id)}}" class="btn btn-primary btn-sm">
                                        <i class="glyphicon glyphicon-list-alt"> Detail</i>
                                    </a>

                                    @if(Auth::user()->adminOrCurrentUserOwns($item))

                                        <a href="{{route('pelaku.edit', $item->id)}}" class="btn btn-warning btn-sm">
                                            <i class="glyphicon glyphicon-pencil"> Edit</i>
                                        </a>

                                        <button id="delete" data-title="{{$item->nama_lengkap}}" href="{{route('pelaku.destroy', $item->id)}}"  class="btn btn-danger btn-sm">
                                            <i class="glyphicon glyphicon-trash"> Hapus</i>
                                        </button>

                                        <form action="" id="deleteForm" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="" style="display: none">
                                        </form>

                                    @endif


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    {{$pelaku->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('button#delete').on('click', function(){
            var href= $(this).attr('href');
            var title= $(this).data('title')

            swal({
                title : "Apakah kamu yakin akan menghapus " +title+ "?",
                text: "Data yang terhapus tidak bisa di kembalikan !",
                icon : "warning",
                buttons: true,
                dangerMode : true,
            })
            .then((willDelete) => {
                if(willDelete){
                    document.getElementById('deleteForm').action = href;
                    document.getElementById('deleteForm').submit();
                    swal("Data berhasil di hapus",{
                        icon: "success",
                    });
                }
            });
        });
    </script>
@endpush
