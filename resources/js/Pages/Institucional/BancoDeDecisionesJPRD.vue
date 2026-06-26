<script setup>
import { ref } from 'vue'

// Datos simulados basados en la imagen
const procedimientos = ref([
  {
    id: 1,
    expediente: 'JPRD-2026-001',
    entidad: 'Municipalidad Provincial de Dos de Mayo',
    contratista: 'Consorcio Ingeniería Landontex',
    obra: 'Creación del Servicio de Provisión de Agua para 9 Localidades del Distrito de Marías, Provincia de Dos de Mayo, Huánuco - CUI 2644785',
    estado: 'En trámite',
    actuaciones: 5,
    actualizacion: '26/06/2026',
    expanded: true,
    cui: '2644785',
    fechaInicio: '24/04/2026',
    adjudicador: 'Ing. Wilhelm Edward Nieto Sixto',
    secretaria: 'Centro de Conciliación, Arbitraje y JPRD Corporación Imperium',
    tipo: 'JPRD',
    normativa: 'Ley N.° 30225, RLCE y Directiva N.° 004-2025-OECE/CD',
    documentos: [
      { id: 1, tipo: 'Resolución', fecha: '05/03/2026', desc: 'Resolución de admisión y conformación de la Junta de Prevención y Resolución de Disputas' },
      { id: 2, tipo: 'Aceptación', fecha: '10/03/2026', desc: 'Aceptación del adjudicador designado' },
      { id: 3, tipo: 'Contrato tripartito', fecha: '20/03/2026', desc: 'Contrato tripartito de la Junta de Prevención y Resolución de Disputas' },
      { id: 4, tipo: 'Acta', fecha: '24/04/2026', desc: 'Acta de inicio de funciones de la Junta de Prevención y Resolución de Disputas' },
      { id: 5, tipo: 'Comunicación', fecha: '30/04/2026', desc: 'Convocatoria a la reunión inicial y presentación del plan de trabajo' },
    ]
  },
  {
    id: 2,
    expediente: 'JPRD-2026-002',
    entidad: 'Municipalidad Provincial de Lauricocha',
    contratista: 'Consorcio Niño Jesús',
    obra: 'Mejoramiento del Servicio Médico Legal y Forense en la Sede Fiscal Provincial Lauricocha, distrito de Jesús, provincia de Lauricocha, Huánuco - CUI 2643766',
    estado: 'En trámite',
    actuaciones: 3,
    actualizacion: '26/06/2026',
    expanded: false,
    cui: '2643766',
    fechaInicio: '-',
    adjudicador: '-',
    secretaria: 'Centro de Conciliación, Arbitraje y JPRD Corporación Imperium',
    tipo: 'JPRD',
    normativa: 'Ley N.° 30225, RLCE y Directiva N.° 004-2025-OECE/CD',
    documentos: []
  }
])

const toggleDetails = (id) => {
  const proc = procedimientos.value.find(p => p.id === id)
  if (proc) {
    proc.expanded = !proc.expanded
  }
}
</script>

<template>
  <div class="bg-white min-h-screen">
    <!-- Hero Section -->
    <section class="relative h-64 md:h-80 w-full flex items-center justify-center bg-primary" style="background-image:url('/img/laudos.jpg'); background-size:cover; background-position:center; background-blend-mode: overlay;">
      <div class="absolute inset-0 bg-[#0B1536]/80"></div>
      <div class="relative z-10 max-w-5xl mx-auto w-full px-4 text-center mt-10">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-white mb-4 tracking-tight uppercase">
          BANCO DE PROCEDIMIENTOS, ACTUACIONES Y DECISIONES DE JPRD
        </h1>
        <p class="text-white/90 text-sm md:text-base lg:text-lg max-w-3xl mx-auto font-light">
          Información pública de las Juntas de Prevención y Resolución de Disputas<br class="hidden md:block"/>
          administradas por el Centro de Conciliación, Arbitraje y JPRD Corporación Imperium
        </p>
      </div>
    </section>

    <!-- Contenido Principal -->
    <section class="py-10 px-4 max-w-7xl mx-auto">
      
      <!-- Textos introductorios -->
      <div class="text-sm text-gray-700 space-y-4 mb-10 leading-relaxed text-justify md:text-left">
        <p>
          En esta sección se publica la información correspondiente a los procedimientos de Juntas de Prevención y Resolución de Disputas (JPRD) administrados por el Centro de Conciliación, Arbitraje y JPRD Corporación Imperium. La información comprende expedientes, estado del procedimiento, actuaciones administrativas, actas, resoluciones, decisiones, recomendaciones y demás documentos publicables, conforme a la Directiva N.º 004-2025-OECE/CD, la normativa de contratación pública, la protección de datos personales y las reglas de confidencialidad aplicables.
        </p>
        <p>
          Cuando un procedimiento no cuente aún con decisiones, recomendaciones o pronunciamientos finales emitidos, se deja constancia expresa de dicha situación, publicándose las actuaciones administrativas disponibles relacionadas con la instalación, administración y seguimiento del procedimiento.
        </p>
      </div>

      <!-- Tarjetas de Estadísticas -->
      <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-10">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 flex items-center gap-4">
          <div class="text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>
          </div>
          <div>
            <div class="text-2xl font-bold text-primary">02</div>
            <div class="text-[10px] sm:text-xs text-gray-600 font-medium leading-tight uppercase">Procedimientos<br/>JPRD administrados</div>
          </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 flex items-center gap-4">
          <div class="text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
          </div>
          <div>
            <div class="text-2xl font-bold text-primary">02</div>
            <div class="text-[10px] sm:text-xs text-gray-600 font-medium leading-tight uppercase">Procedimientos<br/>en trámite</div>
          </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 flex items-center gap-4">
          <div class="text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" /></svg>
          </div>
          <div>
            <div class="text-2xl font-bold text-primary">08</div>
            <div class="text-[10px] sm:text-xs text-gray-600 font-medium leading-tight uppercase">Actuaciones<br/>publicadas</div>
          </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 flex items-center gap-4">
          <div class="text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" /></svg>
          </div>
          <div>
            <div class="text-2xl font-bold text-primary">00</div>
            <div class="text-[10px] sm:text-xs text-gray-600 font-medium leading-tight uppercase">Decisiones<br/>emitidas</div>
          </div>
        </div>
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 flex items-center gap-4">
          <div class="text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
          </div>
          <div>
            <div class="text-xl font-bold text-primary">26/06/2026</div>
            <div class="text-[10px] sm:text-xs text-gray-600 font-medium leading-tight uppercase">Última actualización</div>
          </div>
        </div>
      </div>

      <!-- Buscador -->
      <div class="bg-gray-50 rounded-lg p-5 mb-10 border border-gray-200 shadow-sm">
        <h3 class="text-primary font-bold mb-4 text-sm tracking-wide uppercase">BUSCAR PROCEDIMIENTO</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 gap-4 items-end">
          <div class="md:col-span-1">
            <label class="block text-xs font-semibold text-gray-700 mb-1">Buscar por expediente</label>
            <div class="relative">
              <input type="text" placeholder="Ej: JPRD-2026-001" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary py-2 px-3" />
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute right-3 top-2.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </div>
          </div>
          <div class="md:col-span-1">
            <label class="block text-xs font-semibold text-gray-700 mb-1">Entidad</label>
            <input type="text" placeholder="Ej: Municipalidad Provincia..." class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary py-2 px-3" />
          </div>
          <div class="md:col-span-1">
            <label class="block text-xs font-semibold text-gray-700 mb-1">Contratista</label>
            <input type="text" placeholder="Ej: Consorcio Ingeniería..." class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary py-2 px-3" />
          </div>
          <div class="md:col-span-1">
            <label class="block text-xs font-semibold text-gray-700 mb-1">Estado</label>
            <select class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary py-2 px-3">
              <option>Todos</option>
              <option>En trámite</option>
              <option>Concluido</option>
            </select>
          </div>
          <div class="md:col-span-1">
            <label class="block text-xs font-semibold text-gray-700 mb-1">Tipo de documento</label>
            <select class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary py-2 px-3">
              <option>Todos</option>
              <option>Resolución</option>
              <option>Acta</option>
            </select>
          </div>
          <div class="md:col-span-1 flex items-center gap-3">
            <button class="bg-[#0B1536] text-white px-5 py-2 rounded-md text-sm font-semibold hover:bg-[#0B1536]/90 transition-colors w-full shadow-md">
              Buscar
            </button>
            <button class="text-primary hover:text-primary/80 text-xs font-medium whitespace-nowrap flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
              Limpiar filtros
            </button>
          </div>
        </div>
      </div>

      <!-- Tabla Principal -->
      <div class="mb-4">
        <h3 class="text-primary font-bold mb-3 text-sm tracking-wide uppercase">RELACIÓN DE PROCEDIMIENTOS JPRD</h3>
        <div class="overflow-x-auto bg-white border border-gray-200 rounded-lg shadow-sm">
          <table class="w-full text-sm text-left">
            <thead class="text-[10px] text-white bg-[#0B1536] uppercase">
              <tr>
                <th class="px-3 py-3 text-center">N.°</th>
                <th class="px-4 py-3">EXPEDIENTE</th>
                <th class="px-4 py-3">ENTIDAD</th>
                <th class="px-4 py-3">CONTRATISTA</th>
                <th class="px-4 py-3 w-1/4">OBRA / CONTRATO</th>
                <th class="px-3 py-3 text-center">ESTADO</th>
                <th class="px-3 py-3 text-center leading-tight">ACTUACIONES<br/>PUBLICADAS</th>
                <th class="px-3 py-3 text-center leading-tight">ÚLTIMA<br/>ACTUALIZACIÓN</th>
                <th class="px-4 py-3 text-center">ACCIÓN</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(proc, index) in procedimientos" :key="proc.id" class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                <td class="px-3 py-4 text-center font-medium">{{ index + 1 }}</td>
                <td class="px-4 py-4 font-semibold text-primary whitespace-nowrap">{{ proc.expediente }}</td>
                <td class="px-4 py-4 text-xs">{{ proc.entidad }}</td>
                <td class="px-4 py-4 text-xs">{{ proc.contratista }}</td>
                <td class="px-4 py-4 text-xs">{{ proc.obra }}</td>
                <td class="px-3 py-4 text-center">
                  <span class="bg-green-100 text-green-700 px-2.5 py-1 rounded-sm text-[10px] font-bold border border-green-200 whitespace-nowrap">
                    {{ proc.estado }}
                  </span>
                </td>
                <td class="px-3 py-4 text-center font-semibold">{{ proc.actuaciones }}</td>
                <td class="px-3 py-4 text-center text-xs whitespace-nowrap">{{ proc.actualizacion }}</td>
                <td class="px-4 py-4 text-center">
                  <button @click="toggleDetails(proc.id)" class="bg-[#0B1536] text-white px-3 py-1.5 rounded text-xs font-semibold hover:bg-primary transition-colors flex items-center gap-1 mx-auto whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                    Ver detalle
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        
        <!-- Paginación Simple -->
        <div class="flex items-center justify-between mt-4">
          <span class="text-xs text-gray-600 font-medium">Mostrando 1 a 2 de 2 procedimientos</span>
          <div class="flex items-center gap-1">
            <button class="px-3 py-1 border border-gray-200 rounded text-gray-400 bg-white text-xs hover:bg-gray-50" disabled>&laquo;</button>
            <button class="px-3 py-1 border border-primary bg-primary text-white rounded text-xs font-bold">1</button>
            <button class="px-3 py-1 border border-gray-200 rounded text-gray-400 bg-white text-xs hover:bg-gray-50" disabled>&raquo;</button>
          </div>
        </div>
      </div>

      <!-- Detalles de Expedientes (Acordeón) -->
      <div class="mt-8 space-y-4">
        <div v-for="proc in procedimientos" :key="'detail-'+proc.id" class="border border-[#0B1536] rounded-md overflow-hidden shadow-sm">
          
          <!-- Header del acordeón -->
          <div @click="toggleDetails(proc.id)" class="bg-[#0B1536] text-white px-4 py-3 flex items-center justify-between cursor-pointer hover:bg-[#0B1536]/90 transition-colors">
            <h4 class="font-bold text-sm tracking-wide">DETALLE DEL EXPEDIENTE: {{ proc.expediente }}</h4>
            <svg v-if="proc.expanded" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" /></svg>
            <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
          </div>
          
          <!-- Contenido del acordeón -->
          <div v-if="proc.expanded" class="bg-white p-5">
            <!-- Grid de Información -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-3 text-xs mb-6 border-b border-gray-100 pb-6">
              <div class="grid grid-cols-[110px_1fr] gap-2">
                <span class="font-bold text-[#0B1536]">Entidad:</span>
                <span>{{ proc.entidad }}</span>
              </div>
              <div class="grid grid-cols-[140px_1fr] gap-2">
                <span class="font-bold text-[#0B1536]">Fecha de inicio de funciones:</span>
                <span>{{ proc.fechaInicio }}</span>
              </div>
              <div class="grid grid-cols-[110px_1fr] gap-2">
                <span class="font-bold text-[#0B1536]">Contratista:</span>
                <span>{{ proc.contratista }}</span>
              </div>
              <div class="grid grid-cols-[140px_1fr] gap-2">
                <span class="font-bold text-[#0B1536]">Adjudicador:</span>
                <span>{{ proc.adjudicador }}</span>
              </div>
              <div class="grid grid-cols-[110px_1fr] gap-2">
                <span class="font-bold text-[#0B1536]">Obra / Contrato:</span>
                <span>{{ proc.obra }}</span>
              </div>
              <div class="grid grid-cols-[140px_1fr] gap-2">
                <span class="font-bold text-[#0B1536]">Secretaría Técnica:</span>
                <span>{{ proc.secretaria }}</span>
              </div>
              <div class="grid grid-cols-[110px_1fr] gap-2">
                <span class="font-bold text-[#0B1536]">CUI:</span>
                <span>{{ proc.cui }}</span>
              </div>
              <div class="grid grid-cols-[140px_1fr] gap-2">
                <span class="font-bold text-[#0B1536]">Tipo de procedimiento:</span>
                <span>{{ proc.tipo }}</span>
              </div>
              <div class="grid grid-cols-[110px_1fr] gap-2">
                <span class="font-bold text-[#0B1536]">Estado:</span>
                <span>
                  <span class="bg-green-100 text-green-700 px-2 py-0.5 rounded-sm text-[10px] font-bold border border-green-200">{{ proc.estado }}</span>
                </span>
              </div>
              <div class="grid grid-cols-[140px_1fr] gap-2">
                <span class="font-bold text-[#0B1536]">Normativa aplicable:</span>
                <span>{{ proc.normativa }}</span>
              </div>
            </div>

            <!-- Tabs -->
            <div class="flex items-center gap-1 border-b border-gray-200 mb-4 overflow-x-auto">
              <button class="px-4 py-2 border-t-2 border-x border-gray-200 bg-white text-primary font-bold text-xs -mb-px shadow-[0_-2px_0_0_theme(colors.primary)] rounded-t-sm whitespace-nowrap">
                Actuaciones publicadas
              </button>
              <button class="px-4 py-2 text-gray-500 font-medium text-xs hover:text-primary transition-colors whitespace-nowrap">
                Decisiones / Recomendaciones
              </button>
              <button class="px-4 py-2 text-gray-500 font-medium text-xs hover:text-primary transition-colors whitespace-nowrap">
                Información general
              </button>
              <button class="px-4 py-2 text-gray-500 font-medium text-xs hover:text-primary transition-colors whitespace-nowrap">
                Partes intervinientes
              </button>
            </div>

            <!-- Tabla interior -->
            <div class="overflow-x-auto" v-if="proc.documentos && proc.documentos.length > 0">
              <table class="w-full text-xs text-left">
                <thead class="text-[10px] text-[#0B1536] uppercase font-bold border-b-2 border-gray-200">
                  <tr>
                    <th class="px-3 py-3 w-12 text-center">N.°</th>
                    <th class="px-4 py-3 w-48">TIPO DE DOCUMENTO</th>
                    <th class="px-4 py-3 w-32">FECHA</th>
                    <th class="px-4 py-3">DESCRIPCIÓN</th>
                    <th class="px-4 py-3 w-32 text-center">DOCUMENTO</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="doc in proc.documentos" :key="doc.id" class="border-b border-gray-100 hover:bg-gray-50">
                    <td class="px-3 py-3 text-center text-gray-500">{{ doc.id }}</td>
                    <td class="px-4 py-3">{{ doc.tipo }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ doc.fecha }}</td>
                    <td class="px-4 py-3">{{ doc.desc }}</td>
                    <td class="px-4 py-3 text-center">
                      <a href="#" class="inline-flex items-center gap-1.5 text-primary font-semibold hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 24 24" fill="currentColor"><path d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023.479 0 .774-.242.774-.651 0-.366-.254-.586-.704-.586zm3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018.817.006 1.349-.444 1.349-1.396.006-.83-.479-1.268-1.255-1.268z"/><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zM9.498 16.19c-.309.29-.765.42-1.296.42a2.23 2.23 0 0 1-.308-.018v1.426H7v-3.936A7.558 7.558 0 0 1 8.219 14c.557 0 .953.106 1.22.319.254.202.426.533.426.923-.001.392-.131.723-.367.948zm3.807 1.355c-.42.349-1.059.515-1.84.515-.468 0-.799-.03-1.024-.06v-3.917A7.947 7.947 0 0 1 11.66 14c.757 0 1.249.136 1.633.426.415.308.675.799.675 1.504 0 .763-.279 1.29-.663 1.615zM17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17v.74z"/></svg>
                        Ver PDF
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div v-else class="text-center py-6 text-gray-500 text-xs">
              No hay actuaciones publicadas para este expediente.
            </div>

          </div>
        </div>
      </div>

      <!-- Nota de información -->
      <div class="mt-8 bg-[#FFF9E6] border border-[#FFE082] rounded-md p-4 flex gap-4">
        <div class="bg-[#FFD54F] text-[#8D6E63] w-6 h-6 rounded-full flex items-center justify-center font-bold text-sm shrink-0">!</div>
        <p class="text-[11px] md:text-xs text-gray-800 leading-relaxed text-justify">
          <strong>Nota:</strong> La información publicada en el presente Banco de Procedimientos, Actuaciones y Decisiones de JPRD tiene finalidad informativa y de transparencia institucional. La publicación de documentos se realiza respetando la normativa sobre protección de datos personales, confidencialidad, reserva de información sensible y demás disposiciones aplicables. En caso de procedimientos en trámite, la información será actualizada conforme se emitan nuevas actuaciones, decisiones, recomendaciones o pronunciamientos.
        </p>
      </div>

    </section>
  </div>
</template>
