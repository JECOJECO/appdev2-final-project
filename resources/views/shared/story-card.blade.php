<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="{{ $story->user->getImageURL() }}"
                alt="{{ $story->user->name }}" class="me-1 avatar-sm rounded-circle mx-auto" style="width: 35px;">
                <div class="ml-3">
                    <h5 class="card-title mb-0">
                        <a href="{{ route('users.show', $story->user->id) }}">{{ $story->user->name }}</a>
                    </h5>
                </div>
            </div>
            <div class="d-flex">
                <a href="{{ route('submit.show', $story->id) }}" style="text-decoration:none"> View </a>
                @auth()
                    @if (Auth::id() === $story->user_id)
                        <a class="mx-3 small" style="text-decoration:none" href="{{ route('submit.edit', $story->id) }}"> Edit </a>
                        <form method="POST" action="{{ route('submit.destroy', $story->id) }}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm ms-2"> X </button>
                        </form>
                    @endif
                @endauth
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