<template>
  <div class="d-flex align-content-end">
    <div class="mr-2 filters">
      <div class="filters__title">Дата заказа</div>
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
      <div class="filters__title">Имя</div>
      <b-input v-model="filters.name"></b-input>
    </div>
    <div class="mr-2 filters">
      <div class="filters__title">Телефон</div>
      <b-input v-model="filters.phone"></b-input>
    </div>
    <div class="mr-2 filters">
      <div class="filters__title">Email</div>
      <b-input v-model="filters.email"></b-input>
    </div>
  </div>
</template>

<script>
export default {
    data() {
    return {
      filters: {
        date_to: null,
        date_from: null,
        name: null,
        phone: null,
        email: null
      },
      serchFilter: "",
    };
  },

}
</script>

<style>

</style>
