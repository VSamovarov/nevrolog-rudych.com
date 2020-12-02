<template>
  <div>
    <div class="row" :class="{ 'flex-row-reverse': reverse }">
      <div class="col-md-4">
        <p class="text-black-50 small">Картинка</p>
        <ImageInput
          :module="(module && module.image) || null"
          :locales="locales"
          @changeModule="changeModule({ image: $event })"
        ></ImageInput>
      </div>
      <div class="col-md-8">
        <p class="text-black-50 small">Teкст</p>
        <MultilingualEditor
          :module="(module && module.text) || null"
          :locales="locales"
          :post="post"
          @changeModule="changeModule({ text: $event })"
        ></MultilingualEditor>
      </div>
    </div>
    <hr />
    <div class="row">
      <div class="col-md-12">
        <p class="text-black-50 small">Настройки</p>
        Картинка справа (внизу)
      </div>
    </div>
  </div>
</template>

<script>
import ImageInput from "../Modules/ImageInput";
import MultilingualInput from "../Modules/MultilingualInput";
import MultilingualEditor from "../Modules/Editor";

export default {
  data() {
    return {
      type: "image-and-text-two-rows",
      reverse: false
    };
  },
  components: {
    ImageInput,
    MultilingualInput,
    MultilingualEditor
  },
  props: ["module", "locales", "post"],
  methods: {
    changeModule(value) {
      const module = { ...this.module, type: this.type };
      module.content = { ...module.content, ...value };
      this.$emit(`changeModule`, module);
    }
  }
};
</script>

<style scoped></style>
