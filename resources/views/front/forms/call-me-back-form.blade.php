  <form class="feed-back-form" data-form-type="ajax" data-form-name="call-me-back">
    <h2>@lang('feedback.callback_text')</h2>
    <div class="form-group">
      <label>@lang('feedback.name')*
        <input type="text" name="name" class="form-control">
      </label>
    </div>
    <div class="form-group">
      <label>@lang('feedback.phone')*
        <input type="tel" name="phone" class="form-control"  placeholder="+38(000)000-00-00">
      </label>
    </div>
    <div class="form-group">
      <label>@lang('feedback.message')
        <textarea name="message" class="form-control" rows="3"></textarea>
      </label>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">@lang('feedback.send')</button>
    </div>
  </form>
