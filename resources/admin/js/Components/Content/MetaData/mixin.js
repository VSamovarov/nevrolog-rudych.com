const myMixin = {
  methods: {
    /**
     * Общая часть
     */
    getValue(name) {
      return this.module &&
        this.module._value &&
        this.module._value[name] !== undefined
        ? this.module._value[name]
        : null;
    },

    getModule(name) {
      if (this.module._value === undefined) {
        this.$set(this.module, "_value", {});
      }
      if (this.module._value[name] === undefined) {
        this.$set(this.module._value, name, {});
      }


      return this.module._value[name];
    },

    changeModule(name, value) {
      if (this.module._value === undefined) {
        this.$set(this.module, "_value", {});
      }
      this.$set(this.module._value, name, value);
      this.$emit(`changeModule`, module);
    }
  }
};

export default myMixin;
