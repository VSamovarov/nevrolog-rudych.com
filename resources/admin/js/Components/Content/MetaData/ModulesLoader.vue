<template>
  <component
    :is="module"
    :type="type"
    :id="id"
    :moduleData="moduleData"
    :locales="locales"
    @changeData="$emit(`changeData`, { id, data: $event })"
  >
  </component>
</template>

<script>
export default {
  props: ["type", "id", "moduleData", "locales"],
  data() {
    return {
      module: null
    };
  },
  computed: {
    loader() {
      if (!this.type) {
        return null;
      }
      return () => import(`./Modules/${this.type}`);
    }
  },
  mounted: function() {
    this.loader().then(() => {
      this.module = () => ({
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
