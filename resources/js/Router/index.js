import { createRouter, createWebHistory } from "vue-router";
import { jwtDecode } from 'jwt-decode'
//PLANTILLAS
import LayoutLogin from '@/Layouts/AppLayoutLogin.vue'
import LayoutDefault from '@/Layouts/SiteLayout.vue'
import LayoutSirea from '@/Layouts/AppLayoutSirea.vue'

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
import Dashboard from "@/Pages/Dashboard/Inicio.vue";
import DesignacionResidual from "@/Pages/Servicios/DesignacionResidual.vue";
import ArbitroUnicoTribunal from "@/Pages/Servicios/ArbitroUnicoTribunal.vue";
import InstalacionArbitral from "@/Pages/Servicios/InstalacionArbitral.vue";


//SIREA
import Casilla from "@/Pages/Casilla/Inicio.vue";
import Perfil from "@/Pages/Usuario/Perfil.vue";
import CambiarClave from "@/Pages/Usuario/CambiarClave.vue";
import Notificaciones from "@/Pages/Notificaciones/Inicio.vue";
import Pronunciamientos from "@/Pages/Pronunciamientos/Inicio.vue";
import Plantillas from "@/Pages/Plantillas/Inicio.vue";
import Expedientes from "@/Pages/Expedientes/Inicio.vue";
import ExpedientesCreate from "@/Pages/Expedientes/Create/Inicio.vue";
import ExpedientesSeguimiento from "@/Pages/Expedientes/Seguimiento/Inicio.vue";
import ExpedientesDocumentos from "@/Pages/Expedientes/Documentos/Inicio.vue";
import Solicitudes from "@/Pages/Solicitudes/Inicio.vue";
import Asignaciones from "@/Pages/Asignaciones/Inicio.vue";
import Audiencias from "@/Pages/Audiencias/Inicio.vue";
import Resoluciones from "@/Pages/Resoluciones/Inicio.vue";
import DashboardSirea from "@/Pages/Dashboard/Inicio.vue";
import Bandeja from "@/Pages/Bandeja/Inicio.vue";
import Reportes from "@/Pages/Reportes/Inicio.vue";
import Indicadores from "@/Pages/Indicadores/Inicio.vue";
import Usuarios from "@/Pages/Usuarios/Inicio.vue";
import Roles from "@/Pages/Roles/Inicio.vue";
import Menus from "@/Pages/Menus/Inicio.vue";
import Parametros from "@/Pages/Parametros/Inicio.vue";
import Bitacora from "@/Pages/Bitacora/Inicio.vue";
import Accesos from "@/Pages/Accesos/Inicio.vue";
import CatalogosMaterias from "@/Pages/Catalogos/Materias/Inicio.vue";
import CatalogosSedes from "@/Pages/Catalogos/Sedes/Inicio.vue";
import CatalogosTiposDocumento from "@/Pages/Catalogos/TiposDocumento/Inicio.vue";

const routes = [
    {
        path: '/', name: 'Principal', component: Principal,
        meta: { layout: LayoutDefault }
    },
    // {
    //     path: '/sirea', meta: { layout: LayoutSirea },
    //     children: [
    //         { path: '', name: 'Dashboard', component: Dashboard },
    //         { path: 'perfil', name: 'Perfil', component: Perfil },
    //         { path: 'cambiar-clave', name: 'CambiarClave', component: CambiarClave },
    //         { path: 'casilla', name: 'Casilla', component: Casilla },
    //     ]
    // },

    {
        path: '/sirea', name: 'Sirea', component: Dashboard,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/perfil', name: 'Perfil', component: Perfil,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/cambiar-clave', name: 'CambiarClave', component: CambiarClave,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/casillas', name: 'Casilla', component: Casilla,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/expedientes', name: 'Expedientes', component: () => import('@/Pages/Sirea/Expedientes/Inicio.vue'),
        meta: { layout: LayoutSirea, title: 'Gestión de Expedientes' }
    },
    {
        path: '/notificaciones', name: 'Notificaciones', component: Notificaciones,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/pronunciamientos', name: 'Pronunciamientos', component: Pronunciamientos,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/plantillas', name: 'Plantillas', component: Plantillas,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/expedientes', name: 'Expedientes', component: Expedientes,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/expedientes-create', name: 'ExpedientesCreate', component: ExpedientesCreate,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/expedientes-seguimiento', name: 'ExpedientesSeguimiento', component: ExpedientesSeguimiento,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/expedientes-documentos', name: 'ExpedientesDocumentos', component: ExpedientesDocumentos,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/solicitudes', name: 'Solicitudes', component: Solicitudes,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/asignaciones', name: 'Asignaciones', component: Asignaciones,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/audiencias', name: 'Audiencias', component: Audiencias,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/resoluciones', name: 'Resoluciones', component: Resoluciones,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/dashboard', name: 'DashboardSirea', component: DashboardSirea,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/bandeja', name: 'Bandeja', component: Bandeja,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/reportes', name: 'Reportes', component: Reportes,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/indicadores', name: 'Indicadores', component: Indicadores,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/usuarios', name: 'Usuarios', component: Usuarios,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/roles', name: 'Roles', component: Roles,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/menus', name: 'Menus', component: Menus,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/parametros', name: 'Parametros', component: Parametros,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/bitacora', name: 'Bitacora', component: Bitacora,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/accesos', name: 'Accesos', component: Accesos,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/catalogos-materias', name: 'CatalogosMaterias', component: CatalogosMaterias,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/catalogos-sedes', name: 'CatalogosSedes', component: CatalogosSedes,
        meta: { layout: LayoutSirea }
    },
    {
        path: '/catalogos-tipos-documento', name: 'CatalogosTiposDocumento', component: CatalogosTiposDocumento,
        meta: { layout: LayoutSirea }
    },


    {
        path: '/login', name: 'Login', component: Login,
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
    { path: "/blog", name: "Blog", component: Contactenos, meta: { layout: LayoutDefault } },

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

    // SERVICIOS (sin name en Laravel, pero acá conviene poner)
    { path: "/casilla-de-sugerencias", name: "casilla-sugerencias", component: Casilla, meta: { layout: LayoutDefault } },

]

export default createRouter({
    history: createWebHistory(),
    routes
})