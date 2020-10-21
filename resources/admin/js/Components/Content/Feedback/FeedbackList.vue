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
      <template v-slot:cell(date_add)="data">
        <!-- <inertia-link :href="$route('admin.feedback.show',data.item.id)">
          {{data.item.date_add}}
        </inertia-link> -->
        <a @click="showFeedback(data.item.id)" v-b-modal.modal-center href="#">
          {{data.item.date_add}}
        </a>
      </template>
      <template v-slot:cell(name)="data">
          {{data.item.name}}
      </template>
      <template v-slot:cell(action)="data">
        <div class="d-flex justify-content-around">
          <inertia-link class="btn btn-secondary btn-sm mx-1" :href="$route('admin.feedback.edit',data.item.id)">
            <b-icon  icon="pencil-fill"></b-icon>
          </inertia-link>
          <inertia-link class="btn btn-secondary btn-sm mx-1" :href="$route('admin.feedback.destroy', data.item.id)" method="DELETE">
            <b-icon icon="trash-fill"></b-icon>
          </inertia-link>
        </div>
      </template>
    </b-table>
    <FeedbackShowItem v-if="feedbackShowId" :feedbackId="feedbackShowId"></FeedbackShowItem>
  </b-container>
</template>

<script>
import FeedbackShowItem from './FeedbackShowItem'
export default {
  components: {
    FeedbackShowItem
  },
  props: ['items'],
  data() {
    return {
      feedbackShowId: false,
      tableFields: [
        { key: "id", label: "", class: "id" },
        { key: "date_add", label: "Дата", class: "date_add text-nowrap" },
        { key: "name", label: "Имя", class: "name" },
        { key: "phone", label: "Телефон", class: "phone" },
        { key: "email", label: "Email", class: "email" },
        { key: "message", label: "Сообщение", class: "email" },
        { key: "action", label: "Действие", class: "action" },
      ],
      selectedItems: [], // Выбранные итемы
    };
  },
  mounted: function () {

  },
  methods: {
    showFeedback(id) {
      this.feedbackShowId = id;
    },
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
