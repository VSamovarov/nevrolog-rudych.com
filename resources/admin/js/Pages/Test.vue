<template>
  <AdminLayout>
    <b-container fluid class="my-5">
      <draggable v-model="modules" @start="drag=true" @end="drag=false">
        <ModulesLoader
          v-for="module in modules"
          :key="module.id"
          :moduleName="module.name"
          :moduleData="module.data"
          :moduleId="module.id"
          :moduleTitle="module.title"
          >
        </ModulesLoader>
      </draggable>
    </b-container>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../Layouts/AdminLayout";
import ModulesLoader from "./../Components/Modules/ModulesLoader";
import draggable from "vuedraggable";
export default {
  components: { AdminLayout, ModulesLoader, draggable },
  data() {
    return {
      editable: true,
      isDragging: null,
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
};
</script>

<style></style>
