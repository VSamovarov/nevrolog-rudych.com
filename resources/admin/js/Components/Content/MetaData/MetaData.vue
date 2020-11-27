<template>
  <div>
    <draggable
      handle=".card-header"
      v-model="modules"
      @start="drag = true"
      @end="drag = false"
      class="mb-3"
    >
      <template v-for="module in modules">
        <ModuleWrapper :title="module.title" :key="module.id">
          <ModulesLoader
            :type="module.type"
            :id="module.id"
            :moduleData="module.data"
            :locales="locales"
            @changeData="$emit(`updateMetaDataModules`, $event)"
          >
          </ModulesLoader>
        </ModuleWrapper>
      </template>
    </draggable>
    <b-form-select
      v-if="showSelectedNewModules"
      @change="addNewModule"
      :options="newModules"
      :value="null"
    ></b-form-select>
    <button
      type="button"
      class="btn btn-link"
      v-if="!showSelectedNewModules"
      @click="showSelectedNewModules = true"
    >
      + Добавить модуль
    </button>
    <button
      type="button"
      class="btn btn-link"
      v-if="showSelectedNewModules"
      @click="showSelectedNewModules = false"
    >
      - Отменить
    </button>
  </div>
</template>

<script>
import ModulesLoader from "./../MetaData/ModulesLoader";
import draggable from "vuedraggable";
import { uid } from "./../../../Helpers/Sting";
import ModuleWrapper from "./../../Common/ModuleWrapper";
export default {
  components: { ModulesLoader, draggable, ModuleWrapper },
  props: ["modules", "locales"],
  data() {
    return {
      showSelectedNewModules: false,
      newModules: [
        {
          text: "-- Выбрать модуль --",
          value: null
        },
        {
          text: "Многоязычное поле",
          value: "InputMultilingual"
        }
      ]
    };
  },
  methods: {
    addNewModule(slectedValue) {
      if (!slectedValue) return;
      const { text, value } = this.newModules.find(
        item => item.value === slectedValue
      );
      this.showSelectedNewModules = false;
      this.$emit("addNewMetaModule", {
        data: null,
        title: text,
        type: value,
        id: uid()
      });
      // this.modules.push({
      //   data: null,
      //   title: text,
      //   name: value,
      //   id: uid()
      // });
    }
  }
};
</script>

<style></style>
