import axios from 'axios'
import { ref } from 'vue'
import { getConfigHeader, getdataParamsPagination } from '@/Helpers'

export default function useCasillaElectronica() {
    const casillas = ref([])
    const errors = ref('')
    const casilla = ref({})
    const respuesta = ref([])

    const obtenerCasilla = async (id) => {
        let response = await axios.get('casilla/mostrar?id=' + id, getConfigHeader())
        casilla.value = response.data
    }
    const listaCasillas = async () => {
        let response = await axios.get('casilla/todos', getConfigHeader())
        casillas.value = response.data
    }
    const obtenerCasillas = async (data) => {
        let response = await axios.get('casilla/listar' + getdataParamsPagination(data), getConfigHeader())
        casillas.value = response.data
    }
    const agregarCasilla = async (data) => {
        errors.value = ''
        try {
            let respond = await axios.post('casilla/guardar', data, getConfigHeader())
            if (respond.data.ok == 1) {
                respuesta.value = respond.data
            }
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors
            }
        }
    }
    const actualizarCasilla = async (data) => {
        errors.value = ''
        try {
            let respond = await axios.post('casilla/actualizar', data, getConfigHeader())
            if (respond.data.ok == 1) {
                respuesta.value = respond.data
            }
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors
            }
        }
    }
    const eliminarCasilla = async (id) => {
        const respond = await axios.post('casilla/eliminar', { id: id }, getConfigHeader())
        if (respond.data.ok == 1) {
            respuesta.value = respond.data
        }
    }

    return {
        errors, casillas, listaCasillas, casilla, obtenerCasilla, obtenerCasillas,
        agregarCasilla, actualizarCasilla, eliminarCasilla, respuesta
    }
}
