<!-- resources/js/Pages/Institucional/BancoDeLaudos.vue -->
<script setup>
import { ref, computed } from 'vue'
import { Head } from '@inertiajs/vue3'
import SiteLayout from '@/Layouts/SiteLayout.vue'

/**
 * Opcional: recibe laudos desde el backend
 * cada item: { id, contratista, entidad, controversia, pdf }
 */
const props = defineProps({
  laudos: { type: Array, default: () => [] },
  pageSize: { type: Number, default: 10 },
})

const localLaudos = [
  // --- 2013 ---
  {
    id: 57,
    year: 2013,
    contratista: 'MUNICIPALIDAD LUYANDO',
    entidad: 'EMPRESA R Y J CONTRATISTAS SRL',
    controversia: 'RESOLUCION DE CONTRATO Y OTROS',
    pdf: '/archivos/banco_laudos/2013/N° 57 MUNICIPALIDAD LUYANDO vs EMPRESA R Y J CONTRATISTAS SRL.pdf',
  },

  // --- 2014 ---
  {
    id: 53,
    year: 2014,
    contratista: 'CONSORCIO SANTA ROSA',
    entidad: 'GOBIERNO REGIONAL DE PASCO',
    controversia: 'PAGO POR INCUMPLIMIENTO DE CONTRATO',
    pdf: '/archivos/banco_laudos/2014/N° 53 CONSORCIO SANTA ROSA vs GOBIERNO REGIONAL DE PASCO.pdf',
  },
  {
    id: 54,
    year: 2014,
    contratista: 'ENRIQUE LUCEN DEL CAMPO',
    entidad: 'GOBIERNO REGIONAL DE HUANUCO',
    controversia: 'LIQUIDACION DE OBRA Y OTROS',
    pdf: '/archivos/banco_laudos/2014/N° 54 ENRIQUE LUCEN DEL CAMPO vs GOBIERNO REGIONAL DE HUANUCO.pdf',
  },
  {
    id: 55,
    year: 2014,
    contratista: 'VETHEL SAC',
    entidad: 'MUNICIPALIDAD DE SAN FRANCISCO DE YARUS YACAN - PASCO',
    controversia: 'PAGO DE BIENES Y SERVICIOS',
    pdf: '/archivos/banco_laudos/2014/N° 55 VETHEL SAC vs MUNICIPALIDAD DE SAN FRANCISCO DE YARUS YACAN - PASCO.pdf',
  },
  {
    id: 56,
    year: 2014,
    contratista: 'CONSORCIO 28 DE JULIO',
    entidad: 'GOBIERNO REGIONAL DE HUÁNUCO',
    controversia: 'NULIDAD DE RESOLUCION Y OTROS',
    pdf: '/archivos/banco_laudos/2014/N° 56 CONSORCIO 28 DE JULIO vs GOBIERNO REGIONAL DE HUÁNUCO.pdf',
  },

  // --- 2015 ---
  {
    id: 38,
    year: 2015,
    contratista: 'INGENIEROS RIVERA VIDAL CONTRATISTAS GENERALES SCRL',
    entidad: 'RECTIFICACIONES CARLOS',
    controversia: 'INCUMPLIMIENTO DE CONTRATO',
    pdf: '/archivos/banco_laudos/2015/N° 38 INGENIEROS RIVERA VIDAL CONTRATISTAS GENERALES SCRL vs RECTIFICACIONES CARLOS.pdf',
  },
  {
    id: 39,
    year: 2015,
    contratista: 'CONSORCIO ARQUITECTOS E INGENIEROS',
    entidad: 'UNIVERSIDAD NACIONAL DANIEL ALCIDESS CARRION',
    controversia: 'PAGO POR CONSULTORIA',
    pdf: '/archivos/banco_laudos/2015/N° 39 CONSORCIO ARQUITECTOS E INGENIEROS vs UNIVERSIDAD NACIONAL DANIEL ALCIDESS CARRION.pdf',
  },
  {
    id: 40,
    year: 2015,
    contratista: 'CONSORCIO AV FENIX',
    entidad: 'MUNICIPALIDAD PROVINCIAL DE HUÁNUCO',
    controversia: 'PAGO DE INDEMNIZACION POR DAÑOS Y PERJUICIOS',
    pdf: '/archivos/banco_laudos/2015/N° 40 CONSORCIO AV FENIX vs MUNICIPALIDAD PROVINCIAL DE HUÁNUCO.pdf',
  },
  {
    id: 41,
    year: 2015,
    contratista: 'SEDA HUANUCO',
    entidad: 'EMPRESA CRSIBEL SCRL',
    controversia: 'INCUMPLIMIENTO DE CONTRATO',
    pdf: '/archivos/banco_laudos/2015/N° 41 SEDA HUANUCO vs EMPRESA CRSIBEL SCRL.pdf',
  },
  {
    id: 42,
    year: 2015,
    contratista: 'CONSORCIO RONDOBAMBA',
    entidad: 'MUNICIPALIDAD DISTRITAL DE APARICIO POMARES',
    controversia: 'LIQUIDACION DE OBRA Y OTROS',
    pdf: '/archivos/banco_laudos/2015/N° 42 CONSORCIO RONDOBAMBA vs MUNICIPALIDAD DISTRITAL DE APARICIO POMARES.pdf',
  },
  {
    id: 43,
    year: 2015,
    contratista: 'CONSOORCIO AYAPITEC',
    entidad: 'MUNICIPALIDAD PROVINCIAL DE YAROWILCA',
    controversia: 'LIQUIDACION DE OBRA Y OTROS',
    pdf: '/archivos/banco_laudos/2015/N° 43 CONSOORCIO AYAPITEC vs MUNICIPALIDAD PROVINCIAL DE YAROWILCA.pdf',
  },
  {
    id: 44,
    year: 2015,
    contratista: 'EMPRESA COORPORAION DE ALTOS ESTUDIOS EDUCATIVOS',
    entidad: 'MUNICIPALIDAD PROVINCIAL DE HUÁNUCO',
    controversia: 'PAGO SALDO DE EJECUCION DE OBRA',
    pdf: '/archivos/banco_laudos/2015/N° 44 EMPRESA COORPORAION DE ALTOS ESTUDIOS EDUCATIVOS vs MUNICIPALIDAD PROVINCIAL DE HUÁNUCO.pdf',
  },
  {
    id: 45,
    year: 2015,
    contratista: 'CONSORCIO HR',
    entidad: 'GOBIERNO REGIONAL DE HUANUCO',
    controversia: 'NULIDAD DE RESOLUCION',
    pdf: '/archivos/banco_laudos/2015/N° 45 CONSORCIO HR vs GOBIERNO REGIONAL DE HUANUCO.pdf',
  },
  {
    id: 46,
    year: 2015,
    contratista: 'CONSORCIO POMARES',
    entidad: 'GOBIERNO REGIONAL DE HUÁNUCO',
    controversia: 'LIQUIDACION DE OBRA Y OTROS',
    pdf: '/archivos/banco_laudos/2015/N° 46 CONSORCIO POMARES vs GOBIERNO REGIONAL DE HUÁNUCO.pdf',
  },
  {
    id: 47,
    year: 2015,
    contratista: 'NINO DARLING',
    entidad: 'GOBIERNO REGIONAL DE HUÁNUCO',
    controversia: 'NULIDAD DE RESOLUCION Y OTROS',
    pdf: '/archivos/banco_laudos/2015/N° 47 NINO DARLING vs GOBIERNO REGIONAL DE HUÁNUCO.pdf',
  },
  {
    id: 48,
    year: 2015,
    contratista: 'N Y R CONSTRUCTORA SAC',
    entidad: 'MUNICIPALIDAD DISTRITAL DE DANIEL ALCIDEZ CARRION',
    controversia: 'NULIDAD DE RESOLUCION Y OTROS',
    pdf: '/archivos/banco_laudos/2015/N° 48 N Y R CONSTRUCTORA SAC vs MUNICIPALIDAD DISTRITAL DE DANIEL ALCIDEZ CARRION.pdf',
  },
  {
    id: 49,
    year: 2015,
    contratista: 'CONSORCIO SANTA MARTHA',
    entidad: 'GOBIERNO REGIONAL DE HUÁNUCO',
    controversia: 'AMPLIACION DE PLAZO',
    pdf: '/archivos/banco_laudos/2015/N° 49 CONSORCIO SANTA MARTHA vs GOBIERNO REGIONAL DE HUÁNUCO.pdf',
  },
  {
    id: 50,
    year: 2015,
    contratista: 'JOGAMA CONSULTORIA Y CONSTRUCCIONES GENERALES E.I.R.L',
    entidad: 'GOBIERNO REGIONAL DE HUÁNUCO',
    controversia: 'NULIDAD DE LIQUIDACION',
    pdf: '/archivos/banco_laudos/2015/N° 50 JOGAMA CONSULTORIA Y CONSTRUCCIONES GENERALES E.I.R.L vs GOBIERNO REGIONAL DE HUÁNUCO.pdf',
  },
  {
    id: 51,
    year: 2015,
    contratista: 'CONSORCIO CAUNARAPA',
    entidad: 'GOBIERNO REGIONAL DE HUÁNUCO',
    controversia: 'NULIDAD DE RESOLUCION',
    pdf: '/archivos/banco_laudos/2015/N° 51 CONSORCIO CAUNARAPA vs GOBIERNO REGIONAL DE HUÁNUCO.pdf',
  },
  {
    id: 52,
    year: 2015,
    contratista: 'ELITE COORPORACION E.I.R.L',
    entidad: 'GOBIERNO REGIONAL PASCO',
    controversia: 'LIQUIDACION DE CONTRATO Y OTROS',
    pdf: '/archivos/banco_laudos/2015/N° 52 ELITE COORPORACION E.I.R.L vs GOBIERNO REGIONAL PASCO.pdf',
  },

  // --- 2016 ---
  {
    id: 33,
    year: 2016,
    contratista: 'CONSORCIO PILLCO MARCA',
    entidad: 'UNIVERSIDAD NACIONAL HERMILIO VALDIZAN',
    controversia: 'NULIDAD DE RESOLUCION Y OTROS',
    pdf: '/archivos/banco_laudos/2016/N° 33 CONSORCIO PILLCO MARCA vs UNIVERSIDAD NACIONAL HERMILIO VALDIZAN.pdf',
  },
  {
    id: 34,
    year: 2016,
    contratista: 'CONSORCIO COSAFRAM',
    entidad: 'GOBIERNO REGIONAL DE HUÁNUCO',
    controversia: 'LIQUIDACION DE CONTRATO Y OTROS',
    pdf: '/archivos/banco_laudos/2016/N° 34 CONSORCIO COSAFRAM vs GOBIERNO REGIONAL DE HUÁNUCO.pdf',
  },
  {
    id: 35,
    year: 2016,
    contratista: 'CONSORCIO WYY',
    entidad: 'MUNICIPALIDAD PROVINCIAL DE AMBO',
    controversia: 'NULIDAD DE RESOLUCION Y OTROS',
    pdf: '/archivos/banco_laudos/2016/N° 35 CONSORCIO WYY vs MUNICIPALIDAD PROVINCIAL DE AMBO.pdf',
  },
  {
    id: 36,
    year: 2016,
    contratista: 'CONSORCIO CORPORACION BETETA',
    entidad: 'GOBIERNO REGIONAL DE HUÁNUCO',
    controversia: 'LIQUIDACION DE OBRA Y OTROS',
    pdf: '/archivos/banco_laudos/2016/N° 36 CONSORCIO CORPORACION BETETA vs GOBIERNO REGIONAL DE HUÁNUCO.pdf',
  },
  {
    id: 37,
    year: 2016,
    contratista: 'UNIVERSIDAD NACIONAL DANIEL ACLIDES CARRION',
    entidad: 'EMPRESA COSNTRUCTORA ERWI SAC',
    controversia: 'RESOLUCION DE CONTRATO',
    pdf: '/archivos/banco_laudos/2016/N° 37 UNIVERSIDAD NACIONAL DANIEL ACLIDES CARRION vs EMPRESA COSNTRUCTORA ERWI SAC.pdf',
  },

  // --- 2017 ---
  {
    id: 28,
    year: 2017,
    contratista: 'CONSORCIO GYM CONSORCIADOS',
    entidad: 'MUNICIPALIDAD DISTRITAL DE CHACAYAN',
    controversia: 'PAGO DE LIQUIDACION DE OBRAS Y OTROS',
    pdf: '/archivos/banco_laudos/2017/N° 28 CONSORCIO GYM vs MUNICIPALIDAD DISTRITAL DE CHACAYAN.pdf',
  },
  {
    id: 29,
    year: 2017,
    contratista: 'CONSORCIO SAN PEDRO',
    entidad: 'MUNICIPALIDAD DISTRITAL DE CHACAYAN',
    controversia: 'PAGO DE LIQUIDACION DE OBRAS Y OTROS',
    pdf: '/archivos/banco_laudos/2017/N° 29 CMT CONSORCIO SAN PEDRO vs MUNICIPALIDAD DISTRITAL DE CHACAYAN.pdf',
  },
  {
    id: 30,
    year: 2017,
    contratista: 'CONSORCIO AYACUCHO',
    entidad: 'PROGRAMA DE DESARROLLO PRODUCTIVO AGRARIO RURAL',
    controversia: 'AMPLIACION DE PLAZO',
    pdf: '/archivos/banco_laudos/2017/N° 30 CONSORCIO AYACUCHO vs PROGRAMA DE DESARROLLO PRODUCTIVO AGRARIO RURAL.pdf',
  },
  {
    id: 32,
    year: 2017,
    contratista: 'CONSORCIO MEGAUNI',
    entidad: 'UNIVERSIDAD NACIONAL HERMILIO VALDIZAN',
    controversia: 'PAGO DE EJECUCION DE OBRA',
    pdf: '/archivos/banco_laudos/2017/N° 32 CONSORCIO MEGAUNI vs UNIVERSIDAD NACIONAL HERMILIO VALDIZAN.pdf',
  },
  {
    id: 31,
    year: 2017,
    contratista: 'CONSORCIO PILLCO MARCA',
    entidad: 'UNIVERSIDAD NACIONAL HERMILIO VALDIZAN',
    controversia: 'PAGO SALDO DE LIQUIDACION DE OBRA',
    pdf: '/archivos/banco_laudos/2017/N°31 CONSORCIO PILLCO MARCA vs UNIVERSIDAD HERMILIO VALDIZAN.pdf',
  },

  // --- 2018 ---
  {
    id: 27,
    year: 2018,
    contratista: 'CONSORCIO MAMA ASHU',
    entidad: 'MUNICIPALIDAD PROVINCIAL DE ASUNCION',
    controversia: 'LIQUIDACION DE OBRAS Y OTROS',
    pdf: '/archivos/banco_laudos/2018/N° 27 CONSORCIO MAMA ASHU vs MUNICIPALIDAD PROVINCIAL DE ASUNCION.pdf',
  },

  // --- 2019 ---
  {
    id: 26,
    year: 2019,
    contratista: 'GINA CAROL CHAVEZ PACCHINI',
    entidad: 'GOBIERNO REGIONAL DE HUANUCO',
    controversia: 'RESOLUCION DE CONTRATO',
    pdf: '/archivos/banco_laudos/2019/N° 26 GINA CAROL CHAVEZ PACCHINI vs GOBIERNO REGIONAL DE HUANUCO.pdf',
  },

  // --- 2020 ---
  {
    id: 22,
    year: 2020,
    contratista: 'CONFAMA SRL',
    entidad: 'MUNICIPALIDAD DISTRITAL DE SANTA MARIA DEL VALLE',
    controversia: 'LIQUIDACION DE CONTRATO Y PAGO DE INTERESES',
    pdf: '/archivos/banco_laudos/2020/N° 22  CONFAMA SRL vs MUNICIPALIDAD DISTRITAL DE SANTA MARIA DEL VALLE.pdf',
  },
  {
    id: 23,
    year: 2020,
    contratista: 'CONSORCIO VILLA AMERICA',
    entidad: 'MUNICIPALIDAD DISTRITAL DE PALCAZU',
    controversia: 'NULIDAD DE RESOLUCION Y OTROS',
    pdf: '/archivos/banco_laudos/2020/N° 23 CONSORCIO VILLA AMERICA  vs MUNICIPALIDAD DISTRITAL DE PALCAZU.pdf',
  },
  {
    id: 24,
    year: 2020,
    contratista: 'CONSORCIO PILLCO MOZO',
    entidad: 'MUNICIPALIDAD PROVINCIAL DE HUÁNUCO',
    controversia: 'NULIDAD DE RESOLUCION Y OTROS',
    pdf: '/archivos/banco_laudos/2020/N° 24 CONSORCIO PILLCO MOZO VS MUNICIPALIDAD PROVINCIAL DE HUÁNUCO.pdf',
  },
  {
    id: 25,
    year: 2020,
    contratista: 'FERNANDO HUSSERL ESPINOZA SOTO',
    entidad: 'MUNICIPALIDAD DISTRITAL DE HUALLAGA',
    controversia: 'NULIDAD DE RESOLUCION Y OTROS',
    pdf: '/archivos/banco_laudos/2020/N° 25 FERNANDO HUSSERL ESPINOZA SOTO vs MUNICIPALIDAD DISTRITAL DE HUALLAGA.pdf',
  },

  // --- 2021 ---
  {
    id: 17,
    year: 2021,
    contratista: 'SOFIA VERONICA MORON CARHUARICRA',
    entidad: 'EDITH SUAREZ GARCIA',
    controversia: 'RESOLUCION DE CONTRATO',
    pdf: '/archivos/banco_laudos/2021/N° 17 SOFIA VERONICA MORON CARHUARICRA vs EDITH SUAREZ GARCIA.pdf',
  },
  {
    id: 18,
    year: 2021,
    contratista: 'CONSTRUCTORA Y CONSULTORA FISICA S.A.C.',
    entidad: 'MUNICIPALIDAD PROVINCIAL DE YAROWILCA',
    controversia: 'NULIDAD DE PENALIDAD',
    pdf: '/archivos/banco_laudos/2021/N° 18 CONSTRUCTORA Y CONSULTORA FISICA S.A.C. vs MUNICIPALIDAD PROVINCIAL DE YAROWILCA.pdf',
  },
  {
    id: 19,
    year: 2021,
    contratista: 'CONSORCIO KAWI MAKI',
    entidad: 'MUNICIPALIDAD PROVINCIAL DE PACHITEA',
    controversia: 'DEDUCTIVOS Y OTROS',
    pdf: '/archivos/banco_laudos/2021/N° 19 CONSORCIO KAWI MAKI vs MUNICIPALIDAD PROVINCIAL DE PACHITEA.pdf',
  },
  {
    id: 20,
    year: 2021,
    contratista: 'CONSORCIO D&J',
    entidad: 'SEDA HUANUCO',
    controversia: 'RESOLUCION DE CONTRATO',
    pdf: '/archivos/banco_laudos/2021/N° 20 CONSORCIO D&J vs SEDA HUANUCO.pdf',
  },
  {
    id: 21,
    year: 2021,
    contratista: 'CONSORCIO DE INGINIERIA Y CONSTRUCCION',
    entidad: 'MUNICIPALIDAD PROVINCIAL DE HUAMALIES',
    controversia: 'NULIDAD DE RESOLUCION Y OTROS',
    pdf: '/archivos/banco_laudos/2021/N° 21 CONSORCIO DE INGINIERIA Y CONSTRUCCION vs MUNICIPALIDAD PROVINCIAL DE HUAMALIES.pdf',
  },

  // --- 2022 ---
  {
    id: 16,
    year: 2022,
    contratista: 'CONSORCIO MEFRED',
    entidad: 'MUNICIPALIDAD DISTRITAL DE CHAMACA',
    controversia: 'NULIDAD DE RESOLUCION',
    pdf: '/archivos/banco_laudos/2022/N° 16  CONSORCIO MEFRED vs MUNICIPALIDAD DISTRITAL DE CHAMACA.pdf',
  },

  // --- 2023 ---
  {
    id: 10,
    year: 2023,
    contratista: 'CONSORCIO SUPERIOR GyM',
    entidad: 'MUNICIPALIDAD DISTRITAL DE HUACAR',
    controversia: 'RESOLUCION DE CONTRATO',
    pdf: '/archivos/banco_laudos/2023/N° 10 CONSORCIO SUPERIOR GyM vs MUNICIPALIDAD DISTRITAL DE HUACAR.pdf',
  },
  {
    id: 11,
    year: 2023,
    contratista: 'CONSORCIO PUENTE MUYA',
    entidad: 'MUNICIPALIDAD DISTRITAL DE PAUCARTAMBO',
    controversia: 'AMPLIACION DE PLAZO',
    pdf: '/archivos/banco_laudos/2023/N° 11 CONSORCIO PUENTE MUYA vs MUNICIPALIDAD DISTRITAL DE PAUCARTAMBO.pdf',
  },
  {
    id: 12,
    year: 2023,
    contratista: 'CONSORCIO CRUZPATA',
    entidad: 'MUNICIPALIDAD DISTRITAL DE SANTA MARIA DEL VALLE',
    controversia: 'NULIDAD DE RESOLUCION Y RESOLUCION DE APROBACION DE EXPEDIENTE TECNICO',
    pdf: '/archivos/banco_laudos/2023/N° 12 CONSORCIO CRUZPATA vs MUNICIPALIDAD DISTRITAL DE SANTA MARIA DEL VALLE.pdf',
  },
  {
    id: 13,
    year: 2023,
    contratista: 'CONSORCIO H&M ASOCIADOS',
    entidad: 'E.R.D.S.P.D.E..E.N.M.S.A.H-S.A',
    controversia: 'LIQUIDACION DE CONTRATO Y PAGO DE INTERESES',
    pdf: '/archivos/banco_laudos/2023/N° 13 CONSORCIO H&M ASOCIADOS vs E.R.D.S.P.D.E..E.N.M.S.A.H-S.A.pdf',
  },
  {
    id: 14,
    year: 2023,
    contratista: 'CONSORCIO MEFRED',
    entidad: 'MUNICIPALIDAD DISTRITAL DE HUALLAGA',
    controversia: 'LIQUIDACION DE CONTRATO Y PAGO DE INTERESES',
    pdf: '/archivos/banco_laudos/2023/N° 14 CONSORCIO MEFRED VS MUNICIPALIDAD DISTRITAL DE HUALLAGA.pdf',
  },
  {
    id: 15,
    year: 2023,
    contratista: 'CONSORCIO MEFRED',
    entidad: 'GOBIERNO REGIONAL DE HUANUCO',
    controversia: 'RESOLUCION DE CONTRATO',
    pdf: '/archivos/banco_laudos/2023/N° 15 CONSORCIO MEFRED vs GOBIERNO REGIONAL DE HUANUCO.pdf',
  },

  // --- 2024 ---
  {
    id: 1,
    year: 2024,
    contratista: 'CONSORCIO PUENTE MUYA',
    entidad: 'MUNICIPALIDAD DISTRITAL DE PAUCARTAMBO',
    controversia: 'RESOLUCION DE CONTRATO',
    pdf: '/archivos/banco_laudos/2024/N° 01 CONSORCIO PUENTE MUYA VS MUNICIPALIDAD DISTRITAL DE PAUCARTAMBO.pdf',
  },
  {
    id: 2,
    year: 2024,
    contratista: 'CONSORCIO GROUP SANEAMIENTO',
    entidad: 'MUNICIPALIDAD DISTRITAL DE CONSTITUCIÓN',
    controversia: 'NULIDAD DE RESOLUCION Y OTROS',
    pdf: '/archivos/banco_laudos/2024/N° 02 CONSORCIO GROUP SANEAMIENTO VS MUNICIPALIDAD DISTRITAL DE CONSTITUCIÓN.pdf',
  },
  {
    id: 3,
    year: 2024,
    contratista: 'CONSORCIO H&M AMAZONIA',
    entidad: 'ELECTROCENTRO S.A',
    controversia: 'NULIDAD DE RECURSO',
    pdf: '/archivos/banco_laudos/2024/N° 03 CONSORCIO H&M AMAZONIA vs ELECTROCENTRO.pdf',
  },
  {
    id: 4,
    year: 2024,
    contratista: 'CONSORCIO H&M AMAZONIA',
    entidad: 'ELECTROCENTRO S.A',
    controversia: 'NULIDAD DE RESOLUCION Y OTROS',
    pdf: '/archivos/banco_laudos/2024/N° 04 CONSORCIO H&M AMAZONIA vs ELECTROCENTRO.pdf',
  },
  {
    id: 5,
    year: 2024,
    contratista: 'CONSORCIO HUACAR',
    entidad: 'MUNICIPALIDAD DISTRITAL DE HUACAR',
    controversia: 'AMPLIACION DE PLAZO',
    pdf: '/archivos/banco_laudos/2024/N° 05 CONSORCIO HUACAR VS MUNICIPALIDAD DISTRITAL DE HUACAR.pdf',
  },
  {
    id: 6,
    year: 2024,
    contratista: 'CONSORCIO DESCOLMATACION HUACAR',
    entidad: 'MUNICIPALIDAD DISTRITAL DE HUACAR',
    controversia: 'RESOLUCION DE CONTRATO Y OTROS',
    pdf: '/archivos/banco_laudos/2024/N° 06 CONSORCIO DESCOLMATACION HUACAR vs MUNICIPALIDAD DISTRITAL DE HUACAR.pdf',
  },
  {
    id: 7,
    year: 2024,
    contratista: 'CONSORCIO HUACARMAYO',
    entidad: 'MUNICIPALIDAD DISTRITAL DE HUACAR',
    controversia: 'NULIDAD DE RESOLUCION Y OTROS',
    pdf: '/archivos/banco_laudos/2024/N° 07 CONSORCIO HUACARMAYO VS MUNICIPALIDAD DISTRITAL DE HUACAR.pdf',
  },
  {
    id: 8,
    year: 2024,
    contratista: 'CONSORCIO SAN PABLO DE PILLAO',
    entidad: 'MUNICIPALIDAD DISTRITAL DE SAN PABLO DE PILLAO',
    controversia: 'NULIDAD DE RESOLUCION Y OTROS',
    pdf: '/archivos/banco_laudos/2024/N° 08 CONSORCIO SAN PABLO DE PILLAO vs MUNICIPALIDAD DISTRITAL DE SAN PABLO DE PILLAO.pdf',
  },
  {
    id: 9,
    year: 2024,
    contratista: 'CONSORCIO GD GROUP SANEAMIENTO',
    entidad: 'MUNICIPALIDAD PROVINCIAL DE LEONCIO PRADO',
    controversia: 'RESOLUCION DE CONTRATO Y OTROS',
    pdf: '/archivos/banco_laudos/2024/N° 09 CONSORCIO GD GROUP SANEAMIENTO VS MUNICIPALIDAD PROVINCIAL DE LEONCIO PRADO.pdf',
  },
];


// === estado / cálculos ===
const data = computed(() => localLaudos)

// búsqueda simple
const q = ref('')
const filtered = computed(() => {
  if (!q.value.trim()) return data.value
  const t = q.value.toLowerCase()
  return data.value.filter(r =>
    String(r.id).includes(t) ||
    r.contratista.toLowerCase().includes(t) ||
    r.entidad.toLowerCase().includes(t) ||
    (r.controversia || '').toLowerCase().includes(t) ||
    String(r.year).includes(t)
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
    <Head title="Banco de Laudos | Corporación Imperium" />

    <!-- Hero -->
    <section
      class="relative h-48 md:h-56 w-full flex items-end"
      style="background-image:url('/img/laudos.jpg'); background-size:cover; background-position:center;"
    >
      <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-black/0"></div>
      <div class="relative max-w-7xl mx-auto w-full px-4 pb-6">
        <h1 class="text-3xl md:text-4xl font-extrabold text-white drop-shadow">
          BANCO DE LAUDOS
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
              placeholder="Buscar por año, contratista, entidad o controversia…"
              class="w-full rounded-xl border border-neutral/30 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
              @input="go(1)"
            />
          </div>
        </div>

        <!-- Tabla -->
        <div class="overflow-x-auto bg-white border border-neutral/20 rounded-xl">
          <table class="min-w-[720px] w-full">
            <thead>
              <tr class="bg-[#0A2A57] text-white">
                <th class="px-4 py-3 text-left w-16">ID</th>
                <th class="px-4 py-3 text-left w-20">AÑO</th>
                <th class="px-4 py-3 text-left">CONTRATISTA</th>
                <th class="px-4 py-3 text-left">ENTIDAD</th>
                <th class="px-4 py-3 text-left">CONTROVERSIA</th>
                <th class="px-4 py-3 text-center w-20">LAUDO</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="row in pageData"
                :key="row.year + '-' + row.id"
                class="border-t border-neutral-10 hover:bg-neutral-50"
              >
                <td class="px-4 py-3 text-neutral-800">{{ row.id }}</td>
                <td class="px-4 py-3 text-neutral-800">{{ row.year }}</td>
                <td class="px-4 py-3">{{ row.contratista }}</td>
                <td class="px-4 py-3">{{ row.entidad }}</td>
                <td class="px-4 py-3">
                  {{ row.controversia || '—' }}
                </td>
                <td class="px-4 py-3 text-center">
                  <a
                    :href="row.pdf"
                    target="_blank"
                    rel="noopener"
                    class="inline-flex items-center justify-center rounded-full p-2 text-primary hover:bg-primary/10"
                    title="Ver / descargar laudo (PDF)"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                         width="18" height="18" class="fill-current">
                      <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H352v64H448v32H64V416H160V352H64z"/>
                    </svg>
                  </a>
                </td>
              </tr>

              <tr v-if="pageData.length === 0">
                <td colspan="6" class="px-4 py-6 text-center text-neutral-500">
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
