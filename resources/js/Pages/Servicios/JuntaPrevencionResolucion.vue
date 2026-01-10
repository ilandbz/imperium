<script setup>
import { ref, computed } from 'vue'
import { Head, Link } from '@inertiajs/vue3'
import SiteLayout from '@/Layouts/SiteLayout.vue'

const openIndex = ref(0)

const sections = [
  {
    title: 'Presenta tu solicitud de Junta de Prevención y Resolución de Disputas (JPRD)',
    description:
      'Formatos y documentos necesarios para solicitar la instalación y funcionamiento de la JPRD.',
    items: [
      {
        label: 'Debida Diligencia — Demandante o Demandado (Privado)',
        href: '/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/presentar-solicitud/debida-diligencia-pasa-sn---demandante-o-demandado-privado-f-001ddp.docx',
        type: 'DOCX',
      },
      {
        label: 'Debida Diligencia — Demandante o Demandado (Público)',
        href: '/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/presentar-solicitud/debida-diligencia-pasa-sn---demandante-o-demandado-publico-f-002ddp.docx',
        type: 'DOCX',
      },
      {
        label: 'Solicitud de Inicio de JRD con cláusula (F004-SI)',
        href: '/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/presentar-solicitud/solicitud-de-inicio-de-jrd--con-clausula-f004-si.docx',
        type: 'DOCX',
      },
      {
        label: 'Solicitud de Inicio de JRD sin cláusula (F003-SI)',
        href: '/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/presentar-solicitud/solicitud-de-inicio-de-jrd--sin-clausula-f003-si.docx',
        type: 'DOCX',
      },
      {
        label: 'Contrato Tripartito Corporación IMPERIUM (Anexo 001 CTCI)',
        href: '/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/presentar-solicitud/contrato-tripartito-corporacion-imperium-anexo-001-ctci.docx',
        type: 'DOCX',
      },
      {
        label: 'Acta de Inicio de Funciones (Anexo 002 AIF)',
        href: '/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/presentar-solicitud/acta-de-inicio-de-funciones--anexo-002-aif.docx',
        type: 'DOCX',
      },
      {
        label: 'Directiva 012-2019-OSCE',
        href: '/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/presentar-solicitud/directiva-012-2019-osce.pdf',
        type: 'PDF',
      },
    ],
  },

  {
    title: 'Reglamentos',
    description: 'Normativa aplicable a la Junta de Prevención y Resolución de Disputas.',
    items: [
      {
        label: 'Código de Ética — Corporación IMPERIUM',
        //href: '/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/codigo-de-etica-corporacion-imperium.pdf',
        href: '/archivos/servicios/arbitraje-en-contrataciones-publicas/reglamento/codigo-de-etica-corporacion-imperium.pdf',
        type: 'PDF',
      },
      {
        label: 'Estatuto del Centro',
        href: '/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/reglamento/estatuto-del-centro-.pdf',
        type: 'PDF',
      },
      {
        label: 'Nómina de Árbitros / Miembros de JPRD',
        href: '/institucional/miembrosjprd',
        type: 'URL',
      },
      {
        label: 'TARIFARIO Y COSTOS DE LA JPRD',
        href: '/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/reglamento/tarifario_jprd.pdf',
        type: 'PDF',
      },
      {
        label: 'Reglamento Interno — Corporación IMPERIUM',
        href: '/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/reglamento-interno-corporacion-imperium.pdf',
        type: 'PDF',
      },
      {
        label: 'Cláusula Arbitral — Modelo (Centro)',
        href: '/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/reglamento/clausula-arbitral-centro.docx',
        type: 'DOCX',
      },
      {
        label: 'Banco de Desciones — JPRD',
        href: '/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/reglamento/clausula-arbitral-centro.docx',
        type: 'DOCX',
      },
    ],
  },
]

const toggle = (idx) => {
  openIndex.value = openIndex.value === idx ? -1 : idx
}
const conformacionJPRD = ref('colegiada') // unico | colegiado
const miembros = computed(() =>
  conformacionJPRD.value === 'unipersonal' ? 1 : 3
)

const props = defineProps({
  title: { type: String, default: 'Calculadora de JUNTA DE PREVENCIÓN Y RESOLUCIÓN DE DISPUTAS (JPRD)' },
  subtitle: {
    type: String,
    default:
      'Permite calcular los costos aplicables a las pretensiones en controversia sometidas a la Junta de Prevención y Resolución de Disputas (JPRD), considerando la conformación de la Junta y los costos de administración del proceso.'
  },
  tablaCostosUrl: {
    type: String,
    default: '/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/tarifario_jprd.pdf'
  },

 
  sunatRate: { type: Number, default: 3.378 },

  arbitratorPct: { type: Number, default: 0.034 }, // 3.4%

  calcStrategy: { type: Function, default: null }
})

function calcularJPRD(base, miembros = 3) {
  let admin = 0
  let retribucionMiembro = 0

  if (miembros === 3) {
    if (base <= 40_000_000) {
      admin = 3200
      retribucionMiembro = 3000
    } else if (base <= 70_000_000) {
      admin = 3400
      retribucionMiembro = 5000
    } else if (base <= 100_000_000) {
      admin = 3600
      retribucionMiembro = 6000
    } else if (base <= 150_000_000) {
      admin = 3700
      retribucionMiembro = 7000
    } else if (base <= 300_000_000) {
      admin = 3800
      retribucionMiembro = 8000
    } else {
      admin = 3900
      retribucionMiembro = 10000
    }

    return {
      admin,
      miembros: retribucionMiembro * 3
    }
  }

  // 🔹 JPRD UNIPERSONAL
  if (base <= 40_000_000) {
    admin = 4000
    retribucionMiembro = 5000
  } else if (base <= 70_000_000) {
    admin = 7000
    retribucionMiembro = 7000
  } else if (base <= 100_000_000) {
    admin = 8000
    retribucionMiembro = 9000
  } else if (base <= 150_000_000) {
    admin = 9000
    retribucionMiembro = 10000
  } else if (base <= 300_000_000) {
    admin = 10000
    retribucionMiembro = 11000
  } else {
    admin = 14000
    retribucionMiembro = 15000
  }

  return {
    admin,
    miembros: retribucionMiembro
  }
}

/* ---------- STATE ---------- */
const showModal = ref(false)
const hasCalculated = ref(false)

const amount = ref('')            // input monto
const money = ref('PEN')          // PEN | USD
const mode = ref('regular')       // regular | emergencia (por si luego quieres usarlo)
const tipoArbitraje = ref('arbitro_unico')  // 'unico' | 'tribunal'
const categoria = ref('nacional')  // 'nacional' | 'internacional'

const parsedAmount = computed(() => {
  const n = Number(String(amount.value).replace(/[^\d.,]/g, '').replace(',', '.'))
  return isFinite(n) ? n : 0
})

const amountInPEN = computed(() => {
  if (money.value === 'PEN') return parsedAmount.value
  return parsedAmount.value * props.sunatRate
})

function formatMoney(value) {
  if (value === null || value === undefined || isNaN(value)) {
    return '0.00'
  }

  return Number(value).toLocaleString('es-PE', {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  })
}

const results = computed(() => {
  const base = amountInPEN.value
  if (!base || base <= 0) {
    return { admin: 0, miembros: 0, total: 0 }
  }

const r = calcularJPRD(amountInPEN.value, miembros.value)

  return {
    admin: r.admin,
    miembros: r.miembros,
    total: r.admin + r.miembros
  }
})

const presentationFee = computed(() => {
  if (!amountInPEN.value || amountInPEN.value <= 0) return 0

  return categoria.value === 'internacional'
    ? 1000
    : 870
})

const subtotal = computed(
  () => presentationFee.value + results.value.total
)

const totalPagar = computed(() => subtotal.value)

/* ---------- EVENTS ---------- */
function openModal() {
  showModal.value = true
  hasCalculated.value = false
}

function onSubmit(e) {
  e?.preventDefault?.()
  hasCalculated.value = true
}

function resetCalc() {
  amount.value = ''
  hasCalculated.value = false
}

function toggleMoney() {
  money.value = money.value === 'PEN' ? 'USD' : 'PEN'
}


const loadingPdf = ref(false)

async function handlePdf(action = 'download') {
  if (!hasCalculated.value || amountInPEN.value <= 0) return

  try {
    loadingPdf.value = true

    const payload = {
      monto_base: amountInPEN.value,
      moneda: money.value,
      conformacion_jprd: conformacionJPRD.value,
      categoria: categoria.value,
      tasa_presentacion: presentationFee.value,
      costo_administrativo: results.value.admin,
      retribucion_miembros: results.value.miembros,
      total: totalPagar.value
    }

    const res = await fetch('/calculadora-arbitraje/pdf', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': document
          .querySelector('meta[name="csrf-token"]')
          ?.getAttribute('content') || ''
      },
      body: JSON.stringify(payload)
    })

    if (!res.ok) {
      throw new Error('Error al generar el PDF')
    }

    const blob = await res.blob()
    const url = URL.createObjectURL(blob)

    if (action === 'view') {
      // Abrir en nueva pestaña para visualizar
      window.open(url, '_blank')
    } else {
      // Forzar descarga
      const link = document.createElement('a')
      link.href = url
      link.download = 'costos-arbitraje.pdf'
      document.body.appendChild(link)
      link.click()
      document.body.removeChild(link)
    }

    URL.revokeObjectURL(url)
  } catch (err) {
    console.error(err)
    alert('Ocurrió un error al generar el PDF.')
  } finally {
    loadingPdf.value = false
  }
}



</script>

<template>
  <SiteLayout>
    <Head title="Junta de Prevención y Resolución de Disputas | Corporación Imperium" />

    <!-- HERO / HEADER -->
    <section
      class="relative w-full py-10 md:py-14 text-white"
      style="background-image:url('/img/jprd.webp');background-size:cover;background-position:center"
    >
      <div class="absolute inset-0 bg-gradient-to-r from-[#071C54]/90 via-[#071C54]/80 to-[#071C54]/40" />

      <div class="relative max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-8 items-center">
        <div class="space-y-4 md:space-y-5">
          <p class="text-sm uppercase tracking-[0.25em] text-white/80">
            Junta de Prevención y Resolución de Disputas
          </p>

          <h1 class="text-3xl md:text-4xl font-extrabold text-white/90 max-w-xl">
            JUNTA DE PREVENCIÓN Y RESOLUCIÓN DE DISPUTAS (JPRD)
          </h1>

          <p class="text-sm md:text-base text-white/90 max-w-xl">
            Mecanismo especializado que acompaña la ejecución de contratos de obra y otros
            proyectos, previniendo controversias y emitiendo decisiones técnicas y oportunas
            durante su desarrollo.
          </p>

          <a
            href="/plataforma"
            class="inline-flex items-center justify-center rounded-full bg-white text-primary px-6 py-2.5 font-semibold text-sm hover:bg-white/90 shadow-md"
          >
            INGRESAR AQUÍ
          </a>
        </div>

        <div class="hidden md:flex justify-end">
          <div class="bg-white/95 rounded-2xl shadow-xl overflow-hidden max-w-sm w-full border border-white/40">
            <img
              src="/img/banner-arbitraje-publica.webp"
              alt="Cómo presentar tu solicitud de JPRD"
              class="w-full h-52 object-cover"
            />
            <div class="p-4 text-sm text-neutral-700">
              <p class="font-semibold text-primary mb-1">
                ¿Cómo solicitar la instalación de una JPRD?
              </p>
              <p>
                Descarga los formatos, revisa la normativa y presenta tu solicitud conforme a los
                lineamientos del Centro.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CUERPO PRINCIPAL -->
    <section class="py-10 px-4 bg-gray-50">
      <div class="max-w-7xl mx-auto grid lg:grid-cols-[minmax(0,2fr)_minmax(260px,1fr)] gap-10">
        <!-- Acordeón -->
        <div class="space-y-3">
          <div
            v-for="(section, idx) in sections"
            :key="section.title"
            class="border border-neutral-200 rounded-xl bg-white overflow-hidden"
          >
            <!-- header -->
            <button
              type="button"
              class="w-full flex items-center justify-between px-4 md:px-5 py-3.5 text-left hover:bg-neutral-50"
              @click="toggle(idx)"
            >
              <div>
                <p class="text-sm md:text-base font-semibold text-neutral-900">
                  {{ section.title }}
                </p>
                <p class="text-xs md:text-sm text-neutral-500 mt-0.5">
                  {{ section.description }}
                </p>
              </div>

              <span
                class="ml-4 inline-flex h-7 w-7 items-center justify-center rounded-full border border-primary text-primary text-xs"
              >
                <svg
                  v-if="openIndex !== idx"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 448 512"
                  class="h-3 w-3"
                  fill="currentColor"
                >
                  <path
                    d="M240 80c0-8.8-7.2-16-16-16s-16 7.2-16 16V240H48c-8.8 
                       0-16 7.2-16 16s7.2 16 16 16H208V432c0 8.8 7.2 16 16 
                       16s16-7.2 16-16V272H400c8.8 0 16-7.2 16-16s-7.2-16-16-16H240z"
                  />
                </svg>
                <svg
                  v-else
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 448 512"
                  class="h-3 w-3"
                  fill="currentColor"
                >
                  <path
                    d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 
                       0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 
                       14.3 32 32z"
                  />
                </svg>
              </span>
            </button>

            <!-- body -->
            <transition name="accordion">
              <div v-show="openIndex === idx" class="border-t border-neutral-200">
                <ul class="divide-y divide-neutral-100">
                  <li
                    v-for="item in section.items"
                    :key="item.label"
                    class="flex items-center justify-between px-4 md:px-5 py-3 text-sm"
                  >
                    <!-- ICONO DE ARCHIVO + NOMBRE -->
                    <div class="flex items-center gap-2">
                      <span
                        class="inline-flex h-7 w-7 items-center justify-center rounded-md bg-primary/10 text-primary"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 384 512"
                          class="h-4 w-4"
                          fill="currentColor"
                        >
                          <path
                            d="M224 136V0H64C28.7 0 0 28.7 0 64V448c0 35.3 
                               28.7 64 64 64H320c35.3 0 64-28.7 
                               64-64V160H248C234.7 160 224 149.3 224 136zM384 
                               121.9V128H256V0h6.1c12.7 0 24.9 5.1 
                               33.9 14.1L369.9 88c9 9 14.1 21.2 14.1 
                               33.9z"
                          />
                        </svg>
                      </span>
                      <span class="text-neutral-800">
                        {{ item.label }}
                      </span>
                    </div>

                    <!-- TIPO + ICONO DESCARGA -->
                    <div class="flex items-center gap-2">
                      <span
                        class="text-[11px] font-semibold px-2 py-0.5 rounded-full border border-primary/50 text-primary/80"
                      >
                        {{ item.type }}
                      </span>

                     <template v-if="item.type === 'URL'">
                        <Link
                          :href="item.href"
                          class="inline-flex h-8 w-8 items-center justify-center rounded-full text-primary hover:bg-primary/10"
                          title="Ver página"
                        >
                          <!-- icon -->
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"
                            class="h-4 w-4"
                            fill="currentColor"
                          >
                            <path
                              d="M320 0H96C60.7 0 32 28.7 32 64v384c0 35.3 
                                28.7 64 64 64h320c35.3 0 64-28.7 
                                64-64V160L320 0z"
                            />
                          </svg>
                        </Link>
                      </template>

                      <!-- ARCHIVO (PDF / DOCX) -->
                      <template v-else>
                        <a
                          :href="item.href"
                          target="_blank"
                          rel="noopener"
                          class="inline-flex h-8 w-8 items-center justify-center rounded-full text-primary hover:bg-primary/10"
                          :title="`Abrir ${item.type}`"
                        >
                          <!-- icon -->
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"
                            class="h-4 w-4"
                            fill="currentColor"
                          >
                            <path
                              d="M288 32c0-17.7-14.3-32-32-32s-32 
                                14.3-32 32v242.7l-73.4-73.3c-12.5-12.5-32.8-12.5-45.3 
                                0s-12.5 32.8 0 45.3l128 128c12.5 
                                12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 
                                12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 
                                274.7V32z"
                            />
                          </svg>
                        </a>
                      </template>
                    </div>
                  </li>
                </ul>
              </div>
            </transition>
          </div>
        </div>

        <!-- SIDEBAR -->
        <aside class="space-y-4">
          <div class="bg-white rounded-xl shadow-sm border border-neutral-200 p-5 text-sm">
            <h3 class="text-base font-semibold text-primary mb-2">
              Prevención y gestión de controversias
            </h3>
            <p class="text-neutral-700 leading-relaxed">
              La JPRD acompaña el contrato desde su inicio, emitiendo recomendaciones y decisiones
              técnicas que permiten resolver desacuerdos de manera temprana.
            </p>
          </div>

          <div class="bg-[#071C54] text-white rounded-xl p-5 text-sm space-y-2">
            <p class="text-xs font-semibold tracking-[0.15em] uppercase text-white/70">
              ¿Quieres integrar una JPRD?
            </p>
            <p class="text-sm">
              Revisa los requisitos para formar parte de la nómina de profesionales especializados.
            </p>

            <a
              href="/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/lineamientos.pdf"
              target="_blank"
              class="inline-flex mt-2 items-center justify-center rounded-full bg-white text-primary px-4 py-2 text-xs font-semibold hover:bg-white/90"
            >
              REVISAR REQUISITOS
            </a>
          </div>

          <div class="bg-[#0B2A7A] text-white rounded-xl p-5 text-sm flex justify-center gap-2">

            <button
              type="button"
              @click="openModal"
              class="w-28 inline-flex items-center justify-center rounded-full bg-white text-primary px-4 py-2 text-xs font-semibold hover:bg-white/90"
            >
              ABRIR CALCULADORA
            </button>
            <a
              href="/archivos/servicios/junta-de-prevencion-y-resolucion-de-disputas/tarifario_jprd.pdf"
              target="_blank"
              class="w-28 inline-flex items-center justify-center rounded-full bg-white text-primary px-4 py-2 text-xs font-semibold hover:bg-white/90"
            >
              Tarifario
            </a>
          </div>
        </aside>
      </div>
    </section>

    <div
      class="fixed inset-0 z-[9999] bg-black/50 flex justify-center items-start md:items-center transition-all"
      :class="[showModal ? 'opacity-100 visible' : 'opacity-0 invisible']"
    >
      <div
        class="mt-6 md:mt-0 bg-white rounded-2xl shadow-2xl w-full max-w-[520px] mx-3 overflow-hidden"
      >
        <!-- header -->
        <div class="flex items-center justify-between px-5 py-4 border-b border-neutral-200">
          <h2 class="text-lg md:text-xl font-bold text-neutral-900">
            Calculadora de Costos de Junta de Prevencion y Resolucion de Disputas (JPRD)
          </h2>
          <button
            type="button"
            @click="showModal = false"
            class="text-neutral-500 hover:text-neutral-800 text-xl font-bold leading-none"
          >
            ×
          </button>
        </div>

        <!-- contenido -->
        <form class="px-5 pt-4 pb-5 space-y-4" @submit="onSubmit">
          <!-- monto -->
          <div class="space-y-1">
            <label class="block text-xs font-semibold text-neutral-700 uppercase">
              Monto de la Controversia (S/)
            </label>
            <div class="flex gap-2">
              <input
                v-model="amount"
                type="text"
                inputmode="decimal"
                placeholder="0.00"
                class="flex-1 border border-neutral-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary/60 focus:border-primary"
              />
              <div class="flex flex-col gap-1">
                <label class="flex items-center gap-1 text-xs text-neutral-700">
                  <input
                    type="radio"
                    value="PEN"
                    v-model="money"
                    class="accent-primary"
                  />
                  S/
                </label>
                <label class="flex items-center gap-1 text-xs text-neutral-700">
                  <input
                    type="radio"
                    value="USD"
                    v-model="money"
                    class="accent-primary"
                  />
                  USD
                </label>
              </div>
            </div>
            <p class="text-[11px] text-neutral-500">
              Tasa de cambio SUNAT usada: {{ sunatRate }} &nbsp;|&nbsp;
              Cuantía en soles: <span class="font-semibold">S/ {{ formatMoney(amountInPEN) }}</span>
            </p>
          </div>
          <!-- conformación JPRD -->
          <div class="space-y-1">
            <label class="block text-xs font-semibold text-neutral-700 uppercase">
              Conformación de la JPRD
            </label>

            <div class="flex gap-4 mt-1">
              <label class="flex items-center gap-2 text-sm text-neutral-700">
                <input
                  type="radio"
                  value="unipersonal"
                  v-model="conformacionJPRD"
                  class="accent-primary"
                />
                JPRD Unipersonal (1 miembro)
              </label>

              <label class="flex items-center gap-2 text-sm text-neutral-700">
                <input
                  type="radio"
                  value="colegiada"
                  v-model="conformacionJPRD"
                  class="accent-primary"
                />
                JPRD Colegiada (3 miembros)
              </label>
            </div>
          </div>

          <!-- botón calcular -->
          <button
            type="submit"
            class="w-full mt-2 bg-primary text-white font-semibold py-2.5 rounded-md text-sm md:text-base hover:bg-primary/90"
          >
            Calcular Costos
          </button>
        </form>

        <!-- resultados -->
        <div class="px-5 pb-5 border-t border-neutral-200">
          <h3 class="text-base font-semibold text-neutral-900 mt-3 mb-2">
            Resultados del Cálculo
          </h3>

          <div
            v-if="hasCalculated && amountInPEN > 0"
            class="border border-neutral-200 rounded-lg overflow-hidden text-sm"
          >

            <div class="flex justify-between px-4 py-2">
              <span class="text-neutral-700">Costos Administrativos:</span>
              <span class="font-semibold text-neutral-900">
                S/ {{ formatMoney(results.admin) }}
              </span>
            </div>

            <div class="flex justify-between px-4 py-2">
              <span class="text-neutral-700">Retribución de los miembros de la JPRD:</span>
              <span class="font-semibold text-neutral-900">
                S/ {{ formatMoney(results.miembros) }}
              </span>
            </div>

            <div class="border-t border-neutral-200 mt-1" />

            <div class="flex justify-between px-4 py-2">
              <span class="text-neutral-700">Subtotal:</span>
              <span class="font-semibold text-neutral-900">
                S/ {{ formatMoney(subtotal) }}
              </span>
            </div>

            <div class="flex justify-between px-4 py-2 bg-red-50">
              <span class="text-neutral-800 font-semibold">Total a Pagar:</span>
              <span class="font-semibold text-red-600">
                S/ {{ formatMoney(totalPagar) }}
              </span>
            </div>
          </div>

          <p
            v-else
            class="text-xs text-neutral-500 mt-2 mb-1"
          >
            Ingresa el monto de la controversia y presiona <strong>“Calcular Costos”</strong> para ver
            el detalle.
          </p>

          <!-- acciones inferiores -->
          <div class="flex flex-col gap-3 mt-4 mb-2 text-sm">

            <div class="flex flex-col gap-2">
              <button
                type="button"
                @click="handlePdf('download')"
                class="flex gap-2 items-center justify-center py-2.5 px-4 bg-primary text-white rounded-md font-semibold disabled:opacity-60"
                :disabled="!hasCalculated || amountInPEN <= 0 || loadingPdf"
              >
                {{ loadingPdf ? 'Generando PDF...' : 'DESCARGAR PDF' }}
              </button>

              <button
                type="button"
                @click="handlePdf('view')"
                class="flex gap-2 items-center justify-center py-2.5 px-4 bg-white border border-primary text-primary rounded-md font-semibold disabled:opacity-60"
                :disabled="!hasCalculated || amountInPEN <= 0 || loadingPdf"
              >
                VER PDF EN OTRA PESTAÑA
              </button>
            </div>


            <div class="flex flex-col md:flex-row gap-3">
              <button
                type="button"
                @click="resetCalc"
                class="flex-1 py-2.5 px-4 border border-primary text-primary rounded-md font-semibold hover:bg-neutral-50"
              >
                REALIZAR NUEVO CÁLCULO
              </button>

              <button
                type="button"
                @click="toggleMoney"
                class="flex-1 py-2.5 px-4 border border-primary text-primary rounded-md font-semibold hover:bg-neutral-50"
              >
                CAMBIAR A ({{ money === 'PEN' ? 'USD' : 'S/' }})
                {{ money === 'PEN' ? 'DÓLARES' : 'SOLES' }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </SiteLayout>
</template>

<style scoped>
.accordion-enter-active,
.accordion-leave-active {
  transition: all 0.18s ease-out;
}
.accordion-enter-from,
.accordion-leave-to {
  opacity: 0;
  max-height: 0;
}
</style>
