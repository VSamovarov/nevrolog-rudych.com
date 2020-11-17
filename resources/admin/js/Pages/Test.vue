<template>
  <AdminLayout>
    <b-container fluid class="my-5">
      <draggable handle=".card-header" v-model="modules" @start="drag=true" @end="drag=false" class="mb-3">
        <template v-for="module in modules">
            <ModuleWrapper :title="module.title" :key="module.id">
              <ModulesLoader
                :moduleName="module.name"
                :moduleData="module.data"
                :moduleId="module.id">
              </ModulesLoader>
          </ModuleWrapper>
        </template>
      </draggable>
      <b-form-select v-if="showSelectedNewModules" @change="addNewModule" :options="newModules" :value="null"></b-form-select>
      <button type="button" class="btn btn-link" v-if="!showSelectedNewModules" @click="showSelectedNewModules=true">+ Добавить модуль</button>
      <button type="button" class="btn btn-link" v-if="showSelectedNewModules" @click="showSelectedNewModules=false">- Отменить</button>
    </b-container>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../Layouts/AdminLayout";
import ModulesLoader from "./../Components/Modules/ModulesLoader";
import draggable from "vuedraggable";
import {uid} from "./../Helpers/Sting.js"
import ModuleWrapper from "./../Components/Common/ModuleWrapper"
export default {
  components: { AdminLayout, ModulesLoader, draggable, ModuleWrapper },
  data() {
    return {
      editable: true,
      isDragging: null,
      showSelectedNewModules: false,
      newModules: [
        {
          text: '-- Выбрать модуль --',
          value: null,
        },
        {
          text: 'Пустой модуль ssss',
          value: "Default",
        },
        {
          text: 'Техтовый редактор',
          value: "EditorModule",
        },
        {
          text: 'Техтовый редактор',
          value: "SliderModule",
        }
      ],
      modules: [
        {
          data: null,
          title: 'Один',
          name: "Default",
          id: 1
        },
        {
          data: null,
          title: 'Два',
          name: "Default",
          id: 2
        },
        {
          data: null,
          title: 'Три',
          name: "Default",
          id: 3
        },
      ]
    }
  },
  methods: {
    addNewModule(slectedValue) {
      if(!slectedValue) return;
      const {text, value} = this.newModules.find(item => item.value === slectedValue);
      this.showSelectedNewModules = false;
      this.modules.push(
        {
          data: null,
          title: text,
          name: value,
          id: uid(),
        }
      );
    }
  },
};
</script>

<style></style>
