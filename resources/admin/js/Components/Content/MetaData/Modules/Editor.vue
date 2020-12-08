<template>
  <div>
    <p v-if="title" class="text-black-50 small">{{ title }}</p>
    <b-tabs small>
      <b-tab
        v-for="(values, lang) in locales"
        :key="lang"
        :title="lang"
        vertical
        end
      >
        <b-form-group>
          <Editor
            :value="getValue([lang])"
            @input="changeModule(lang, $event)"
            :post_id="post.id"
          ></Editor>
        </b-form-group>
      </b-tab>
    </b-tabs>
  </div>
</template>

<script>
import Editor from "./../../../Common/CkEditor/CkEditorClassic";
import MatadataMixin from "./../mixin";
export default {
  mixins: [MatadataMixin],
  components: { Editor },
  props: {
    module: Object | null,
    locales: Object,
    post: Object,
    title: {
      type: String,
      default: "Текст"
    }
  }
};
</script>

<style></style>
