<template>
  <b-overlay variant="white" blur="0" :show="overlay" rounded="sm">
    <Alerts :alerts="alerts"></Alerts>
    <p v-if="title" class="text-black-50 small">{{ title }}</p>
    <label
      :class="{ deleted: deleted }"
      class="p-0 m-0 text-center preview w-100 btn btn-link"
    >
      <img :src="getValue('src')" />
      <p v-if="!deleted" class="p-0 m-0 text-left d-block change-image">
        Изменить
      </p>
      <input
        v-if="!deleted"
        class="d-none"
        type="file"
        size="sm"
        @change="upload"
      />
    </label>

    <b-check v-if="getValue('src')" @change="remove">Удалить</b-check>
  </b-overlay>
</template>

<script>
import SectionTitle from "./SectionTitle";
import Alerts from "./../../../Common/Alerts";
export default {
  props: {
    module: Object | null,
    locales: Object,
    post: Object,
    title: {
      type: String | null,
      default: "Картинка"
    }
  },
  components: { SectionTitle, Alerts },
  data() {
    return {
      route: this.$route("admin.api.post.add-image", this.post.id),
      alerts: {},
      deleted: false,
      overlay: false,
      deleted: false
    };
  },
  methods: {
    async upload(e) {
      this.overlay = true;
      const file = e.target.files[0] || false;
      if (!file || this.deleted) return false;
      const formData = new FormData();
      formData.append("image", file);
      try {
        const { data } = await axios.post(this.route, formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        });
        this.changeModule("src", data);
        this.alerts = {};
      } catch (e) {
        this.$set(this.alerts, "image", e.response);
      } finally {
        this.overlay = false;
      }
    },
    remove(e) {
      this.deleted = e;
      //Отправляем данные вверх
      this.changeModule("delete", this.deleted);
    },
    /**
     * Общая часть
     */
    /**
     * Общая часть
     */
    getValue(name) {
      const value =
        (this.module && this.module._value && this.module._value[name]) || null;
      return value;
    },

    getModule(name) {
      if (this.module._value === undefined) {
        this.$set(this.module, "_value", {});
      }
      if (this.module._value[name] === undefined) {
        this.$set(this.module._value, name, {});
      }
      return this.module._value[name];
    },

    changeModule(name, value) {
      if (this.module._value === undefined) {
        this.$set(this.module, "_value", {});
      }
      this.$set(this.module._value, name, value);
      this.$emit(`changeModule`, module);
    }
  }
};
</script>

<style>
.preview {
  position: relative;
}
.preview .change-image {
  position: absolute;
  top: 4px;
  left: 4px;
}
.preview img {
  max-width: 100%;
  height: auto;
}
.preview.deleted {
  opacity: 0.25;
}
</style>
