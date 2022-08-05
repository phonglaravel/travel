@extends('layouts.master')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Liên hệ</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Trang chủ</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Liên hệ</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    @include('layouts.booking')
    


    <!-- Contact Start -->
    <div class="container-fluid ">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Liên hệ</h6>
                <h1>Điền câu hỏi của bạn</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        @if (session('success'))
                        <div class="container alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div id="success"></div>
                        <form action="{{route('postcontact')}}"  method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input name="name" type="text" class="form-control p-4" id="name" placeholder="Tên"
                                        required="required" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input name="email" type="email" class="form-control p-4" id="email" placeholder="Email"
                                        required="required"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
    
                            <div class="control-group">
                                <textarea name="message" class="form-control py-3 px-4" rows="5" id="message" placeholder="Tin nhắn"
                                    required="required"
                                    ></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary py-3 px-4" type="submit">Gửi</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection