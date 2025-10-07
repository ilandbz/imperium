<script setup>
const props = defineProps({
  left: {
    type: Object,
    required: true, // { image, title, subtitle, primary:{label,href}, secondary? }
  },
  right: {
    type: Object,
    required: true, // { image, title, subtitle, primary:{label,href} }
  },
})
</script>

<template>
  <section class="relative isolate">
    <div class="grid md:grid-cols-2">
      <!-- LEFT -->
      <div class="relative h-[60vh] md:h-[75vh] overflow-hidden">
        <img :src="left.image" alt="" class="absolute inset-0 size-full object-cover" />
        <!-- overlay turquesa -->
        <div class="absolute inset-0 bg-gradient-to-r from-primary/90 via-primary/60 to-transparent"></div>

        <div class="relative z-10 h-full flex flex-col justify-center px-6 md:px-10 text-white">
          <h2 class="text-white text-3xl md:text-4xl font-extrabold max-w-xl leading-tight">
            {{ left.title }}
          </h2>
          <p class="mt-3 max-w-xl/1 text-white/90">
            {{ left.subtitle }}
          </p>
          <div class="mt-6 flex gap-3">
            <a :href="left.primary.href"
               class="rounded-md bg-white text-primary font-semibold px-5 py-2.5 hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-white">
              {{ left.primary.label }}
            </a>
            <a v-if="left.secondary" :href="left.secondary.href"
               class="rounded-md border border-white/80 text-white font-semibold px-5 py-2.5 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white">
              {{ left.secondary.label }}
            </a>
          </div>
        </div>
      </div>

      <!-- RIGHT -->
      <div class="relative h-[60vh] md:h-[75vh] overflow-hidden">
        <img :src="right.image" alt="" class="absolute inset-0 size-full object-cover" />
        <!-- overlay turquesa (inverso) -->
        <div class="absolute inset-0 bg-gradient-to-l from-primary/90 via-primary/60 to-transparent"></div>

        <div class="relative z-10 h-full flex flex-col justify-center items-start md:items-end px-6 md:px-10 text-white text-left md:text-right">
          <h2 class="text-white text-3xl md:text-4xl font-extrabold max-w-xl leading-tight">
            {{ right.title }}
          </h2>
          <p class="mt-3 max-w-xl/1 text-white/90">
            {{ right.subtitle }}
          </p>
          <div class="mt-6">
            <a :href="right.primary.href"
               class="rounded-md bg-white text-primary font-semibold px-5 py-2.5 hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-white">
              {{ right.primary.label }}
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
