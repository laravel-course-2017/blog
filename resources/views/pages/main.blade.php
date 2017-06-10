@forelse ($posts as $post)
    @include('parts.post')
@empty
    <p>Нет постов для отображения</p>
@endforelse
{{ $posts->links() }}