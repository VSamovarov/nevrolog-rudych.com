<template>
  <AdminLayout :adminSidebarMenu="adminSidebarMenu">
    <b-container fluid class="my-5">
      <b-row>
        <b-col md="10" class="d-flex align-items-center justify-content-between">
          <h1>
            Обратная связь<span v-if="feedback.name">: {{feedback.name}}</span>
          </h1>
        </b-col>
        <b-col md="2" class="d-flex align-items-center justify-content-end">
          <inertia-link :href="$route('admin.feedback.index')" class="btn btn-secondary">
            Вернутся к списку
          </inertia-link>
        </b-col>
      </b-row>
    </b-container>
    <b-container fluid class="my-5">
      <b-row>
        <b-col md="4" class="text-md-right font-weight-bold">Имя</b-col><b-col md="8">{{feedback.name}}</b-col>
        <b-col md="4" class="text-md-right font-weight-bold">Email</b-col><b-col md="8">{{feedback.email}}</b-col>
        <b-col md="4" class="text-md-right font-weight-bold">Телефон</b-col><b-col md="8">{{feedback.phone}}</b-col>
        <b-col md="4" class="text-md-right font-weight-bold">Сообщение</b-col><b-col md="8">{{feedback.message}}</b-col>
      </b-row>
    </b-container>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
export default {
  components: { AdminLayout},
  props: ['feedback'],
}
</script>

<style>

</style>
