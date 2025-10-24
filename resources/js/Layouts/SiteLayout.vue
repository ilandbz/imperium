<script setup>
import { ref } from 'vue'
import NavBar from '@/Components/NavBar.vue'
import Footer from '@/Components/Footer.vue'
//import SplashLoader from '@/Components/SplashLoader.vue'
import SplashLoaderGradient from '@/Components/SplashLoaderGradient.vue'
import CertificationsModal from '@/Components/CertificationsModal.vue'

const showIso = ref(false)
const onSplashHidden = () => { showIso.value = true } 
</script>

<template>
  <div class="min-h-screen flex flex-col bg-background text-neutral">
    <!-- <SplashLoader /> -->
    <SplashLoaderGradient @hidden="onSplashHidden" />
    <NavBar />
    <main class="flex-1 pt-2"> <!-- separa del header sticky -->
      <slot />
    </main>
    <Footer />
    <CertificationsModal v-model="showIso" />
  </div>
</template>