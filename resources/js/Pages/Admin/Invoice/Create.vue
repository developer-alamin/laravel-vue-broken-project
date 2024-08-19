<script setup>
	import { Head, Link } from '@inertiajs/vue3';
	import InvoiceCreateComp from "@/Components/Admin/Invoice/CreateComponent.vue";
	const props = defineProps({customers:Object});
</script>
<template>
	<Head title="Invoice Create Page" />
    <AdminLayout>
       <InvoiceCreateComp :customers="props.customers"></InvoiceCreateComp>
    </AdminLayout>
	
</template>