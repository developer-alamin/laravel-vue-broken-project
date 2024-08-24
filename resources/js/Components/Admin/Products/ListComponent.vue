<script setup>
	import {useForm,usePage,Head, Link,router} from '@inertiajs/vue3';
	import moment from 'moment';
	import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
	import { reactive,ref,onMounted} from 'vue';
	const page = usePage();
	const lodding = ref("<strong>Processing...</strong>");
	const props = defineProps({errors:Object,invoice:Object});
	const getInvoice = ()=>{
		return props.invoice;
	}
	$(document).ready( function () {
		$('#table').DataTable(
			{
			responsive: true,
			pageLenght: [5],
			lengthMenu: [5, 10, 25, 50, 100],
			//order : [0,'desc'],
			}
		);
	});
</script>
<template>
	<article>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4>All Date List</h4>
					</div>
					<div class="card-body">
						<table id="table" class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Sr</th>
									<th>Date</th>
									<th>Customers</th>
									<th>Total Taka</th>
									<th>Created</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(data,i) in getInvoice()">
									<td>{{i+1}}</td>
									<td>{{data.date}}</td>
									<td>{{data.users}}</td>
									<td>{{data.taka}}</td>
									<td>{{ moment(data.day).format("dddd MMMM y") }}</td>
									<td>
										<Link :href="route('invoice.show',data.callDate)" class="btn btn-outline-success ">
											<i class="fas fa-eye"></i>
										</Link>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</article>
</template>
