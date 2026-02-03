<script setup>
import { useRouter, useRoute } from 'vue-router';
import NavBar from '@/Components/NavBar.vue'
import Footer from '@/Components/Footer.vue'
</script>
<template>
  <div class="min-h-screen flex flex-col bg-background text-neutral">
    <NavBar />
    <main class="flex-1 pt-2"> 
      <router-view></router-view>
    </main>
    <Footer />
  </div>
</template>