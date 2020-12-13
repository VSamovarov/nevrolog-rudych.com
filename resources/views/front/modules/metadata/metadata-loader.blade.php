@foreach ($modules as $module)
  @if(View::exists("front.modules.metadata." . Str::kebab($module->_name)))
    @include("front.modules.metadata." . Str::kebab($module->_name), ['data'=>$module->_value])
  @endif

@endforeach
