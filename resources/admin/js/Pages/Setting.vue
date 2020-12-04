<template>
  <AdminLayout class="settings">
    <b-overlay variant="white" blur="0" :show="overlay" rounded="sm">
      <b-container fluid class="my-5">
        <b-row>
          <b-col md="9">
            <h1 class="mb-5">{{ pageTitle }}</h1>
            <div v-for="(part, part_slug) in config" :key="part_slug">
              <template v-if="part.sections">
                <div
                  class="card mb-4"
                  v-for="(section, section_id) in part.sections"
                  :key="`${part_slug}-${section_id}`"
                >
                  <div class="card-body">
                    <h4 v-if="section.title" class="card-title">
                      {{ section.title }}
                    </h4>
                    <h6
                      v-if="section.descriptions"
                      class="card-subtitle mb-4 text-muted"
                    >
                      {{ section.descriptions }}
                    </h6>
                    <p class="card-text">
                      <component
                        v-for="input in section.inputs"
                        :is="componentType(input.type)"
                        :data="input"
                        :key="input.name"
                        v-model="values[input.name]"
                      ></component>
                    </p>
                  </div>
                </div>
              </template>
            </div>
          </b-col>
          <b-col md="3">
            <div class="sticky text-center bg-white p-3">
              <b-button @click="saveData">Сохранить изменения</b-button>
            </div>
          </b-col>
        </b-row>
      </b-container>
    </b-overlay>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../Layouts/AdminLayout";
import Input from "./../Components/Common/Values/InputValue";
import TextArea from "./../Components/Common/Values/TextAreaValue";
import FileValue from "./../Components/Common/Values/FileValue";
export default {
  components: { AdminLayout, Input, TextArea, FileValue },
  props: ["pageTitle", "config", "settings"],
  data() {
    return {
      overlay: false,
      values: { ...this.settings }
    };
  },
  methods: {
    componentType(type) {
      switch (type) {
        case "file":
          return "FileValue";
          break;
        case "image":
          return "FileValue";
          break;
        case "textarea":
          return "TextArea";
          break;
        default:
          return "Input";
          break;
      }
    },
    saveData() {
      this.overlay = true;
      try {
        this.$inertia
          .post(this.$route("admin.setting.update"), {
            ...this.values
          })
          .then(function(response) {
            console.log(response);
          });
      } catch (e) {
        console.error(e);
      } finally {
        this.overlay = false;
      }
    }
  }
};
</script>

<style>
.sticky {
  position: sticky;
  top: 0;
  z-index: 10;
}
</style>
