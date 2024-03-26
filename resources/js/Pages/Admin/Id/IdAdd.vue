<script setup>
	import IdAddComponent from "@/Components/Admin/Id/IdAddComponent.vue"

	import { Head, Link } from '@inertiajs/vue3';
</script>
<template>
	<Head title="Student Id Page" />
    <AdminLayout>
      <IdAddComponent></IdAddComponent>
    </AdminLayout>
	
</template>