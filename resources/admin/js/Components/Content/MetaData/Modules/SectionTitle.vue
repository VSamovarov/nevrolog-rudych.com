<template>
  <div>
    <div class="d-flex align-items-center">
      <p class="text-black-50 small mr-4">{{ title }}</p>
      <p>
        <b-form-checkbox
          switch
          :checked="module.sectionTitleShow"
          @change="
            $emit(`changeModule`, {
              ...module,
              sectionTitleShow: $event
            })
          "
          >Включить</b-form-checkbox
        >
      </p>
    </div>
    <div v-if="module.sectionTitleShow">
      <MultilingualInput
        title=""
        :locales="locales"
        :module="(module && module.sectionTitle) || null"
        @changeModule="
          $emit(`changeModule`, {
            ...module,
            sectionTitle: { ...module.sectionTitle, ...$event.content }
          })
        "
      ></MultilingualInput>
    </div>
    <hr />
  </div>
</template>

<script>
import MultilingualInput from "./MultilingualInput";
export default {
  props: {
    module: Object,
    locales: Object,
    title: {
      type: String,
      default: "Название секции"
    }
  },
  components: { MultilingualInput }
};
</script>

<style></style>
