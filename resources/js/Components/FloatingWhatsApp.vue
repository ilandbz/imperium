<script setup>
// Cambia por tu número (formato internacional sin +)
const phone = '51999999999'
const text  = encodeURIComponent('Hola, necesito información.')
const href  = `https://wa.me/${phone}?text=${text}`
</script>

<template>
  <a :href="href" target="_blank" rel="noopener"
     class="fixed bottom-4 right-4 flex items-center justify-center rounded-full w-14 h-14 bg-green-500 text-white shadow-lg hover:scale-105 transition"
     aria-label="Contact by WhatsApp"
  >
    <!-- Ícono simple -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-7 h-7" fill="currentColor" aria-hidden="true">
      <path d="M19.11 17.4c-.29-.14-1.71-.84-1.97-.93-.26-.1-.45-.14-.64.14-.19.29-.74.93-.91 1.12-.17.19-.34.21-.63.07-.29-.14-1.22-.45-2.33-1.44-.86-.77-1.44-1.73-1.61-2.02-.17-.29-.02-.45.12-.59.12-.12.29-.31.43-.47.14-.17.19-.29.29-.48.1-.19.05-.36-.02-.5-.07-.14-.64-1.55-.88-2.13-.23-.56-.47-.48-.64-.48h-.55c-.19 0-.5.07-.76.36-.26.29-1 1-1 2.43s1.03 2.82 1.17 3.01c.14.19 2.03 3.1 4.92 4.35.69.3 1.22.48 1.64.62.69.22 1.31.19 1.8.12.55-.08 1.71-.7 1.95-1.38.24-.67.24-1.25.17-1.38-.07-.12-.26-.19-.55-.33z"/><path d="M26.9 5.1A13.9 13.9 0 1 0 3.7 23.3L2 30l6.9-1.81A13.9 13.9 0 1 0 26.9 5.1m-4.33 17.46A11.15 11.15 0 0 1 9.44 24l-.81-.48-4.09 1.07 1.09-3.99-.52-.82a11.16 11.16 0 1 1 17.46 2.78z"/>
    </svg>
  </a>
</template>
