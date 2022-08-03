<!-- Booking Start -->
<div class="container-fluid booking mt-5 pb-5">
    <div class="container pb-5">
        <div class="bg-light shadow" style="padding: 30px;">
            <form action="{{route('loc')}}" method="GET">
            <div class="row align-items-center" style="min-height: 60px;">
                
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3 mb-md-0">
                                <select name="country_id" class="custom-select px-4" style="height: 47px;">
                                    <option selected>Chọn địa điểm</option>
                                    @foreach ($all_country as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                    
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3 mb-md-0">
                                <div class="date" >
                                    <input name="day" id="date_start" type="text" class="form-control p-4 datetimepicker-input" placeholder="Chọn ngày">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3 mb-md-0">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input id="alternate" type="text" class="form-control p-4 datetimepicker-input"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3 mb-md-0">
                                <select name="khuyenmai" class="custom-select px-4" style="height: 47px;">
                                    <option selected>Khuyến Mãi</option>
                                    <option value="1">Có</option>
                                    <option value="2">Không</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;">Submit</button>
                </div>
                
            </div>
            </form>
        </div>
    </div>
</div>
@if (session('error'))
                        <div class="container alert alert-success" role="alert">
                            {{ session('error') }}
                        </div>
    @endif
<!-- Booking End -->
