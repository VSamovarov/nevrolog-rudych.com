<template>
  <AdminLayout class="index-post" :class="classPage">
    <b-container fluid class="my-5">
      <b-row>
        <b-col
          md="10"
          class="d-flex align-items-center justify-content-between"
        >
          <h1>{{ pageTitle }}</h1>
        </b-col>
        <b-col md="2" class="d-flex align-items-center justify-content-end">
          <inertia-link
            :href="$route('admin.post.create', { type: query.type })"
            class="btn btn-secondary"
          >
            Добавить
          </inertia-link>
        </b-col>
      </b-row>
    </b-container>
    <b-container fluid class="mb-4">
      <b-row>
        <b-col md="11">
          <AdminIndexMenu :items="indexMenu" :query="query"></AdminIndexMenu>
        </b-col>
        <b-col md="1">
          <Locales :locale="query.locale" @setLocale="setLocale"></Locales>
        </b-col>
      </b-row>
    </b-container>
    <b-container fluid class="mb-4">
      <PostFilters :query="query" @setQuery="setQuery"></PostFilters>
    </b-container>

    <b-container fluid class="mb-4">
      <b-overlay variant="white" blur="0" :show="listOverlay" rounded="sm">
        <PostList :items="items" @rowSelected="rowSelected"></PostList>
        <b-container
          fluid
          class="mb-4 d-flex align-items-center justify-content-between"
        >
          <div class="d-flex align-items-center justify-content-between">
            <b-form-select
              v-model="massActionName"
              :options="massActionOptions"
              class="mr-2"
            >
            </b-form-select>
            <inertia-link
              :href="$route('admin.post.mass-actions')"
              method="post"
              class="btn btn-secondary"
              :data="{
                name: massActionName,
                data: selectedItems,
                type: query.type
              }"
            >
              Применить
            </inertia-link>
          </div>
          <b-pagination
            v-if="total > perPage"
            :total-rows="total"
            :per-page="perPage"
            @change="setPage"
            aria-controls="my-table"
          ></b-pagination>
        </b-container>
      </b-overlay>
    </b-container>
  </AdminLayout>
</template>

<script>
import AdminLayout from "./../../Layouts/AdminLayout";
import AdminIndexMenu from "./../../Components/Common/AdminIndexMenu";
import Locales from "./../../Components/Common/Locales";
import PostFilters from "./../../Components/Content/Post/PostFilters";
import PostList from "./../../Components/Content/Post/PostList";
import { setUrl } from "./../../Helpers/Url";

export default {
  components: { AdminLayout, AdminIndexMenu, Locales, PostFilters, PostList },
  props: ["indexMenu", "pageTitle"],
  data() {
    return {
      query: { ...this.$page.query, locale: this.$page.locale },
      perPage: 15,
      total: 0,
      items: [],
      listOverlay: false,
      massActionName: null,
      selectedItems: {},
      massActionOptions: [
        { value: null, text: "Выберите действие" },
        { value: "delete", text: "Удалить" },
        { value: "restore", text: "Восстановить" }
      ]
    };
  },
  async mounted() {
    await this.getItems(this.query);
  },
  computed: {
    classPage: function() {
      let classPage = [];
      if ("deleted" in this.query) classPage.push("deleted");
      if (classPage.length === 0) classPage.push("all");
      return classPage.join(" ");
    }
  },
  watch: {
    async query(query) {
      await this.getItems(query);
    }
  },
  methods: {
    rowSelected: function(items) {
      this.selectedItems = items.map(item => item.id);
    },
    setQuery(query) {
      this.query = { ...this.query, ...query };
    },
    setLocale(locale) {
      this.setQuery({ locale });
    },
    setPage(page) {
      this.setQuery({ page });
    },
    async getItems(query) {
      this.listOverlay = true;
      try {
        const { data } = await axios.get(
          this.$route("admin.api.post.index", query)
        );
        this.items = data.items;
        this.perPage = data.perPage;
        this.total = data.total;
        setUrl(this.$route("admin.post.index"), query);
      } catch {
      } finally {
        this.listOverlay = false;
      }
    }
  }
};
</script>

<style></style>
