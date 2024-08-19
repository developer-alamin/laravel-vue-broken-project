<script setup>
	import { Head, Link } from '@inertiajs/vue3';
	import InvoiceEditComp from "@/Components/Admin/Invoice/EditComponent.vue";
	const props = defineProps({data:Object});
</script>
<template>
	<Head title="Invoice Edit Page" />
    <AdminLayout>
       <InvoiceEditComp :data="props.data"></InvoiceEditComp>
    </AdminLayout>
	
</template>