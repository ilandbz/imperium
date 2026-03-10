<script setup>
import { onMounted, computed } from 'vue';
import useDatosSession from '@/Composables/session';
import CasillaDashboard from '@/Pages/Sirea/Casilla/Dashboard.vue';

const { role } = useDatosSession();

// Verificamos si es un usuario común (no Super Usuario)
const isCommonUser = computed(() => {
    return role.value && role.value.nombre !== 'SUPER USUARIO';
});
</script>

<template>
    <div v-if="isCommonUser">
        <CasillaDashboard />
    </div>
    <div v-else class="p-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="fw-bold">Panel de Administración</h5>
                <p class="text-muted">Bienvenido al panel administrativo de Imperium Portal.</p>
                <!-- Aquí iría el dashboard de administrador si existiera uno específico -->
            </div>
        </div>
    </div>
</template>