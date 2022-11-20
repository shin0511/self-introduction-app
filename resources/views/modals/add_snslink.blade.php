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
          <select type="text" class="form-control" name="snsname">  
            <option value="Twitter" name="snsname">Twitter</option>
            <option value="youtube" name="snsname">youtube</option>
            <option value="Instargram" name="snsname">Instargram</option>
            <option value="facebook" name="snsname">facebook</option>
            <option value="TikTok" name="snsname">TikTok</option>
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
