<div class="s content">
    <div class="s__header">
        @lang('feedback.callback_title')
    </div>
    <div class="s__body">
        <div id="callback">
            <form method="POST" action="{{ route('ajax.callback') }}" class="form">
                @csrf
                <div class="form__row">
                    <label>
                        <div class="form__row-name">@lang('feedback.name')</div>
                        <input
                            type="text"
                            name="usname"
                            value="{{ old('usname') }}"
                            class="@error('usname') is-invalid @enderror"
                            required="required"
                        >
                        @error('usname')
                            <span class="form__invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
                </div>
                <div class="form__row">
                    <label>
                        <div class="form__row-name">@lang('feedback.telephone')</div>
                        <input
                            type="tel"
                            pattern="[0-9./()\s+-]+"
                            name="tel"
                            value="{{ old('tel') }}"
                            required="required"
                            class="@error('tel') is-invalid @enderror"
                            value-unmasked=""
                            placeholder="+38(000)000-00-00"
                        >
                        @error('tel')
                            <span class="form__invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </label>
                </div>
                <div class="ta-center">
                    <button type="submit" name="send" class="btn-primary btn">@lang('feedback.send')</button>
                </div>
            </form>
        </div>
    </div>
</div>


