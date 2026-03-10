<script setup>
import { toRef } from 'vue'
import MenusRenderer from '@/Components/Sirea/MenusRenderer.vue'
import useMenuUI from '@/Composables/useMenuUI'

const props = defineProps({ menus: { type: Array, default: () => [] } })
const menusRef = toRef(props, 'menus')

const { menuUI, openMenu, submenuRefs, toggleMenu, isActive } = useMenuUI(menusRef)
</script>

<template>
  <nav class="nxl-navigation">
    <div class="navbar-wrapper">
      <!-- Header -->
      <div class="m-header">
        <RouterLink to="/" class="b-brand">
          <img src="/img/logo.png" alt="Logo" class="logo logo-lg" />
          <img src="/img/logo.png" alt="Logo" class="logo logo-sm" />
        </RouterLink>
      </div>

      <div class="navbar-content">
        <MenusRenderer
          :menuUI="menuUI"
          :openMenu="openMenu"
          :submenuRefs="submenuRefs"
          :toggleMenu="toggleMenu"
          :isActive="isActive"
        />
      </div>
    </div>
  </nav>
</template>

<style scoped>
/* Mantén tu estilo de mayúsculas si lo deseas */
.nxl-caption label {
  text-transform: uppercase;
  letter-spacing: .6px;
}

.nxl-link .nxl-mtext {
  text-transform: uppercase;
  letter-spacing: .3px;
}

/* Submenu */
.nxl-submenu .nxl-link {
  text-transform: uppercase;
  letter-spacing: .25px;
}

/* si el template no resalta active, esto ayuda */
.nxl-item.active > .nxl-link {
  font-weight: 600;
}


.m-header {
  padding: 14px 12px 10px;
  min-height: 90px;       /* dale más aire */
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: visible;      /* evita que corte la parte superior */
}

/* Link que envuelve el logo */
.b-brand {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  padding-top: 8px;       /* separa de arriba */
  box-sizing: border-box;
}

/* Logo */
.logo {
  display: block;
  max-width: 100%;
  height: auto;
  object-fit: contain;
}

/* Tamaño logo grande */
.logo-lg {
  max-height: 70px;
  margin-top: 6px;
}

/* Tamaño logo mini */
.logo-sm {
  max-height: 42px;
  margin-top: 6px;
}

/* Mantén tu estilo de mayúsculas si lo deseas */
.nxl-caption label {
  text-transform: uppercase;
  letter-spacing: .6px;
}

.nxl-link .nxl-mtext {
  text-transform: uppercase;
  letter-spacing: .3px;
}

/* Submenu */
.nxl-submenu .nxl-link {
  text-transform: uppercase;
  letter-spacing: .25px;
}

/* si el template no resalta active, esto ayuda */
.nxl-item.active > .nxl-link {
  font-weight: 600;
}

</style>