@foreach($popularPosts as $post)
    <x-blog.side :post="$post" />
@endforeach
