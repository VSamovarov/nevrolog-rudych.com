<template>
<AdminLayout :query="query" class="index-post" :class="classPage">
  {{posts}}
</AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import AdminIndexMenu from "./../../Components/Common/AdminIndexMenu";
import Pagination from "./../../Components/Common/Pagination";
export default {
  components: { AdminLayout, AdminIndexMenu, Pagination },
  props: ['posts', 'indexMenu','query'],
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
