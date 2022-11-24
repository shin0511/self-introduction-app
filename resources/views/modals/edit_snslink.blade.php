<div class="modal fade" id="editSnslinkModal{{ $snslink->id }}" tabindex="-1" aria-labelledby="editSnslinkModalLabel{{ $snslink->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSnslinkModalLabel{{ $snslink->id }}">Snslinkの編集</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <form action="{{ route('introduction.snslinks.update', [$introduction, $snslink]) }}" method="post">
                @csrf
                @method('patch')  
                <div class="modal-body">
                    <lavel>{{ $snslink->snsname }}</lavel>
                    <input type="text" class="form-control" name="sns_link" value="{{ $snslink->sns_link }}">                                         
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">更新</button>
                </div>
            </form>
        </div>
    </div>
</div>