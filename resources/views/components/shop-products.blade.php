<div>
    <div class="row">
        @foreach($products as $product)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="#"><img style="width: 100%; height: 10em;" class="card-img-top" src="{{ $product->image }}" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#" style="font-size: .8em;">{{ $product->title }}</a>
                        </h4>
                        <h5>${{ $product->price }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
