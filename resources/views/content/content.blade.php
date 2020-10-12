@extends('main.main')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
        <h2>Best Sellers</h2>
    </div>
</div>
<div class="row row-pb-md">
    @foreach($produk_hero as $key => $value)
        <div class="col-lg-3 mb-4 text-center">
        <div class="product-entry border">
            <a href="#" class="prod-img">
                <img src="{{ $value['image_url'] }}" class="img-fluid" alt="Free html5 bootstrap 4 template">
            </a>
            <div class="desc">
                <h2><a href="#">{{ $value['name'] }}</a></h2>
                <span class="price">Rp. {{ number_format($value['price'],0,',','.') }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- <div class="row">
    <div class="col-md-12 text-center">
        <p><a href="#" class="btn btn-primary btn-lg">Shop All Products</a></p>
    </div>
</div> -->
<div class="row">
    <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
        <h2>All Ready Stock Products</h2>
    </div>
</div>
<div class="row row-pb-md">
    @foreach($ready_stock as $key => $value)
        <div class="col-lg-3 mb-4 text-center">
        <div class="product-entry border">
            <a href="#" class="prod-img">
                <img src="{{ $value['image_url'] }}" class="img-fluid" alt="Free html5 bootstrap 4 template">
            </a>
            <div class="desc">
                <h2><a href="#">{{ $value['name'] }}</a></h2>
                <span class="price">Rp. {{ number_format($value['price'],0,',','.') }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection