<template>
  <div>
    <div class="mb-2 d-flex align-content-end">
      <div class="mr-2 filters">
        <div class="filters__title">Дата</div>
        <div class="d-flex">
          <div class="mr-3 d-flex">
            <div class="pr-1">от:</div>
            <b-input v-model="filters.date_to" type="date"></b-input>
          </div>
          <div class="mr-3 d-flex">
            <div class="pr-1">до:</div>
            <b-input v-model="filters.date_from" type="date"></b-input>
          </div>
        </div>
      </div>
      <div class="mr-2 filters">
        <div class="filters__title">Название</div>
        <b-input v-model="filters.name"></b-input>
      </div>
    </div>
    <div class="text-right">
      <inertia-link
        :href="$route('admin.post.index',filters)"
        preserve-state>Search</inertia-link>
    </div>
  </div>
</template>

<script>
export default {
  props: ['query'],
  data() {
    return {
      filters: {
        date_to: null,
        date_from: null,
        title: null,
        ...this.query
      },
      serchFilter: "",
    };
  },
  mounted: function() {
    console.log(this.filters)
  }
}
</script>

<style>

</style>
