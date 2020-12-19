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
          <CkEditor
            :value="value[lang] || null"
            :post_id="post.id"
            @input="$emit('input', { ...value, [lang]: $event })"
          ></CkEditor>
        </b-form-group>
      </b-tab>
    </b-tabs>
  </div>
</template>

<script>
import CkEditor from "./../../../../Common/CkEditor/CkEditorClassic";
export default {
  components: { CkEditor },
  props: {
    value: Object,
    locales: Object,
    post: Object
  }
};
</script>

<style></style>
