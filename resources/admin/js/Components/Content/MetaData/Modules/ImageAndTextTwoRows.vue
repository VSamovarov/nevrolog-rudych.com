<template>
  <section class="section image-and-text-two-rows" :class="{reverse:reverse}">
      <div class="container">
          <div class="row image-and-text-two-rows__wrapper">
              <div class="col-md-6 image-and-text-two-rows__image">
                <ImageInput
                  :moduleData="moduleData.image || null"
                  @changeData="$emit(`changeData`, { image: $event })"
                ></ImageInput>
              </div>
              <div class="col-md-6">
                <MultilingualInput
                  :moduleData="moduleData.content || null"
                  :locales="locales"
                  @changeData="$emit(`changeData`, { content: $event })"
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
      reverse: false
    }
  },
  components: {
    ImageInput,
    MultilingualInput
  },
  props: ["moduleData", "locales"],
};
</script>

<style></style>
