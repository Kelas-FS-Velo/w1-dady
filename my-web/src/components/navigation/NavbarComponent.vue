<script setup>
import { ref } from "vue";

const menu = ref([
  { id: 1, name: "Home", link: "#home" },
  { id: 2, name: "About", link: "#about" },
  { id: 3, name: "Services", link: "#services" },
  { id: 4, name: "Contact", link: "#contact" },
]);
</script>

<template>
  <nav
    class="absolute top-0 text-gray-400 w-full z-50 shadow flex items-center justify-between px-16 py-8"
  >
    <!-- nav-header -->
    <div class="nav-header">
      <a
        href="/"
        class="navbar-brand text-2xl font-normal flex items-center hover:bg-gradient-to-r hover:from-blue-400 hover:to-purple-600 hover:bg-clip-text hover:text-transparent transition-all duration-500 ease-in-out"
        >&copy; workerharder</a
      >
    </div>

    <!-- nav-navbar -->
    <ul class="nav-navbar w-3/12 flex items-center justify-evenly">
      <!-- item -->
      <li v-for="item in menu" :key="item.id" class="nav-item relative group">
        <!-- link -->
        <a
          v-smooth-scroll
          :href="item.link"
          class="nav-link font-normal capitalize text-xl hover:text-white transition-all duration-300 ease-in-out"
          >{{ item.name }}</a
        >
        <span
          class="absolute -bottom-2 left-0 w-0 h-0.5 bg-gray-400 transition-all duration-300 ease-in-out group-hover:w-8"
        ></span>
      </li>
    </ul>
  </nav>
</template>
