<div class="s content">
    <div class="s__header">
        @lang('feedback.title')
    </div>
    <div class="s__body">
        <div id="form-feedback">
            <form method="POST" action="{{ route('ajax.feedback') }}" class="form">
                @csrf
                <div class="form__row">
                    <label>
                        <div class="form__row-name">@lang('feedback.name')</div>
                        <input
                            type="text"
                            name="usname"
                            value="{{ old('usname') }}"
                            required="required"
                            class="@error('usname') is-invalid @enderror"
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
                <div class="form__row">
                    <label>
                        <div class="form__row-name">@lang('feedback.email')</div>
                        <input
                            type="email"
                            pattern="^.+@.+$"
                            required="required"
                            name="email"
                            value=""
                            class="@error('email') is-invalid @enderror"
                        >
                    </label>
                    @error('email')
                        <span class="form__invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form__row">
                    <label>
                        <div class="form__row-name">@lang('feedback.message')</div>
                        <textarea name="message" class="">{{ old('message') }}</textarea>
                    </label>
                </div>
                <div class="ta-center">
                    <button type="submit" name="send" class="btn-primary btn">@lang('feedback.send')</button>
                </div>
            </form>
        </div>
    </div>
</div>


