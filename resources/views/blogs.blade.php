@extends('layouts.master')

@section('content')
     <!-- Header Start -->
     <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Cẩm nang du lịch</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Trang chủ</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Cẩm nang du lịch</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


   @include('layouts.booking')


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row pb-3">
                        @foreach ($blogs as $item)
                        <div class="col-md-6 mb-4 pb-2">
                            <div class="blog-item">
                                <div class="position-relative">
                                    <img style="height: 200px" class="img-fluid w-100" src="{{asset('storage/'.$item->image)}}" alt="">
                                    <div class="blog-date">
                                        <h6 class="font-weight-bold mb-n1">{{substr($item->ngaytao,0,5)}}</h6>
                                        <small class="text-white text-uppercase">{{substr($item->ngaytao,6,4)}}</small>
                                    </div>
                                </div>
                                <div class="bg-white p-4" style="height: 120px">
                                    <i class="fas fa-cloud"></i>
                                    <a class="h5 m-0 text-decoration-none" href="{{route('blog',$item->slug_blog)}}">{{$item->title}}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach   
                    </div>
                </div>
    
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Tour Hot</h4>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach ($lienquan as $item)
                            <div class="col-lg-12 col-md-12 mb-4" style="height: 430px">
                                <div class="package-item bg-white mb-2">
                                    <img style="width: 100% ; height:200px" class="img-fluid" src="{{asset('storage/'.$item->image)}}" alt="">
                                    <div class="p-4" style="width: 100% ; height:230px">
                                        <div class="d-flex justify-content-between mb-3">
                                            <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{$item->country->title}}</small>
                                            <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{$item->time}} ngày</small>
                                            <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>{{$item->amount}} Người</small>
                                        </div>
                                        <a class="h5 text-decoration-none" href="{{url('du-lich/'.$item->country->slug_country.'/'.$item->slug_tour)}}">{{$item->title}}</a>
                                        <div class="border-top mt-4 pt-4">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>({{$item->count}})</small></h6>
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
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection