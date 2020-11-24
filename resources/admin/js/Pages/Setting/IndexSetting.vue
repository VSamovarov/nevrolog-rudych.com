<template>
  <AdminLayout class="index-post" :class="classPage">
    <b-container fluid class="my-5">
      <b-row>
        <b-col md="9">
          Тут будут сеттинги
        </b-col>
        <b-col md="3"> </b-col>
      </b-row>
    </b-container>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
// import { setUrl } from "./../../Helpers/Url";

export default {
  components: { AdminLayout }
};
</script>

<style></style>
