<script setup>
defineProps({
  title: { type: String, required: true },
  href:  { type: String, required: true },
  image: { type: String, required: true },
})
</script>

<template>
  <a :href="href" :title="title"
     class="flex h-[350px] md:h-[270px] flex-col justify-center items-center gap-2
            shadow-custom hover:border hover:border-primary rounded-xl p-2
            relative group overflow-hidden w-[280px] card-service">
    <img :src="image" :alt="title" width="140" height="140"
         class="w-[140px] h-[140px] animation-scale2 rounded-full object-cover" />
    <h3 class="text-primary text-[1.40rem] font-medium text-center px-2 animation-scale2">
      {{ title }}
    </h3>
  </a>
</template>

<style scoped>

a {
  text-decoration: none !important;
}
a:hover {
  text-decoration: none !important;
}
.animation-scale2 { transition: transform .35s ease; }
.card-service:hover .animation-scale2 { transform: scale(1.05); }

</style>
