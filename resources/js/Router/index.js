import { createRouter, createWebHistory } from "vue-router";
import { jwtDecode } from 'jwt-decode'
//PLANTILLAS
import LayoutLogin from '@/Layouts/AppLayoutLogin.vue'
import LayoutDefault from '@/Layouts/SiteLayout.vue'

//vistas
import Principal from '@/Pages/Home.vue'
import Login from '@/Pages/Auth/SireaLogin.vue'


// INSTITUCIONAL
import QuienesSomos from "@/Pages/Institucional/QuienesSomos.vue";
import OrganoDireccion from "@/Pages/Institucional/OrganoDireccion.vue";
import NominaArbitros from "@/Pages/Institucional/NominaArbitros.vue";
import MiembrosJPRD from "@/Pages/Institucional/MiembrosJPRD.vue";
import UnidadGobierno from "@/Pages/Institucional/UnidadGobierno.vue";
import NormasLegales from "@/Pages/Institucional/NormasLegales.vue";
import Contactenos from "@/Pages/Institucional/Contactenos.vue";
import Calculadora from "@/Pages/Institucional/Calculadora.vue";
import CalculadoraJunta from "@/Pages/Institucional/CalculadoraJunta.vue";
import BancoDeLaudos from "@/Pages/Institucional/BancoDeLaudos.vue";
import BancoDeDecisiones from "@/Pages/Institucional/BancoDeDecisiones.vue";
import BancoDeDecisionesJPRD from "@/Pages/Institucional/BancoDeDecisionesJPRD.vue";

// SERVICIOS
import ArbitrajeContratacionPublica from "@/Pages/Servicios/ArbitrajeContratacionPublica.vue";
import ArbitrajeDeEmergencia from "@/Pages/Servicios/ArbitrajeDeEmergencia.vue";
import ArbitrajeEntrePrivados from "@/Pages/Servicios/ArbitrajeEntrePrivados.vue";
import JuntaPrevencionResolucion from "@/Pages/Servicios/JuntaPrevencionResolucion.vue";
import Recusacion from "@/Pages/Servicios/Recusacion.vue";
import Peritaje from "@/Pages/Servicios/Peritaje.vue";
import DesignacionResidual from "@/Pages/Servicios/DesignacionResidual.vue";
import ArbitroUnicoTribunal from "@/Pages/Servicios/ArbitroUnicoTribunal.vue";
import InstalacionArbitral from "@/Pages/Servicios/InstalacionArbitral.vue";

const routes = [
    {
        path: '/', name: 'Principal', component: Principal,
        meta: { layout: LayoutDefault }
    },
    {
        path: '/sirea', name: 'Login', component: Login,
        meta: { layout: LayoutLogin }
    },

    // INSTITUCIONAL
    { path: "/institucional/quienes-somos", name: "quienes-somos", component: QuienesSomos, meta: { layout: LayoutDefault } },
    { path: "/institucional/organo-direccion", name: "organo-direccion", component: OrganoDireccion, meta: { layout: LayoutDefault } },
    { path: "/institucional/NominaArbitros", name: "nomina-arbitros", component: NominaArbitros, meta: { layout: LayoutDefault } },
    { path: "/institucional/miembrosjprd", name: "miembros-jprd", component: MiembrosJPRD, meta: { layout: LayoutDefault } },
    { path: "/institucional/unidad-de-gobierno", name: "unidad-de-gobierno", component: UnidadGobierno, meta: { layout: LayoutDefault } },
    { path: "/institucional/normas-legales", name: "normas-legales", component: NormasLegales, meta: { layout: LayoutDefault } },

    { path: "/contacto", name: "contacto", component: Contactenos, meta: { layout: LayoutDefault } },
    { path: "/blog", name: "contacto", component: Contactenos, meta: { layout: LayoutDefault } },

    { path: "/calculadora", name: "calculadora", component: Calculadora, meta: { layout: LayoutDefault } },
    { path: "/calculadora-junta", name: "calculadora-junta", component: CalculadoraJunta, meta: { layout: LayoutDefault } },

    { path: "/institucional/banco-de-laudos", name: "banco.laudos", component: BancoDeLaudos, meta: { layout: LayoutDefault } },
    { path: "/institucional/banco-de-decisiones", name: "banco.decisiones", component: BancoDeDecisiones, meta: { layout: LayoutDefault } },
    { path: "/institucional/banco-de-decisiones-jprd", name: "banco.decisiones.jprd", component: BancoDeDecisionesJPRD, meta: { layout: LayoutDefault } },

    // SERVICIOS (sin name en Laravel, pero acá conviene poner)
    { path: "/arbitraje-en-contratacion-publica", name: "arbitraje-contratacion-publica", component: ArbitrajeContratacionPublica, meta: { layout: LayoutDefault } },
    { path: "/arbitraje-de-emergencia", name: "arbitraje-de-emergencia", component: ArbitrajeDeEmergencia, meta: { layout: LayoutDefault } },
    { path: "/arbitraje-entre-privados", name: "arbitraje-entre-privados", component: ArbitrajeEntrePrivados, meta: { layout: LayoutDefault } },
    { path: "/junta-prevencion-resolucion", name: "junta-prevencion-resolucion", component: JuntaPrevencionResolucion, meta: { layout: LayoutDefault } },
    { path: "/recusacion", name: "recusacion", component: Recusacion, meta: { layout: LayoutDefault } },
    { path: "/peritaje", name: "peritaje", component: Peritaje, meta: { layout: LayoutDefault } },
    { path: "/designacion-residual-arbitro", name: "designacion-residual-arbitro", component: DesignacionResidual, meta: { layout: LayoutDefault } },
    { path: "/arbitro-unico-tribunal", name: "arbitro-unico-tribunal", component: ArbitroUnicoTribunal, meta: { layout: LayoutDefault } },
    { path: "/instalacion-arbitral", name: "instalacion-arbitral", component: InstalacionArbitral, meta: { layout: LayoutDefault } },

    // OPCIONAL: 404
    // { path: "/:pathMatch(.*)*", name: "NotFound", component: NotFound, meta: { layout: LayoutDefault } },


]

export default createRouter({
    history: createWebHistory(),
    routes
})