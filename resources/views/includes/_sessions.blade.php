{{--SUCCESS--}}
@if(session()->has('post_created'))
    <div class="alert alert-success" role="alert">
        <p><strong>Created</strong> {{ session()->get('post_created') }}</p>
    </div>
@endif

@if(session()->has('post_restored'))
    <div class="alert alert-info" role="alert">
        <p><strong>Restored</strong> {{ session()->get('post_restored') }}</p>
    </div>
@endif

@if(session()->has('category_created'))
    <div class="alert alert-info" role="alert">
        <p><strong>Created</strong> {{ session()->get('category_created') }}</p>
    </div>
@endif

@if(session()->has('product_category_created'))
    <div class="alert alert-info" role="alert">
        <p><strong>Created</strong> {{ session()->get('product_category_created') }}</p>
    </div>
@endif

@if(session()->has('product_created'))
    <div class="alert alert-info" role="alert">
        <p><strong>Created</strong> {{ session()->get('product_created') }}</p>
    </div>
@endif

{{--INFO--}}
@if(session()->has('post_updated'))
    <div class="alert alert-info" role="alert">
        <p><strong>Updated</strong> {{ session()->get('post_updated') }}</p>
    </div>
@endif

@if(session()->has('category_updated'))
    <div class="alert alert-info" role="alert">
        <p><strong>Updated</strong> {{ session()->get('category_updated') }}</p>
    </div>
@endif

@if(session()->has('product_category_updated'))
    <div class="alert alert-info" role="alert">
        <p><strong>Updated</strong> {{ session()->get('product_category_updated') }}</p>
    </div>
@endif

{{--WARNING--}}
@if(session()->has('no_posts'))
    <div class="alert alert-warning" role="alert">
        <p><strong>Warning</strong> {{ session()->get('no_posts') }}</p>
    </div>
@endif

@if(session()->has('no_categories'))
    <div class="alert alert-warning" role="alert">
        <p><strong>Warning</strong> {{ session()->get('no_categories') }}</p>
    </div>
@endif

@if(session()->has('post_trashed'))
    <div class="alert alert-warning" role="alert">
        <p><strong>Trashed</strong> {{ session()->get('post_trashed') }}</p>
    </div>
@endif

@if(session()->has('last_category_error'))
    <div class="alert alert-warning" role="alert">
        <p><strong>Last category warning</strong> {{ session()->get('last_category_error') }}</p>
    </div>
@endif

@if(session()->has('too_many_categories_error'))
    <div class="alert alert-warning" role="alert">
        <p><strong>Too many categories warning</strong> {{ session()->get('too_many_categories_error') }}</p>
    </div>
@endif

{{--DELETED--}}
@if(session()->has('post_deleted'))
    <div class="alert alert-danger" role="alert">
        <p><strong>Deleted</strong> {{ session()->get('post_deleted') }}</p>
    </div>
@endif

@if(session()->has('category_deleted'))
    <div class="alert alert-danger" role="alert">
        <p><strong>Deleted</strong> {{ session()->get('category_deleted') }}</p>
    </div>
@endif

@if(session()->has('product_category_deleted'))
    <div class="alert alert-danger" role="alert">
        <p><strong>Deleted</strong> {{ session()->get('product_category_deleted') }}</p>
    </div>
@endif
