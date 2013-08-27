@section('commands')
  <div class='commands'>
    <a href='{{ $url_create }}'>
      <div class='create icon'>
        <i class='icon-file-text-alt'></i>
        <p>new?</p>
      </div>
    </a>
    <a href='{{ $url_copy }}'>
      <div class='copy icon'>
        <i class='icon-copy'></i>
        <p>copy?</p>
      </div>
    </a>
    <a href='{{ $url_edit }}'>
      <div class='edit icon'>
        <i class='icon-edit'></i>
        <p>edit?</p>
      </div>
    </a>
    {{ Form::open(array('url' => $url_destroy, 'method' => 'delete')) }} 
    <button type='submit'>
      <div class='delete icon'>
        <i class='icon-trash'></i>
        <p>delete?</p>
      </div>
    </button>
    {{ Form::close() }}
    {{ Form::open(array('url' => $url_update, 'id' => 'update', 'method' => 'put')) }} 
    <button type='submit'>
      <div class='save icon'>
        <i class='icon-save'></i>
        <p>save?</p>
      </div>
    </button>
    {{ Form::close() }}
    <a href='{{ $url_edit }}'>
      <div class='cancel icon'>
        <i class='icon-ban-circle'></i>
        <p>cancel?</p>
      </div>
    </a>
  </div>
@stop
