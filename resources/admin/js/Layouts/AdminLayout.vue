<template>
  <div>
    <Header :main_menu="main_menu"></Header>
    <div id="body" class="d-flex">
      <LeftColumn :sidebar_menu="sidebar_menu"></LeftColumn>
      <div class="main-content">
        <slot></slot>
      </div>
    </div>
    <Footer></Footer>
  </div>
</template>
<script>
import Header from "./../Components/Header/Header";
import Footer from "./../Components/Footer/Footer";
import LeftColumn from "./../Components/LeftColumn/LeftColumn";
export default {
  components: { Header, Footer, LeftColumn },
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
      sidebar_menu: [
        {
          title: "Feedback",
          icon: "shop-window",
          routeName: "admin.feedback.index",
          hiddenOnCollapse: true,
        },
        {
          title: "Test",
          routeName: "admin.test",
          hiddenOnCollapse: true,
        },
        {
          title: "Акции",
          icon: "award",
          hiddenOnCollapse: true,
          routeName: "admin.test",
          submenu: [
            {
              routeName: "admin.test",
              title: "Все акции",
            },
            {
              routeName: "admin.test",
              title: "Добавить акцию",
            },
          ],
        },
        {
          title: "Свойства товаров",
          icon: "check2-square",
          hiddenOnCollapse: true,
          routeName: "admin.test",
          submenu: [
            {
              routeName: "admin.test",
              title: "Все свойства",
            },
            {
              routeName: "admin.test",
              title: "Добавить свойство",
            },
          ],
        },
        {
          title: "Комментарии",
          icon: "chat-quote",
          routeName: "admin.test",
          hiddenOnCollapse: true,
          submenu: [
            {
              routeName: "admin.test",
              title: "Все комментарии",
            },
            {
              routeName: "admin.test",
              title: "Неотмодерированные",
            },
          ],
        },
      ],
    };
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
#app {
  height: 100%;
}
#app {
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
</style>
