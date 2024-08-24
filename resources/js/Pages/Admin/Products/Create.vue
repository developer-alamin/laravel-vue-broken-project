<script setup>
	import { Head, Link } from '@inertiajs/vue3';
	import ProductCreateComp from "@/Components/Admin/Products/CreateComponent.vue";
</script>
<template>
	<Head title="Product Create Page" />
    <AdminLayout>
       <ProductCreateComp></ProductCreateComp>
    </AdminLayout>
	
</template>