<div class="col-md-3 col-sidebar">
        <div class="mb-4">
            <h6 class="mb-4">Recent Posts</h6>
            @forelse($blog_posts as $post)
            <p class="border-bottom pb-2 mb-2"><a href="{{ route('post.viewitem', $post->slug) }}"><i class="fas fa-chevron-right"></i> {{ $post->title }}</a></p>
            @empty
            <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> {{ __('No Posts Avaiable') }}</a></p>
            @endforelse
        </div>
        <div class="mb-4">
            <h6 class="mb-4">Categories</h6>
            @forelse ($blog_categories as $cat)
            <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> {{ $cat->name }} [{{ $cat->category_has_total_posts() }}]</a></p>
            @empty
            <p><a href="#">{{ __('No Category available yet') }}</a></p>
            @endforelse
        </div>
</div>
