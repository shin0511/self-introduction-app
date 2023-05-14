<div class="modal fade" id="editPostModal{{ $post->id }}" tabindex="-1" aria-labelledby="editPostModalLabel{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPostModalLabel{{ $post->id }}">Snslinkの編集</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <form action="{{ route('introduction.posts.update', [$introduction, $post]) }}" method="post">
                @csrf
                @method('patch')  
                <div class="modal-body">
                    <lavel>{{ $post->title }}</lavel>
                    <lavel>title</lavel>
                    <input type="text" class="form-control" name="title">           
                    <lavel>caption</lavel>
                    <input type="text" class="form-control" name="caption">                                   
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">更新</button>
                </div>
            </form>
        </div>
    </div>
</div>