<template>
  <AdminLayout> Я тут </AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";

export default {
  components: { AdminLayout },
  props: ["data"],
  mounted: function () {
    console.log(this.data);
  },
};
</script>

<style></style>
