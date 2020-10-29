<template>
  <AdminLayout :query="query" class="index-feedback" :class="classPage">
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
    <b-container fluid class="mb-4">
      <FeedbackFilters :query="query"></FeedbackFilters>
    </b-container>
    <FeedbackList :items="feedback.data" @rowSelected="rowSelected" class="flex-row mb-4"></FeedbackList>
    <b-container fluid class="mb-4 d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center justify-content-between">
        <b-form-select  v-model="massActionName" :options="massActionOptions" class="mr-2">
        </b-form-select>
        <inertia-link
          :href="$route('admin.feedback.mass-actions')"
          method="post"
          class="btn btn-secondary"
          :data="{ name: massActionName, data: selectedItems }"
          >
            Применить
          </inertia-link>

      </div>
      <Pagination :links="feedback.links"></Pagination>
    </b-container>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import FeedbackList from "./../../Components/Content/Feedback/FeedbackList";
import FeedbackFilters from "./../../Components/Content/Feedback/FeedbackFilters";
import AdminIndexMenu from "./../../Components/Common/AdminIndexMenu";
import Pagination from "./../../Components/Common/Pagination";

export default {
  components: { AdminLayout, FeedbackList, AdminIndexMenu, Pagination, FeedbackFilters },
  props: ['feedback', 'indexMenu', 'query', 'pageTitle'],
  data() {
    return {
      massActionName: null,
      selectedItems: {},
      massActionOptions: [
        { value: null, text: 'Выберите действие' },
        { value: 'delete', text: 'Удалить' },
        { value: 'restore', text: 'Восстановить' },
        {
          label: 'Применить статус',
          options: [
            { value: 'viewed', text: 'Просмотренные' },
            { value: 'not-viewed', text: 'Не просмотренные' }
          ]
        }
      ]
    }
  },
  computed: {
    classPage: function () {
      let classPage = [];
      if(('viewed' in this.query) && this.query.viewed === "0") classPage.push('not-viewed');
      if(('viewed' in this.query) && this.query.viewed === "1") classPage.push('viewed');
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

};
</script>

<style>

</style>
