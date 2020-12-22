@foreach ($modules as $module)
  {{-- @dump(Str::kebab($module->_name)) --}}

  @if(View::exists("front.modules.metadata." . Str::kebab($module->_name)))
    @include("front.modules.metadata." . Str::kebab($module->_name), ['data'=>$module->_value, 'add_data'=>$module->add_data])
  @endif

@endforeach
