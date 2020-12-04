<template>
  <div>
    <div class="row" :class="{ 'flex-row-reverse': reverse }">
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
        <MultilingualEditor
          title="Текст"
          :module="getModule('text')"
          :locales="locales"
          :post="post"
          @changeModule="changeModule('text', $event)"
        ></MultilingualEditor>
      </div>
    </div>
    <hr />
    <div class="row">
      <div class="col-md-12">
        <p class="text-black-50 small">Настройки</p>
        <div class="d-flex flex-wrap align-items-center justify-content-around">
          <b-form-checkbox
            :checked="getValue('reverse')"
            @input="changeModule('reverse', $event)"
          >
            Картинка справа (внизу)
          </b-form-checkbox>

          <b-form-checkbox
            :checked="getValue('big-image')"
            @input="changeModule('big-image', $event)"
          >
            Большая картинка
          </b-form-checkbox>

          <div>
            Цвет секции
            <ColorSelection
              :colors="colors"
              :value="getValue('box-color')"
              @input="changeModule('box-color', $event)"
            ></ColorSelection>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
const colors = ["#984c8a", "#9baacb", "#503a87", "#212529", "#fbe7f8"];
import ImageInput from "../Modules/ImageInput";
import ColorSelection from "../../../Common/ColorSelection";
import MultilingualEditor from "../Modules/Editor";
const titleModuleDefaul = "";
export default {
  data() {
    return {
      reverse: false,
      colors
    };
  },
  components: {
    ImageInput,
    ColorSelection,
    MultilingualEditor
  },
  props: {
    module: Object,
    locales: Object,
    post: Object,
    title: {
      type: String,
      default: titleModuleDefaul
    }
  },
  methods: {
    /**
     * Общая часть
     */
    getValue(name) {
      const value =
        (this.module && this.module._value && this.module._value[name]) || null;
      return value;
    },

    //?! Мутируем пропсы
    getModule(name) {
      if (this.module._value === undefined) {
        this.$set(this.module, "_value", {});
      }
      if (this.module._value[name] === undefined) {
        this.$set(this.module._value, name, {});
      }
      return this.module._value[name];
    },

    changeModule(name, value) {
      const module = this.module || { _value: {} };
      module._value = {
        ...((this.module && this.module._value) || {}),
        [name]: value
      };
      this.$emit(`changeModule`, module);
    }
  }
};
</script>

<style scoped></style>
