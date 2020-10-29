<template>
<AdminLayout :query="query" class="index-post" :class="classPage">
      <b-container fluid class="my-5">
      <b-row>
        <b-col md="10" class="d-flex align-items-center justify-content-between">
          <h1>{{ pageTitle }}</h1>
        </b-col>
        <b-col md="2" class="d-flex align-items-center justify-content-end">
          <b-button>Добавить</b-button>
        </b-col>
      </b-row>
    </b-container>
    <b-container fluid class="mb-4">
      <AdminIndexMenu :items="indexMenu"></AdminIndexMenu>
    </b-container>
</AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import AdminIndexMenu from "./../../Components/Common/AdminIndexMenu";
import Pagination from "./../../Components/Common/Pagination";
export default {
  components: { AdminLayout, AdminIndexMenu, Pagination },
  props: ['posts', 'indexMenu','query', 'pageTitle'],
  computed: {
    classPage: function () {
      let classPage = [];
      if('deleted' in this.query) classPage.push('deleted');
      if(classPage.length === 0) classPage.push('all');
      return classPage.join(' ');
    }
  },
  methods: {
    rowSelected: function (items) {
      this.selectedItems = items.map(item=>item.id);
    }
  },
}
</script>

<style>

</style>
