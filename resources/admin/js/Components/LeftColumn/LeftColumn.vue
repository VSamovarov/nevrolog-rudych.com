<template>
  <aside id="sidebar" class="sidebar" :class="{ hide: hiddenContent }">
    <div class="sticky-top">
      <b-button
        squared
        class="sidebar__button_toggle"
        @click="hiddenContent = !hiddenContent"
      >
        <b-icon icon="arrow-bar-right" v-if="hiddenContent"></b-icon>
        <b-icon icon="arrow-bar-left" v-else></b-icon>
      </b-button>
      <div class="sidebar__content">
        <SidebarMenu :menuData="sidebar_menu" />
      </div>
    </div>
  </aside>
</template>

<script>
import SidebarMenu from "./SidebarMenu/SidebarMenu";
export default {
  data() {
    return {
      hiddenContent: false,
    };
  },
  props: {
    sidebar_menu: {
      required: true,
    },
  },
  components: {
    SidebarMenu,
  },
};
</script>

<style>
.sidebar {
  background-color: var(--gray-dark);
  max-width: 15rem;
}
.sidebar .sidebar__content {
  margin-top: 1.5rem;
  min-width: 15rem;
  padding: 0 1rem 1rem;
}
.sidebar__button_toggle {
  width: 100%;
}
.sidebar.hide .sidebar__content {
  min-width: auto;
}
</style>
