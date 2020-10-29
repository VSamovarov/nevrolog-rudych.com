<template>
  <b-navbar toggleable="lg" type="dark" variant="dark">
    <b-navbar-brand href="#">Nevrolog-Rudych</b-navbar-brand>
    <b-navbar-toggle target="main-menu-collapse"></b-navbar-toggle>
    <b-collapse id="main-menu-collapse" is-nav>
      <!-- <b-navbar-nav>
        <MainMenuItem
          v-for="(item, i) of items"
          :href="`/` + item.href"
          :title="item.title"
          :key="i"
        />
      </b-navbar-nav> -->

      <b-navbar-nav class="ml-auto">
        <b-nav-item-dropdown text="User" right>
          <b-dropdown-item href="#">Account</b-dropdown-item>
          <b-dropdown-item href="#">Settings</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>>

<script>
import MainMenuItem from "./MainMenuItem";
export default {
  props: ["items"],
  components: {
    MainMenuItem,
  },
};
</script>

<style>
.navbar-brand {
  min-width: 13rem;
  text-align: center;
}
.header .navbar {
  padding-top: 0;
  padding-bottom: 0;
}
.header .nuxt-link-exact-active,
.header .nuxt-link-active {
  background: var(--white) !important;
  color: var(--dark) !important;
}
</style>
