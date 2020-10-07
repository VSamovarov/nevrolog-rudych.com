
<template>
  <footer id="footer">
    <div class="container-fluid">Produktoff {{ new Date().getFullYear() }}</div>
  </footer>
</template>

<script>
export default {};
</script>

<style>
#footer {
  background-color: var(--gray-dark);
  padding: 0.5rem 1rem;
  text-align: center;
  color: var(--gray);
}
</style>
