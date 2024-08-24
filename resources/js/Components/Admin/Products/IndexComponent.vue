
<script setup>
	import {useForm,usePage,Head, Link,router} from '@inertiajs/vue3';
	import moment from 'moment';

	import { reactive,ref} from 'vue';
	const page = usePage();
	const lodding = ref("<strong>Processing...</strong>");
	const props = defineProps({products:Object});
	const getProducts = ()=>{
		return props.products;
	}
	$(document).ready( function () {
		$('#table').DataTable(
			{
			responsive: true,
			pageLenght: [5],
			lengthMenu: [5, 10, 25, 50, 100],
			}
		);
	});
	const form = useForm({
		id:'',
		table:'Product'
	});
	if (page.props.update) {
		Swal.fire({
			title: "Success!",
			text: "Daily Invoice Data Updated!",
			icon: "success"
		});
	}
	const status = (id)=>{
		return (id == 1) ? "Active" : "Deactive";
	}
	const deleted = (id)=>{
        form.id = id;
        Swal.fire({
            title: "Are you sure?",
            text: "Your Product Deleted ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
            }).then((result) => {
            if (result.isConfirmed) {
                form.delete(route("product.destroy",form.id),{
                    preserveScroll: true,
                    onSuccess:()=>{
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your Data has been deleted.",
                            icon: "success"
                        });
                    },
                    onError:()=>{
                        Toastify({
                            text: "Delete Faild",
                            gravity: "bottom",
                            position: "center",
                            className: "error",
                            style: {
                                background: "linear-gradient(to right, #ff0e11, #b91a1a)",
                            }
                        }).showToast();
                    }
                });
            }
        });
    }
    const toggleSwitch = (id)=>{
    	form.id = id;
    	 form.put(route("status.update"),{
            preserveScroll: true,
            onSuccess:()=>{
                Swal.fire({
                    title: "Success!",
                    text: "Your Data has been Updated.",
                    icon: "success"
                });
            }
        });
    }
 
</script>
<template>
	<article>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h4>Product All List</h4>
						<Link :href="route('product.create')" class="btn gradientBtn ms-auto">Add New</Link>
					</div>
					<div class="card-body">
						<table id="table" class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Sr</th>
									<th>Name</th>
									<th>Price</th>
									<th>Regualar Price</th>
									<th>Photo</th>
									<th>Create</th>
									<th>Status</th>
									<th>Update</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(data,i) in getProducts()">
									<td>{{i+1}}</td>
									<td>{{data.name}}</td>
									<td>{{data.price }}</td>
										
									<td>{{data.current }}</td>
									
									<td>
										<img v-if="data.img" :src="data.img">
										<img v-else="" src="../../../../../public/img/avater.jpg" alt="">
									</td>
									<td>{{ moment(data.created_at).format("LLL") }}</td>
									<td>
										<p :class="status(data.status).toLowerCase()">{{status(data.status)}}</p>
									</td>
									<td>
									<div class="form-check form-switch">
									   <input @click="toggleSwitch(data.id)" class="form-check-input" type="checkbox" role="switch" :checked="data.status == 1">
									</div>

									</td>
									<td class="text-center">
										<Link :href="route('product.edit',data.id)" class="btn btn-outline-success"><i class="fas fa-edit"></i></Link>
										<button class="btn btn-outline-primary"><i class="fas fa-eye"></i></button>
										<button @click="deleted(data.id)" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
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