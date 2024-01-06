<script setup>
    import Sidebar from "../Components/Layout/Sidebar.vue"
    import Header from '../Components/Layout/Header.vue';
</script>
<template>
<article>
    <div class="wrapper">
        <Sidebar/>
      <div class="main">
        <Header/>
        <main class="">
          <div class="container-fluid">
                <slot></slot>
          </div>
        </main>
      </div>
    </div>
</article>
</template>
