<!-- resources/js/Components/ArbitrationCalculatorSection.vue -->
<script setup>
import { ref, computed } from 'vue'

const props = defineProps({
  title: { type: String, default: 'Calculadora de JUNTA DE PREVENCIÓN Y RESOLUCIÓN DE DISPUTAS (JPRD)' },
  subtitle: {
    type: String,
    default:
      'Permite calcular los costos aplicables a las pretensiones en controversia sometidas a la Junta de Prevención y Resolución de Disputas (JPRD), considerando la conformación de la Junta y los costos de administración del proceso.'
  },
  tablaCostosUrl: {
    type: String,
    default: '/archivos/TABLA_DE_COSTOS_ARBITRALES.pdf'
  },
  reglamentoCostosUrl: {
    type: String,
    default: '/archivos/REGLAMENTO_DE_COSTOS_ARBITRALES.pdf'
  },

  
  // SUNAT para conversión USD->PEN
  sunatRate: { type: Number, default: 3.378 },

  // Porcentajes base (los puedes afinar luego)
  arbitratorPct: { type: Number, default: 0.034 }, // 3.4%

  // Si quieres sobreescribir completamente el cálculo:
  // (montoPen:number, ctx:{igv:number, mode:string, tipoArbitraje:string, categoria:string})
  calcStrategy: { type: Function, default: null }
})

function calcularArbitroUnico(base) {
  let honorario = 0

  if (base <= 50_000) {
    honorario = 2748
  }
  else if (base <= 300_000) {
    honorario = 2748 + (base - 50_000) * 0.0085
  }
  else if (base <= 700_000) {
    honorario = 4708 + (base - 300_000) * 0.007
  }
  else if (base <= 1_500_000) {
    honorario = 7480 + (base - 700_000) * 0.0045
  }
  else if (base <= 5_000_000) {
    honorario = 11_428 + (base - 1_500_000) * 0.0035
  }
  else if (base <= 15_000_000) {
    honorario = 20_428 + (base - 5_000_000) * 0.002
  }
  else if (base <= 40_000_000) {
    honorario = 41_628 + (base - 15_000_000) * 0.0015
  }
  else {
    honorario = 85_068 + (base - 40_000_000) * 0.0012
  }

  // 🔒 Tope máximo
  return Math.min(honorario, 250_000)
}


function calcularTribunalArbitral(base) {
  let honorario = 0

  if (base <= 50_000) {
    honorario = 5400
  }
  else if (base <= 300_000) {
    honorario = 5400 + (base - 50_000) * 0.03
  }
  else if (base <= 700_000) {
    honorario = 11_400 + (base - 300_000) * 0.02
  }
  else if (base <= 1_500_000) {
    honorario = 18_400 + (base - 700_000) * 0.01
  }
  else if (base <= 5_000_000) {
    honorario = 30_400 + (base - 1_500_000) * 0.008
  }
  else if (base <= 15_000_000) {
    honorario = 65_400 + (base - 5_000_000) * 0.007
  }
  else if (base <= 40_000_000) {
    honorario = 149_400 + (base - 15_000_000) * 0.0056
  }
  else {
    honorario = 364_000 + (base - 40_000_000) * 0.0055
  }

  // 🔒 Tope máximo por árbitro
  return Math.min(honorario, 200_000)
}

/* ---------- STATE ---------- */
const showModal = ref(false)
const hasCalculated = ref(false)

const amount = ref('')            // input monto
const money = ref('PEN')          // PEN | USD
const mode = ref('regular')       // regular | emergencia (por si luego quieres usarlo)
const tipoArbitraje = ref('arbitro_unico')  // 'unico' | 'tribunal'
const categoria = ref('nacional')  // 'nacional' | 'internacional'

/* ---------- HELPERS ---------- */
const parsedAmount = computed(() => {
  const n = Number(String(amount.value).replace(/[^\d.,]/g, '').replace(',', '.'))
  return isFinite(n) ? n : 0
})

const amountInPEN = computed(() => {
  if (money.value === 'PEN') return parsedAmount.value
  return parsedAmount.value * props.sunatRate
})

function formatMoney(n) {
  return n.toLocaleString('es-PE', { minimumFractionDigits: 2, maximumFractionDigits: 2 })
}


function calcularCostoAdministrativo(base) {
  let admin = 0

  if (base <= 50_000) {
    admin = 4122
  } 
  else if (base <= 300_000) {
    admin = 4122 + (base - 50_000) * 0.01
  } 
  else if (base <= 700_000) {
    admin = 7062 + (base - 300_000) * 0.007
  } 
  else if (base <= 1_500_000) {
    admin = 11_220 + (base - 700_000) * 0.004
  } 
  else if (base <= 5_000_000) {
    admin = 17_142 + (base - 1_500_000) * 0.002
  } 
  else if (base <= 15_000_000) {
    admin = 30_642 + (base - 5_000_000) * 0.0018
  } 
  else if (base <= 40_000_000) {
    admin = 62_442 + (base - 15_000_000) * 0.0015
  } 
  else {
    admin = 127_602 + (base - 40_000_000) * 0.0011
  }

  return admin
}

/* ---------- CORE CALC ---------- */
const results = computed(() => {
  const base = amountInPEN.value
  if (!base || base <= 0) {
    return { admin: 0, arbitrator: 0, total: 0 }
  }

  let admin = 0
  let arbitrator = 0

  if (typeof props.calcStrategy === 'function') {
    const r = props.calcStrategy(base, {
      mode: mode.value,
      tipoArbitraje: tipoArbitraje.value,
      categoria: categoria.value
    })
    admin = r?.admin ?? 0
    arbitrator = r?.arbitrator ?? 0
  } else {
    const mult = mode.value === 'emergencia' ? 1.0 : 1.0
    admin = calcularCostoAdministrativo(base)
    if (tipoArbitraje.value === 'arbitro_unico') {
        arbitrator = calcularArbitroUnico(base)
      } 
      else if (tipoArbitraje.value === 'tribunal_arbitral') {
        arbitrator = calcularTribunalArbitral(base)
      }
  }

  return { admin, arbitrator, total: admin + arbitrator }
})

// Tasa de presentación aproximada (puedes ajustar el % en props.presentationPct)
const presentationFee = computed(() => {
  if (!amountInPEN.value || amountInPEN.value <= 0) return 0

  return categoria.value === 'internacional'
    ? 1000
    : 870
})

// Subtotales para el bloque "Resultados del Cálculo"
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
      tipo_arbitraje: tipoArbitraje.value,
      categoria: categoria.value,
      tasa_presentacion: presentationFee.value,
      costos_admin: results.value.admin,
      honorarios: results.value.arbitrator,
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
  <section class="my-14 px-4">
    <div class="max-w-[750px] mx-auto flex flex-col gap-6">
      <!-- encabezado -->
      <div class="flex flex-col justify-center items-center text-center">
        <h3 class="text-3xl normal-case subtitle">
          {{ title }}
        </h3>
        <p class="text-primary font-semibold mt-2 text-justify">
          {{ subtitle }}
        </p>
      </div>

      <!-- botones / links -->
      <div class="p-3 md:p-6 shadow-xl rounded-lg bg-white flex flex-col gap-4">
        <div class="grid md:grid-cols-2 gap-2">
          <a
            :href="tablaCostosUrl"
            target="_blank"
            rel="noopener"
            class="bg-[#E6EEEF] text-primary hover:bg-primary hover:text-white font-semibold p-3 md:p-4 flex items-center justify-center rounded-md text-sm md:text-base"
          >
            TABLA DE COSTOS ARBITRALES
          </a>

          <a
            :href="reglamentoCostosUrl"
            target="_blank"
            rel="noopener"
            class="bg-[#E6EEEF] text-primary hover:bg-primary hover:text-white font-semibold p-3 md:p-4 flex items-center justify-center rounded-md text-sm md:text-base"
          >
            REGLAMENTO DE COSTOS ARBITRALES
          </a>
        </div>

        <button
          type="button"
          @click="openModal"
          class="mt-2 bg-primary text-white font-bold py-3 rounded-md text-sm md:text-base hover:bg-primary/90"
        >
          ABRIR CALCULADORA
        </button>
      </div>
    </div>

    <!-- MODAL PRINCIPAL -->
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
            Calculadora de JUNTA DE PREVENCIÓN Y RESOLUCIÓN DE DISPUTAS (JPRD)
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

          <!-- tipo de arbitraje -->
          <div class="space-y-1">
            <label class="block text-xs font-semibold text-neutral-700 uppercase">
              Tipo de Arbitraje
            </label>
            <select
              v-model="tipoArbitraje"
              class="w-full border border-neutral-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary/60 focus:border-primary"
            >
            <option value="arbitro_unico">Árbitro Único</option>
            <option value="tribunal_arbitral">Tribunal Arbitral</option>
            </select>
          </div>

          <!-- categoría -->
          <div class="space-y-1">
            <label class="block text-xs font-semibold text-neutral-700 uppercase">
              Categoría de Arbitraje
            </label>
            <select
              v-model="categoria"
              class="w-full border border-neutral-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary/60 focus:border-primary"
            >
              <option value="nacional">Nacional</option>
              <option value="internacional">Internacional</option>
            </select>
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
            <div class="flex justify-between px-4 py-2 bg-neutral-50">
              <span class="text-neutral-700">Tasa de Presentación:</span>
              <span class="font-semibold text-neutral-900">
                S/ {{ formatMoney(presentationFee) }}
              </span>
            </div>

            <div class="flex justify-between px-4 py-2">
              <span class="text-neutral-700">Costos Administrativos:</span>
              <span class="font-semibold text-neutral-900">
                S/ {{ formatMoney(results.admin) }}
              </span>
            </div>

            <div class="flex justify-between px-4 py-2">
              <span class="text-neutral-700">Honorarios Arbitrales:</span>
              <span class="font-semibold text-neutral-900">
                S/ {{ formatMoney(results.arbitrator) }}
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
  </section>
</template>

<style scoped>

/* .subtitle {
  @apply text-3xl font-extrabold text-primary text-center;
} */
</style>
