<script setup>
import { onMounted, computed } from 'vue';
import useDatosSession from '@/Composables/session';
import CasillaDashboard from '@/Pages/Sirea/Casilla/Dashboard.vue';

const { role } = useDatosSession();


</script>

<template>
    <div v-if="role.nombre === 'SUPER USUARIO'">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="fw-bold">Panel de Administración</h5>
                <p class="text-muted">Bienvenido al panel administrativo de Imperium Portal.</p>
                <!-- Aquí iría el dashboard de administrador si existiera uno específico -->
            </div>
        </div>
    </div>
    <div v-else class="p-4">
        <CasillaDashboard />
    </div>
</template>