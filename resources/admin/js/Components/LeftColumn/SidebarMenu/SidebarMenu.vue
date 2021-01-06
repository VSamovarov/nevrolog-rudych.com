<template>
  <ul class="menu">
    <template v-for="(menu, id) of menuData">
      <SidebarMenuItem :class="{ active: menu.active }" :key="id">
        <LinkMenu :href="menu.submenu ? '' : menu.href">
          <Icon class="item-menu-icon" :icon="menu.icon"></Icon>
          <span class="item-menu-text">{{ menu.title }}</span>
        </LinkMenu>
        <ul v-if="menu.submenu" class="sub-menu">
          <template v-for="(submenu, id_submenu) of menu.submenu">
            <SidebarMenuItem
              :class="{ active: menu.active }"
              :key="`${id}-${id_submenu}`"
            >
              <LinkMenu :href="submenu.href">
                <span class="item-menu-text">{{ submenu.title }}</span>
              </LinkMenu>
            </SidebarMenuItem>
          </template>
        </ul>
      </SidebarMenuItem>
    </template>
    <!-- <li class="item-menu" v-for="(menu, id) of menuData" :class="{active:menu.active}":key="id">
      <SidebarMenuItem :href="menu.submenu ? '' : menu.href">
        <Icon :icon="menu.icon"></Icon>
        <span class="item-menu-text">{{ menu.title }}</span>
      </SidebarMenuItem>
      <ul v-if="menu.submenu" class="sub-menu">
        <li
          class="item-menu"
          v-for="(submenu, id_submenu) of menu.submenu"
          :key="id_submenu"
        >
          <SidebarMenuItem :href="submenu.href">
            <span class="item-menu-text">{{ submenu.title }}</span
            >&nbsp;
            <span
              v-if="submenu.count"
              class="item-menu-ban badge badge-light"
              >{{ submenu.count }}</span
            >
          </SidebarMenuItem>
        </li>
      </ul>
    </li> -->
  </ul>
</template>

<script>
import SidebarMenuItem from "./SidebarMenuItem";
import LinkMenu from "./LinkMenu";
import Icon from "../../Common/Icon";
export default {
  components: {
    SidebarMenuItem,
    LinkMenu,
    Icon
  },
  data() {
    return {};
  },
  props: {
    menuData: {
      required: true
    }
  }
};
</script>

<style>
.menu,
.sub-menu,
.item-menu,
.menu-link {
  margin: 0;
  padding: 0;
  list-style: none;
  display: block;
  color: var(--light);
  line-height: 1.3;
}
.menu-link {
  padding: 0.4em 0;
  white-space: nowrap;
  position: relative;
}
.menu-link:hover {
  text-decoration: none;
  color: var(--ligh);
}
.item-menu-text {
  white-space: normal;
}
.menu {
  font-size: 1rem;
  padding-left: 1.4em;
}
.item-menu-icon {
  margin-left: -1.4em;
  font-size: 1.1em;
  position: relative;
  top: -0.05em;
}
.menu > .item-menu {
  margin-bottom: 0.8em;
}
.sub-menu > .item-menu {
  font-size: 0.8em;
}
.menu-link.nuxt-link-exact-active .item-menu-text,
a.menu-link:hover .item-menu-text {
  color: rgb(253, 255, 142);
  text-decoration: underline;
}
.sidebar.hide .sub-menu,
.sidebar.hide .item-menu-text {
  display: none;
}
</style>
