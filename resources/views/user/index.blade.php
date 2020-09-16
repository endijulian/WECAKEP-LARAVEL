@extends('template.template')

@section('title')
    Data User
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">

        @include('sweetalert::alert')

<div class="box">
    <div class="box-header with-border">
        <a href="{{route('user.create')}}" class="btn btn-success"><i class="glyphicon glyphicon-plus"> Tambah</i></a>
    </div>
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 0;
                    @endphp
                    @foreach ($user as $item)
                    @php
                        $no++;
                    @endphp
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->level }}</td>
                        <td>
                            <a href="{{route('user.edit', $item->id)}}" class="btn btn-warning btn-sm">
                                <i class="glyphicon glyphicon-pencil"> Edit</i>
                            </a>
                            <button id="delete" data-title="{{$item->name}}" href="{{route('user.destroy', $item->id)}}"  class="btn btn-danger btn-sm">
                                    <i class="glyphicon glyphicon-trash"> Hapus</i>
                            </button>

                            <form action="" id="deleteForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="" style="display: none">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="box-footer">
            {{$user->links()}}
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
                title : "Apakah kamu yakin akan menghapus User " +title+ "?",
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
