<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="https://media.discordapp.net/attachments/1063455048778121266/1246824193996226670/Kafka_3.png?ex=665dcb04&is=665c7984&hm=efa8ca890a81e8fc15bebabdd60a3a919446a2705adeb32bd5019487c9193c58&=&format=webp&quality=lossless&width=349&height=349" alt="dp" class="me-1 avatar-sm rounded-circle mx-auto" style="width: 35px;">
                <div class="ml-3">
                    <h5 class="card-title mb-0">
                        <a href="#">{{ $story->user->name }}</a>
                    </h5>
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('submit.destroy', $story->id) }}">
                    @csrf
                    @method('delete')
                    <a class="mx-3 small" style="text-decoration:none" href="{{ route('submit.edit', $story->id) }}"> Edit </a>
                    <a class="small" style="text-decoration:none" href="{{ route('submit.show', $story->id) }}"> View </a>
                    <button class="btn btn-danger btn-sm ms-2"> X </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('submit.update', $story->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" id="content" class="form-control" rows="3">{{ $story->content }}</textarea>
                    @error('content')
                        <span class="d-block fs-6 text-danger mt-3">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btm-dark mb-2 btn-sm"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $story->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6">
                    {{ $story->likes }}
                </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted">
                    <span class="fas fa-clock">
                        {{ $story->created_at }}
                    </span>
                </span>
            </div>
        </div>
        @include('shared.comments-box')
    </div>
</div>