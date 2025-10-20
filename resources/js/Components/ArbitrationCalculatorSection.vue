<script setup>
import { ref, computed } from 'vue'

/**
 * PROPS CONFIGURABLES
 * - Puedes ajustar los porcentajes o reemplazar "calcStrategy" con una función propia.
 */
const props = defineProps({
  title: { type: String, default: 'Calculadora de Costos Arbitrales' },
  subtitle: {
    type: String,
    default:
      'Calcula los costos arbitrales según las pretensiones en disputa, ya sea ante un Árbitro Único o un Tribunal Arbitral, e incluye el servicio de administración del proceso.'
  },
  tablaCostosUrl: {
    type: String,
    default: '/calculadora/TARIFA-ARBITRAJE-REGULAR.pdf'
  },
  reglamentoCostosUrl: {
    type: String,
    default: '/rsc/public/files/2025/REGLAMENTO-DE-COSTOS-ARBITRALES.pdf'
  },

  // SUNAT para conversión USD->PEN si el usuario cambia a dólares
  sunatRate: { type: Number, default: 3.378 },

  // IGV Perú
  igv: { type: Number, default: 0.18 },

  // % por defecto (ajústalo a tu tabla real o reemplaza por "calcStrategy")
  adminPct: { type: Number, default: 0.02 },       // 2%
  arbitratorPct: { type: Number, default: 0.034 }, // 3.4%

  // Si quieres sobreescribir completamente el cálculo, pasa una función:
  //  (montoPen:number, ctx:{igv:number}) => { admin:number, arbitrator:number }
  calcStrategy: { type: Function, default: null }
})

/* ---------- STATE ---------- */
const amount = ref('')              // valor del input
const money = ref('PEN') // valor inicial seleccionado
const showModal = ref(false)
const mode = ref<'regular' | 'emergencia'>('regular') // por si luego separas lógicas

/* ---------- HELPERS ---------- */
const parsedAmount = computed(() => {
  // sanitiza: admite coma y puntos
  const n = Number(String(amount.value).replace(/[^\d.,]/g, '').replace(',', '.'))
  return isFinite(n) ? n : 0
})

const amountInPEN = computed(() => {
  if (money.value === 'PEN') return parsedAmount.value
  // USD -> PEN
  return parsedAmount.value * props.sunatRate
})

function formatMoney(n) {
  return n.toLocaleString('es-PE', { minimumFractionDigits: 2, maximumFractionDigits: 2 })
}

/* ---------- CORE CALC ---------- */
const results = computed(() => {
  const base = amountInPEN.value

  // Si el usuario no ingresó nada, devolver 0s
  if (!base || base <= 0) {
    return {
      admin: 0,
      arbitrator: 0,
      total: 0,
      totalIGV: 0
    }
  }

  // Estrategia personalizada
  let admin = 0
  let arbitrator = 0

  if (typeof props.calcStrategy === 'function') {
    const r = props.calcStrategy(base, { igv: props.igv, mode: mode.value })
    admin = r?.admin ?? 0
    arbitrator = r?.arbitrator ?? 0
  } else {
    // Cálculo simple por porcentaje (placeholder)
    // -> Cambia estos porcentajes por tu tabla real escalonada.
    const adminPct = props.adminPct
    const arbitratorPct = props.arbitratorPct

    // Si quieres diferenciar emergencia vs regular:
    // (deja este condicional por si lo necesitas)
    const mult = mode.value === 'emergencia' ? 1.0 : 1.0

    admin = base * adminPct * mult
    arbitrator = base * arbitratorPct * mult
  }

  const total = admin + arbitrator
  const totalIGV = total * (1 + props.igv)

  return { admin, arbitrator, total, totalIGV }
})

function onSubmit(e) {
  e?.preventDefault?.()
  showModal.value = true
}

function resetCalc() {
  amount.value = ''
  showModal.value = false
}

function toggleMoney() {
  money.value = money.value === 'PEN' ? 'USD' : 'PEN'
}
</script>

<template>
  <section class="my-14 px-4">
    <div class="max-w-[750px] mx-auto flex flex-col gap-6">
      <!-- encabezado -->
      <div class="flex flex-col justify-center items-center text-center">
        <h3 class="text-3xl normal-case subtitle">{{ title }}</h3>
        <p class="text-primary font-semibold mt-2 text-justify">
          {{ subtitle }}
        </p>
      </div>

      <!-- formulario -->
      <form class="p-3 md:p-6 shadow-xl rounded-lg" @submit="onSubmit">
        <!-- links -->
        <div class="grid md:grid-cols-2 justify-center md:justify-start w-full gap-2 mb-4">
          <a :href="tablaCostosUrl" target="_blank" rel="noopener"
             title="tabla de costos arbitrales"
             class="bg-[#E6EEEF] text-primary fill-primary hover:bg-primary hover:text-white font-semibold p-4 flex items-center gap-2 justify-center text-nowrap rounded-md no-underline hover:no-underline">
            TABLA DE COSTOS ARBITRALES
          </a>

          <a :href="reglamentoCostosUrl" target="_blank" rel="noopener"
             title="reglamento de costos arbitrales"
             class="bg-[#E6EEEF] text-primary fill-primary hover:bg-primary hover:text-white font-semibold px-4 py-4 flex items-center gap-2 justify-center text-nowrap rounded-md no-underline hover:no-underline">
            REGLAMENTO DE COSTOS ARBITRALES
          </a>
        </div>

        <!-- modos (placeholder para futuro) -->
        <div class="grid md:grid-cols-2 justify-center md:justify-start w-full">
          <button type="button"
                  @click="mode='regular'"
                  :class="[
                    'rounded-md w-full font-semibold px-4 py-4 flex gap-2 items-center justify-center text-nowrap',
                    mode==='regular' ? 'bg-primary text-white fill-white' : 'bg-[#E6EEEF] text-primary fill-primary hover:bg-primary/10'
                  ]">
            <!-- ícono -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20" height="20" class="min-w-[20px]"><path d="M64 0C28.7 0 0 28.7 0 64v384c0 35.3 28.7 64 64 64h256c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zm32 64h192c17.7 0 32 14.3 32 32v32c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V96c0-17.7 14.3-32 32-32zm32 160a32 32 0 1 1-64 0 32 32 0 1 1 64 0zM96 352a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm-32 64c0-17.7 14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32zm128-160a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm32 64a32 32 0 1 1-64 0 32 32 0 1 1 64 0zm64-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm32 64a32 32 0 1 1-64 0 32 32 0 1 1 64 0zm-32 128a32 32 0 1 1 0-64 32 32 0 1 1 0 64z"/></svg>
            Calcular Costos Arbitrales
          </button>

          <button type="button"
                  @click="mode='emergencia'"
                  :class="[
                    'rounded-md w-full font-semibold px-4 py-4 flex items-center gap-2 justify-center text-nowrap',
                    mode==='emergencia' ? 'bg-primary text-white fill-white' : 'bg-[#E6EEEF] text-primary fill-primary hover:bg-primary/10'
                  ]">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20" height="20" class="min-w-[20px]"><path d="M64 0C28.7 0 0 28.7 0 64v384c0 35.3 28.7 64 64 64h256c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zm32 64h192c17.7 0 32 14.3 32 32v32c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V96c0-17.7 14.3-32 32-32zm32 160a32 32 0 1 1-64 0 32 32 0 1 1 64 0zM96 352a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm-32 64c0-17.7 14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32zm128-160a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm32 64a32 32 0 1 1-64 0 32 32 0 1 1 64 0zm64-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm32 64a32 32 0 1 1-64 0 32 32 0 1 1 64 0zm-32 128a32 32 0 1 1 0-64 32 32 0 1 1 0 64z"/></svg>
            Calcular Arbitraje de Emergencia
          </button>
        </div>

        <!-- monto -->
        <div class="flex flex-col">
          <h4 class="text-primary flex items-center gap-2 font-bold text-2xl mt-4">
            Pretensiones Determinadas
            <button type="button" aria-label="ayuda"
                    class="w-[25px] h-[25px] rounded-full bg-primary font-bold text-white relative group flex justify-center items-center fill-white">
              ?
              <div class="absolute sm:top-[-4.7rem] right-0 sm:right-auto sm:left-auto bg-black/90 font-normal hidden group-hover:block w-[220px] rounded-lg text-xs p-2 text-justify">
                Entiéndase a la pretensión que contiene un monto económico en disputa.
                <div class="absolute left-1/2 -translate-x-1/2 top-full w-0 h-0 border-l-[8px] border-r-[8px] border-t-[8px] border-t-[rgba(0,0,0,0.9)] border-transparent hidden sm:block"></div>
              </div>
            </button>
          </h4>

          <p class="text-primary font-semibold mb-2">
            Monto de la cuantía | tasa: SUNAT ({{ sunatRate }})
          </p>

          <div class="mb-2 flex gap-2 items-start">
            <input
              v-model="amount"
              type="text"
              inputmode="decimal"
              placeholder="0.00"
              class="bg-transparent w-full text-primary font-bold placeholder:text-2xl text-2xl placeholder:font-semibold placeholder:text-gray-500 rounded-md py-2.5 px-2 border border-gray-300 outline-none"
            />

<div class="flex flex-col sm:flex-row gap-2 md:ml-4">
  <label for="pen" class="flex gap-2 items-center font-semibold text-primary cursor-pointer">
    <input
      id="pen"
      type="radio"
      name="money"
      value="PEN"
      v-model="money"
      :checked="money==='PEN'"
      class="accent-primary"
    />
    S/
  </label>

  <label for="usd" class="flex gap-2 items-center font-semibold text-primary cursor-pointer">
    <input
      id="usd"
      type="radio"
      name="money"
      value="USD"
      v-model="money"
      :checked="money==='USD'"
      class="accent-primary"
    />
    USD
  </label>
</div>
          </div>
        </div>

        <button type="submit" class="bg-primary w-full py-3 rounded-md text-white font-bold mt-4">
          CALCULAR
        </button>
      </form>
    </div>

    <!-- MODAL -->
    <div
      class="fixed inset-0 z-[9999] bg-black/50 flex justify-center items-start transition-all"
      :class="[showModal ? 'opacity-100 visible' : 'opacity-0 invisible']"
    >
      <div class="max-w-[700px] w-full p-4 rounded-2xl bg-white border-2 border-primary my-6 relative">
        <button type="button" @click="showModal=false"
                class="absolute right-0 top-0 bg-primary text-white font-bold text-xl px-2 py-1 rounded-tr-2xl rounded-bl-2xl">
          X
        </button>

        <div class="mt-6">
          <span class="text-primary font-bold text-xl my-2 block">
            Monto de la cuantía: S/ {{ formatMoney(amountInPEN) }}
          </span>

          <div class="flex flex-col gap-4">
            <div id="container-calculadora"
                 class="flex my-3 flex-col border-2 border-primary rounded-lg overflow-hidden">

              <div class="text-primary bg-[#E6EEEF] font-bold text-center px-4 py-3 border-b-2 border-primary text-xl">
                Servicio de Administración de Arbitraje
              </div>
              <div class="flex justify-center items-center py-3">
                <p class="w-full flex justify-center text-center text-primary font-semibold">
                  Cuantía determinada (S/)
                </p>
                <p class="w-[250px] flex items-center text-primary font-semibold justify-center md:justify-start">
                  {{ formatMoney(results.admin) }}
                </p>
              </div>

              <div class="text-primary font-bold text-center bg-[#E6EEEF] px-4 py-3 border-b-2 border-t-2 border-primary text-xl">
                Honorarios Árbitro Único
              </div>
              <div class="flex justify-center items-center py-3">
                <p class="w-full flex justify-center text-center text-primary font-semibold">
                  Cuantía determinada (S/)
                </p>
                <p class="w-[250px] flex items-center text-primary font-semibold justify-center md:justify-start">
                  {{ formatMoney(results.arbitrator) }}
                </p>
              </div>

              <div class="py-3 flex flex-col bg-[#E6EEEF] border-t-2 border-primary font-medium gap-1">
                <div class="flex justify-center items-center">
                  <p class="w-full flex justify-center text-center text-primary font-bold">
                    TOTAL (S/)
                  </p>
                  <p class="w-[250px] flex items-center text-primary justify-center md:justify-start">
                    {{ formatMoney(results.total) }}
                  </p>
                </div>

                <div class="flex justify-center items-center">
                  <p class="w-full flex justify-center text-center text-primary font-bold">
                    Total con IGV (S/)
                  </p>
                  <p class="w-[250px] flex items-center text-primary justify-center md:justify-start">
                    {{ formatMoney(results.totalIGV) }}
                  </p>
                </div>
              </div>
            </div>

            <div class="flex flex-col gap-2 mb-5">
              <h3 class="capitalize text-xl subtitle text-center">Cada parte deberá asumir el 50%</h3>
              <p class="text-center text-primary font-semibold text-sm">
                Con relación a los honorarios de los árbitros y el servicio de administración de arbitraje,
                cada parte deberá asumir el 50% de los costos arbitrales.
              </p>
            </div>
          </div>

          <!-- acciones -->
          <div class="mx-auto max-w-[600px] flex items-center justify-center flex-col gap-6 mt-6">
            <div class="flex flex-col md:flex-row gap-6 items-center justify-center">
              <button type="button"
                      class="flex gap-2 items-center justify-center py-3 px-4 bg-primary text-white rounded-md text-sm fill-white font-bold">
                <!-- aquí podrás enganchar tu export a PDF -->
                DESCARGAR PDF
              </button>

              <button type="button" @click="resetCalc"
                      class="flex gap-2 items-center justify-center py-3 px-4 border-primary border-2 text-primary rounded-md text-sm fill-primary font-bold hover:bg-[#E6EEEF]">
                REALIZAR NUEVO CÁLCULO
              </button>
            </div>

            <button type="button" @click="toggleMoney"
                    class="flex gap-2 items-center justify-center py-3 px-4 border-primary border-2 text-primary rounded-md text-sm fill-primary font-bold hover:bg-[#E6EEEF]">
              CAMBIAR A ({{ money==='PEN' ? 'USD' : 'S/' }}) {{ money==='PEN' ? 'DÓLARES' : 'SOLES' }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.subtitle { @apply text-3xl font-extrabold text-primary text-center; }
</style>
