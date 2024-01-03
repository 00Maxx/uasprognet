<script setup>
import Nasabah from './components/Nasabah.vue'
import Dashboard from './components/dashboard.vue'
</script>

<template>
  <div class="w-screen h-screen flex">

  <Dashboard />

  <div class="pl-[500px] h-full">
  <RouterView />
  </div>

  </div>
</template>

