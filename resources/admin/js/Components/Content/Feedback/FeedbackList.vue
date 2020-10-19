<template>
  <!-- Вывод таблицы -->
  <b-container fluid>
    <b-table
      class="orders-table index-table"
      ref="selectableTable"
      selectable
      no-select-on-click
      @row-selected="onRowSelected"
      :items="items"
      :fields="tableFields"
    >
      <template v-slot:head(id)>
        <span class="text-info">
          <!-- Выбор всех строк -->
          <b-form-checkbox @change="selectAllRows"></b-form-checkbox>
        </span>
      </template>
      <template v-slot:cell(id)="data">
        <!-- Выбор строки -->
        <b-form-checkbox :checked="data.rowSelected" @change="selectRow(data.index, $event)"></b-form-checkbox>
      </template>
      <template v-slot:cell(created_at)="data">
        {{data.item.created_at}}
      </template>
      <template v-slot:cell(name)="data">
        <!-- <inertia-link :href="data.item.id" class="nav-link"> -->
          {{data.item.name}}
        <!-- </inertia-link> -->
      </template>
    </b-table>
  </b-container>
</template>

<script>

export default {
  props: ['items'],
  data() {
    return {
      tableFields: [
        { key: "id", label: "", class: "id" },
        { key: "date_add", label: "Дата", class: "date_add text-nowrap" },
        { key: "name", label: "Имя", class: "name" },
        { key: "phone", label: "Телефон", class: "phone" },
        { key: "email", label: "Email", class: "email" },
        { key: "message", label: "Сообщение", class: "email" },
      ],
      selectedItems: [], // Выбранные итемы
    };
  },
  mounted: function () {

  },
  methods: {
    /**
     * Выбор строк таблицы-->
     */
    onRowSelected(items) {
      this.selectedItems = items;
    },
    selectRow(index, checked) {

      if (checked) {
        this.$refs.selectableTable.selectRow(index);
      } else {
        this.$refs.selectableTable.unselectRow(index);
      }
    },
    selectAllRows(checked) {
      if (checked) {
        this.$refs.selectableTable.selectAllRows();
      } else {
        this.$refs.selectableTable.clearSelected();
      }
    },
    /**
     * Выбор строк таблицы<--
    */
  }
};


</script>

<style>
</style>
