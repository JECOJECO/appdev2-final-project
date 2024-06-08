<div>
    <form action="{{ route('submit.comments.store', $story->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fx-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    <hr>
    @foreach ($story->comments as $comment )
        <div class="d-flex align-items-start">
            <img src="{{ $comment->user->getImageURL() }}" alt="{{ $comment->user->name }}" class="me-1 avatar-sm rounded-circle mx-auto" style="width: 35px;">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6> {{ $comment->user->name }} </h6>
                    <small class="fs-6 fw-light text-muted">{{ $comment->created_at }}</small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
    @endforeach
</div>