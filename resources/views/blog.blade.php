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
                    <!-- Blog Detail Start -->
                    <div class="pb-3">
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <h2 class="mb-3">{{$blog->title}}</h2>
                            <div class="d-flex mb-3">
                                <a class="text-primary text-uppercase text-decoration-none" href="">{{$blog->ngaytao}}</a>
                            </div>
                            <img style="width:100%; margin-bottom: 10px" src="{{asset('storage/'.$blog->image)}}" alt="">                           
                            {!!$blog->content!!}
                        </div>
                    </div>
                    <!-- Blog Detail End -->
    
                    <!-- Comment List Start -->
                    <div class="bg-white" style="padding: 30px; margin-bottom: 30px;">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">{{$comment_blog->count()}} Bình luận</h4>
                     
                        <div>
                            @foreach ($comment_blog as $item)
                            <div style="border-top: 1px solid; margin-top:20px; padding-top:20px">
                                <h6><a href="">{{$item->name}}</a> <small><i>{{$item->ngaytao}}</i></small></h6>
                                <p>{{$item->message}}</p>
                                <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="collapse" data-target="#but{{$item->id}}" aria-expanded="false" aria-controls="collapseExample">Trả lời</button>
                                <div class="collapse" id="but{{$item->id}}">
                                    <form action="{{route('comment_comment')}}" method="POST">
                                        @csrf
                                        <input class="form-control" type="text" name="name" required>
                                        <textarea name="message" class="form-control" name="" id="" cols="80" rows="5" required></textarea>
                                        <input type="hidden" value="{{$item->id}}" name="commentblog_id">
                                        <button class="btn btn-primary" type="submit">Gửi</button>
                                    </form>
                                </div>
                                @foreach ($item->comment_comment as $i)
                                <div class="media mt-4">
                                    <div class="media-body" style="margin-left: 50px">
                                        <h6><a href="">{{$i->name}}</a> <small><i>{{$i->ngaytao}}</i></small></h6>
                                        <p>{{$i->message}}</p>
                                    </div>     
                                </div>
                                @endforeach    
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <!-- Comment List End -->
    
                    <!-- Comment Form Start -->
                    <div class="bg-white mb-3" style="padding: 30px;">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Viết bình luận</h4>
                        <form action="{{route('comment_blog')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên</label>
                                <input name="name" type="text" class="form-control" id="name" required oninvalid="this.setCustomValidity('Nhập tên')" oninput="this.setCustomValidity('')"/>
                            </div>
    
                            <div class="form-group">
                                <label for="message">Bình luận</label>
                                <textarea required name="message" id="message" cols="30" rows="5" class="form-control" oninvalid="this.setCustomValidity('Nhập bình luận')" oninput="this.setCustomValidity('')"></textarea>
                            </div>
                            <input type="hidden" name="blog_id" value="{{$blog->id}}">
                            <div class="form-group mb-0">
                                <input type="submit" value="Gửi"
                                    class="btn btn-primary font-weight-semi-bold py-2 px-3">
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End -->
                </div>
    
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Author Bio -->
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