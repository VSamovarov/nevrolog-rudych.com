  <form class="feed-back-form" data-form-type="ajax" data-form-name="feedback">
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
      <div class="col-md-6 mb-3">
        <label>@lang('feedback.email')
          <input type="email" name="email" class="form-control">
        </label>
      </div>
    </div>
    <div class="form-group">
      <label>@lang('feedback.message')
        <textarea name="message" class="form-control" rows="3"></textarea>
      </label>
    </div>
    <button class="btn btn-primary">@lang('feedback.send')</button>
  </form>
