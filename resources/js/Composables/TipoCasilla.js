import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'

export default function useTipoCasilla() {
    const tipos = ref([])
    const errors = ref('')
    const tipo = ref({})
    const respuesta = ref([])

    const obtenerTipo = async (id) => {
        let respuesta = await axios.get('tipo-casilla/mostrar?id=' + id, getConfigHeader())
        tipo.value = respuesta.data
    }

    const listaTipos = async () => {
        let respuesta = await axios.get('tipo-casilla/todos', getConfigHeader())
        tipos.value = respuesta.data
    }

    const obtenerTipos = async (data) => {
        let respuesta = await axios.get('tipo-casilla/listar' + getdataParamsPagination(data), getConfigHeader())
        tipos.value = respuesta.data
    }

    const agregarTipo = async (data) => {
        errors.value = ''
        try {
            let respond = await axios.post('tipo-casilla/guardar', data, getConfigHeader())
            errors.value = ''
            if (respond.data.ok == 1) {
                respuesta.value = respond.data
            }
        } catch (error) {
            errors.value = ""
            if (error.response.status === 422) {
                errors.value = error.response.data.errors
            }
        }
    }

    const actualizarTipo = async (data) => {
        errors.value = ''
        try {
            let respond = await axios.post('tipo-casilla/actualizar', data, getConfigHeader())
            errors.value = ''
            if (respond.data.ok == 1) {
                respuesta.value = respond.data
            }
        } catch (error) {
            errors.value = ""
            if (error.response.status === 422) {
                errors.value = error.response.data.errors
            }
        }
    }

    const eliminarTipo = async (id) => {
        const respond = await axios.post('tipo-casilla/eliminar', { id: id }, getConfigHeader())
        if (respond.data.ok == 1) {
            respuesta.value = respond.data
        }
    }

    return {
        errors, tipos, listaTipos, tipo, obtenerTipo, obtenerTipos,
        agregarTipo, actualizarTipo, eliminarTipo, respuesta
    }
}
