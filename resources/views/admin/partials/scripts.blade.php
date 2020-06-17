@php
use App\Models\Script;
$scripts = Script::get();
@endphp
<script type="text/javascript" src="{{url('architectui/assets/scripts/main.d810cf0ae7f39f28f336.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

@foreach($scripts as $script)
{!!$script->code!!}
@endforeach

