
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-3/assets/css/login-3.css">
</head>
<body>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('dashboard') }}">Home</a>
          <form class="d-flex" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-outline-dark" type="submit">Log Out</button>
          </form>
        </div>
      </nav>
    <div class="container mt-5">
        <h2>Update Post</h2>
        <form action="{{ route('posts.update',$post_id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <label for="postTitle" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="postTitle" value="{{ $post->title }}" placeholder="Enter post title" required>
            </div>
            <div class="mb-3">
                <label for="postDescription" class="form-label">Description</label>
                <textarea class="form-control" id="postDescription" rows="5" name="description" placeholder="Enter post description" required>{{ $post->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
