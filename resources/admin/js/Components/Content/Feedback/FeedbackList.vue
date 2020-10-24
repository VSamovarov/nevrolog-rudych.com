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
        <b-form-checkbox :checked="data.rowSelected" @change="selectRow(data.index,$event)"></b-form-checkbox>
      </template>
      <template v-slot:cell(date_add)="data">
        <!-- <inertia-link :href="$route('admin.feedback.show',data.item.id)">
          {{data.item.date_add}}
        </inertia-link> -->
        <a @click.prevent="showFeedback(data.item.id)" href="#">
          {{data.item.date_add}}
        </a>
      </template>
      <template v-slot:cell(name)="data">
          {{data.item.name}}
      </template>
      <template v-slot:cell(action)="data">
        <div class="d-flex justify-content-around">
          <b-btn
            class="mx-1"
            v-if="!data.item.deleted_at"
            @click="feedbackViewStatusChange(data.item.id, data.item.viewed?0:1)"
          >
            <b-icon v-if="data.item.viewed" icon="envelope-open-fill"></b-icon>
            <b-icon v-else icon="envelope-fill"></b-icon>
          </b-btn>
          <inertia-link
            class="btn btn-sm mx-1 edit-button  btn-secondary"
            v-if="!data.item.deleted_at"
            :href="$route('admin.feedback.edit',data.item.id)"
            >
            <b-icon icon="pencil-fill"></b-icon>
          </inertia-link>
          <b-btn
            class="mx-1"
            v-if="data.item.deleted_at"
            @click="feedbackRestore(data.item.id)"
          >
            <b-icon icon="shift-fill"></b-icon>
          </b-btn>
          <b-btn
            class="mx-1"
            @click="feedbackDelete(data.item.id)">
            <b-icon icon="trash-fill"></b-icon>
          </b-btn>
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
    };
  },
  methods: {
    /**
     * Добовляем стиль строкам
     */
    rowClass(item, type) {
      let rowClass = [];
      if (!item || type !== 'row') return;

      if (item.viewed) rowClass.push('viewed');
      if (!!item.deleted_at) rowClass.push('deleted');
      return rowClass.join(' ');
    },
    /**
     * Изменяем статус просмотра
     *
     */
    feedbackViewStatusChange(id, status) {
        status = status ? 1 : 0;
        axios.patch( this.$route('admin.api.feedback.viewed-status',id), {status:status})
        .then(response => {
          console.log(response)

          this.feedbackData.forEach((item) => {
            if(item.id === id)  {
              item.viewed = status;
            }
          })
        });
    },
    /**
     * просматриваемый feedback
     */
    showFeedback(id) {
      if(!id) return false;
      this.feedbackShowId = id;
    //this.feedbackViewStatusChange(id, 1)
      this.$bvModal.show('modal-feedback-show-item')
    },
    /**
     * Удаление строки
     */
    feedbackDelete(id) {
      this.confirmModal('Удалить сообщение?')
      .then(value => {
        if(value) {
          axios.delete(this.$route('admin.api.feedback.destroy',id))
          .then(
            response => {
              this.feedbackData.forEach((item) => {
                if(item.id === id)  {
                  item.deleted_at = true;
                }
              });
            }
          );
        }
      });
    },
    feedbackRestore(id) {
          axios.patch(this.$route('admin.api.feedback.restore',id))
          .then(
            response => {
              this.feedbackData.forEach((item) => {
                if(item.id === id)  {
                  item.deleted_at = false;
                }
              });
            }
          );
    },
    /**
     * Окно подтверждения
     */
    confirmModal(msg) {
      return this.$bvModal.msgBoxConfirm( msg, {
        title: 'Подтвердите',
        size: 'sm',
        buttonSize: 'sm',
        okVariant: 'danger',
        okTitle: 'Да',
        cancelTitle: 'Нет',
        footerClass: 'p-2',
        hideHeaderClose: true,
        centered: true
      })
      .then(value => {
        return value;
      })
      .catch(err => {
        // An error occurred
      })
    },
    /**
     * Выбор строк таблицы-->
     */
    onRowSelected(items) {
      this.$emit('rowSelected', items);
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
  .index-feedback tbody tr.deleted, .index-feedback.deleted tbody tr {
    display: none;
  }
  .index-feedback.deleted tr.deleted {
    display: table-row;
  }
  .index-feedback.all tbody tr {
    font-weight: bold;
  }
  .index-feedback.all tbody tr.viewed {
    font-weight: normal;
  }
</style>
