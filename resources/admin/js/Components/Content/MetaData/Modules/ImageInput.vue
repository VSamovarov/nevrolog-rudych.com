<template>
  <b-overlay variant="white" blur="0" :show="overlay" rounded="sm">
    <label
      :class="{ deleted: deleted }"
      class="p-0 m-0 text-center preview w-100 btn btn-link"
    >
      <img :src="preview" />
      <p v-if="!deleted" class="p-0 m-0 text-left d-block">Изменить</p>
      <input
        v-if="!deleted"
        class="d-none"
        type="file"
        size="sm"
        @change="upload"
      />
    </label>
    <template v-if="preview">
      <hr />
      <b-check @change="remove">Удалить</b-check>
    </template>
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
  name: "ImageInput",
  props: ["moduleData"],
  data() {
    return {
      newfile: {
        pach: "",
        url: "",
        name: ""
      },
      deleted: false,
      route: this.$route("admin.api.tmp-files-upload"),
      overlay: false,
      deleted: false
    };
  },
  computed: {
    preview() {
      return this.newfile.url || (this.moduleData && this.moduleData.src) || null;
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
        this.$emit(`changeData`, { newfile: this.newfile });
      } catch (e) {
        throw e;
      }
    },
    remove(e) {
      this.deleted = e;
      this.$emit(`changeData`, { delete: this.deleted });
    }
  }
};
</script>

<style>
.preview img {
  max-width: 100%;
  height: auto;
}
.preview.deleted {
  opacity: 0.25;
}
</style>
