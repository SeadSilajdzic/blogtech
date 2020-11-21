<div>
    <h1 class="my-4">Shopify</h1>
    <div class="list-group">
        @foreach($categories as $category)
            <a href="#" class="list-group-item">{{ $category->product_category }}</a>
        @endforeach
    </div>
</div>
