<template>
  <div class="menu-item">
    <div
      class="menu-item__header d-flex justify-content-between align-items-center"
    >
      <div
        @click="visible = !visible"
        class="d-flex justify-content-between align-items-center"
      >
        <b-icon v-if="!visible" icon="chevron-down"></b-icon>
        <b-icon v-if="visible" icon="chevron-up"></b-icon>
        {{ (item.title && item.title[locale]) || item.slug }}
        <span
          class="text-secondary"
          :style="{
            textOverflow: 'ellipsis',
            overflow: 'hidden',
            maxWidth: '50%'
          }"
        >
          {{ item.url }}
        </span>
      </div>
      <div v-if="actions" class="dropdown dropleft" v-click-outside="hide">
        <button
          class="btn btn-sm btn-light"
          type="button"
          @click="openActions = !openActions"
        >
          <b-icon icon="gear"></b-icon>
        </button>
        <div class="dropdown-menu" v-if="openActions">
          <template v-for="(action, actionKey) in actions">
            <button
              :key="actionKey"
              class="dropdown-item"
              @click="action.callback"
              v-if="typeof action.callback === 'function'"
            >
              {{ action.name }}
            </button>
          </template>
        </div>
      </div>
    </div>
    <div v-show="visible">
      <slot></slot>
    </div>
  </div>
</template>

<script>
import ClickOutside from "vue-click-outside";
export default {
  name: "menu-item",
  props: {
    item: Object,
    locales: Object,
    locale: String,
    actions: Array | null
  },
  data() {
    return {
      visible: true,
      openActions: false
    };
  },
  methods: {
    hide() {
      this.openActions = false;
    }
  },
  directives: {
    ClickOutside
  }
};
</script>

<style scoped>
.dropdown-menu {
  display: block;
}
</style>
