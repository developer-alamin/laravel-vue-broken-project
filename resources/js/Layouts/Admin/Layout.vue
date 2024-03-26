<script setup>
	import AdminHeaderComponents from "@/Components/Admin/Layouts/HeaderComponent.vue";
  import AdminAsideComponents from "@/Components/Admin/Layouts/AsideComponent.vue"; 
</script>


<template>
	<AdminHeaderComponents></AdminHeaderComponents>
  <AdminAsideComponents></AdminAsideComponents>
  

  <main id="main" class="main">
    <section class="section dashboard mainContent">
     	<slot></slot>
    </section>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
</template>