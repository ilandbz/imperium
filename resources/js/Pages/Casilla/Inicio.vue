<script setup>
  import { ref, onMounted } from 'vue';
  import { defineTitle } from '@/Helpers';
  import useHelper from '@/Helpers';  
  import useCasillaElectronica from '@/Composables/CasillaElectronica.js';
  import CasillaForm from './Form.vue'
  
  const { openModal, Toast, Swal, formatoFecha } = useHelper();
  const {
        casillas, errors, casilla, respuesta,
        obtenerCasillas, obtenerCasilla, eliminarCasilla, cambiarEstado
    } = useCasillaElectronica();

    const titleHeader = ref({
      titulo: "Casilla Electrónica",
      subTitulo: "Inicio",
      icon: "fas fa-mailbox",
      vista: ""
    });

    const dato = ref({
        page: '',
        buscar: '',
        paginacion: 10
    });

    const form = ref({
        id: '',
        user_id: '',
        mailbox_number: '',
        role_id: '',
        status: 'pendiente',
        activated_at: formatoFecha(null, 'YYYY-MM-DDTHH:mm'),
        // Person fields
        dni: '',
        ape_pat: '',
        ape_mat: '',
        primernombre: '',
        otrosnombres: '',
        celular: '',
        email: '',
        tipo_casilla_id: '',
        direccion: '',
        estadoCrud: '',
        errors: []
    });

    const limpiar = () => {
        form.value.id = '';
        form.value.user_id = '';
        form.value.mailbox_number = '';
        form.value.role_id = '';
        form.value.status = 'pendiente';
        form.value.activated_at = formatoFecha(null, 'YYYY-MM-DDTHH:mm');
        // Person fields
        form.value.dni = '';
        form.value.ape_pat = '';
        form.value.ape_mat = '';
        form.value.primernombre = '';
        form.value.otrosnombres = '';
        form.value.celular = '';
        form.value.email = '';
        form.value.tipo_casilla_id = '';
        form.value.direccion = '';
        form.value.estadoCrud = '';          
        form.value.errors = [];
        errors.value = [];
    }

    const obtenerDatos = async (id) => {
        await obtenerCasilla(id);
        if (casilla.value) {
            form.value.id = casilla.value.id;
            form.value.user_id = casilla.value.user_id;
            form.value.mailbox_number = casilla.value.mailbox_number;
            form.value.role_id = casilla.value.role_id;
            form.value.status = casilla.value.status;
            form.value.activated_at = casilla.value.activated_at;
            form.value.tipo_casilla_id = casilla.value.tipo_casilla_id;
            // Assuming the backend returns person data if available
            if (casilla.value.user && casilla.value.user.persona) {
                const p = casilla.value.user.persona;
                form.value.dni = p.dni;
                form.value.ape_pat = p.ape_pat;
                form.value.ape_mat = p.ape_mat;
                form.value.primernombre = p.primernombre;
                form.value.otrosnombres = p.otrosnombres;
                form.value.celular = p.celular;
                form.value.email = p.email;
                
                form.value.direccion = p.direccion;
            }
        }
    }

    const editar = (id) => {
        limpiar();
        obtenerDatos(id);
        form.value.estadoCrud = 'editar';
        document.getElementById("modalCasillaLabel").innerHTML = 'Editar Casilla Electrónica';
        openModal('#modalCasilla');
    }

    const nuevo = () => {
        limpiar();
        form.value.estadoCrud = 'nuevo';
        openModal('#modalCasilla');
        document.getElementById("modalCasillaLabel").innerHTML = 'Nueva Casilla Electrónica';
    }

    const listarCasillas = async (page = 1) => {
        dato.value.page = page;
        await obtenerCasillas(dato.value);
    }

    const eliminar = (id) => {
        Swal.fire({
            title: '¿Estás seguro de Eliminar?',
            text: "Esta acción no se puede deshacer",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                elimina(id);
            }
        })
    }

    const elimina = async (id) => {
        await eliminarCasilla(id);
        if (respuesta.value.ok == 1) {
            Toast.fire({ icon: 'success', title: respuesta.value.mensaje });
            listarCasillas(casillas.value.current_page);
        }
    }

    const cambEstado = async (id) => {
        await cambiarEstado(id);
        if (respuesta.value.ok == 1) {
            Toast.fire({ icon: 'success', title: respuesta.value.mensaje });
            listarCasillas();
        }
    }

    // PAGINACION
    const isActived = () => {
        return casillas.value.current_page;
    }
    const offset = 2;

    const buscar = () => {
        listarCasillas();
    }
    const cambiarPaginacion = () => {
        listarCasillas();
    }
    const cambiarPagina = (pagina) => {
        listarCasillas(pagina);
    }
    const pagesNumber = () => {
        if (!casillas.value.to) {
            return [];
        }
        let from = casillas.value.current_page - offset;
        if (from < 1) from = 1;
        let to = from + (offset * 2);
        if (to >= casillas.value.last_page) to = casillas.value.last_page;
        let pagesArray = [];
        while (from <= to) {
            pagesArray.push(from);
            from++;
        }
        return pagesArray;
    }

    // CARGA
    onMounted(() => {
        defineTitle(titleHeader.value.titulo);
        listarCasillas();
    })
</script>

<template>
    <div class="app-content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h6 class="card-title">
                    Listado de Casillas Electrónicas
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-1 mb-1">
                        <button type="button" class="btn btn-danger" @click.prevent="nuevo">
                            <i class="fas fa-plus"></i> Nuevo
                        </button>                        
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="input-group mb-1">
                            <span class="input-group-text">Mostrar</span>
                            <select class="form-select" v-model="dato.paginacion" @change="cambiarPaginacion">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group mb-1">
                            <span class="input-group-text">Buscar</span>
                            <input class="form-control" placeholder="Número de casilla..." type="text" v-model="dato.buscar" @change="buscar" />
                        </div>
                    </div>
                    <div class="col-md-4 mb-1">
                        <nav>
                            <ul class="pagination">
                                <li v-if="casillas.current_page >= 2" class="page-item">
                                    <a href="#" class="page-link" @click.prevent="cambiarPagina(1)"><i class="fas fa-backward"></i></a>
                                </li>
                                <li v-if="casillas.current_page > 1" class="page-item">
                                    <a href="#" class="page-link" @click.prevent="cambiarPagina(casillas.current_page - 1)"><i class="fas fa-angle-left"></i></a>
                                </li>
                                <li v-for="page in pagesNumber()" :key="page" class="page-item" :class="[ page == isActived() ? 'active' : '']">
                                    <a href="#" class="page-link" @click.prevent="cambiarPagina(page)">{{ page }}</a>
                                </li>
                                <li v-if="casillas.current_page < casillas.last_page" class="page-item">
                                    <a href="#" class="page-link" @click.prevent="cambiarPagina(casillas.current_page + 1)"><i class="fas fa-angle-right"></i></a>
                                </li>
                                <li v-if="casillas.current_page <= casillas.last_page-1" class="page-item">
                                    <a href="#" class="page-link" @click.prevent="cambiarPagina(casillas.last_page)"><i class="fas fa-step-forward"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-1">
                        <div class="table-responsive">         
                            <table class="table table-bordered table-hover table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Número Casilla</th>
                                        <th>DNI</th>
                                        <th>Nombre</th>
                                        <th>Tipo Usuario</th>
                                        <th>Estado</th>
                                        <th>Fecha Activación</th>
                                        <th>Usuario</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="casillas.total == 0">
                                        <td class="text-danger text-center" colspan="9">
                                            -- Datos No Registrados - Tabla Vacía --
                                        </td>
                                    </tr>
                                    <tr v-else v-for="(casilla, index) in casillas.data" :key="casilla.id">
                                        <td>{{ index + casillas.from }}</td>
                                        <td>{{ casilla.mailbox_number }}</td>
                                        <td>{{ casilla.user.persona.dni }}</td>
                                        <td>{{ casilla.user.persona.primernombre }} {{ casilla.user.persona.otrosnombres }} {{ casilla.user.persona.ape_pat }} {{ casilla.user.persona.ape_mat }}</td>
                                        <td>{{ casilla.tipo_casilla?.nombre }}</td>
                                        <td>
                                            <button
                                                type="button"
                                                class="btn btn-sm"
                                                :class="casilla.status === 'activo' ? 'btn-success' : 'btn-secondary'"
                                                @click="cambEstado(casilla.id)"
                                                title="Cambiar estado"
                                            >
                                                <i class="fas" :class="casilla.status === 'activo' ? 'fa-toggle-on' : 'fa-toggle-off'"></i>
                                                <span class="ms-1 text-capitalize">{{ casilla.status }}</span>
                                            </button>
                                        </td>
                                        <td>{{ casilla.activated_at }}</td>
                                        <td>{{ casilla.user_created.name }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" title="Editar" @click.prevent="editar(casilla.id)">
                                                <i class="fas fa-edit"></i>
                                            </button>&nbsp;
                                            <button class="btn btn-danger btn-sm" title="Eliminar" @click.prevent="eliminar(casilla.id)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        Mostrando <b>{{ casillas.from }}</b> a <b>{{ casillas.to }}</b> de <b>{{ casillas.total }}</b> Registros
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <CasillaForm :form="form" @onListar="listarCasillas" :currentPage="casillas.current_page"></CasillaForm>
</template>
