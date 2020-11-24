@extends('front.layouts.empty')

@section('layout')
<script>

</script>
<style>
#app {
  position: fixed;
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 3rem;
}
#app .logo {
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}
#app .logo img {
  width: 150px;
  height: auto;
}
#app .title {
  font-weight: bold;
  color: #984c8a;
  color:white;
  margin-bottom: .8rem;
  line-height: 1.2;
}
#app .caption {
  color: #984c8a;
  color:white;
}
#app .message {
  /* font-weight: bold; */
  font-size: 1.3rem;
  line-height: 1.4;
  color:white;
}

#app {
    background: linear-gradient(98deg, #503a87, #984c8a);
    background-size: 800% 800%;

    -webkit-animation: AnimationName 30s ease infinite;
    -moz-animation: AnimationName 30s ease infinite;
    animation: AnimationName 30s ease infinite;
}

@-webkit-keyframes AnimationName {
    0%{background-position:0% 4%}
    50%{background-position:100% 97%}
    100%{background-position:0% 4%}
}
@-moz-keyframes AnimationName {
    0%{background-position:0% 4%}
    50%{background-position:100% 97%}
    100%{background-position:0% 4%}
}
@keyframes AnimationName {
    0%{background-position:0% 4%}
    50%{background-position:100% 97%}
    100%{background-position:0% 4%}
}
</style>
<div>


<div id="app">
  <div class="wrapper">
    <div class="text mb-4">
      <div class="title h1">Кабинет невролога</div>
      <div class="caption">Екатерина Рудич</div>
    </div>
    <div class="logo mb-5">
      <img src="{{ asset('img/logo-nejrologia.svg') }}" alt="кабинет невролога">
    </div>
    <div class="message mt-5">
      Сайт закрыт на&nbsp;техническое обслуживание
    </div>
  </div>
</div>
@endsection
