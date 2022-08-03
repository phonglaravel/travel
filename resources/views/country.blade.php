@extends('layouts.master')

@section('content')
     <!-- Header Start -->
     <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">{{$country->title}}</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="/">Trang chủ</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">{{$country->title}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    @include('layouts.booking')


    <!-- Packages Start -->
    <div class="container-fluid">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">{{$country->title}}</h6>
                <h1>Tour du lịch mới</h1>
            </div>
            <div class="row">
                @foreach ($tours as $item)
                <div class="col-lg-4 col-md-6 mb-4" style="height: 430px">
                    <div class="package-item bg-white mb-2">
                        <img style="width: 100% ; height:200px" class="img-fluid" src="{{asset('storage/'.$item->image)}}" alt="">
                        <div class="p-4" style="width: 100% ; height:230px">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{$country->title}}</small>
                                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{$item->time}} ngày</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>{{$item->amount}} Người</small>
                            </div>
                            <a class="h5 text-decoration-none" href="{{url('du-lich/'.$item->country->slug_country.'/'.$item->slug_tour)}}">{{$item->title}}</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                    @if ($item->giamgia==null || $item->giamgia<=0)
                                        <h5 class="m-0">{{number_format($item->price,0,',','.')}} đ</h5>
                                    @else
                                        <h5 style="text-decoration-line: line-through" class="m-0">{{number_format($item->price,0,',','.')}} đ</h5>
                                        <h5 class="m-0">{{number_format($item->price*(100-$item->giamgia)/100,0,',','.')}} đ</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
               
            </div>
        </div>
    </div>
    <!-- Packages End -->


    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Trong Nước</h6>
                <h1>Top địa điểm du lịch trong nước</h1>
            </div>
            <div class="row">
                @if ($category->id==1)
                @foreach ($trongnuoc6 as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img style="width: 100%" class="img-fluid" src="{{asset('storage/'.$item->image)}}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">{{$item->title}}</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
                @endforeach     
                @else
                @foreach ($nuocngoai6 as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img style="width: 100%" class="img-fluid" src="{{asset('storage/'.$item->image)}}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">{{$item->title}}</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
                @endforeach   
                @endif
                
            </div>
        </div>
    </div>
    <!-- Destination Start -->
@endsection