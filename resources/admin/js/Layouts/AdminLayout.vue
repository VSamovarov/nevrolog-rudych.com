<template>
  <div id="page-wrapper">
    <Header :main_menu="main_menu" id="header"></Header>
    <div id="body" class="d-flex">
      <LeftColumn :sidebar_menu="adminSidebarMenu"></LeftColumn>
      <div class="main-content">
        <slot></slot>
      </div>
    </div>
    <Footer id="footer"></Footer>
  </div>
</template>
<script>
import Header from "./../Components/Header/Header";
import Footer from "./../Components/Footer/Footer";
import LeftColumn from "./../Components/LeftColumn/LeftColumn";
export default {
  components: { Header, Footer, LeftColumn },
  props: ['adminSidebarMenu'],
  data() {
    return {
      main_menu: [
        {
          href: "orders/orders",
          title: "Заказы",
        },
        {
          href: "categories",
          title: "Каталог",
        },
        {
          href: "pages/pages",
          title: "Страницы",
        },
        {
          href: "settings",
          title: "Настройки",
        },
        {
          href: "food-recipes",
          title: "Рецепты",
        },
        {
          href: "logistics",
          title: "Логистика",
        },
        {
          href: "statistics",
          title: "Статистика",
        },
        {
          href: "cashier",
          title: "Касса",
        },
      ],

      // sidebar_menu: [
      //   {
      //     title: "Feedback",
      //     icon: "shop-window",
      //     href: "/admin/feedback",
      //     hiddenOnCollapse: true,
      //   },
      //   {
      //     title: "Test",
      //     href: "/admin/test",
      //     hiddenOnCollapse: true,
      //   },
      //   {
      //     title: "Акции",
      //     icon: "award",
      //     hiddenOnCollapse: true,
      //     href: "/admin/test",
      //     submenu: [
      //       {
      //         href: "admin/test",
      //         title: "Все акции",
      //       },
      //       {
      //         href: "/admin/test",
      //         title: "Добавить акцию",
      //       },
      //     ],
      //   },
      //   {
      //     title: "Свойства товаров",
      //     icon: "check2-square",
      //     hiddenOnCollapse: true,
      //     href: "/admin/test",
      //     submenu: [
      //       {
      //         href: "/admin/test",
      //         title: "Все свойства",
      //       },
      //       {
      //         href: "/admin/test",
      //         title: "Добавить свойство",
      //       },
      //     ],
      //   },
      //   {
      //     title: "Комментарии",
      //     icon: "chat-quote",
      //     href: "/admin/test",
      //     hiddenOnCollapse: true,
      //     submenu: [
      //       {
      //         href: "/admin/test",
      //         title: "Все комментарии",
      //       },
      //       {
      //         href: "/admin/test",
      //         title: "Неотмодерированные",
      //       },
      //     ],
      //   },
      // ],
    };


 },
  mounted: function () {
    // console.log(this.$page);

  },
};
</script>
<style>
html {
  min-width: 1024px;
}
html,
body,
#__nuxt,
#__layout,
#app,
#page-wrapper {
  height: 100%;
}
#page-wrapper {
  display: flex;
  flex-direction: column;
  box-sizing: border-box;
}
#body {
  box-sizing: border-box;
  flex: 1 0 auto;
}
#footer {
  box-sizing: border-box;
  flex: 0 0 auto;
}
#body > .main-content {
  width: 100%;
}
</style>
