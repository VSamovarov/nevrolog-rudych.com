<template>
  <div>
    <div class="row">
      <div class="col-md-4">
        <ImageInput
          title="Картинка"
          :module="getModule('image')"
          :locales="locales"
          :post="post"
          @changeModule="changeModule('image', $event)"
        ></ImageInput>
      </div>
      <div class="col-md-8">
        <MultilingualInput
          title="Заглавие"
          :module="getModule('title')"
          :locales="locales"
          @changeModule="changeModule('title', $event)"
        ></MultilingualInput>
        <MultilingualTextarea
          title="Текст"
          :module="getModule('text')"
          :locales="locales"
          @changeModule="changeModule('text', $event)"
        ></MultilingualTextarea>
        <p class="text-black-50 small">Ссылка</p>
        <b-form-group>
          <b-form-input
            :value="getValue('link')"
            @input="changeModule('link', $event)"
            trim
          ></b-form-input>
          <MultilingualInput
            title="Текст кнопки"
            :module="getModule('action-name')"
            :locales="locales"
            @changeModule="changeModule('action-name', $event)"
          ></MultilingualInput>
        </b-form-group>
      </div>
    </div>
  </div>
</template>

<script>
import MultilingualTextarea from "../Modules/MultilingualTextarea";
import MultilingualInput from "../Modules/MultilingualInput";
import MatadataMixin from "./../mixin";
import ImageInput from "../Modules/ImageInput";

const titleModuleDefaul = "";
export default {
  mixins: [MatadataMixin],
  components: {
    MultilingualInput,
    MultilingualTextarea,
    ImageInput
  },
  props: {
    module: Object,
    settings: Object,
    locales: Object,
    post: Object,
    title: {
      type: String,
      default: titleModuleDefaul
    }
  }
};
</script>

<style></style>
