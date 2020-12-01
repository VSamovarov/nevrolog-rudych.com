<template>
  <component
    :is="moduleComponent"
    :module="module"
    :locales="locales"
    :post="post"
    @changeModule="$emit(`changeModule`, $event)"
  >
  </component>
</template>

<script>
export default {
  props: ["module", "locales", "post"],
  data() {
    return {
      moduleComponent: null
    };
  },
  computed: {
    loader() {
      if (!this.module.name) {
        return null;
      }
      return () => import(`./Modules/${this.module.name}`);
    }
  },
  mounted: function() {
    this.loader().then(() => {
      this.moduleComponent = () => ({
        // Загружаемый компонент. Значение должно быть Promise
        component: this.loader(),
        // Компонент загрузки, используемый пока загружается асинхронный компонент
        // loading: LoadingComponent,
        // Компонент ошибки, используемый при неудачной загрузке
        // error: ErrorComponent,
        // Задержка перед показом компонента загрузки. По умолчанию: 200 мс.
        delay: 200,
        // Компонент ошибки будет отображаться, если таймаут
        // был указан и время ожидания превышено. По умолчанию: Infinity.
        timeout: 3000
      });
    });
    // .catch(() => {
    //     this.module = () => import('./../Components/Modules/Default')
    // })
  }
};
</script>

<style></style>
