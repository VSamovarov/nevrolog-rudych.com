<template>
  <!-- Вывод таблицы -->
  <b-container fluid>
    <b-table
      class="orders-table index-table"
      ref="selectableTable"
      selectable
      responsive
      no-select-on-click
      @row-selected="onRowSelected"
      :items="feedbackData"
      :fields="tableFields"
      :tbody-tr-class="rowClass"
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
        <a @click="showFeedback(data.item.id)" v-b-modal.modal-feedback-show-item href="#">
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
      feedbackData: [...this.items],
      selectedItems: [], // Выбранные итемы
    };
  },
  methods: {
    /**
     * Добовляем стиль строкам
     */
    rowClass(item, type) {
      if (!item || type !== 'row') return
      if (item.viewed) return 'viewed'
    },
    /**
     * просматриваемый feedback
     */
    showFeedback(id) {
      this.feedbackShowId = id;
      this.feedbackData.forEach((item) => {
        if(item.id === id)  {
          item.viewed = 1;
        }
      })
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
