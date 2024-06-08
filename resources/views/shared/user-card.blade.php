<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="https://media.discordapp.net/attachments/1063455048778121266/1246824193996226670/Kafka_3.png?ex=665dcb04&is=665c7984&hm=efa8ca890a81e8fc15bebabdd60a3a919446a2705adeb32bd5019487c9193c58&=&format=webp&quality=lossless&width=349&height=349" alt="Mario Avatar">
                <div>
                    @if ($editing ?? false)
                        <input value="{{ $user->name }}" type="text" class="form-control">
                    @else
                        <h3 class="card-title mb-0"><a href="#" style="text-decoration:none" >{{ $user->name }}</a></h3>
                        <span class="fs-6 text-muted">{{ $user->email }}</span>
                    @endif
                </div>
            </div>
            <div>
                @auth()
                    @if (Auth::id() === $user->id)
                        <a href="{{ route('users.edit', $user->id) }}" style="text-decoration:none">Edit</a>
                    @endif
                @endauth
            </div>
        </div>
        <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                @if ($editing ?? false)
                    <div class="mb-3">
                        <textarea name="bio" id="bio" class="form-control" rows="3"></textarea>
                        @error('bio')
                            <span class="d-block fs-6 text-danger mt-3">{{ $message }}</span>
                        @enderror
                    </div>

                    <button class="btn btn-dark btn-sm mb-3">Save</button>
                @else
                    <p class="fs-6 fw-light">
                        This book is a treatise on the theory of ethics, very popular during the
                        Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes
                        from a line in section 1.10.32.
                    </p>
                @endif
            
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 0 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ $user->story()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $user->comments()->count() }} </a>
            </div>

            @auth()
                @if (Auth::id() != $user->id)
                    <div class="mt-3">
                        <button class="btn btn-primary btn-sm"> Follow </button>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
<hr>