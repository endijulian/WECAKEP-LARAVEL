@extends('template.template')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                        <div class="col-lg-4 col-xs-6">
                            <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{$pelaku}}</h3>

                                <p>Pelaku</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{route('pelaku.index')}}" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                            </div>
                        </div>
                </div>

                <div class="card-footer">
                    <img style="width: 950px;" src="{{asset('img/header-polsekjatiuwung.png')}}" alt="Polsek JatiUwung">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
