<template>
  <b-overlay variant="white" blur="0" :show="overlay" rounded="sm">
    <p v-if="title" class="text-black-50 small">{{ title }}</p>

    <label
      :class="{ deleted: deleted }"
      class="p-0 m-0 text-center preview w-100 btn btn-link"
    >
      <img :src="(module && module.content && module.content.src) || null" />
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

    <b-check
      v-if="module && module.content && module.content.src"
      @change="remove"
      >Удалить</b-check
    >
  </b-overlay>
</template>

<script>
import SectionTitle from "./SectionTitle";
export default {
  props: {
    module: Object,
    locales: Object,
    post: Object,
    title: {
      type: String | null,
      default: "Картинка"
    }
  },
  components: { SectionTitle },
  data() {
    return {
      type: "image-input",
      route: this.$route("admin.api.post.add-image", this.post.id),
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

        //Отправляем данные вверх
        const module = {
          ...this.module,
          ...{
            type: this.type,
            content: { ...(this.module.content | {}), src: data }
          }
        };
        this.$emit(`changeModule`, module);
      } catch (e) {
        throw e;
      } finally {
        this.overlay = false;
      }
    },
    remove(e) {
      this.deleted = e;
      //Отправляем данные вверх
      const module = {
        ...this.module,
        ...{
          type: this.type,
          content: { ...(this.module.content | {}), delete: this.deleted }
        }
      };
      this.$emit(`changeModule`, {
        ...module,
        module
      });
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
