<template>
  <div>
    <div class="row" :class="{ 'flex-row-reverse': reverse }">
      <div class="col-md-4">
        <ImageInput
          title="Картинка"
          :module="(module && module.image) || null"
          :locales="locales"
          :post="post"
          @changeModule="changeModule({ image: $event })"
        ></ImageInput>
      </div>
      <div class="col-md-8">
        <MultilingualEditor
          title="Текст"
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

        <b-form-checkbox
          :checked="
            (module && module.settings && module.settings.reverse === true) ||
              false
          "
          @input="
            $emit(`changeModule`, {
              ...module,
              settings: {
                ...module.settings,
                reverse: $event
              }
            })
          "
        >
          Картинка справа (внизу)
        </b-form-checkbox>
      </div>
    </div>
  </div>
</template>

<script>
import ImageInput from "../Modules/ImageInput";
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
    MultilingualEditor
  },
  props: {
    module: Object,
    locales: Object,
    post: Object
  },
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
