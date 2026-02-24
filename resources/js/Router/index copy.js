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
import Dashboard from "@/Pages/DashBoard.vue";
import DesignacionResidual from "@/Pages/Servicios/DesignacionResidual.vue";
import ArbitroUnicoTribunal from "@/Pages/Servicios/ArbitroUnicoTribunal.vue";
import InstalacionArbitral from "@/Pages/Servicios/InstalacionArbitral.vue";


//SIREA
import Casilla from "@/Pages/Casilla/Inicio.vue";
import Perfil from "@/Pages/Sirea/Perfil/Inicio.vue";
import CambiarClave from "@/Pages/Sirea/CambiarClave/Inicio.vue";
import AdminCasillas from "@/Pages/Sirea/Admin/Casillas/Inicio.vue";
// import AdminNotificaciones from "@/Pages/Sirea/Admin/Notificaciones/Inicio.vue";
// import AdminPronunciamientos from "@/Pages/Sirea/Admin/Pronunciamientos/Inicio.vue";
// import AdminPlantillas from "@/Pages/Sirea/Admin/Plantillas/Inicio.vue";
// import AdminExpedientes from "@/Pages/Sirea/Admin/Expedientes/Inicio.vue";
// import AdminExpedientesCreate from "@/Pages/Sirea/Admin/Expedientes/Create/Inicio.vue";
// import AdminExpedientesSeguimiento from "@/Pages/Sirea/Admin/Expedientes/Seguimiento/Inicio.vue";
// import AdminExpedientesDocumentos from "@/Pages/Sirea/Admin/Expedientes/Documentos/Inicio.vue";
// import AdminSolicitudes from "@/Pages/Sirea/Admin/Solicitudes/Inicio.vue";
// import AdminAsignaciones from "@/Pages/Sirea/Admin/Asignaciones/Inicio.vue";
// import AdminAudiencias from "@/Pages/Sirea/Admin/Audiencias/Inicio.vue";
// import AdminResoluciones from "@/Pages/Sirea/Admin/Resoluciones/Inicio.vue";
// import AdminDashboard from "@/Pages/Sirea/Admin/Dashboard/Inicio.vue";
// import AdminBandeja from "@/Pages/Sirea/Admin/Bandeja/Inicio.vue";
// import AdminReportes from "@/Pages/Sirea/Admin/Reportes/Inicio.vue";
// import AdminIndicadores from "@/Pages/Sirea/Admin/Indicadores/Inicio.vue";
// import AdminUsuarios from "@/Pages/Sirea/Admin/Usuarios/Inicio.vue";
// import AdminRoles from "@/Pages/Sirea/Admin/Roles/Inicio.vue";
// import AdminMenus from "@/Pages/Sirea/Admin/Menus/Inicio.vue";
// import AdminParametros from "@/Pages/Sirea/Admin/Parametros/Inicio.vue";
// import AdminBitacora from "@/Pages/Sirea/Admin/Bitacora/Inicio.vue";
// import AdminAccesos from "@/Pages/Sirea/Admin/Accesos/Inicio.vue";
// import AdminCatalogosMaterias from "@/Pages/Sirea/Admin/Catalogos/Materias/Inicio.vue";
// import AdminCatalogosSedes from "@/Pages/Sirea/Admin/Catalogos/Sedes/Inicio.vue";
// import AdminCatalogosTiposDocumento from "@/Pages/Sirea/Admin/Catalogos/TiposDocumento/Inicio.vue";


const routes = [
    {
        path: '/', name: 'Principal', component: Principal,
        meta: { layout: LayoutDefault }
    },
    {
        path: '/sirea', meta: { layout: LayoutSirea },
        children: [
            { path: '', name: 'Dashboard', component: Dashboard },
            { path: 'perfil', name: 'Perfil', component: Perfil },
            { path: 'cambiar-clave', name: 'CambiarClave', component: CambiarClave },
            // { path: 'admin/casillas', name: 'AdminCasillas', component: AdminCasillas },
            // { path: 'admin/notificaciones', name: 'AdminNotificaciones', component: AdminNotificaciones },
            // { path: 'admin/pronunciamientos', name: 'AdminPronunciamientos', component: AdminPronunciamientos },
            // { path: 'admin/plantillas', name: 'AdminPlantillas', component: AdminPlantillas },
            // { path: 'admin/expedientes', name: 'AdminExpedientes', component: AdminExpedientes },
            // { path: 'admin/expedientes/create', name: 'AdminExpedientesCreate', component: AdminExpedientesCreate },
            // { path: 'admin/expedientes/seguimiento', name: 'AdminExpedientesSeguimiento', component: AdminExpedientesSeguimiento },
            // { path: 'admin/expedientes/documentos', name: 'AdminExpedientesDocumentos', component: AdminExpedientesDocumentos },
            // { path: 'admin/solicitudes', name: 'AdminSolicitudes', component: AdminSolicitudes },
            // { path: 'admin/asignaciones', name: 'AdminAsignaciones', component: AdminAsignaciones },
            // { path: 'admin/audiencias', name: 'AdminAudiencias', component: AdminAudiencias },
            // { path: 'admin/resoluciones', name: 'AdminResoluciones', component: AdminResoluciones },
            // { path: 'admin/dashboard', name: 'AdminDashboard', component: AdminDashboard },
            // { path: 'admin/bandeja', name: 'AdminBandeja', component: AdminBandeja },
            // { path: 'admin/reportes', name: 'AdminReportes', component: AdminReportes },
            // { path: 'admin/indicadores', name: 'AdminIndicadores', component: AdminIndicadores },
            // { path: 'admin/usuarios', name: 'AdminUsuarios', component: AdminUsuarios },
            // { path: 'admin/roles', name: 'AdminRoles', component: AdminRoles },
            // { path: 'admin/menus', name: 'AdminMenus', component: AdminMenus },
            // { path: 'admin/parametros', name: 'AdminParametros', component: AdminParametros },
            // { path: 'admin/bitacora', name: 'AdminBitacora', component: AdminBitacora },
            // { path: 'admin/accesos', name: 'AdminAccesos', component: AdminAccesos },
            // { path: 'admin/catalogos/materias', name: 'AdminCatalogosMaterias', component: AdminCatalogosMaterias },
            // { path: 'admin/catalogos/sedes', name: 'AdminCatalogosSedes', component: AdminCatalogosSedes },
            // { path: 'admin/catalogos/tipos-documento', name: 'AdminCatalogosTiposDocumento', component: AdminCatalogosTiposDocumento },
        ]
    },
    {
        path: '/sirea/login', name: 'Login', component: Login,
        meta: { layout: LayoutLogin }
    },
    // {
    //     path: '/login', name: 'Login', component: Login,
    //     meta: { layout: LayoutLogin }
    // },

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