<template>
  <b-tabs content-class="mt-3">
    <b-tab
      v-for="(values, lang) in locales"
      :key="lang"
      :title="locales[lang].native"
    >
      <b-form-group>
        <b-form-input
          :value="
            'text' in moduleData && lang in moduleData.text
              ? moduleData.text[lang]
              : null
          "
          @input="$emit(`changeData`, { text: { [lang]: $event } })"
          trim
        ></b-form-input>
      </b-form-group>
    </b-tab>
  </b-tabs>
</template>

<script>
export default {
  props: ["moduleData", "locales"]
};
</script>

<style></style>
