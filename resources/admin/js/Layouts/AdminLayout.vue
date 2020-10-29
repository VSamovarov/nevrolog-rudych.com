<template>
  <div id="page-wrapper">
    <Header id="header"></Header>
    <div id="body" class="d-flex">
      <LeftColumn :sidebar_menu="$page.adminSidebarMenu"></LeftColumn>
      <div class="main-content">
        <Alerts></Alerts>
        <slot></slot>
      </div>
    </div>
    <Footer id="footer"></Footer>
  </div>
</template>
<script>
import Header from "./../Components/Header/Header";
import Footer from "./../Components/Footer/Footer";
import LeftColumn from "./../Components/LeftColumn/LeftColumn";
import Alerts from './../Components/Common/Alerts'
export default {
  components: { Header, Footer, LeftColumn, Alerts },

};
</script>
<style>
html {
  min-width: 1024px;
}
html,
body,
#__nuxt,
#__layout,
#app,
#page-wrapper {
  height: 100%;
}
#page-wrapper {
  display: flex;
  flex-direction: column;
  box-sizing: border-box;
}
#body {
  box-sizing: border-box;
  flex: 1 0 auto;
}
#footer {
  box-sizing: border-box;
  flex: 0 0 auto;
}
#body > .main-content {
  width: 100%;
}
</style>
