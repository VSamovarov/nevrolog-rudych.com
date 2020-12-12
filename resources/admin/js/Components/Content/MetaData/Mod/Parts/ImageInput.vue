<template>
  <b-overlay variant="white" blur="0" :show="overlay" rounded="sm">
    <Alerts :alerts="alerts"></Alerts>
    <label
      :class="{ deleted: deleted }"
      class="p-0 m-0 text-center preview w-100 btn btn-link"
    >
      <img :src="preview" />
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

    <b-check v-if="value.src" @change="remove">Удалить</b-check>
  </b-overlay>
</template>

<script>
import Alerts from "./../../../../Common/Alerts";

export default {
  props: {
    value: Object,
    locales: Object,
    post: Object
  },
  components: { Alerts },
  data() {
    return {
      route: this.$route("admin.api.post.add-image", this.post.id),
      alerts: {},
      deleted: false,
      overlay: false,
      preview: this.value.src || null
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
        //Отправляем данные вверх
        this.preview = data;
        this.$emit("input", { ...this.value, src: data });
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
      this.$emit("input", { ...this.value, delete: this.deleted });
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
