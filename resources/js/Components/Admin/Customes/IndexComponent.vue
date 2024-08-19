<script setup>
	const props = defineProps({customers:Object});
	import {useForm,usePage,Link,router} from '@inertiajs/vue3';
	const page = usePage();
	$(document).ready( function () {
		$('#Table').DataTable(
			{
			responsive: true,
			pageLenght: [5],
			lengthMenu: [5, 10, 25, 50, 100],
			order : [0,'desc'],
			}
		);
	});
	const getCustomers = () => {
		return props.customers;
	}

	if (page.props.update) {
		Swal.fire({
			title: "Success!",
			text: "Customers Data Updated Success !",
			icon: "success"
		});
	}


</script>
<template>
	<article>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h4>All Customers List</h4>
						<Link :href="route('customers.create')" class="btn gradientBtn ms-auto">New Customer</Link>
					</div>
					<div class="card-body">
						<table id="Table" class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Sr</th>
									<th>Name</th>
									<th>Email</th>
									<th>Customer Id</th>
									<th>Phone</th>
									<th>Village</th>
									<th>Photo</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(data,i) in getCustomers()">
									<td>{{data.id}}</td>
									<td>{{data.name}}</td>
									<td>{{data.email}}</td>
									<td>{{data.customer_id }}</td>
									<td>{{data.phone }}</td>
									<td>{{data.village }}</td>
									<td>
										<img v-if="data.avatar" :src="data.avatar" alt="">
										<img v-else="" src="../../../../../public/img/avater.jpg" alt="">
									</td>
									<td class="text-center">
										<Link :href="route('customers.edit',data.id)" class="btn btn-outline-success"><i class="fas fa-edit"></i></Link>
										<Link class="btn btn-outline-primary"><i class="fas fa-eye"></i></Link>
										<Link class="btn btn-outline-danger"><i class="fas fa-trash"></i></Link>
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
<style scoped>
	img{
		width: 50px;
		height:50px;
	}
</style>