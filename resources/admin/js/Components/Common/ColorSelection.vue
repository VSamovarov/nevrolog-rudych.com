<template>
  <div v-if="colors" class="d-flex flex-wrap">
    <div>
      <label class="d-flex align-items-center">
        <input
          type="radio"
          :name="name"
          value="#fff"
          :checked="!value"
          @input="$emit('input', null)"
        />
        <span class="color-icone"> </span>
      </label>
    </div>
    <div v-for="color in colors" :key="color">
      <label class="d-flex align-items-center">
        <input
          type="radio"
          :name="name"
          :value="color"
          :checked="color === value"
          @input="$emit('input', $event.target.value)"
        />
        <span
          class="color-icone"
          :style="{
            backgroundColor: color
          }"
        >
        </span>
      </label>
    </div>
  </div>
</template>

<script>
import { uid } from "./../../Helpers/Sting";
export default {
  props: {
    colors: {
      type: Array,
      default: []
    },
    value: {
      type: String
    }
  },
  data() {
    return {
      selected: "",
      name: uid()
    };
  }
};
</script>

<style scoped>
.color-icone {
  display: inline-block;
  width: 2rem;
  height: 1.2rem;
  margin: 0 0.4rem 0 0.2rem;
  border: 1px solid grey;
}
</style>
