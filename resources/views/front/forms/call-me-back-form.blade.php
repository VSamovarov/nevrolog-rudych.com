  <form class="feed-back-form" id="call-me-back-form" data-action="" data-form-name="feedback-form">
    <div class="form-group">
      <label>@lang('feedback.name')*
        <input type="text" name="name" class="form-control">
      </label>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label>@lang('feedback.phone')*
          <input type="tel" name="phone" class="form-control"  placeholder="+38(000)000-00-00">
        </label>
      </div>
    <div class="form-group">
      <label>@lang('feedback.message')
        <textarea name="message" class="form-control" rows="3"></textarea>
      </label>
    </div>
    <button class="btn btn-primary">@lang('feedback.send')</button>
  </form>
