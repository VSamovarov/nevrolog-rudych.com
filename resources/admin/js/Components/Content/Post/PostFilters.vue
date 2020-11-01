<template>
  <div class="d-flex flex-wrap align-content-end">
    <div class="mb-2 mr-3 d-flex align-content-end">
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
        <b-input v-model="filters.title"></b-input>
      </div>
    </div>
    <div class="align-self-end mb-2">
      <b-button @click="setFilters"><Icon icon="funnel-fill"></Icon></b-button>
      <b-button @click="clearFilters"><Icon icon="x"></Icon></b-button>
    </div>
  </div>
</template>

<script>
import Icon from './../../Common/Icon'
const defaultFilters = {
  date_to: null,
  date_from: null,
  title: null,
}
export default {
  components: {
    Icon
  },
  props: ['query'],
  data() {
    return {
      filters: {
        ...defaultFilters,
        ...this.query
      }
    };
  },
  methods: {
    setFilters() {
      this.$emit('setQuery', this.filters)
    },
    clearFilters() {
      this.$emit('setQuery', {...this.filters,...defaultFilters})
    }
  }
}
</script>

<style>

</style>
