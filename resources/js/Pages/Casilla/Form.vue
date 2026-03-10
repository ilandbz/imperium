<script setup>
import { ref, watch, onMounted } from 'vue';
import useHelper from '@/Helpers';
import useCasillaElectronica from '@/Composables/CasillaElectronica.js';
import useTipoCasilla from '@/Composables/TipoCasilla.js';
// import useRol from '@/Composables/Rol.js';


const props = defineProps({
    form: Object,
    currentPage: Number
});

const emit = defineEmits(['onListar']);

const { hideModal, Toast, soloNumeros } = useHelper();
const {
    errors, respuesta,
    agregarCasilla, actualizarCasilla
} = useCasillaElectronica();

// const { roles, listaRoles } = useRol();
const { tipos, listaTipos } = useTipoCasilla();

const enviarFormulario = async () => {
    if (props.form.estadoCrud === 'nuevo') {
        await agregarCasilla(props.form);
    } else {
        await actualizarCasilla(props.form);
    }

    if (respuesta.value.ok == 1) {
        Toast.fire({ icon: 'success', title: respuesta.value.mensaje });
        hideModal('#modalCasilla');
        emit('onListar', props.currentPage);
    }
}

watch(() => errors.value, (newVal) => {
    props.form.errors = newVal;
});

onMounted(async () => {
    // await listaRoles();
    await listaTipos();
});

</script>

<template>
    <Teleport to="body">
        <div class="modal fade" id="modalCasilla" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalCasillaLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCasillaLabel">Casilla Electrónica</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form @submit.prevent="enviarFormulario">
                        <div class="modal-body">
                            <div class="row">
                                <!-- Person Fields -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">DNI</label>
                                    <input v-model="form.dni" type="text" class="form-control" :class="{ 'is-invalid': form.errors.dni }" maxlength="8" placeholder="Ingrese DNI">
                                    <div v-if="form.errors.dni" class="invalid-feedback">{{ form.errors.dni[0] }}</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Primer Nombre</label>
                                    <input v-model="form.primernombre" type="text" class="form-control" :class="{ 'is-invalid': form.errors.primernombre }" placeholder="Primer Nombre">
                                    <div v-if="form.errors.primernombre" class="invalid-feedback">{{ form.errors.primernombre[0] }}</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Otros Nombres</label>
                                    <input v-model="form.otrosnombres" type="text" class="form-control" :class="{ 'is-invalid': form.errors.otrosnombres }" placeholder="Otros Nombres">
                                    <div v-if="form.errors.otrosnombres" class="invalid-feedback">{{ form.errors.otrosnombres[0] }}</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Apellido Paterno</label>
                                    <input v-model="form.ape_pat" type="text" class="form-control" :class="{ 'is-invalid': form.errors.ape_pat }" placeholder="Apellido Paterno">
                                    <div v-if="form.errors.ape_pat" class="invalid-feedback">{{ form.errors.ape_pat[0] }}</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Apellido Materno</label>
                                    <input v-model="form.ape_mat" type="text" class="form-control" :class="{ 'is-invalid': form.errors.ape_mat }" placeholder="Apellido Materno">
                                    <div v-if="form.errors.ape_mat" class="invalid-feedback">{{ form.errors.ape_mat[0] }}</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Celular</label>
                                    <input v-model="form.celular" maxlength="9" type="text" class="form-control" :class="{ 'is-invalid': form.errors.celular }" placeholder="Número de Celular" @input="soloNumeros">
                                    <div v-if="form.errors.celular" class="invalid-feedback">{{ form.errors.celular[0] }}</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input v-model="form.email" type="email" class="form-control" :class="{ 'is-invalid': form.errors.email }" placeholder="ejemplo@correo.com">
                                    <div v-if="form.errors.email" class="invalid-feedback">{{ form.errors.email[0] }}</div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Dirección</label>
                                    <input v-model="form.direccion" type="text" class="form-control" :class="{ 'is-invalid': form.errors.direccion }" placeholder="Dirección domiciliaria">
                                    <div v-if="form.errors.direccion" class="invalid-feedback">{{ form.errors.direccion[0] }}</div>
                                </div>

                                <hr>

                                <!-- Mailbox Fields -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Número de Casilla</label>
                                    <input v-model="form.mailbox_number" type="text" class="form-control" :class="{ 'is-invalid': form.errors.mailbox_number }" placeholder="Autogenerado" readonly>
                                    <div v-if="form.errors.mailbox_number" class="invalid-feedback">{{ form.errors.mailbox_number[0] }}</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Tipo de Casilla</label>
                                    <select v-model="form.tipo_casilla_id" class="form-select" :class="{ 'is-invalid': form.errors.tipo_casilla_id }">
                                        <option value="">Seleccione Tipo</option>
                                        <option v-for="type in tipos" :key="type.id" :value="type.id">
                                            {{ type.nombre }}
                                        </option>
                                    </select>
                                    <div v-if="form.errors.tipo_casilla_id" class="invalid-feedback">{{ form.errors.tipo_casilla_id[0] }}</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Estado</label>
                                    <select v-model="form.status" class="form-select" :class="{ 'is-invalid': form.errors.status }">
                                        <option value="pendiente">Pendiente</option>
                                        <option value="activo">Activo</option>
                                        <option value="suspendido">Suspendido</option>
                                    </select>
                                    <div v-if="form.errors.status" class="invalid-feedback">{{ form.errors.status[0] }}</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Fecha de Activación</label>
                                    <input v-model="form.activated_at" type="datetime-local" class="form-control" :class="{ 'is-invalid': form.errors.activated_at }">
                                    <div v-if="form.errors.activated_at" class="invalid-feedback">{{ form.errors.activated_at[0] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </Teleport>
</template>
