@auth()
<h4>Share you Story</h4>
<div class="row">
    <form action="{{ route('submit.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content" id="content" class="form-control" rows="3" placeholder="type here"></textarea>
            @error('content')
                <span class="d-block fs-6 text-danger mt-3">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btm-dark">Share</button>
        </div>
    </form>
</div>
@endauth
@guest()
    <h4>Login to share your story</h4>
@endguest