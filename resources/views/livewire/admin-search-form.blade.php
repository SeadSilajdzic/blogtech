<div>
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input style="position: relative;" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" wire:model="query">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    @if(!empty($query))
        <div style="position:absolute; left: 0; width: 400px;">
            @if(!empty($posts || $users || $categories))
                <ul>
                    @foreach($posts as $post)
                        <li class="list-group-item d-flex justify-content-between"><a target="_blank" href="{{ route('post.show', $post['slug']) }}">{{ $post['title'] }}</a> <strong>Post</strong></li>
                    @endforeach

                    @foreach($users as $user)
                        <li class="list-group-item d-flex justify-content-between"><a target="_blank" href="{{ route('user.show', $user['id']) }}">{{ $user['name'] }}</a> <strong>User</strong></li>
                    @endforeach

                    @foreach($categories as $category)
                        <li class="list-group-item d-flex justify-content-between"><a target="_blank" href="{{ route('category.index', $category['slug']) }}">{{ $category['category'] }}</a> <strong>Category</strong></li>
                    @endforeach
                </ul>
            @else
                <div class="list-group-item">No results</div>
            @endif
        </div>
    @endif
</div>
