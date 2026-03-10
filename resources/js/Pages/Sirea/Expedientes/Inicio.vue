<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import useHelper from '@/Helpers';

const { Swal, Toast } = useHelper();

const expedientes = ref([]);
const loading = ref(false);
const showModal = ref(false);
const showNotificarModal = ref(false);

const form = ref({
    codigo: '',
    ano: new Date().getFullYear(),
    titulo: '',
    materia: '',
    demandante: '',
    demandado: '',
    cuantia: 0
});

const notifForm = ref({
    expediente_id: null,
    casilla_electronica_id: null,
    asunto: '',
    mensaje: '',
    tipo: 'Resolución',
    documento: null
});

const casillas = ref([]);

const listarExpedientes = async () => {
    loading.value = true;
    try {
        const res = await axios.get('/api/casilla/expedientes');
        expedientes.value = res.data.data;
    } catch (e) {
        console.error(e);
    } finally {
        loading.value = false;
    }
};

const guardarExpediente = async () => {
    try {
        await axios.post('/api/casilla/expedientes', form.value);
        Toast.fire({ icon: 'success', title: 'Expediente creado' });
        showModal.value = false;
        listarExpedientes();
    } catch (e) {
        Swal.fire('Error', 'No se pudo crear el expediente', 'error');
    }
};

const abrirNotificar = (exp) => {
    notifForm.value.expediente_id = exp.id;
    notifForm.value.asunto = `Notificación sobre Expediente ${exp.codigo}`;
    showNotificarModal.value = true;
};

const enviarNotificacion = async () => {
    const formData = new FormData();
    Object.keys(notifForm.value).forEach(key => {
        formData.append(key, notifForm.value[key]);
    });

    try {
        await axios.post('/api/casilla/enviar-notificacion', formData, {
            headers: { 'Content-Type': 'multipart/form-data' }
        });
        Toast.fire({ icon: 'success', title: 'Notificación enviada' });
        showNotificarModal.value = false;
    } catch (e) {
        Swal.fire('Error', 'No se pudo enviar la notificación', 'error');
    }
};

const listarCasillas = async () => {
    try {
        const res = await axios.get('/api/casilla/todos');
        casillas.value = res.data;
    } catch (e) {
        console.error(e);
    }
};

onMounted(() => {
    listarExpedientes();
    listarCasillas();
});
</script>

<template>
    <div class="p-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Gestión de Expedientes</h5>
                <button class="btn btn-primary" @click="showModal = true">
                    <i class="feather-plus me-1"></i> Nuevo Expediente
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Código</th>
                                <th>Año</th>
                                <th>Título/Asunto</th>
                                <th>Demandante/Demandado</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="exp in expedientes" :key="exp.id">
                                <td><span class="fw-bold">{{ exp.codigo }}</span></td>
                                <td>{{ exp.ano }}</td>
                                <td>{{ exp.titulo }}</td>
                                <td>
                                    <small class="d-block text-muted">Dte: {{ exp.demandante }}</small>
                                    <small class="d-block text-muted">Ddo: {{ exp.demandado }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-soft-primary text-primary text-uppercase">{{ exp.estado }}</span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info me-1" title="Ver Detalles">
                                        <i class="feather-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-info text-white" @click="abrirNotificar(exp)" title="Notificar a Casilla">
                                        <i class="feather-mail"></i> Notificar
                                    </button>
                                </td>
                            </tr>
                            <tr v-if="expedientes.length === 0 && !loading">
                                <td colspan="6" class="text-center py-4 text-muted">No hay expedientes registrados</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Nuevo Expediente -->
        <div v-if="showModal" class="modal fade show d-block" style="background: rgba(0,0,0,0.5)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nuevo Expediente</h5>
                        <button type="button" class="btn-close" @click="showModal = false"></button>
                    </div>
                    <form @submit.prevent="guardarExpediente">
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <label class="form-label">Código del Expediente</label>
                                    <input v-model="form.codigo" type="text" class="form-control" required placeholder="EXP-2026-XXXX">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Año</label>
                                    <input v-model="form.ano" type="number" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Título / Asunto</label>
                                    <input v-model="form.titulo" type="text" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Demandante</label>
                                    <input v-model="form.demandante" type="text" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Demandado</label>
                                    <input v-model="form.demandado" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" @click="showModal = false">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Notificar -->
        <div v-if="showNotificarModal" class="modal fade show d-block" style="background: rgba(0,0,0,0.5)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title">Cargar Notificación a Casilla</h5>
                        <button type="button" class="btn-close btn-close-white" @click="showNotificarModal = false"></button>
                    </div>
                    <form @submit.prevent="enviarNotificacion">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Destinatario (Casilla Electrónica)</label>
                                <select v-model="notifForm.casilla_electronica_id" class="form-select" required>
                                    <option v-for="c in casillas" :key="c.id" :value="c.id">
                                        {{ c.mailbox_number }} - {{ c.user?.persona?.apenom || c.user?.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tipo de Acto</label>
                                <select v-model="notifForm.tipo" class="form-select" required>
                                    <option>Resolución</option>
                                    <option>Decreto</option>
                                    <option>Auto</option>
                                    <option>Requerimiento</option>
                                    <option>Oficio</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Asunto</label>
                                <input v-model="notifForm.asunto" type="text" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mensaje / Glosa</label>
                                <textarea v-model="notifForm.mensaje" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Documento Adjunto (PDF/Imagen)</label>
                                <input type="file" @change="e => notifForm.documento = e.target.files[0]" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" @click="showNotificarModal = false">Cancelar</button>
                            <button type="submit" class="btn btn-info text-white">Enviar Notificación</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
