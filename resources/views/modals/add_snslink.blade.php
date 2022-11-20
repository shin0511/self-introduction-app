<div class="modal fade" id="addSnslinkModal{{ $introduction->id }}" tabindex="-1" aria-labelledby="addSnslinkModalLabel{{ $introduction->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSnslinkModalLabel{{ $introduction->id }}">SNSリンクの追加</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
      </div>
      <form action="{{ route('introduction.snslinks.store', $introduction) }}" method="post">
        @csrf
        <div class="modal-body">
          <lavel>追加するSNSリンク</lavel>
          <select class="form-control" name="snsname">  
            <option value="Twitter">Twitter</option>
            <option value="youtube">youtube</option>
            <option value="Instargram">Instargram</option>
            <option value="facebook">facebook</option>
            <option value="TikTok">TikTok</option>
          </select>
        </div>
        <div class="modal-body">
          <lavel>URL</lavel>
          <input type="url" class="form-control" name="sns_link">                                    
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">登録</button>
        </div>
      </form>
    </div>
  </div>
</div>
