<div class="card single_post mt-3">
    <div class="body">
        <div class="img-post">
            <img class="d-block img-fluid" src="https://www.bootdey.com/image/800x280/FFB6C1/000000" alt="">
        </div>
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->description }}</p>
    </div>
    <div class="footer">
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
        </form>
        <ul class="stats">
            <li><a href="javascript:void(0);">General</a></li>
            <li><a href="javascript:void(0);" class="fa fa-heart">28</a></li>
            <li><a href="javascript:void(0);" class="fa fa-comment">128</a></li>
        </ul>
    </div>
</div>