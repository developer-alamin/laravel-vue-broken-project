<script setup>
 	import moment from "moment";
	import { Head, Link,router  } from '@inertiajs/vue3';
	import { reactive,ref, onMounted,onUpdated } from 'vue';
	import Modal from '@/Components/Modal.vue';
	import {useForm,usePage} from '@inertiajs/vue3';
	const lodding = ref("<strong>Processing...</strong>");
	const page = usePage();
	const props = defineProps({errors:Object,viewId:Object});
	$(document).ready( function () {
		$('#Table').DataTable(
			{
			responsive: true,
			pageLenght: [5],
			lengthMenu: [5, 10, 25, 50, 100],
			}
		);
	});
	
	const getViewId = ()=>{
		return props.viewId;
	}
	  
	const modals = reactive({
		state:null,
		update:null
	})
	const form = useForm({
		IdName: null,
	});
	const RefeshBtn = ()=>{
		let icon = document.getElementById("idRefReshIcon");
		icon.classList.add("fa-spin");
		const RanNum = Math.floor((Math.random() * 300) * 33555);
		form.IdName = RanNum;
	};
	
	onMounted(()=>{
		modals.state = new bootstrap.Modal('#modal_demo');
		modals.update = new bootstrap.Modal('#viewIdUpdateModal');

	})
	const openModal = ()=>{
		modals.state.show();
	};
	const ViewIdCreate = ()=>{
		let createStudentIdBtn = document.querySelector(".createStudentIdBtn");
		form.post(route("Admin.StudentId.Create.Page"),{
			preserveScroll: true,
			onBefore:()=>{
				createStudentIdBtn.innerHTML = lodding.value;
			},
			onSuccess:()=>{
			Swal.fire({
				title: "Success!",
				text: "Your Id Created Success !",
				icon: "success"
			});
			form.reset();
			modals.state.hide();
			createStudentIdBtn.innerHTML = "Create";
		   },
		   onError:()=>{
			Swal.fire({
				title: "Sorry!",
				text: "Your Id Created Faild!",
				icon: "error"
			});
			form.reset();
			modals.state.hide();
			createStudentIdBtn.innerHTML = "Create";
		   }
		})
	}
	const Delete = reactive({
		id:''
	});
	const viewIdDelete = (id)=>{
		Delete.id = id;
		Swal.fire({
			title: "Are you sure?",
			text: "You won't be able to Delete this!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes",
			
		}).then((result) => {
		if (result.isConfirmed) {
			router.post(route("Admin.ViewId.Delete.Page"),Delete,{
				preserveScroll: true,
				onSuccess:()=>{
					Swal.fire({
						title: "Deleted!",
						text: "Your Data has been deleted.",
						icon: "success"
					});
				}
			});
		}
		});
		
	}
	const edit = reactive({
		edit:''
	});
	const viewIdEdit = (i)=>{
		edit.edit = props.viewId[i];
		modals.update.show();
	}
	const ViewIdUpdate = ()=>{
		const updateViewIdBtn = document.querySelector(".updateViewIdBtn");
		router.post(route("Admin.ViewId.Update.Page"),edit,{
			onBefore:()=>{
				updateViewIdBtn.innerHTML = lodding.value
			},
			onSuccess:()=>{
				Swal.fire({
					title: "Success!",
					text: "Your Id Updated Success !",
					icon: "success"
				});
				modals.update.hide();
				updateViewIdBtn.innerHTML = "Update";
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
						<h4>List And Create New Student Id</h4>
						<button @click="openModal" class="btn btn-outline-primary ms-auto">Create</button>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="Table" class="table table-bordered table-hover table-striped">
								<thead>
									<tr class="text-center" >
										<th>Sr</th>
										<th>Student Id</th>
										<th>Status</th>
										<th>Users</th>
										<th>Date</th>
										<th>End</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr class="text-center" v-for="data,i in getViewId()" :key="i">
										<td>{{i+1}}</td>
										<td>{{ data.IdName }}</td>
										<td><p :class="data.status">{{ data.status }}</p></td>
										<td class="">
											<img v-if="data.profile" class="tdUsersImg" src="../../../../../public/img/pjs.png" alt="avater">
											<img v-else class="tdUsersImg" src="../../../../../public/img/avater.jpg" alt="avater">
										</td>
										<td>{{ moment(data.created_at).format("DD-MM-yy")  }}</td>
										<td>{{ moment(data.updated_at).format("DD-MM-yy")  }}</td>
										<td class="actionTd">
											<button @click="viewIdEdit(i)" class="btn btn-outline-success">
												<i class="fa fa-edit"></i>
											</button>
											<Link :href="route('Admin.ViewId.Show.Page',data.users.id)" v-if="data.users" class="btn btn-outline-primary">
												<i class="fa fa-eye"></i>
											</Link>
											<button @click="viewIdDelete(data.id)" v-else class="btn btn-outline-danger">
												<i class="fa fa-trash"></i>
											</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Insert Modal -->
		<div class="modal fade" id="modal_demo" tabindex="-1" aria-labelledby="modal_demo_label" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modal_demo_label">Create Student Id</h5>
		        <button type="button" class="btn-close" aria-label="Close" @click="closeModal"></button>
		      </div>
		      <div class="modal-body">
		        	<form>
		        		<div class="row">
		        			<div class="col-12">
		        				<div class="d-flex align-items-center mb-2">
		        					<label for="idName">New Id:</label>
		        					<button @click.prevent="RefeshBtn" class="btn ms-auto btn-outline-success">
		        						<i id="idRefReshIcon" class="fa-solid fa-sync "></i>
		        					</button>
		        				</div>
		        				<input v-model="form.IdName" type="text" name="IdName"  class="form-control" placeholder="Enter New Id...">
								<span class="errors" v-if="$page.props.errors.IdName"><i class="fa fa-exclamation-circle"></i> {{ $page.props.errors.IdName }}</span>
		        			</div>
		        			<div class="col-12 mt-2">
		        				<button @click.prevent="ViewIdCreate()" type="submit" class="btn btn-outline-primary form-control createStudentIdBtn">Create</button>
		        			</div>
		        		</div>
		        	</form>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Update Modal -->
		<div class="modal fade" id="viewIdUpdateModal" tabindex="-1" aria-labelledby="modal_demo_label" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" >Student Id Update</h5>
		        <button type="button" class="btn-close" aria-label="Close" @click="closeModal"></button>
		      </div>
		      <div class="modal-body">
		        	<form>
		        		<div class="row">
		        			<div class="col-12">
								<label for="">Id:</label>
		        				<input v-model="edit.edit.IdName" type="text"  class="form-control">
		        			</div>
							<div class="col-12">
								<label for="">Status:</label>
		        				<select v-model="edit.edit.status" class="form-select">
									<option value="active">Active</option>
									<option value="deactive">Deactive</option>
								</select>
		        			</div>
		        			<div class="col-12 mt-2">
		        				<button @click.prevent="ViewIdUpdate()" type="submit" class="btn btn-outline-primary form-control updateViewIdBtn">Update</button>
		        			</div>
		        		</div>
		        	</form>
		      </div>
		    </div>
		  </div>
		</div>
	</article>
</template>
<style scoped>
	 tr th,td{
		text-align: center !important;
	}
	td.actionTd.dt-type-numeric {
	    text-align: center !important;
	}
	
</style>

