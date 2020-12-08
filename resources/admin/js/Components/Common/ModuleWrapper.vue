<template>
  <div class="card my-2">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
        <span class="block-arrows-move">
          <b-icon icon="arrows-move"></b-icon>
        </span>
        <div @click="visible = !visible">
          <b-icon v-if="!visible" icon="chevron-down"></b-icon>
          <b-icon v-if="visible" icon="chevron-up"></b-icon>
          {{ title }}
        </div>
      </div>
      <div
        v-click-outside="hide"
        class="dropdown dropleft"
        v-if="renameModule || deleteModule"
      >
        <button
          class="btn btn-sm btn-light"
          type="button"
          @click="openActions = !openActions"
        >
          <b-icon icon="gear"></b-icon>
        </button>
        <div class="dropdown-menu" v-if="openActions">
          <button
            class="dropdown-item"
            @click="renameModule"
            v-if="typeof renameModule === 'function'"
          >
            Переименовать модуль
          </button>
          <button
            class="dropdown-item"
            @click="deleteModule"
            v-if="typeof deleteModule === 'function'"
          >
            Удалить модуль
          </button>
        </div>
      </div>
    </div>
    <div v-show="visible" class="card-body">
      <slot></slot>
    </div>
  </div>
</template>

<script>
import ClickOutside from "vue-click-outside";
export default {
  props: {
    title: {
      type: String,
      default: null
    },
    renameModule: {
      type: Function,
      default: null
    },
    deleteModule: {
      type: Function,
      default: null
    }
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
.card-header {
  padding: 0rem 0.75rem 0 1.25rem;
  min-height: 2.5rem;
}

.block-arrows-move {
  display: none;
  padding: 0 0.75rem;
  margin-left: -1.25rem;
}
.movable .block-arrows-move {
  display: block;
}
.dropdown-menu {
  display: block;
}
</style>
