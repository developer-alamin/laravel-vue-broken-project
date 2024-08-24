<script setup>
	import {useForm,usePage,Head, Link,router} from '@inertiajs/vue3';
	import moment from 'moment';
	import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
	import { reactive,ref,onMounted} from 'vue';
	const page = usePage();
	const lodding = ref("<strong>Processing...</strong>");
	const props = defineProps({errors:Object,data:Object});
	const getData = ()=>{
		return props.data;
	}
	const form = useForm({
		id:''
	});
	if (page.props.update) {
		Swal.fire({
			title: "Success!",
			text: "Daily Invoice Data Updated!",
			icon: "success"
		});
	}
	$(document).ready( function () {
		$('#table').DataTable(
			{
			responsive: true,
			pageLenght: [5],
			lengthMenu: [5, 10, 25, 50, 100],
			order : [0,'desc'],
			}
		);
	});
	const status = (id)=>{
		return (id == 1) ? "Paid" : "Unpaid";
	}
	const deleted = (id)=>{
        form.id = id;
        Swal.fire({
            title: "Are you sure?",
            text: "Your Daily Invoice Deleted ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes"
            }).then((result) => {
            if (result.isConfirmed) {
                form.delete(route("invoice.destroy",form.id),{
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
    	 form.put(route("Invoice.Status.Update"),{
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
						<h4> {{ moment(getData()["date"]).format('LL')}} Customers Invoice </h4>
						<Link :href="route('invoice.list')" class="btn gradientBtn ms-auto">All Invoice</Link>
					</div>
					<div class="card-body">
						<table id="table" class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Sr</th>
									<th>Name</th>
									<th>Taka</th>
									<th>Phone</th>
									<th>Photo</th>
									<th>Date</th>
									<th>Status</th>
									<th>Update</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(data,i) in getData()['customers']">
									<td>{{i+1}}</td>
									<td>{{data.users.name}}</td>
									<td>{{data.taka }}</td>
										
									<td>{{data.users.phone }}</td>
									
									<td>
										<img v-if="data.users.avatar" :src="data.users.avatar">
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
										<Link :href="route('invoice.edit',data.id)" class="btn btn-outline-success"><i class="fas fa-edit"></i></Link>
										<Link class="btn btn-outline-primary"><i class="fas fa-eye"></i></Link>
										<Link @click="deleted(data.id)" class="btn btn-outline-danger"><i class="fas fa-trash"></i></Link>
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