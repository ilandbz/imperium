<script setup>
const props = defineProps({
  item: { type: Object, required: true } // { title, excerpt, icon?, href? }
})
</script>

<template>
  <article class="group rounded-2xl border border-neutral/10 bg-white p-6 hover:shadow-md transition">
    <div class="text-3xl leading-none mb-3">
      <span v-if="item.icon">{{ item.icon }}</span>
      <span v-else>⚖️</span>
    </div>

    <h3 class="text-lg font-extrabold text-neutral">{{ item.title }}</h3>
    <p class="mt-2 text-[14.5px] text-neutral/70 leading-relaxed">{{ item.excerpt }}</p>

    <a
      v-if="item.href"
      :href="item.href"
      class="mt-4 inline-flex items-center gap-1 text-primary font-semibold hover:underline"
    >
      Ver más
      <span aria-hidden>→</span>
    </a>
  </article>
</template>
