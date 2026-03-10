<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { defineTitle } from '@/Helpers';

const loading = ref(true);
const dashboardData = ref({
    user: {},
    stats: {},
    recientes: [],
    alertas: []
});

const fetchDashboardData = async () => {
    try {
        const response = await axios.get('/casilla/dashboard');
        dashboardData.value = response.data;
    } catch (error) {
        console.error("Error fetching dashboard data", error);
    } finally {
        loading.value = false;
    }
};

onMounted(() => {
    defineTitle("Mi Casilla Electrónica");
    fetchDashboardData();
});
</script>

<template>
    <div class="main-content">
        <div v-if="loading" class="text-center p-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>
        </div>

        <div v-else>
            <!-- 1) Encabezado superior -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm bg-primary text-white overflow-hidden">
                        <div class="card-body p-4 position-relative">
                            <div class="position-relative z-index-1">
                                <h4 class="fw-bold mb-1">Bienvenido, {{ dashboardData.user.name }}</h4>
                                <div class="d-flex flex-wrap gap-3 mt-3">
                                    <div class="d-flex align-items-center">
                                        <i class="feather-mail me-2"></i>
                                        <span>Casilla N.° <strong>{{ dashboardData.user.mailbox_number }}</strong></span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="feather-check-circle me-2"></i>
                                        <span>Estado: <span class="badge bg-white text-primary text-uppercase">{{ dashboardData.user.status }}</span></span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="feather-clock me-2"></i>
                                        <span>Último acceso: {{ dashboardData.user.last_access }}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Decoración de fondo -->
                            <div class="position-absolute end-0 top-0 mt-n4 me-n4 opacity-10">
                                <i class="feather-mail" style="font-size: 15rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2) Tarjetas resumen -->
            <div class="row g-4 mb-4">
                <div class="col-6 col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="bg-soft-danger p-3 rounded-circle">
                                    <i class="feather-eye-off text-danger fs-20"></i>
                                </div>
                                <span class="badge bg-soft-danger text-danger">Urgente</span>
                            </div>
                            <h3 class="fw-bold mb-0">{{ dashboardData.stats.noLeidos }}</h3>
                            <p class="text-muted small mb-0">No leídos</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="bg-soft-warning p-3 rounded-circle">
                                    <i class="feather-alert-circle text-warning fs-20"></i>
                                </div>
                            </div>
                            <h3 class="fw-bold mb-0">{{ dashboardData.stats.pendientesAtencion }}</h3>
                            <p class="text-muted small mb-0">Pendientes de atención</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="bg-soft-primary p-3 rounded-circle">
                                    <i class="feather-file-text text-primary fs-20"></i>
                                </div>
                            </div>
                            <h3 class="fw-bold mb-0">{{ dashboardData.stats.pronunciamientosMes }}</h3>
                            <p class="text-muted small mb-0">Pronunciamientos este mes</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="bg-soft-success p-3 rounded-circle">
                                    <i class="feather-calendar text-success fs-20"></i>
                                </div>
                                <span class="badge bg-soft-success text-success">Hoy</span>
                            </div>
                            <h3 class="fw-bold mb-0">{{ dashboardData.stats.vencenHoy }}</h3>
                            <p class="text-muted small mb-0">Vencen hoy</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- 3) Bandeja principal -->
                <div class="col-lg-8 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0">Notificaciones Recientes</h5>
                            <router-link to="/bandeja" class="btn btn-sm btn-link text-primary text-decoration-none">Ver todas</router-link>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light text-muted small text-uppercase">
                                        <tr>
                                            <th class="ps-4">Fecha/Hora</th>
                                            <th>Tipo</th>
                                            <th>Asunto</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="notif in dashboardData.recientes" :key="notif.id">
                                            <td class="ps-4">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-medium">{{ notif.fecha }}</span>
                                                    <span class="text-muted small">{{ notif.hora }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span :class="{
                                                    'badge bg-soft-primary text-primary': notif.tipo.includes('Pronunciamiento'),
                                                    'badge bg-soft-warning text-warning': notif.tipo.includes('Observación'),
                                                    'badge bg-soft-info text-info': notif.tipo.includes('Requerimiento')
                                                }">{{ notif.tipo }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span class="fw-bold text-dark">{{ notif.asunto }}</span>
                                                    <span class="text-muted small">Ref: {{ notif.expediente }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <button class="btn btn-sm btn-icon btn-soft-primary" title="Ver">
                                                        <i class="feather-eye"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-icon btn-soft-secondary" title="Descargar">
                                                        <i class="feather-download"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4) Panel de alertas -->
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="fw-bold mb-0">Alertas de Plazos</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="list-group list-group-flush">
                                <div v-for="(alerta, index) in dashboardData.alertas" :key="index" class="list-group-item px-0 border-0 mb-3">
                                    <div class="d-flex align-items-start gap-3">
                                        <div :class="`bg-soft-${alerta.color} p-2 rounded`">
                                            <i :class="`feather-alert-triangle text-${alerta.color}`"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 fw-bold">{{ alerta.titulo }}</h6>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-muted small">Plazo: {{ alerta.plazo }}</span>
                                                <span :class="`badge bg-${alerta.color}`">{{ alerta.plazo }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm bg-dark text-white">
                        <div class="card-body p-4">
                            <h6 class="fw-bold mb-3">Acceso Rápido</h6>
                            <div class="d-grid gap-2">
                                <router-link to="/expedientes" class="btn btn-outline-light text-start d-flex align-items-center">
                                    <i class="feather-folder me-2"></i> Mis Expedientes
                                </router-link>
                                <router-link to="/notificaciones" class="btn btn-outline-light text-start d-flex align-items-center">
                                    <i class="feather-bell me-2"></i> Notificaciones
                                </router-link>
                                <router-link to="/perfil" class="btn btn-outline-light text-start d-flex align-items-center">
                                    <i class="feather-user me-2"></i> Mi Perfil
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.bg-soft-primary { background-color: rgba(13, 110, 253, 0.1); }
.bg-soft-success { background-color: rgba(25, 135, 84, 0.1); }
.bg-soft-danger { background-color: rgba(220, 53, 69, 0.1); }
.bg-soft-warning { background-color: rgba(255, 193, 7, 0.1); }
.bg-soft-info { background-color: rgba(13, 202, 240, 0.1); }
.bg-soft-secondary { background-color: rgba(108, 117, 125, 0.1); }

.text-primary { color: #0d6efd !important; }
.text-success { color: #198764 !important; }
.text-danger { color: #dc3545 !important; }
.text-warning { color: #ffc107 !important; }
.text-info { color: #0dcaf0 !important; }

.btn-soft-primary { 
    background-color: rgba(13, 110, 253, 0.1); 
    color: #0d6efd;
    border: none;
}
.btn-soft-primary:hover {
    background-color: #0d6efd;
    color: white;
}

.btn-soft-secondary { 
    background-color: rgba(108, 117, 125, 0.1); 
    color: #6c757d;
    border: none;
}
.btn-soft-secondary:hover {
    background-color: #6c757d;
    color: white;
}

.btn-icon {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    border-radius: 8px;
}

.fs-20 { font-size: 20px; }
.z-index-1 { z-index: 1; }
</style>
