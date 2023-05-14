<div class="modal fade" id="addPostModal{{ $introduction->id }}" tabindex="-1" aria-labelledby="addPostModalLabel{{ $introduction->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPostModalLabel{{ $introduction->id }}">SNSリンクの追加</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
      <form action="{{ route('introduction.posts.store', $introduction) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          
        </div>
        <div class="modal-body">
          <lavel>title</lavel>
          <input type="text" class="form-control" name="title">           
          <lavel>caption</lavel>
          <input type="text" class="form-control" name="caption">
          <lavel>category</lavel>
          <select type="text" class="form-control" name="category">  
            <option value="music" name="snsname">音楽</option>
            <option value="illustration" name="snsname">イラスト</option>
            <option value="animation" name="snsname">動画・アニメ</option>
            <option value="photo" name="snsname">写真</option>
            <option value="novel" name="snsname">ノベル</option>
          </select>                               
          <lavel>作品のファイル</lavel>
          <input type="file" name="works" accept="works/*"> 
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">登録</button>
        </div>
      </form>
    </div>
  </div>
</div>
