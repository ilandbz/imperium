<script setup>
import { Head } from '@inertiajs/vue3'
import SiteLayout from '@/Layouts/SiteLayout.vue'
import ArbitrationCalculatorSection from '@/Components/ArbitrationCalculatorSection.vue'
</script>
<template>

  <SiteLayout>
    <Head title="Calculadora" />

    <ArbitrationCalculatorSection
      :sunat-rate="3.378"
      :igv="0.18"
    />
  </SiteLayout>

    
</template>