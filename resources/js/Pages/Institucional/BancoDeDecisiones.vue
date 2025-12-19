<!-- resources/js/Pages/Institucional/BancoDeLaudos.vue -->
<script setup>
import { ref, computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import SiteLayout from '@/Layouts/SiteLayout.vue'


const props = defineProps({
  laudos: { type: Array, default: () => [] },
  pageSize: { type: Number, default: 10 },
})

export const bancoDecisiones = [
  // ===== 2013 =====
  {
    id: 1,
    year: 2013,
    titulo: 'Empresa Group vs Municipalidad de Tusi – Falta de impulso',
    pdf: '/storage/bancodeciciones/2013/exp_02-2013_arb_dmt_empresa_group_dmd_tusi-pas_falta_de_impulso_.pdf'
  },
  {
    id: 2,
    year: 2013,
    titulo: 'Municipalidad de Tocache – Archivado',
    pdf: '/storage/bancodeciciones/2013/exp_n_04-2013_arb._municipalidad_de_tocache_archivado_.pdf'
  },

  // ===== 2014 =====
  {
    id: 3,
    year: 2014,
    titulo: 'Enrique Lucen del Campo vs Gobierno Regional – Laudo',
    pdf: '/storage/bancodeciciones/2014/exp.n_012-2014_enrique_lucen_del_campo_y_gobierno_regional_2_laudo_.pdf'
  },
  {
    id: 4,
    year: 2014,
    titulo: 'Damms Consultores – Archivado',
    pdf: '/storage/bancodeciciones/2014/exp.n_09-2014_arb._damms_consultores_y_ejecutores_e.i.r.l_archivado_.pdf'
  },
  {
    id: 5,
    year: 2014,
    titulo: 'Vethel SAC vs Municipalidad de San Francisco de Yarus Yacan – Laudo',
    pdf: '/storage/bancodeciciones/2014/exp._n_013-2014_arb._vethel_sac_y_muni._san_franc._de_yarus_yacan_-_pasco_laudo_.pdf'
  },
  {
    id: 6,
    year: 2014,
    titulo: 'Consorcio Señor de los Milagros – Sin laudo',
    pdf: '/storage/bancodeciciones/2014/exp._n_06-2014_arb._consorcio_senor_de_los_milagros_sin_laudo.pdf'
  },
  {
    id: 7,
    year: 2014,
    titulo: 'Consorcio 28 de Julio vs Gobierno Regional de Huánuco – Laudo',
    pdf: '/storage/bancodeciciones/2014/exp_015-2014_tomo_i_arb_consorcio_28_de_julio_gobierno_regional_de_huanuco_laudo_.pdf'
  },
  {
    id: 8,
    year: 2014,
    titulo: 'Consorcio Santa Rosa vs Gobierno Regional de Pasco – Tomo II (Laudo)',
    pdf: '/storage/bancodeciciones/2014/exp_n_011-2014_tomo_ii_arb._consorcio_santa_rosa_y_gob_regional_de_pasco_laudo.pdf'
  },

  // ===== 2015 =====
  {
    id: 9,
    year: 2015,
    titulo: 'Consorcio Huaracalla vs Municipalidad Provincial de Ambo – Conciliación',
    pdf: '/storage/bancodeciciones/2015/exp_n_009-2015_consorcio_huaracalla_vs_municipalidad_provincial_de_ambo_conciliacion_.pdf'
  },
  {
    id: 10,
    year: 2015,
    titulo: 'Consorcio Pillco Marca vs Universidad Hermilio Valdizán – Desistimiento',
    pdf: '/storage/bancodeciciones/2015/exp_n_012-2015_arb_dmt_consorcio_pillco_marca_vs_dmdo_universidad_hermilio_valdizan_desestimiento_.pdf'
  },

  // ===== 2016 =====
  {
    id: 11,
    year: 2016,
    titulo: 'Consorcio Pillco Marca vs Universidad Hermilio Valdizán – Laudo',
    pdf: '/storage/bancodeciciones/2016/exp_n_01-2016_tomo_i_arb._consorcio_pillco_marca_vs_universidad_hermilio_valdizan_laudo_.pdf'
  },
  {
    id: 12,
    year: 2016,
    titulo: 'Corporación Beteta vs Gobierno Regional de Huánuco – Laudo',
    pdf: '/storage/bancodeciciones/2016/exp_n_07-2016_arb_consorcio_corporacion_beteta_vs_gobierno_regional_de_huanuco_laudo_.pdf'
  },

  // ===== 2017 =====
  {
    id: 13,
    year: 2017,
    titulo: 'Consorcio Megauni vs Universidad Nacional Hermilio Valdizán – Tomo I',
    pdf: '/storage/bancodeciciones/2017/exp_n_0006-2017_demandante_consorcio_megauni_vs_demandado_universidad_nacional_hermilio_valdizan_tomo_i.pdf'
  },

  // ===== 2018 =====
  {
    id: 14,
    year: 2018,
    titulo: 'Consorcio Mama Ashu vs Municipalidad Provincial de Asunción – Laudo',
    pdf: '/storage/bancodeciciones/2018/exp_arb_n_004-2018_demandante_consorcio_mama_ashu_vs_demandado_municipalidad_provincial_de_asuncion_laudo_.pdf'
  },

  // ===== 2019 =====
  {
    id: 15,
    year: 2019,
    titulo: 'Jorge Simón Phevoz Jarra vs Gustavo Tomás Jacha Valladares – Sin laudo',
    pdf: '/storage/bancodeciciones/2019/exp_n_04-2019_demandante_jorge_simon_phevoz_jarra_vs_demandado_gusstavo_tomas_jacha_valladdares_sin_laudo_.pdf'
  },

  // ===== 2020 =====
  {
    id: 16,
    year: 2020,
    titulo: 'Consorcio Pillco Mozo vs Municipalidad de Huánuco – Laudo / Conciliación',
    pdf: '/storage/bancodeciciones/2020/exp._arbitral_no_003-2020_consorcio_pillco_mozo_vs_municipalidad_de_huanuco_laudo_-_conciliacion_.pdf'
  },

  // ===== 2024 =====
  {
    id: 17,
    year: 2024,
    titulo: 'Consorcio Group Saneamiento vs Municipalidad Distrital de Constitución – Laudo',
    pdf: '/storage/bancodeciciones/2024/exp._arbitral_004-2024_consorcio_group_saneamiento_vs_municipalidad_distrital_de_constitucion_laudo_.pdf'
  },

  // ===== 2025 =====
  {
    id: 18,
    year: 2025,
    titulo: 'Consorcio Ejecutor Jesús vs Municipalidad Provincial de Lauricocha',
    pdf: '/storage/bancodeciciones/2025/exp._004-2025_consorcio_ejecutor_jesus_vs_municipalidad_provincial_de_lauricocha.pdf'
  }
]


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
            Nº DE LAUDOS: <span class="text-primary">{{ total }}</span>
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
