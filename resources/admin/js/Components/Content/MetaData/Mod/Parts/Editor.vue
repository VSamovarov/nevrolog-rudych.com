<template>
  <div>
    <b-tabs small>
      <b-tab
        v-for="(langData, lang) in locales"
        :key="lang"
        :title="lang"
        vertical
        end
      >
        <b-form-group>
          <Editor
            :value="value[lang] || null"
            @input="$emit('input', { ...value, [lang]: $event })"
          ></Editor>
        </b-form-group>
      </b-tab>
    </b-tabs>
  </div>
</template>

<script>
import Editor from "./../../../../Common/CkEditor/CkEditorClassic";
export default {
  components: { Editor },
  props: {
    value: Object,
    locales: Object
  }
};
</script>

<style></style>
