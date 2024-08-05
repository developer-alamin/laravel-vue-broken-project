<script setup>
	import { Head, Link } from '@inertiajs/vue3';
	import CustomerCreateComp from "@/Components/Admin/Customes/CreateComponent.vue";
</script>
<template>
	<Head title="Customer Index Page" />
    <AdminLayout>
       <CustomerCreateComp></CustomerCreateComp>
    </AdminLayout>
	
</template>