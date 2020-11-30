<template>
  <div class="container">
    <div class="row" :class="{'flex-row-reverse':reverse}">
      <div class="col-md-4">
        <h5>Картинка</h5>
        <ImageInput
          :module="(module && module.image) || null"
          @changeModule="changeModule({image:$event})"
        ></ImageInput>
      </div>
      <div class="col-md-8">
        <h5>Teкст</h5>
        <MultilingualInput
          :content="(module && module.text) || null"
          :locales="locales"
          @changeModule="changeModule({text:$event})"
          ></MultilingualInput>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h5>Настройки</h5>
        алалал
      </div>
    </div>
  </div>
</template>

<script>
import ImageInput from "../Modules/ImageInput";
import MultilingualInput from "../Modules/MultilingualInput";

export default {
  data() {
    return {
      type: 'image-and-text-two-rows',
      reverse: false,
    }
  },
  components: {
    ImageInput,
    MultilingualInput
  },
  props: ["module", "locales"],
  methods: {
    changeModule(value) {
      const module = {...this.module, type: this.type};
      module.content = {...module.content, ...value};
      this.$emit(`changeModule`, module);
    }
  }
};
</script>

<style scoped>

</style>
