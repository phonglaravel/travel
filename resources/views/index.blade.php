@extends('layouts.master')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($banner as $key => $item)
                <div @if ($key==0)
                class="carousel-item active"
                @else
                class="carousel-item"
                @endif>
                    <img class="w-100" src="{{asset('storage/'.$item->image)}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                            <h1 class="display-3 text-white mb-md-4">{{$item->title}}</h1>
                            <a href="{{url('du-lich/'.$item->country->slug_country.'/'.$item->slug_tour)}}" class="btn btn-primary py-md-3 px-md-5 mt-2">Xem Ngay</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    @include('layouts.booking')


    {{-- <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="/page/img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h6>
                        <h1 class="mb-3">We Provide Best Tour Packages In Your Budget</h1>
                        <p>Dolores lorem lorem ipsum sit et ipsum. Sadip sea amet diam dolore sed et. Sit rebum labore sit sit ut vero no sit. Et elitr stet dolor sed sit et sed ipsum et kasd ut. Erat duo eos et erat sed diam duo</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="/page/img/about-1.jpg" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="/page/img/about-2.jpg" alt="">
                            </div>
                        </div>
                        <a href="" class="btn btn-primary mt-1">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Competitive Pricing</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Best Services</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Worldwide Coverage</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End --> --}}


    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Trong nước</h6>
                <h1>Top địa điểm du lịch trong nước</h1>
            </div>
            <div class="row">
                @foreach ($trongnuoc6 as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img style="width: 100%" class="img-fluid" src="{{asset('storage/'.$item->image)}}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="{{url('tour/'.$item->category->slug_category.'/'.$item->slug_country)}}">
                            <h5 class="text-white">{{$item->title}}</h5>
                            <span>{{$item->tour->count()}} tour</span>
                        </a>
                    </div>
                </div>
                @endforeach              
            </div>
        </div>
    </div>
    <!-- Destination Start -->

    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Nước ngoài</h6>
                <h1>Top địa điểm du lịch nước ngoài</h1>
            </div>
            <div class="row">
                @foreach ($nuocngoai6 as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img style="width: 100%" class="img-fluid" src="{{asset('storage/'.$item->image)}}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="{{url('tour/'.$item->category->slug_category.'/'.$item->slug_country)}}">
                            <h5 class="text-white">{{$item->title}}</h5>
                            <span>{{$item->tour->count()}} tour</span>
                        </a>
                    </div>
                </div>
                @endforeach              
            </div>
        </div>
    </div>
    <!-- Destination Start -->


    

    <!-- Packages Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                
                <h1>Tour Hot Trong Nước</h1>
            </div>
            <div class="row">
                @foreach ($tour_in as $item)
                <div class="col-lg-4 col-md-6 mb-4" style="height: 430px">
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
    <!-- Packages End -->
    <!-- Packages Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                
                <h1>Tour hot nước ngoài</h1>
            </div>
            <div class="row">
                @foreach ($tour_out as $item)
                <div class="col-lg-4 col-md-6 mb-4" style="height: 430px">
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
                                    <h5 class="m-0">{{number_format($item->price,0,',','.')}} đ</h5>
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


    <!-- Registration Start -->
    <div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Giảm giá</h6>
                        <h1 class="text-white"><span class="text-primary">30%</span> Cho tuần trăng mật</h1>
                    </div>
                    <p class="text-white">Giảm giá sốc cho tour trăng mật dành cho các cặp đôi mới cưới đăng kí ngay để chúng tôi sẽ liên hệ với bạn</p>
                    
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-primary text-center p-4">
                            <h1 class="text-white m-0">Đăng kí ngay</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-white p-5">
                            <form>
                               @csrf
                                <div class="form-group">
                                    <input name="name" id="ten" type="text" class="form-control p-4" placeholder="Tên của bạn" required="required" />
                                </div>
                                <div class="form-group">
                                    <input name="email" id="mail" type="email" class="form-control p-4" placeholder="Email" required="required" />
                                </div>
                                <div class="form-group">
                                    <select id="country_id" name="country_id" class="custom-select px-4" style="height: 47px;">
                                        <option value="" selected>-Chọn địa điểm-</option>
                                        @foreach ($all_country as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div>
                                    <button data-target="#exampleModalCenter" data-toggle="modal" id="honeymoon" class="btn btn-primary btn-block py-3" type="button">Đăng Kí Ngay</button>
                                </div>
                                
                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Thông báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->


   


   


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Du Lịch</h6>
                <a style="text-decoration: none" href="{{route('blogs')}}"><h1>Cẩm nang du lịch</h1></a>
            </div>
            <div class="row pb-3">
                @foreach ($blogs as $item)
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog-item">
                        <div class="position-relative">
                            <img style="height: 200px" class="img-fluid w-100" src="{{asset('storage/'.$item->image)}}" alt="">
                            <div class="blog-date">
                                <h6 class="font-weight-bold mb-n1">{{substr($item->ngaytao,0,5)}}</h6>
                                <small class="text-white text-uppercase">{{substr($item->ngaytao,6,4)}}</small>
                            </div>
                        </div>
                        <div class="bg-white p-4" style="height: 120px">
                            
                            <a class="h5 m-0 text-decoration-none" href="{{route('blog',$item->slug_blog)}}">{{$item->title}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
                
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#honeymoon').click(function(){
                let name = $('#ten').val();
                let email = $('#mail').val();
                let country_id = $('#country_id').val();
                var _token = $('input[name="_token"]').val();
				$.ajax({
          			url : "{{url('/honeymoon')}}",
          			method: "POST",
          			data : {name:name,email:email,country_id:country_id ,_token:_token},
          			success:function(data)
          			{
              			$('.modal-body').html(data);
          			}
          		})
            })
        })
    </script>
@endpush