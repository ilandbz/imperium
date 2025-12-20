<!-- resources/js/Pages/Institucional/BancoDeLaudos.vue -->
<script setup>
import { ref, computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import SiteLayout from '@/Layouts/SiteLayout.vue'
import { bancoDecisiones } from '@/Data/bancoDecisiones'

const props = defineProps({
  laudos: { type: Array, default: () => [] },
  pageSize: { type: Number, default: 10 },
})




// === estado / cálculos ===
const data = computed(() => bancoDecisiones)

// búsqueda simple
const q = ref('')

const filtered = computed(() => {
  if (!q.value.trim()) return data.value

  const t = q.value.toLowerCase()

  return data.value.filter(r =>
    String(r.id).includes(t) ||
    String(r.year).includes(t) ||
    r.titulo.toLowerCase().includes(t)
  )
})
// paginación
const current = ref(1)
const pageSize = ref(10)
const total = computed(() => filtered.value.length)
const totalPages = computed(() => Math.max(1, Math.ceil(total.value / pageSize.value)))

const pageData = computed(() => {
  const start = (current.value - 1) * pageSize.value
  return filtered.value.slice(start, start + pageSize.value)
})

const go = (p) => {
  current.value = Math.min(Math.max(1, p), totalPages.value)
}

const range = computed(() => {
  const pages = []
  const max = totalPages.value
  const cur = current.value
  const window = 2
  let s = Math.max(1, cur - window)
  let e = Math.min(max, cur + window)
  if (cur <= window) e = Math.min(max, 1 + window * 2)
  if (cur + window > max) s = Math.max(1, max - window * 2)
  for (let i = s; i <= e; i++) pages.push(i)
  return pages
})
</script>

<template>
  <SiteLayout>
    <Head title="BANCO DE DESICIONES | Corporación Imperium" />

    <!-- Hero -->
    <section
      class="relative h-48 md:h-56 w-full flex items-end"
      style="background-image:url('/img/laudos.jpg'); background-size:cover; background-position:center;"
    >
      <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-black/0"></div>
      <div class="relative max-w-7xl mx-auto w-full px-4 pb-6">
        <h1 class="text-3xl md:text-4xl font-extrabold text-white drop-shadow">
          BANCO DE DESICIONES
        </h1>
      </div>
    </section>

    <section class="py-10 px-4">
      <div class="max-w-6xl mx-auto">
        <!-- Top bar -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-4">
          <div class="text-sm font-semibold text-neutral-700">
            Nº DE EXPEDIENTES CON RESOLUCIONES Y DECISIONES ARBITRALES:
          </div>

          <div class="w-full sm:w-80">
            <input
              v-model="q"
              type="search"
              placeholder="Buscar por año, ID o descripción…"
              class="w-full rounded-xl border px-3 py-2"
              @input="go(1)"
            />
          </div>
        </div>

        <!-- Tabla -->
        <div class="overflow-x-auto bg-white border border-neutral/20 rounded-xl">
          <table class="min-w-[720px] w-full">
            <thead>
              <tr class="bg-[#0A2A57] text-white">
                <th class="px-4 py-3 w-16">ID</th>
                <th class="px-4 py-3 w-20">AÑO</th>
                <th class="px-4 py-3">DESCRIPCIÓN</th>
                <th class="px-4 py-3 w-24 text-center">PDF</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="row in pageData"
                :key="row.id"
                class="border-t hover:bg-neutral-50"
              >
                <td class="px-4 py-3">{{ row.id }}</td>
                <td class="px-4 py-3">{{ row.year }}</td>

                <td class="px-4 py-3">
                  {{ row.titulo }}
                </td>

                <td class="px-4 py-3 text-center">
                  <a
                    :href="row.pdf"
                    target="_blank"
                    class="text-primary font-semibold hover:underline"
                  >
                    Ver
                  </a>
                </td>
              </tr>

              <tr v-if="pageData.length === 0">
                <td colspan="4" class="px-4 py-6 text-center text-neutral-500">
                  No se encontraron resultados.
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Footer tabla -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-3 mt-4 text-sm">
          <div class="text-neutral-600">
            Mostrando {{ pageData.length }} de {{ total }} resultados
          </div>

          <div class="flex items-center gap-1">
            <button
              class="px-2 py-1 rounded border border-neutral/30 hover:bg-neutral-100"
              @click="go(1)" :disabled="current===1"
            >&laquo;</button>
            <button
              class="px-2 py-1 rounded border border-neutral/30 hover:bg-neutral-100"
              @click="go(current-1)" :disabled="current===1"
            >&lsaquo;</button>

            <button
              v-for="p in range"
              :key="p"
              class="px-3 py-1 rounded border"
              :class="p===current
                ? 'bg-primary text-white border-primary'
                : 'border-neutral/30 hover:bg-neutral-100'"
              @click="go(p)"
            >
              {{ p }}
            </button>

            <button
              class="px-2 py-1 rounded border border-neutral/30 hover:bg-neutral-100"
              @click="go(current+1)" :disabled="current===totalPages"
            >&rsaquo;</button>
            <button
              class="px-2 py-1 rounded border border-neutral/30 hover:bg-neutral-100"
              @click="go(totalPages)" :disabled="current===totalPages"
            >&raquo;</button>
          </div>
        </div>
      </div>
    </section>
  </SiteLayout>
</template>
