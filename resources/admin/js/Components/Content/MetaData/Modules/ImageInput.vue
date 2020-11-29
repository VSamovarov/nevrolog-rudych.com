<template>
  <b-overlay variant="white" blur="0" :show="overlay" rounded="sm">
    <label
      :class="{ deleted: deleted }"
      class="p-0 m-0 text-center preview w-100 btn btn-link"
    >
      <img :src="preview" />
      <p v-if="!deleted" class="p-0 m-0 text-left d-block change-image">Изменить</p>
      <input
        v-if="!deleted"
        class="d-none"
        type="file"
        size="sm"
        @change="upload"
      />
    </label>

    <b-check v-if="preview !== null" @change="remove">Удалить</b-check>
  </b-overlay>
</template>

<script>
/**
 * image {
 *     src,
 *     width,
 *     height,
 * }
 */

export default {
  props: ["module"],
  data() {
    return {
      type: 'image-input',
      newfile: {
        pach: "",
        url: "",
        name: "",

      },
      deleted: false,
      route: this.$route("admin.api.tmp-files-upload"),
      overlay: false,
      deleted: false
    };
  },
  computed: {
    preview() {
      return this.newfile.url || ( this.module && this.module.content && this.module.content.src ) || null;
    }
  },
  methods: {
    async upload(e) {
      const file = e.target.files[0] || false;
      if (!file || this.deleted) return false;
      const formData = new FormData();
      formData.append("files[0]", file);
      try {
        const { data } = await axios.post(this.route, formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        });

        this.newfile = {
          name: data[0]["original_name"],
          path: data[0]["path"],
          url: data[0]["url"]
        };
        //Отправляем данные вверх

        const module = { ...this.module, type: this.type};
        module.content = {...module.content, newfile: this.newfile};
        this.$emit(`changeModule`, module);
      } catch (e) {
        throw e;
      }
    },
    remove(e) {
      this.deleted = e;
      const module = { ...this.module, type: this.type};
      module.content = {...module.content, delete: this.deleted };
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
  top:4px;
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
