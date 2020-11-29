<template>
  <section class="section image-and-text-two-rows" :class="{reverse:reverse}">
      <div class="container">
          <div class="row image-and-text-two-rows__wrapper">
              <div class="col-md-6 image-and-text-two-rows__image">
                <ImageInput
                  :module="(module && module.image) || null"
                  @changeModule="changeModule({image:$event})"
                ></ImageInput>
              </div>
              <div class="col-md-6">
                <MultilingualInput
                  :content="(module && module.text) || null"
                  :locales="locales"
                  @changeModule="changeModule({text:$event})"
                  ></MultilingualInput>
              </div>
          </div>
      </div>
  </section>
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

<style></style>
