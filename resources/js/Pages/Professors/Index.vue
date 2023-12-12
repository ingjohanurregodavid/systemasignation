<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link,useForm} from '@inertiajs/vue3';
import { Result } from 'postcss';
import Swal from 'sweetalert2';

const props=defineProps({
    professors:{type:Object}
});
//Constante para usar el formulario
const form=useForm({
    id:''
});
const deleteProfessors=(id,name)=>{
    const alert=Swal.mixin({
        buttonsStyling:true
    });
    alert.fire({
        title:'Are you sure delete   '+name+' ?',
        icon:'question',showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i>yes,delete',
        cancelButtonText:'<i class="fa-solid fa-ban"></i>Cancel'

    }).then((result)=>{
        if(result.isConfirmed){
            form.delete(route('Professors.destroy',id ));
        }
    });
}
</script>
<template>
    <Head title="Professors" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Professors</h2>
        </template>

        <div class="py-12"> 
            <div class="bg-white grid v-screen place-items-center">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="mt-3 mb-3 flex">
                        <Link :href="route('Professors.create')"
                        :class="'px-4 py-2 bg-green-800 text-white border rounded-mb font-semibold text-xs'"             
                        >
                            <i class="fa-solid fa-plus-circle"></i>Add 
                        </Link>                     
                    </div>
                </div>
                <div class="bg-white grid v-screen" >
                    <table class="table-auto border border-gray-400">
                       <thead>
                        <tr class="bg-gray-100" style="width: auto;">
                            <th class="px-4 py-4 ">#</th>
                            <th class="px-4 py-4 ">Document</th>
                            <th class="px-4 py-4 ">Names</th>
                            <th class="px-4 py-4 ">Telephone</th>
                            <th class="px-4 py-4 ">Email</th>
                            <th class="px-4 py-4 ">Address </th>
                            <th class="px-4 py-4 ">City</th>
                            <th class="px-4 py-4 "></th>
                            <th class="px-4 py-4 "></th>
                        </tr>
                       </thead>
                    
                    <tbody>
                        <tr v-for="pfs, i in professors" :key="pfs.id">    
                            <td class="border border-gray-400 px-4 py-4">{{ i+1 }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ pfs.Document }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ pfs.Names }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ pfs.Telephone }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ pfs.Email }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ pfs.Address }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ pfs.City }}</td>
                            <td class="border border-gray-400 px-4 py-4"> 
                                <Link :href="route('Professors.edit',pfs.id)"
                                    :class="'px-4 py-2 bg-yellow-400 text-white border rounded-mb font-semibold text-xs'">
                                    <i class="fa-solid fa-edit"></i> 
                                </Link> 
                            </td>
                            <td class="border border-gray-400 px-4 py-4"> 
                                <DangerButton @click="deleteProfessors(pfs.id,pfs.Names)">
                                    <i class="fa-solid fa-trash"></i>
                                </DangerButton>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
