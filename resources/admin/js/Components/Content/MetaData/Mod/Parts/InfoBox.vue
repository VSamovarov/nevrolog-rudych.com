<template>
  <div>
    <div v-show="showicone">
      <p class="text-black-50 small">Иконка</p>
      <div class="d-flex">
        <span class="mr-4" :class="preview" :style="{ fontSize: `2rem` }">
        </span>
        <b-form-group>
          <b-form-input :value="preview" @input="setIcone" trim></b-form-input>
        </b-form-group>
      </div>
    </div>
    <b-tabs small>
      <b-tab
        class="py-2"
        v-for="(langData, lang) in locales"
        :key="lang"
        :title="lang"
      >
        <div v-show="showtitle">
          <p class="text-black-50 small">Заглавие</p>
          <b-form-group>
            <b-form-input
              trim
              :value="getValueMultilang('title', lang)"
              @input="setValueMultilang('title', lang, $event)"
            ></b-form-input>
          </b-form-group>
        </div>
        <div v-show="showtext">
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
        </div>
        <div v-show="showlink">
          <p class="text-black-50 small">Ссылка</p>
          <b-form-group>
            <b-form-input
              trim
              :value="getValueMultilang('link', lang)"
              @input="setValueMultilang('link', lang, $event)"
            ></b-form-input>
          </b-form-group>
        </div>
      </b-tab>
    </b-tabs>
  </div>
</template>

<script>
export default {
  components: {},
  props: {
    value: Object,
    locales: Object,

    showicone: Boolean,
    showtext: Boolean,
    showtitle: Boolean,
    showlink: Boolean
  },
  data() {
    return {
      preview: this.getValue("icone") || ""
    };
  },
  methods: {
    setIcone(icone) {
      this.preview = icone;
      this.$emit("input", { ...this.value, icone });
    },
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
