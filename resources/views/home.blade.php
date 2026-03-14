@extends ('layouts.app')

@section ('title', __('Welcome'))

@section ('content')
    <div class="mx-auto max-w-7xl p-4 lg:p-6">
        <div class="divider">{{ __('Blog') }}</div>

        @if (count($posts) > 0)
            <!-- Hero -->
            <div
                class="hero mb-6 min-h-96"
                style="
                    background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);
                "
            >
                <div class="hero-overlay"></div>
                <div class="hero-content text-neutral-content text-center">
                    <div class="max-w-md">
                        <h1 class="mb-5 text-5xl font-bold">{{ $posts->first()->title }}</h1>
                        <p class="mb-5">{{ $posts->first()->contentPreview }}</p>
                        <button class="btn btn-primary">{{ __('Continue reading') }}</button>
                    </div>
                </div>
            </div>
            <!-- Grid -->
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    @continue ($loop->first)
                    <div class="card bg-base-100 shadow-sm">
                        <figure>
                            <img
                                src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                                alt="Shoes"
                            />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p>{{ $post->contentPreview }}</p>
                            <div class="card-actions justify-end">
                                <span class="badge badge-outline">{{ $post->category->name }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="hero bg-base-200 min-h-96">
                <div class="hero-content text-center">
                    <div class="max-w-md">
                        <h1 class="text-5xl font-bold">{{ __('No posts found') }}</h1>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
