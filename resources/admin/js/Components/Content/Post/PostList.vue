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
      :items="items"
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
        <b-form-checkbox
          :checked="data.rowSelected"
          @change="selectRow(data.index, $event)"
        ></b-form-checkbox>
      </template>
      <template v-slot:cell(title)="data">
        <!-- название -->
        {{ data.item.title }}
      </template>
      <template v-slot:cell(slug)="data">
        <!-- Ярлык -->
        {{ data.item.slug }}
      </template>
      <template v-slot:cell(action)="data">
        <div class="d-flex justify-content-around">
          <!-- Редактировать -->
          <inertia-link
            class="btn btn-sm mx-1 edit-button  btn-secondary"
            v-if="!data.item.deleted_at"
            :href="$route('admin.post.edit', data.item.id)"
          >
            <b-icon icon="pencil-fill"></b-icon>
          </inertia-link>
          <b-btn
            class="mx-1"
            v-if="data.item.deleted_at"
            @click="itemRestore(data.item.id)"
          >
            <b-icon icon="shift-fill"></b-icon>
          </b-btn>
          <b-btn class="mx-1" @click="itemDelete(data.item.id)">
            <b-icon icon="trash-fill"></b-icon>
          </b-btn>
        </div>
      </template>
    </b-table>
  </b-container>
</template>

<script>
export default {
  props: ["items"],
  data() {
    return {
      itemShowId: false,
      tableFields: [
        { key: "id", label: "", class: "id" },
        { key: "title", label: "Название", class: "title" },
        { key: "slug", label: "Ярлык", class: "slug" },
        { key: "date_add", label: "Созданный", class: "date_add text-nowrap" },
        { key: "status", label: "Статус", class: "status" },
        { key: "action", label: "Действие", class: "action" }
      ]
    };
  },
  methods: {
    /**
     * Добовляем стиль строкам
     */
    rowClass(item, type) {
      let rowClass = [];
      if (!item || type !== "row") return;

      if (item.viewed) rowClass.push("viewed");
      if (!!item.deleted_at) rowClass.push("deleted");
      return rowClass.join(" ");
    },
    /**
     * Удаление строки
     */
    itemDelete(id) {
      this.confirmModal("Удалить?").then(value => {
        if (value) {
          axios
            .delete(this.$route("admin.api.post.destroy", id))
            .then(response => {
              if (response.data === true) {
                const index = this.items.findIndex(item => item.id === id);
                this.items.splice(index, 1);
              }
            });
        }
      });
    },
    itemRestore(id) {
      axios.patch(this.$route("admin.api.post.restore", id)).then(response => {
        if (response.data === true) {
          const index = this.items.findIndex(item => item.id === id);
          this.items.splice(index, 1);
        }
      });
    },
    /**
     * Окно подтверждения
     */
    confirmModal(msg) {
      return this.$bvModal
        .msgBoxConfirm(msg, {
          title: "Подтвердите",
          size: "sm",
          buttonSize: "sm",
          okVariant: "danger",
          okTitle: "Да",
          cancelTitle: "Нет",
          footerClass: "p-2",
          hideHeaderClose: true,
          centered: true
        })
        .then(value => {
          return value;
        })
        .catch(err => {
          // An error occurred
        });
    },
    /**
     * Выбор строк таблицы-->
     */
    onRowSelected(items) {
      this.$emit("rowSelected", items);
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
    }
    /**
     * Выбор строк таблицы<--
     */
  }
};
</script>

<style>
.index-feedback tbody tr.deleted,
.index-feedback.deleted tbody tr {
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
