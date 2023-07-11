<div class="mt-4">
    @foreach($popularPosts as $post)
        <x-posts.side :post="$post" />
    @endforeach
</div>
