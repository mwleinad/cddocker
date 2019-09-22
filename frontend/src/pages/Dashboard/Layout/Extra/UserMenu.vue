<template>
  <div class="user user__menu">
    <div class="photo">
      <i class="fas fa-building"></i>
    </div>
    <div class="info">
      <a data-toggle="collapse" :aria-expanded="!isClosed" @click.stop="toggleMenu" href="#">
           <span>
             {{title}}
             <b class="caret"></b>
          </span>
      </a>
      <div class="clearfix"></div>
      <div>
        <collapse-transition>
          <ul class="nav user-menu__nav" v-show="!isClosed">
            <slot>
              <li>
                <a href="#vue">
                  <i class="fas fa-cog sidebar-mini-icon"></i>
                  <span class="sidebar-normal">Configuración</span>
                </a>
              </li>
              <li>
                <a href="#vue">
                  <i class="fas fa-users sidebar-mini-icon"></i>
                  <span class="sidebar-normal">Usuarios</span>
                </a>
              </li>
              <li>
                <a href="#vue">
                  <i class="fas fa-stamp sidebar-mini-icon"></i>
                  <span class="sidebar-normal">Certificado</span>
                </a>
              </li>
              <li>
                <a href="#vue">
                  <i class="fas fa-list sidebar-mini-icon"></i>
                  <span class="sidebar-normal">Folios</span>
                </a>
              </li>
              <li>
                <a href="#vue">
                  <i class="fas fa-money-bill-alt sidebar-mini-icon"></i>
                  <span class="sidebar-normal">Facturación</span>
                </a>
              </li>
            </slot>
          </ul>
        </collapse-transition>
      </div>
    </div>
  </div>
</template>
<script>
import { CollapseTransition } from 'vue2-transitions';

export default {
  name: 'user-menu',
  components: {
    CollapseTransition
  },
  props: {
    title: {
      type: String,
      default: 'Mi empresa'
    },
    image: {
      type: String,
      default: 'img/james.jpg'
    }
  },
  data() {
    return {
      isClosed: true
    };
  },
  methods: {
    toggleMenu() {
      this.isClosed = !this.isClosed;
    }
  }
};
</script>
<style>
  .user__menu ul.user-menu__nav {
    margin-top: 0;
    padding-top: 20px;
  }
</style>
