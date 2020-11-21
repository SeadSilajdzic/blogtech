<div>
    <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        @foreach($categories_left as $category_left)
                            <li><a href="#">{{ $category_left->category }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        @foreach($categories_right as $category_right)
                            <li><a href="#">{{ $category_right->category }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
