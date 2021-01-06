<template>
  <div>
    <div class="row">
      <div class="col-md-4">
        <p class="text-black-50 small">Картинка</p>
        <ImageInput
          :locales="locales"
          :post="post"
          :value="getValue('image') || {}"
          @input="$emit('input', { ...value, image: $event })"
        ></ImageInput>
      </div>
      <div class="col-md-8">
        <b-tabs small>
          <b-tab
            class="py-2"
            v-for="(langData, lang) in locales"
            :key="lang"
            :title="lang"
          >
            <p class="text-black-50 small">Заглавие</p>
            <b-form-group>
              <b-form-input
                trim
                :value="getValueMultilang('title', lang)"
                @input="setValueMultilang('title', lang, $event)"
              ></b-form-input>
            </b-form-group>
            <p class="text-black-50 small">Текст</p>
            <b-form-group>
              <b-form-textarea
                :value="getValueMultilang('text', lang)"
                @input="setValueMultilang('text', lang, $event)"
                rows="3"
                max-rows="6"
                trim
              ></b-form-textarea>
            </b-form-group>
            <p class="text-black-50 small">Ссылка</p>
            <b-form-group>
              <b-form-input
                trim
                :value="getValueMultilang('link', lang)"
                @input="setValueMultilang('link', lang, $event)"
              ></b-form-input>
            </b-form-group>

            <p class="text-black-50 small">Текст кнопки</p>
            <b-form-group>
              <b-form-input
                trim
                :value="getValueMultilang('action_name', lang)"
                @input="setValueMultilang('action_name', lang, $event)"
              ></b-form-input>
            </b-form-group>
          </b-tab>
        </b-tabs>
      </div>
    </div>
  </div>
</template>
<script>
import ImageInput from "./ImageInput";
export default {
  components: {
    ImageInput
  },
  props: {
    value: Object,
    settings: Object,
    locales: Object,
    post: Object
  },
  methods: {
    getValue(name) {
      return this.value && this.value[name] !== undefined
        ? this.value[name]
        : null;
    },
    getValueMultilang(name, lang) {
      let input = this.value[name] || {};
      return input[lang] || null;
    },
    setValueMultilang(name, lang, value) {
      this.$emit("input", {
        ...this.value,
        [name]: { ...this.value[name], [lang]: value }
      });
    }
  }
};
</script>

<style></style>
