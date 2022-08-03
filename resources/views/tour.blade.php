@extends('layouts.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">{{$country->title}}</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">{{$tour->title}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    @include('layouts.booking')
    @if (session('success'))
                        <div class="container alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
    @endif

    <!-- Blog Start -->
    <div class="container-fluid">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <h3>{{$tour->title}}</h3>
                    <img style="width: 100%" src="{{asset('storage/'.$tour->image)}}" alt="">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs mt-2">
                        <li class="nav-item" style="width: 33%">
                        <a class="nav-link active btn btn-primary" data-toggle="tab" href="#home">CHI TIẾT TOUR</a>
                        </li>
                        <li class="nav-item " style="width: 33%">
                        <a class="nav-link btn btn-primary" data-toggle="tab" href="#menu1">GIÁ - LỊCH KHỞI HÀNH</a>
                        </li>
                        <li class="nav-item" style="width: 33%">
                        <a id="dattour1" class="nav-link btn btn-primary" data-toggle="tab" href="#menu2">ĐẶT TOUR</a>
                        </li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content mt-5">
                        <div class="tab-pane container active" id="home">
                            {!! $tour->description !!}
                        </div>
                        <div class="tab-pane container fade" id="menu1">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Mã tour</th>
                                    <th>Nơi đến</th>
                                    <th>Số ngày</th>
                                    <th>Ngày khởi hành</th>
                                    <th>Giá</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th>{{$tour->code}}</th>
                                    <th>{{$tour->title}}</th>
                                    <th>{{$tour->time}}</th>
                                    <th>{{$tour->date_start}}</th>
                                    <th>{{number_format($tour->price,0,',','.')}}</th>
                                    <th><button id="dattour" class="btn btn-success">Đặt tour</button></th>
                                  </tr>
                                  
                                </tbody>
                              </table>
                        </div>
                        <div class="tab-pane container fade" id="menu2">
                            <form action="{{route('older')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                  <label>Họ tên:</label>
                                  <input name="name" type="text" class="form-control">
                                  @error('name')
                                      <span style="color: red">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại:</label>
                                    <input name="phone" type="text" class="form-control">
                                    @error('phone')
                                      <span style="color: red">{{ $message }}</span>
                                        @enderror
                                  </div>
                                  <div class="form-group">
                                    <label>Email:</label>
                                    <input name="email" type="text" class="form-control">
                                    @error('email')
                                      <span style="color: red">{{ $message }}</span>
                                        @enderror
                                  </div>
                                  <div class="form-group">
                                    <label>Số khách người lớn:</label>
                                    <input name="nguoilon" type="text" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Số khách trẻ em:</label>
                                    <input name="treem" type="text" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Ngày khởi hành:</label>
                                    <input name="date" id="datepicker" type="text" class="form-control datetimepicker-input" data-toggle="datetimepicker">
                                    @error('date')
                                      <span style="color: red">{{ $message }}</span>
                                        @enderror
                                </div>
                                  
                                  <div class="form-group">
                                    <label>Tin nhắn:</label>
                                    <textarea name="message" type="text" class="form-control"></textarea>
                                  </div>
                                  <input name="tour_id" type="hidden" value="{{$tour->id}}">
                                <button type="submit" class="btn btn-primary">Đặt tour</button>
                              </form>
                        </div>
                    </div>
                </div>
    
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Author Bio -->
                    <div class="d-flex flex-column text-center bg-white mb-5 py-5 px-4">
                        <h4 style="color: red">HỔ TRỢ TRỰC TUYẾN</h4>
                        <img style="width: 100%" src="{{asset('page/img/1111.jpg')}}" alt="">
                        @foreach ($sp as $item)
                        <p style="color: red">{{$item->name}}: {{$item->phone}}</p>
                        @endforeach
                    </div>   
    
                   
    
                    <!-- Recent Post -->
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Cẩm nang du lịch</h4>
                        <a class="d-flex align-items-center text-decoration-none bg-white mb-3" href="">
                            <img class="img-fluid" src="img/blog-100x100.jpg" alt="">
                            <div class="pl-3">
                                <h6 class="m-1">Diam lorem dolore justo eirmod lorem dolore</h6>
                                <small>Jan 01, 2050</small>
                            </div>
                        </a>
                        <a class="d-flex align-items-center text-decoration-none bg-white mb-3" href="">
                            <img class="img-fluid" src="img/blog-100x100.jpg" alt="">
                            <div class="pl-3">
                                <h6 class="m-1">Diam lorem dolore justo eirmod lorem dolore</h6>
                                <small>Jan 01, 2050</small>
                            </div>
                        </a>
                        <a class="d-flex align-items-center text-decoration-none bg-white mb-3" href="">
                            <img class="img-fluid" src="img/blog-100x100.jpg" alt="">
                            <div class="pl-3">
                                <h6 class="m-1">Diam lorem dolore justo eirmod lorem dolore</h6>
                                <small>Jan 01, 2050</small>
                            </div>
                        </a>
                    </div>
    
                    <!-- Tag Cloud -->
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Tour Liên Quan</h4>
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
                                                <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
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
            </div>
        </div>
    </div>
    <!-- Blog End -->

@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#dattour').click(function(){
                $('#dattour1').click()
            })
        })
    </script>
    <script>
        $( function() {
          $( "#datepicker" ).datepicker({
            dateFormat:'dd/mm/yy',
          });
        } );
    </script>
@endpush