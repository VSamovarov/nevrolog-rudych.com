  <form>
    <div class="form-group">
      <label for="name">@lang('feedback.name')</label>
      <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label>@lang('feedback.phone')</label>
        <input type="tel" class="form-control" aria-describedby="emailHelp">
      </div>
      <div class="col-md-6 mb-3">
        <label for="email">@lang('email')</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
      </div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">@lang('email')</label>
      <textarea class="form-control" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
