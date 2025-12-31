<script setup>
import { Head } from '@inertiajs/vue3'
import SiteLayout from '@/Layouts/SiteLayout.vue'
import JuntaCalculatorSection from '@/Components/JuntaCalculatorSection.vue'
</script>
<template>

  <SiteLayout>
    <Head title="Calculadora" />

    <JuntaCalculatorSection
      :sunat-rate="3.378"
      :igv="0.18"
    />
    
  </SiteLayout>

    
</template>