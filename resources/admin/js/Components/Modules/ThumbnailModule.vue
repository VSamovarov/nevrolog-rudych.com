<template>
  <ModuleWrapper title="Изображение">
    <div class="preview">
      <img v-if="url" :src="url" />
    </div>
    <input type="file" @change="onFileChange" />
  </ModuleWrapper>
</template>

<script>
import ModuleWrapper from "./../../Components/Common/ModuleWrapper";

export default {
  components: {
    ModuleWrapper,
  },
  data() {
    return {
      url: null,
    }
  },
  methods: {
    onFileChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    }
  }
}
</script>

<style scoped>
.preview img {
  max-width: 100%;
  height: auto;
}
</style>
