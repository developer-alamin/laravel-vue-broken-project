<script setup>
	import { Head, Link } from '@inertiajs/vue3';
	import InvoiceIndexComp from "@/Components/Admin/Invoice/IndexComponent.vue";
	const props = defineProps({invoice:Object});
</script>
<template>
	<Head title="Invoice View Page" />
    <AdminLayout>
       <InvoiceIndexComp :invoice="props.invoice"></InvoiceIndexComp>
    </AdminLayout>
	
</template>