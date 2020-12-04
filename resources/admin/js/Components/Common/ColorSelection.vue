<template>
  <div v-if="colors" class="d-flex flex-wrap">
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
          :style="{
            color: color,
            backgroundColor: color,
            display: 'inline-block',
            width: '2rem',
            height: '1.2rem',
            margin: '0 .4rem 0 .2rem'
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
      type: String || null,
      type: null
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

<style></style>
