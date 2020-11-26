<template>
  <AdminLayout class="settings">
    <b-container fluid class="my-5">
      <b-row>
        <b-col md="9">
          ---------------------------
          <h1>{{ pageTitle }}</h1>
          //////
        </b-col>
        <b-col md="3">
          {{ config }}
          {{ settings }}
        </b-col>
      </b-row>
    </b-container>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../Layouts/AdminLayout";
export default {
  components: { AdminLayout },
  props: ["pageTitle", "config", "settings"]
};
</script>

<style></style>
