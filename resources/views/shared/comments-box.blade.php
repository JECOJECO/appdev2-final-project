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
            <img src="https://media.discordapp.net/attachments/1063455048778121266/1246824193996226670/Kafka_3.png?ex=665dcb04&is=665c7984&hm=efa8ca890a81e8fc15bebabdd60a3a919446a2705adeb32bd5019487c9193c58&=&format=webp&quality=lossless&width=349&height=349" alt="{{ $comment->user->name }}" class="me-1 avatar-sm rounded-circle mx-auto" style="width: 35px;">
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