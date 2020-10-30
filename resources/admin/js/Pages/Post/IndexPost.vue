<template>
  <AdminLayout class="index-post" :class="classPage">
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
      <b-row>
        <b-col md='11'>
          <AdminIndexMenu :items="indexMenu" :query="query"></AdminIndexMenu>
        </b-col>
        <b-col md='1'>
          <Locales></Locales>
        </b-col>
      </b-row>
    </b-container>
    <b-container fluid class="mb-4">
        <PostFilters :query="query" @setFilters="getItems"></PostFilters>
    </b-container>
    {{posts}}
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import AdminIndexMenu from "./../../Components/Common/AdminIndexMenu";
import Pagination from "./../../Components/Common/Pagination";
import Locales from "./../../Components/Common/Locales";
import PostFilters from './../../Components/Content/Post/PostFilters'
export default {
  components: { AdminLayout, AdminIndexMenu, Pagination, Locales, PostFilters },
  props: ['indexMenu', 'pageTitle'],
  data() {
    return {
      query: {...this.$page.query},
      posts: []
    }
  },
  async mounted() {
    await this.getItems(this.query);
  },
  computed: {
    classPage: function () {
      let classPage = [];
      if('deleted' in this.query) classPage.push('deleted');
      if(classPage.length === 0) classPage.push('all');
      return classPage.join(' ');
    }
  },
  watch: {
    async query (query) {
      await getItems(query);
    }
  },
  methods: {
    rowSelected: function (items) {
      this.selectedItems = items.map(item=>item.id);
    },
    setQuery(query) {
      this.query = {...this.query,...query};
    },
    async getItems(query) {

      try {
        const {data} = await axios.get(this.$route('admin.api.post.index', query));
        this.posts = data;
      } catch {

      } finally {

      }
    }
  },
}
</script>

<style>

</style>
