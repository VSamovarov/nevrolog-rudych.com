<template>
  <ModuleWrapper title="Изображение">
    <b-overlay variant="white" blur="0" :show="overlay" rounded="sm">
      <label :class="{deleted: deleted}" class="preview p-0 m-0 w-100 text-center btn btn-link">
        <img :src="preview" />
        <p v-if="!deleted" class="text-left d-block p-0 m-0">Изменить</p>
        <input v-if="!deleted" class="d-none" type="file" size="sm" @change="fileChange" />
      </label>
      <template v-if="preview">
        <hr />
        <b-check @change="remove">Удалить</b-check>
      </template>
    </b-overlay>
  </ModuleWrapper>
</template>

<script>
import ModuleWrapper from "./../../Components/Common/ModuleWrapper";

export default {
  components: {
    ModuleWrapper
  },
  props: ["src"],
  data() {
    return {
      moduleId: 'thumbnail-module',
      newFile: null,
      overlay: false,
      deleted: false
    }
  },
  computed: {
    preview() {
      return (this.newFile && this.newFile.url) || this.src
    },
  },
  methods: {
    async fileChange(e) {
      const routeUploadFiles = this.$route("admin.api.tmp-files-upload");
      if(!e.target.files[0] || this.deleted) {
        return false;
      } else {
        this.newFile  = {url: URL.createObjectURL(e.target.files[0])};
      }
      this.overlay = true;
      let formData = new FormData();

      formData.append("files[0]", e.target.files[0]);

      try {
        const {data} = await axios.post(routeUploadFiles, formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        });
        this.newFile = { name: data[0]['original_name'], path: data[0]['path'], url: data[0]['url'] };

        //Отправляем данные вверх
        this.$emit('updateDataModules', { key: this.moduleId, data: this.newFile })
        this.$emit('updateAlerts', { key: this.moduleId, data: null })
      } catch(e) {
        this.newFile = null;
        const {data} = e.response;
        this.$emit('updateAlerts', { key: this.moduleId, data:{type: 'error', messages: e.response.data.error['files.0']} })
      } finally {
        this.overlay = false;
      }
    },
    remove(value) {
      this.deleted = value;
      if(this.deleted) {
        this.$emit('updateDataModules', { key: this.moduleId, data: 'deleted' });
      } else if (this.newFile && this.newFile.path) {
        this.$emit('updateDataModules', { key: this.moduleId, data: this.newFile });
      } else {
        this.$emit('updateDataModules', { key: this.moduleId, data: null })
      }
    }
  },
}
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
